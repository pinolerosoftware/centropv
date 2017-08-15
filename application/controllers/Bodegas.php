<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bodegas extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('bodegas_model');
	}

	//[get]
	public function index(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_v'] == '0') redirect('/');
		$data['query'] = $this->bodegas_model->getAllWineries($this->session->companyID);
		$data['editar'] = $this->session->permisos['bodega_m'];
		$data['eliminar'] = $this->session->permisos['bodega_e'];
		$data['nuevo'] = $this->session->permisos['bodega_n'];
		$dataE['titulo'] = 'Bodegas';
		$dataE['companyName'] = $this->session->name;	
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Bodegas/bodegas', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nueva Bodega';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Bodegas/nueva');
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){	
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_m'] == '0') redirect('/');	
		$id = $this->uri->segment(3);
		$data['query'] = $this->bodegas_model->getSingleWineries($id, $this->session->companyID);
		$dataE['titulo'] = 'Modificar Bodega';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Bodegas/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->bodegas_model->getSingleWineries($id,  $this->session->companyID);
		$dataE['titulo'] = 'Eliminar Bodega';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$dataE['menuActivo'] = 'Inventario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Bodegas/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_n'] == '0') redirect('/');
		$this->bodegas_model->insertWineries($this->input->post("bodega"), $this->session->companyID);
		redirect('bodegas');
	}
	
	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_m'] == '0') redirect('/');
		$data = array(
				'cellar'=> $this->input->post("bodega")
			);
		$this->bodegas_model->updateWineries($this->input->post("cellarID"), $this->session->companyID, $data);
		redirect('bodegas');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['bodega_e'] == '0') redirect('/');
		$this->bodegas_model->deleteWineries($this->input->post("cellarID"),  $this->session->companyID);
		redirect('bodegas');
	}
}