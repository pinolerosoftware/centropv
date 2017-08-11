<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('marcas_model');
	}

	//[get]
	public function index(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['marca_v'] == '0') redirect('/');
		$data['query'] = $this->marcas_model->getAllBrands($this->session->companyID);
		$data['editar'] = $this->session->permisos['marca_m'];
		$data['eliminar'] = $this->session->permisos['marca_e'];
		$data['nuevo'] = $this->session->permisos['marca_n'];
		$dataE['titulo'] = 'Marcas';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);		
		$this->load->view('Marcas/marcas', $data);		
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['marca_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nueva Marca';
		$dataE['companyName'] = $this->session->name;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Marcas/nueva');
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){	
		if(!isset($this->session->usercompanyID)) redirect('login');	
		if($this->session->permisos['marca_m'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->marcas_model->getSingleBrand($id, $this->session->companyID);
		$dataE['titulo'] = 'Modificar Marca';
		$dataE['companyName'] = $this->session->name;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Marcas/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){	
		if(!isset($this->session->usercompanyID)) redirect('login');	
		if($this->session->permisos['marca_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->marcas_model->getSingleBrand($id, $this->session->companyID);
		$dataE['titulo'] = 'Eliminar Marca';
		$dataE['companyName'] = $this->session->name;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Marcas/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['marca_n'] == '0') redirect('/');
		$this->marcas_model->insertBrand($this->input->post("marca"), $this->session->companyID);
		redirect('marcas');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['marca_m'] == '0') redirect('/');
		$data = array(
				'brand'=> $this->input->post("marca")
			);
		$this->marcas_model->updateBrand($this->input->post("brandID"), $this->session->companyID, $data);
		redirect('marcas');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['marca_e'] == '0') redirect('/');
		$this->marcas_model->deleteBrand($this->input->post("brandID"), $this->session->companyID);
		redirect('marcas');
	}
}