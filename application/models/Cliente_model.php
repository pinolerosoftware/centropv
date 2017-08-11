<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public $customerID;
	public $companyID;
	public $businessID;
	public $firstname;
	public $lastname;
	public $cedula;
    public $cell_phone;
	public $email;	
	public $saldo;

	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}
	
	//Insertar nuevo
	public function insert($data){		
		$this->companyID = $data['companyID'];
		$this->businessID = $data['businessID'];
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->cedula = $data['cedula'];
        $this->cell_phone = $data['cell_phone'];
		$this->email = $data['email'];		
		$this->saldo = 0;
		$this->db->insert('customers', $this);
	}

	//Modificar
	public function update($customerID, $companyID, $data){
		$this->db->where('customerID', $customerID);
        $this->db->where('companyID', $companyID);
		$this->db->update('customers', $data);
	}

	//Eliminar
	public function delete($customerID, $companyID){
		$this->db->where('customerID', $customerID);
        $this->db->where('companyID', $companyID);
		$this->db->delete('customers');
	}

	//Obtener todos los productos
	public function getAll($companyID){
		$this->db->select('customerID,firstname,lastname,cedula,cell_phone,email,category_customer.business,customers.saldo');
		$this->db->from('customers');
		$this->db->join('category_customer', 'customers.businessID = category_customer.businessID and customers.companyID = category_customer.companyID');		
		$this->db->where('customers.companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una producto
	public function getSingle($customerID, $companyID){
		$this->db->select('customerID,firstname,lastname,cedula,cell_phone,email,category_customer.business,category_customer.businessID,customers.saldo');
		$this->db->from('customers');
		$this->db->join('category_customer', 'customers.businessID = category_customer.businessID and customers.companyID = category_customer.companyID');		
		$this->db->where('customers.companyID', $companyID);
        $this->db->where('customers.customerID', $customerID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener todos los productos
	public function getAllCustomersCaja($companyID){
		$this->db->select('customerID,firstname,lastname,business');
		$this->db->from('customers');
		$this->db->join('category_customer', 'customers.businessID = category_customer.businessID and customers.companyID = category_customer.companyID');
		$this->db->where('customers.companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}
}