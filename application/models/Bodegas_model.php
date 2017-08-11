<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bodegas_model extends CI_Model {

	public $cellarID;
	public $cellar;
	public $companyID;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//Insertar nuevo
	public function insertWineries($cellar, $companyID){
		$this->cellar = $cellar;
		$this->companyID = $companyID;
		$this->db->insert('wineries', $this);
	}

	//Modificar
	public function updateWineries($cellarID, $companyID, $data){
		$this->db->where('cellarID', $cellarID);
		$this->db->where('companyID', $companyID);
		$this->db->update('wineries', $data);
	}

	//Eliminar
	public function deleteWineries($cellarID, $companyID){
		$this->db->where('cellarID', $cellarID);
		$this->db->where('companyID', $companyID);
		$this->db->delete('wineries');
	}

	//Obtener todas las marcas
	public function getAllWineries($companyID){
		$this->db->select('*');
		$this->db->from('wineries');
		$this->db->where('companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una marca
	public function getSingleWineries($cellarID, $companyID){
		$this->db->where('cellarID', $cellarID);
		$this->db->where('companyID', $companyID);
		$query = $this->db->get('wineries');
		return $query->result();
	}

}