<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('login_model');
	}

	//[get]
	public function index(){	
		if(isset($this->session->usercompanyID)) redirect('/');	
		$this->load->view('Login/login');
	}

	//[get]
	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('Login/login');
	}

	//[post]
	public function login(){
		$result = $this->login_model->findUserLogin($this->input->post('email'),$this->input->post('password'));
		if (sizeof($result) > 0) {
			$datos = $result[0];
			$arr = array(
					'usercompanyID' => $datos->usercompanyID,
					'email' => $datos->email,
					'companyID' => $datos->companyID,
					'name' => $datos->name,
					'firstname' => $datos->firstname,
					'lastname' => $datos->lastname,
					'administrator' => $datos->administrator,
					'permisos' => array(
						'bodega_v' => $datos->bodega_v,
						'bodega_n' => $datos->bodega_n,
						'bodega_m' => $datos->bodega_m,
						'bodega_e' => $datos->bodega_e,
						'marca_v' => $datos->marca_v,
						'marca_n' => $datos->marca_n,
						'marca_m' => $datos->marca_m,
						'marca_e' => $datos->marca_e,
						'categoria_v' => $datos->categoria_v,
						'categoria_n' => $datos->categoria_n,
						'categoria_m' => $datos->categoria_m,
						'categoria_e' => $datos->categoria_e,
						'producto_v' => $datos->producto_v,
						'producto_n' => $datos->producto_n,
						'producto_m' => $datos->producto_m,
						'producto_e' => $datos->producto_e,
						'categoria_cliente_v' => $datos->categoria_cliente_v,
						'categoria_cliente_n' => $datos->categoria_cliente_n,
						'categoria_cliente_m' => $datos->categoria_cliente_m,
						'categoria_cliente_e' => $datos->categoria_cliente_e,
						'cliente_v' => $datos->cliente_v,
						'cliente_n' => $datos->cliente_n,
						'cliente_m' => $datos->cliente_m,
						'cliente_e' => $datos->cliente_e,
						'factura_v' => $datos->factura_v,
						'factura_n' => $datos->factura_n,
						'factura_anular' => $datos->factura_anular
					)					
				);
			$this->session->set_userdata($arr);
			redirect('/');
		}
		else{
			$data['alerta'] = "<div class=\"alert alert-danger\" role=\"alert\">Usuario, contraseña incorrecto</div>";
			$this->load->view('Login/login', $data);
		}
	}	
}
