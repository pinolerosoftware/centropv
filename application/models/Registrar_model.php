<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar_model extends CI_Model {

    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    //Funcion para crear compania 
    //devuelve el codigo de verificacion que se enviara al correo
    public function registrarCompania($dataCompany, $dataUser, $dataPermiso){
        //Iniciamos una transaccion
        $this->db->trans_start();
        //Insertamos la compania
        $this->db->insert('company', $dataCompany);
        //obtenemos el id de la compania para agregarla en los
        //campos companyID de las otras tablas a afectar
        $companyID = $this->db->insert_id();
        //agregamos el id de la compania a la tabla de usuario
        $dataUser['companyID'] = $companyID;
        //agregamos los datos del iva a un arreglo
        $dataConIva = array(
            'companyID' => $companyID,
            'descripcion' => 'Iva',
            'porcentaje' => 0.00
        );
        //insertamos los datos del iva a la tabla
        $this->db->insert('conf_iva', $dataConIva);
        //insertamos el usuario a la tabla
        $this->db->insert('users_company', $dataUser);
        //obtenemos el id del usuario para agregarselo a
        //los permisos
        $usercompanyID = $this->db->insert_id();
        //agregamos el id de la compania y el usuario
        //a los datos del arreglo del permiso
        $dataPermiso['usercompanyID'] = $usercompanyID;
        $dataPermiso['companyID'] = $companyID;
        //insertamos en la tabla de los permisos de acceso
        $this->db->insert('usuers_permits', $dataPermiso);
        //generamos el codigo unico para confirmacion de la cuenta
        $codigo = uniqid(). encriptar($dataUser['emil']);
        //agregos los datos para la tabla verificar cuenta
        $dataVerificacionCuenta = array(
            'usercompanyID' => $usercompanyID,
            'companyID' => $companyID,
            'code' => $codigo,
            'Verified' => 0
        );       
        //insertamos los datos para verificar cuenta 
        $this->db->insert('verify_account', $dataVerificacionCuenta);
        //empesamos a insertar el registro por defecto de los
        //catalogos marca, categoria, bodega, categoria_cliente
        //Bodega
        $this->db->insert('wineries', array(
            'cellar' => 'Sin bodega',
            'companyID' => $companyID
        ));
        //Marca
        $this->db->insert('brands', array(
            'brand' => 'Sin marca',
            'companyID' => $companyID
        ));
        //Categoria
        $this->db->insert('categorys', array(
            'category' => 'Sin categoria',
            'companyID' => $companyID
        ));
        //Categoria de clientes
        $this->db->insert('category_customer', array(
            'business' => 'Sin categoria',
            'companyID' => $companyID
        ));
        $this->db->trans_complete();
        return $codigo;        
    }
}