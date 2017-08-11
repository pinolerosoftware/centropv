<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iva_model extends CI_Model {

    public $companyID;
    public $descripcion;
    public $porcentaje;

    public function __construct(){
		parent::__construct();	
        $this->load->database();				
	}

    public function getIvaSingelCompany($companyID){
        $this->db->where('companyID', $companyID);
        $this->db->from('conf_iva');
        $query = $this->db->get();
		return $query->result();
    }

    public function insertRegister($companyID){
        $this->companyID = $companyID;
        $this->descripcion = 'Iva';
        $this->porcentaje = 0.00;
        $this->db->insert('conf_iva', $this);
    }

    public function updateIva($companyID,$data){
        $this->db->where('companyID', $companyID);
        $this->db->update('conf_iva', $data);        
    }
}