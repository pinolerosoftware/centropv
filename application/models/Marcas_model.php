<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model {

	public $brandID;
	public $brand;
	public $companyID;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//Insertar nuevo
	public function insertBrand($brand, $companyID){
		$this->brand = $brand;
		$this->companyID = $companyID;
		$this->db->insert('brands', $this);
	}

	//Modificar
	public function updateBrand($brandID, $companyID, $data){
		$this->db->where('brandID', $brandID);
		$this->db->where('companyID', $companyID);
		$this->db->update('brands', $data);
	}

	//Eliminar
	public function deleteBrand($brandID, $companyID){
		$this->db->where('brandID', $brandID);
		$this->db->where('companyID', $companyID);
		$this->db->delete('brands');
	}

	//Obtener todas las marcas
	public function getAllBrands($companyID){
		$this->db->select('*');
		$this->db->from('brands');
		$this->db->where('companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una marca
	public function getSingleBrand($brandID, $companyID){
		$this->db->where('brandID', $brandID);
		$this->db->where('companyID', $companyID);
		$query = $this->db->get('brands');
		return $query->result();
	}

}