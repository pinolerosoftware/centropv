<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $usercompanyID;
	public $email;
	public $companyID;
	public $password;
	public $firstname;
	public $lastname;
	public $administrator;
    public $activo;

	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}
    
    //Insertar nuevo
	public function insertUsuario($data, $permisos){		
		$this->email = $data['email'];
		$this->companyID = $data['companyID'];
		$this->password = sha1($data['password']);
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->administrator = $data['administrator'];
		$this->activo = $data['activo'];
		$this->db->insert('users_company', $this);
		$id = $this->db->insert_id();
		$permisos['usercompanyID'] = $id;
		$this->db->insert('usuers_permits', $permisos);
		return $id;
	}

	//Modificar
	public function updateUsuario($usercompanyID, $data, $permisos){
		$this->db->where('usercompanyID', $usercompanyID);		
		$this->db->update('users_company', $data);
		$this->db->where('usercompanyID', $usercompanyID);		
		$this->db->where('companyID', $data['companyID']);
		$this->db->update('usuers_permits', $permisos);
	}

    //Obtener todos los usuario de la company
    public function getAllUser($companyID){
        $this->db->select('usercompanyID,email,firstname,lastname,(case administrator when 1 then \'1\' when 0 then \'0\' end) as administrator,(case activo when 1 then \'1\' when 0 then \'0\' end) as activo');
        $this->db->from('users_company');
        $this->db->where('companyID', $companyID);
        $query = $this->db->get();
        return $query->result();
    }

    public function getSingelUser($usercompanyID){
        $this->db->select('
							uc.usercompanyID,
							uc.email,
							uc.firstname,
							uc.lastname,
							(case uc.administrator when 1 then \'1\' when 0 then \'0\' end) as administrator,
							(case uc.activo when 1 then \'1\' when 0 then \'0\' end) as activo,
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
						');
        $this->db->from('users_company as uc');
		$this->db->join('company as c','uc.companyID = c.companyID');
		$this->db->join('usuers_permits as up', 'uc.usercompanyID = up.usercompanyID and uc.companyID = up.companyID');
        $this->db->where('uc.usercompanyID', $usercompanyID);
        $query = $this->db->get();
        return $query->result();
    }
}