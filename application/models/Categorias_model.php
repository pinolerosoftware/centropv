<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public $categoryID;
	public $category;
	public $companyID;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Insertar nuevo
	public function insertCategory($category, $companyID){
		$this->category = $category;
		$this->companyID = $companyID;
		$this->db->insert('categorys', $this);
	}

	//Modificar
	public function updateCategory($categoryID, $companyID, $data){
		$this->db->where('categoryID', $categoryID);
		$this->db->where('companyID', $companyID);
		$this->db->update('categorys', $data);
	}

	//Eliminar
	public function deleteCategory($categoryID, $companyID){
		$this->db->where('categoryID', $categoryID);
		$this->db->where('companyID', $companyID);
		$this->db->delete('categorys');
	}

	//Obtener todas las categorias
	public function getAllCategorys($companyID){
		$this->db->select('*');
		$this->db->from('categorys');
		$this->db->where('companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una categoria
	public function getSingleCategory($categoryID, $companyID){
		$this->db->where('categoryID', $categoryID);
		$this->db->where('companyID', $companyID);
		$query = $this->db->get('categorys');
		return $query->result();
	}
}