<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('company_model');					
        $this->load->model('usuario_model');
        $this->load->model('iva_model');
        $this->load->model('registrar_model');
	}
    
    //[get]
    public function index(){
        $this->load->view('Registrar/registrar');
    }

    //[get]
    //Funcion para verificar la cuenta registrada
    public function verificar(){
        if(isset($this->session->usercompanyID)) redirect('login');
        $codigo = $this->uri->segment(3);
        $registro = $this->company_model->verificarCuenta($codigo);        
        if (sizeof($registro) > 0) {
            $datos = $registro[0];
            if($datos->verified == '0') {            
                $this->company_model->guardarVerificacion($datos->companyID, $datos->usercompanyID);            
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
                $data['alerta'] = "<div class=\"alert alert-danger\" role=\"alert\">Cuanta esta verificada, iniciar sesión</div>";
			    $this->load->view('Login/login', $data);
            }
        }
        else{
			$data['alerta'] = "<div class=\"alert alert-danger\" role=\"alert\">Registrate para poder registrar tu cuenta</div>";
			$this->load->view('Login/login', $data);
		}	
    }

    //[post]
    public function crear(){
        $dataCompany = array(
            'name' => $this->input->post('companyName'),
            'owner' => $this->input->post('owner'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'cell_phone' => $this->input->post('cell_phone')
        );
        //$companyID = $this->company_model->crear($dataCompany);
        $dataUser = array(
            'email' => $this->input->post('email'),
            'companyID' => 0,
            'password' => sha1($this->input->post('password')),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'administrator' => 1,
            'activo' => 1
        );
        $permisos = array(
			    'usercompanyID' => 0,
				'companyID' => 0,
				'bodega_v' => 1,				
				'bodega_n' => 1,
				'bodega_m' => 1,
				'bodega_e' => 1,
				'marca_v' => 1,				
				'marca_n' => 1,
				'marca_m' => 1,
				'marca_e' => 1,
				'categoria_v' => 1,				
				'categoria_n' => 1,
				'categoria_m' => 1,
				'categoria_e' => 1,
				'producto_v' => 1,				
				'producto_n' => 1,
				'producto_m' => 1,
				'producto_e' => 1,
				'categoria_cliente_v' => 1,				
				'categoria_cliente_n' => 1,
				'categoria_cliente_m' => 1,
				'categoria_cliente_e' => 1,
				'cliente_v' => 1,				
				'cliente_n' => 1,
				'cliente_m' => 1,
				'cliente_e' => 1,
				'factura_v' => 1,
				'factura_n' => 1,
				'factura_anular' => 1
			);	
        $codigoVerificacion = $this->registrar_model->registrarCompania($dataCompany, $dataUser, $permisos);
        //Agregamos el registro del iva de la 
        //configuracion       
        //$this->iva_model->insertRegister($companyID);
        //agregamos el usuario administrador de la
        //compania
        //$usarcompanyID = $this->usuario_model->insertUsuario($dataUser, $permisos);
        //Crear codigo para verificacion de cuenta
        //$codigoVerificacion = $this->company_model->codigoVerificacion($companyID, $usarcompanyID ,$this->input->post('email'));
        //cargarlibreria de correo
        $this->load->library("email");
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'centralpvnic@gmail.com',
			'smtp_pass' => 'feliz2016',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
 
		$this->email->from('centralpvnic@gmail.com');
		$this->email->to($this->input->post('email'));
		$this->email->subject('Bienvenido/a a centropost.com');
		$this->email->message('<h2>Bienvenido a centropvnic</h2><hr><br> Para verificar tu cuenta has click en el siguiente link <a href="'.base_url().'/registrar/verificar/'. $codigoVerificacion .'"> Verificar Cuenta </a>');
		$this->email->send();
        redirect('login');
    }    
}