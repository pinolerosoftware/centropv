<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('productos_model');	
		$this->load->model('cliente_model');
		$this->load->model('ventas_model');	
		$this->load->model('iva_model');	
	}

    //[get]
	public function index(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['factura_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Caja';
		$dataE['companyName'] = $this->session->name;		
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
        $dataE['linkCSS'] = 'caja';	
		$dataP['linkScript'] = 'caja';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Caja/caja');
		$this->load->view('principal/pie', $dataP);
	}
	
	//[get] json
	public function listaProducto(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode($this->productos_model->getAllProductsCaja($this->session->companyID));
	}

	//[get] json
	public function listaClientes(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode($this->cliente_model->getAllCustomersCaja($this->session->companyID));
	}

	//[post]
	public function facturar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');		
		if($this->session->permisos['factura_n'] == '0') redirect('/');
		$listaProductos = $this->input->post('nuevaVenta');		
		$datosIva = $this->iva_model->getIvaSingelCompany($this->session->companyID);
		if(sizeof($listaProductos) > 0){
			$result = $this->ventas_model->insertVenta($listaProductos, $this->session->companyID, $this->session->usercompanyID, $datosIva[0]);
			echo $result;
		}/*
		else{
			echo "Error";
		}*/
	}

	//[post]
	public function facturarCredito(){		
		if(!isset($this->session->usercompanyID)) redirect('login');		
		if($this->session->permisos['factura_n'] == '0') redirect('/');
		$listaProductos = $this->input->post('nuevaVenta');		
		$datosIva = $this->iva_model->getIvaSingelCompany($this->session->companyID);
		$cliente = $this->input->post('cliente');	
		if(sizeof($listaProductos) > 0){
			$result = $this->ventas_model->insertVentaCredito($listaProductos, $this->session->companyID, $this->session->usercompanyID, $cliente, $datosIva[0]);
			echo $result;
		}/*
		else{
			echo "Error";
		}*/
	}
}