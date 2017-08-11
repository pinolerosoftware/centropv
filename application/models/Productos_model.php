<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public $productID;
	public $codigo;
	public $descripcion;
	public $codigo_barra;
	public $brandID;
	public $categoryID;
	public $service;
	public $taxFree;
	public $precio;
	public $companyID;

	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}
	
	//Insertar nuevo
	public function insertProducts($data){		
		$this->codigo = $data['codigo'];
		$this->descripcion = $data['descripcion'];
		$this->codigo_barra = $data['codigo_barra'];
		$this->brandID = $data['brandID'];
		$this->categoryID = $data['categoryID'];
		$this->service = $data['service'];
		$this->taxFree = $data['taxFree'];
		$this->precio = $data['precio'];
		$this->companyID = $data['companyID'];
		$this->db->insert('products', $this);
	}

	//Modificar
	public function updateProducts($productID, $companyID, $data){
		$this->db->where('productID', $productID);
		$this->db->where('companyID', $companyID);
		$this->db->update('products', $data);
	}

	//Eliminar
	public function deleteProducts($productID, $companyID){
		$this->db->where('productID', $productID);
		$this->db->where('companyID', $companyID);
		$this->db->delete('products');
	}

	//Obtener todos los productos
	public function getAllProducts($companyID){
		$this->db->select('productID,codigo,descripcion,codigo_barra,brand,category,(case service when 1 then \'1\' when 0 then \'0\' end) as service,(case taxFree when 1 then \'1\' when 0 then \'0\' end) as taxFree,precio');
		$this->db->from('products');
		$this->db->join('brands', 'products.brandID = brands.brandID');
		$this->db->join('categorys', 'products.categoryID = categorys.categoryID');
		$this->db->where('products.companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener una producto
	public function getSingleProduct($productID, $companyID){
		$this->db->select('productID,codigo,descripcion,codigo_barra,(case service when 1 then \'1\' when 0 then \'0\' end) as service,(case taxFree when 1 then \'1\' when 0 then \'0\' end) as taxFree,products.brandID,products.categoryID,brand,category,precio');
		$this->db->from('products');
		$this->db->join('brands', 'products.brandID = brands.brandID');
		$this->db->join('categorys', 'products.categoryID = categorys.categoryID');
		$this->db->where('products.productID', $productID);
		$this->db->where('products.companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

	//Obtener todos los productos
	public function getAllProductsCaja($companyID){
		$this->db->select('ProductID,codigo,codigo_barra,descripcion,0 as cantidad,(case service when 1 then \'1\' when 0 then \'0\' end) as service,(case taxFree when 1 then \'1\' when 0 then \'0\' end) as taxFree,brands.brand,categorys.category,precio');
		$this->db->from('products');
		$this->db->join('brands', 'products.brandID = brands.brandID');
		$this->db->join('categorys', 'products.categoryID = categorys.categoryID');
		$this->db->where('products.companyID', $companyID);
		$query = $this->db->get();
		return $query->result();
	}

}