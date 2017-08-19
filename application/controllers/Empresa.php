<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('empresa_model');
	}
	//[get]
	public function index(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_v'] == '0') redirect('/');
		$data['query'] = $this->empresa_model->getAll($this->session->companyID);
		$data['editar'] = $this->session->permisos['categoria_cliente_m'];
		$data['eliminar'] = $this->session->permisos['categoria_cliente_e'];
		$data['nuevo'] = $this->session->permisos['categoria_cliente_n'];
		$dataE['titulo'] = 'Categorias clientes';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Empresas/empresas', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nueva categoria';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Empresas/nueva');
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_m'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->empresa_model->getSingle($id, $this->session->companyID);
		$dataE['titulo'] = 'Modificar categoria';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Empresas/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->empresa_model->getSingle($id, $this->session->companyID);
		if(sizeof($data['query']) == 0) redirect('empresa');
		$dataE['titulo'] = 'Eliminar empresa';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Empresas/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_n'] == '0') redirect('/');
		$this->empresa_model->insert($this->input->post("busisness"), $this->session->companyID);
		redirect('empresa');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_m'] == '0') redirect('/');
		$data = array(
				'business'=> $this->input->post("busisness")
			);
		$this->empresa_model->update($this->input->post("busisnessID"), $this->session->companyID, $data);
		redirect('empresa');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['categoria_cliente_e'] == '0') redirect('/');
		echo "busisnesID : ". $this->input->post("businessID");
		echo "companyID : ". $this->session->companyID;
		$this->empresa_model->delete($this->input->post("businessID"), $this->session->companyID);
		redirect('empresa');
	}
}
