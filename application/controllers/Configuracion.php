<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

	public function __construct(){
		parent::__construct();	
        $this->load->model('company_model');				
		$this->load->model('iva_model');
	}

    public function index(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');	
        $data['company'] = $this->company_model->getCompanySingle($this->session->companyID);	
		$data['iva'] = $this->iva_model->getIvaSingelCompany($this->session->companyID);
		$dataE['titulo'] = 'Configuracion';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Configuracion/configuracion', $data);
		$this->load->view('principal/pie');
	}

    //[get] 
    //Metodos para argar informacion
    // de la compañia para editarla
    public function company(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');	
        $data['query'] = $this->company_model->getCompanySingle($this->session->companyID);
        $dataE['titulo'] = 'Configuracion';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
        $this->load->view('principal/encabezado', $dataE);
		$this->load->view('Configuracion/company/editar', $data);
		$this->load->view('principal/pie');
    }

	//[get]
	//obtener el iva para modificarlo
	public function iva(){
       if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');	
        $data['query'] = $this->iva_model->getIvaSingelCompany($this->session->companyID);
        $dataE['titulo'] = 'Configuracion';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;	
        $this->load->view('principal/encabezado', $dataE);
		$this->load->view('Configuracion/iva/editar', $data);
		$this->load->view('principal/pie');
    }

	//[get]
	//obtener el iva para caja
	public function ivaCaja(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['factura_n'] == '0') redirect('/');
        echo json_encode($this->iva_model->getIvaSingelCompany($this->session->companyID));
    }

    //[post]
    //editar datos de la compay
    public function companyEdit(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');	
		$data = array(
				'name'=> $this->input->post("name"),
                'owner'=> $this->input->post("owner"),
                'address'=> $this->input->post("address"),
                'phone'=> $this->input->post("phone"),
                'cell_phone'=> $this->input->post("cell_phone")
			);
		$this->company_model->updateCompany($this->session->companyID, $data);
		redirect('configuracion');
    }

	//[post]
    //editar datos del iva
    public function ivaEdit(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->administrator == '0') redirect('/');	
		$data = array(
				'descripcion'=> $this->input->post("descripcion"),
                'porcentaje'=> $this->input->post("porcentaje")
			);
		$this->iva_model->updateIva($this->session->companyID, $data);
		redirect('configuracion');
    }
}