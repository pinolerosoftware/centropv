<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('empresa_model');
		$this->load->model('cliente_model');		
	}

	//[get]
	public function index(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_v'] == '0') redirect('/');
		$data['query'] = $this->cliente_model->getAll($this->session->companyID);
		$data['editar'] = $this->session->permisos['cliente_m'];
		$data['eliminar'] = $this->session->permisos['cliente_e'];
		$data['nuevo'] = $this->session->permisos['cliente_n'];
		$dataE['titulo'] = 'Clientes';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Clientes/clientes', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nuevo cliente';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$data['business'] = $this->empresa_model->getAll($this->session->companyID);		
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Clientes/nueva', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_m'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->cliente_model->getSingle($id, $this->session->companyID);
		$data['business'] = $this->empresa_model->getAll($this->session->companyID);		
		$dataE['titulo'] = 'Modificar cliente';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Clientes/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->cliente_model->getSingle($id, $this->session->companyID);
		$dataE['titulo'] = 'Eliminar Producto';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Clientes/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_n'] == '0') redirect('/');
		$data = array(
				'companyID' => $this->session->companyID,
				'firstname' => $this->input->post("firstname"),
				'lastname' => $this->input->post("lastname"),
				'cedula' => $this->input->post("cedula"),
				'cell_phone' => $this->input->post("cell_phone"),
				'email' => $this->input->post("email"),
				'businessID' => $this->input->post("businessID")
			);		
		$this->cliente_model->insert($data);
		redirect('clientes');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_m'] == '0') redirect('/');
		$data = array(								
				'firstname' => $this->input->post("firstname"),
				'lastname' => $this->input->post("lastname"),
				'cedula' => $this->input->post("cedula"),
				'cell_phone' => $this->input->post("cell_phone"),
				'email' => $this->input->post("email"),
				'businessID' => $this->input->post("businessID")
			);
		$this->cliente_model->update($this->input->post("customerID"), $this->session->companyID, $data);
		redirect('clientes');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['cliente_e'] == '0') redirect('/');
		$this->cliente_model->delete($this->input->post("productID"), $this->session->companyID);
		redirect('productos');
	}
}