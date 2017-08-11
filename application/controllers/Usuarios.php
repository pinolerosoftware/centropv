<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('usuario_model');
	}

	//[get]
    public function index(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');
        $data['query'] = $this->usuario_model->getAllUser($this->session->companyID);
		$dataE['titulo'] = 'Usuarios';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Usuarios/usuarios', $data);
		$this->load->view('principal/pie');
    }

	//[get]
	public function nuevo(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');
		$dataE['titulo'] = 'Nuevo usuario';
		$dataE['companyName'] = $this->session->name;	
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$dataP['linkScript'] = 'usuario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('usuarios/nuevo');
		$this->load->view('principal/pie', $dataP);
	}

	//[get]
	public function modificar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');
		$id = $this->uri->segment(3);
		if($id == null) redirect('/');
		$data['query'] = $this->usuario_model->getSingelUser($id);		
		$dataE['titulo'] = 'Modificar Producto';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$dataP['linkScript'] = 'usuario';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Usuarios/editar', $data);
		$this->load->view('principal/pie', $dataP);
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');
		$data = array(
				'email' => $this->input->post("email"),
				'companyID' => $this->session->companyID,
				'password' => $this->input->post("password"),
				'firstname' => $this->input->post("firstname"),
				'lastname' => $this->input->post("lastname"),				
				'administrator' => ($this->input->post("administrator") == 'on') ? 1 : 0,
				'activo' => ($this->input->post("activo") == 'on') ? 1 : 0				
			);					
			$permiso = array(
				'usercompanyID' => 0,
				'companyID' => $this->session->companyID,
				'bodega_v' => ($this->input->post("bodega_v") == 'on') ? 1 : 0,				
				'bodega_n' => ($this->input->post("bodega_n") == 'on') ? 1 : 0,
				'bodega_m' => ($this->input->post("bodega_m") == 'on') ? 1 : 0,
				'bodega_e' => ($this->input->post("bodega_e") == 'on') ? 1 : 0,
				'marca_v' => ($this->input->post("marca_v") == 'on') ? 1 : 0,				
				'marca_n' => ($this->input->post("marca_n") == 'on') ? 1 : 0,
				'marca_m' => ($this->input->post("marca_m") == 'on') ? 1 : 0,
				'marca_e' => ($this->input->post("marca_e") == 'on') ? 1 : 0,
				'categoria_v' => ($this->input->post("categoria_v") == 'on') ? 1 : 0,				
				'categoria_n' => ($this->input->post("categoria_n") == 'on') ? 1 : 0,
				'categoria_m' => ($this->input->post("categoria_m") == 'on') ? 1 : 0,
				'categoria_e' => ($this->input->post("categoria_e") == 'on') ? 1 : 0,
				'producto_v' => ($this->input->post("producto_v") == 'on') ? 1 : 0,				
				'producto_n' => ($this->input->post("producto_n") == 'on') ? 1 : 0,
				'producto_m' => ($this->input->post("producto_m") == 'on') ? 1 : 0,
				'producto_e' => ($this->input->post("producto_e") == 'on') ? 1 : 0,
				'categoria_cliente_v' => ($this->input->post("categoria_cliente_v") == 'on') ? 1 : 0,				
				'categoria_cliente_n' => ($this->input->post("categoria_cliente_n") == 'on') ? 1 : 0,
				'categoria_cliente_m' => ($this->input->post("categoria_cliente_m") == 'on') ? 1 : 0,
				'categoria_cliente_e' => ($this->input->post("categoria_cliente_e") == 'on') ? 1 : 0,
				'cliente_v' => ($this->input->post("cliente_v") == 'on') ? 1 : 0,				
				'cliente_n' => ($this->input->post("cliente_n") == 'on') ? 1 : 0,
				'cliente_m' => ($this->input->post("cliente_m") == 'on') ? 1 : 0,
				'cliente_e' => ($this->input->post("cliente_e") == 'on') ? 1 : 0,
				'factura_v' => ($this->input->post("factura_v") == 'on') ? 1 : 0,
				'factura_n' => ($this->input->post("factura_n") == 'on') ? 1 : 0,
				'factura_anular' => ($this->input->post("factura_anular") == 'on') ? 1 : 0
			);
		$this->usuario_model->insertUsuario($data, $permiso);
		redirect('usuarios');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');
		$data = array(				
				'email' => $this->input->post("email"),
				'companyID' => $this->session->companyID,				
				'firstname' => $this->input->post("firstname"),
				'lastname' => $this->input->post("lastname"),				
				'administrator' => ($this->input->post("administrator") == 'on') ? 1 : 0,
				'activo' => ($this->input->post("activo") == 'on') ? 1 : 0
			);
			$permiso = array(				
				'bodega_v' => ($this->input->post("bodega_v") == 'on') ? 1 : 0,				
				'bodega_n' => ($this->input->post("bodega_n") == 'on') ? 1 : 0,
				'bodega_m' => ($this->input->post("bodega_m") == 'on') ? 1 : 0,
				'bodega_e' => ($this->input->post("bodega_e") == 'on') ? 1 : 0,
				'marca_v' => ($this->input->post("marca_v") == 'on') ? 1 : 0,				
				'marca_n' => ($this->input->post("marca_n") == 'on') ? 1 : 0,
				'marca_m' => ($this->input->post("marca_m") == 'on') ? 1 : 0,
				'marca_e' => ($this->input->post("marca_e") == 'on') ? 1 : 0,
				'categoria_v' => ($this->input->post("categoria_v") == 'on') ? 1 : 0,				
				'categoria_n' => ($this->input->post("categoria_n") == 'on') ? 1 : 0,
				'categoria_m' => ($this->input->post("categoria_m") == 'on') ? 1 : 0,
				'categoria_e' => ($this->input->post("categoria_e") == 'on') ? 1 : 0,
				'producto_v' => ($this->input->post("producto_v") == 'on') ? 1 : 0,				
				'producto_n' => ($this->input->post("producto_n") == 'on') ? 1 : 0,
				'producto_m' => ($this->input->post("producto_m") == 'on') ? 1 : 0,
				'producto_e' => ($this->input->post("producto_e") == 'on') ? 1 : 0,
				'categoria_cliente_v' => ($this->input->post("categoria_cliente_v") == 'on') ? 1 : 0,				
				'categoria_cliente_n' => ($this->input->post("categoria_cliente_n") == 'on') ? 1 : 0,
				'categoria_cliente_m' => ($this->input->post("categoria_cliente_m") == 'on') ? 1 : 0,
				'categoria_cliente_e' => ($this->input->post("categoria_cliente_e") == 'on') ? 1 : 0,
				'cliente_v' => ($this->input->post("cliente_v") == 'on') ? 1 : 0,				
				'cliente_n' => ($this->input->post("cliente_n") == 'on') ? 1 : 0,
				'cliente_m' => ($this->input->post("cliente_m") == 'on') ? 1 : 0,
				'cliente_e' => ($this->input->post("cliente_e") == 'on') ? 1 : 0,
				'factura_v' => ($this->input->post("factura_v") == 'on') ? 1 : 0,
				'factura_n' => ($this->input->post("factura_n") == 'on') ? 1 : 0,
				'factura_anular' => ($this->input->post("factura_anular") == 'on') ? 1 : 0
			);
		$this->usuario_model->updateUsuario($this->input->post("usercompanyID"), $data, $permiso);
		if($this->input->post("password") != null){
			$dataPassword = array(
				'password' => sha1($this->input->post("password"))
			);
			$this->usuario_model->updateUsuario($this->input->post("usercompanyID"), $dataPassword);
		}	
		redirect('usuarios');
	}
}