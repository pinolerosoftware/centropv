<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('categorias_model');
	}
	//[get]
	public function index(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_v'] == '0') redirect('/');
		$data['query'] = $this->categorias_model->getAllCategorys($this->session->companyID);
		$data['editar'] = $this->session->permisos['categoria_m'];
		$data['eliminar'] = $this->session->permisos['categoria_e'];
		$data['nuevo'] = $this->session->permisos['categoria_n'];
		$dataE['titulo'] = 'Categorias';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Categorias/categorias', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nueva Categoria';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$dataE['menuActivo'] = 'Inventario';	
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Categorias/nueva');
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){	
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_m'] == '0') redirect('/');	
		$id = $this->uri->segment(3);
		$data['query'] = $this->categorias_model->getSingleCategory($id, $this->session->companyID);
		$dataE['titulo'] = 'Modificar Categoria';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Categorias/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->categorias_model->getSingleCategory($id, $this->session->companyID);
		$dataE['titulo'] = 'Eliminar Categoria';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Categorias/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_n'] == '0') redirect('/');
		$this->categorias_model->insertCategory($this->input->post("categoria"), $this->session->companyID);
		redirect('categorias');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_m'] == '0') redirect('/');
		$data = array(
				'category'=> $this->input->post("categoria")
			);
		$this->categorias_model->updateCategory($this->input->post("categoryID"), $this->session->companyID, $data);
		redirect('categorias');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_e'] == '0') redirect('/');
		$this->categorias_model->deleteCategory($this->input->post("categoryID"), $this->session->companyID);
		redirect('categorias');
	}
}