<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	public $businessID;
	public $business;
	public $companyID;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Insertar nuevo
	public function insert($business, $companyID){
		$this->business = $business;
		$this->companyID = $companyID;
		$this->db->insert('category_customer', $this);
	}

	//Modificar
	public function update($businessID, $companyID, $data){
		$this->db->where('businessID', $businessID);
        $this->db->where('companyID', $companyID);
		$this->db->update('category_customer', $data);
	}

	//Eliminar
	public function delete($businessID, $companyID){
		$this->db->where('businessID', $businessID);
        $this->db->where('companyID', $companyID);
		$this->db->delete('category_customer');
	}

	//Obtener todas las categorias
	public function getAll($companyID){
		$this->db->select('*');
		$this->db->from('category_customer');
		$this->db->where('companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una categoria
	public function getSingle($businessID, $companyID){
		$this->db->where('businessID', $businessID);
        $this->db->where('companyID', $companyID);
		$query = $this->db->get('category_customer');
		return $query->result();
	}
}