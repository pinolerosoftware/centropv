<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

	public $companyID;
	public $name;
	public $owner;
    public $address;
    public $phone;
    public $cell_phone;

	public function __construct(){
		parent::__construct();
		$this->load->database();
        $this->load->helper('global');
	}

    //crear una company
    public function crear($data){
        $this->name = $data['name'];
        $this->owner = $data['owner'];
        $this->address = $data['address'];
        $this->phone = $data['phone'];
        $this->cell_phone = $data['cell_phone'];
        $this->db->insert('company', $this);
        return $this->db->insert_id();
    }

    //crear el registro para el codigo de verificacion por 
    //correo electronico y esta funcion retorna el codigo de
    //verificacion
    public function codigoVerificacion($companyID, $usercompanyID ,$correo){
        $codigo = uniqid(). encriptar($correo);
        $data = array(
            'usercompanyID' => $usercompanyID,
            'companyID' => $companyID,
            'code' => $codigo,
            'Verified' => 0
        );       
        $this->db->insert('verify_account', $data);
        return $codigo;
    }

    //funcion para verificar que si la cuenta ya fue
    //verificada
    public function verificarCuenta($codigo){
        $this->db->select(
						    'uc.usercompanyID,
							 uc.email,c.companyID,
							 c.name,
							 uc.firstname,
							 uc.lastname,
                             (case va.Verified when 1 then \'1\' when 0 then \'0\' end) as verified,
							 (case administrator when 1 then \'1\' when 0 then \'0\' end) as administrator,
							 (case up.bodega_v when 1 then \'1\' when 0 then \'0\' end) as bodega_v,
							 (case up.bodega_n when 1 then \'1\' when 0 then \'0\' end) as bodega_n,
							 (case up.bodega_m when 1 then \'1\' when 0 then \'0\' end) as bodega_m,
							 (case up.bodega_e when 1 then \'1\' when 0 then \'0\' end) as bodega_e,
							 (case up.marca_v when 1 then \'1\' when 0 then \'0\' end) as marca_v,
							 (case up.marca_n when 1 then \'1\' when 0 then \'0\' end) as marca_n,
							 (case up.marca_m when 1 then \'1\' when 0 then \'0\' end) as marca_m,
							 (case up.marca_e when 1 then \'1\' when 0 then \'0\' end) as marca_e,
							 (case up.categoria_v when 1 then \'1\' when 0 then \'0\' end) as categoria_v,
							 (case up.categoria_n when 1 then \'1\' when 0 then \'0\' end) as categoria_n,
							 (case up.categoria_m when 1 then \'1\' when 0 then \'0\' end) as categoria_m,
							 (case up.categoria_e when 1 then \'1\' when 0 then \'0\' end) as categoria_e,
							 (case up.producto_v when 1 then \'1\' when 0 then \'0\' end) as producto_v,
							 (case up.producto_n when 1 then \'1\' when 0 then \'0\' end) as producto_n,
							 (case up.producto_m when 1 then \'1\' when 0 then \'0\' end) as producto_m,
							 (case up.producto_e when 1 then \'1\' when 0 then \'0\' end) as producto_e,
							 (case up.categoria_cliente_v when 1 then \'1\' when 0 then \'0\' end) as categoria_cliente_v,
							 (case up.categoria_cliente_n when 1 then \'1\' when 0 then \'0\' end) as categoria_cliente_n,
							 (case up.categoria_cliente_m when 1 then \'1\' when 0 then \'0\' end) as categoria_cliente_m,
							 (case up.categoria_cliente_e when 1 then \'1\' when 0 then \'0\' end) as categoria_cliente_e,
							 (case up.cliente_v when 1 then \'1\' when 0 then \'0\' end) as cliente_v,
							 (case up.cliente_n when 1 then \'1\' when 0 then \'0\' end) as cliente_n,
							 (case up.cliente_m when 1 then \'1\' when 0 then \'0\' end) as cliente_m,
							 (case up.cliente_e when 1 then \'1\' when 0 then \'0\' end) as cliente_e,
							 (case up.factura_v when 1 then \'1\' when 0 then \'0\' end) as factura_v,
							 (case up.factura_n when 1 then \'1\' when 0 then \'0\' end) as factura_n,
							 (case up.factura_anular when 1 then \'1\' when 0 then \'0\' end) as factura_anular
							 '
                        );
        $this->db->where('va.code', $codigo);
        $this->db->where('va.verified', 0);
        $this->db->from('verify_account as va');
        $this->db->join('users_company as uc', 'va.usercompanyID = uc.usercompanyID and va.companyID = uc.companyID');
        $this->db->join('company as c', 'uc.companyID = c.companyID');
        $this->db->join('usuers_permits as up', 'uc.usercompanyID = up.usercompanyID and uc.companyID = up.companyID');
        $query = $this->db->get();
        return $query->result();
    }

    //Guardar verificacion
    public function guardarVerificacion($companyID, $usercompanyID){
        $datos = array(
            'verified' => 1,
            'date_verified' => getDateToDataBase()
        );
        $this->db->where('usercompanyID', $usercompanyID);
        $this->db->where('companyID', $companyID);
        $this->db->update('verify_account', $datos);
    }

    //Obtener datos de la compañia
    public function getCompanySingle($companyID){
        $this->db->select('c.name, c.owner, c.address, c.phone, c.cell_phone');
        $this->db->where('companyID', $companyID);
        $this->db->from('company as c');
        $query = $this->db->get();
        return $query->result();
    }

    //Modifcar datos de la company
    public function updateCompany($companyID, $data){
        $this->db->where('companyID', $companyID);
        $this->db->update('company', $data);
    }
}