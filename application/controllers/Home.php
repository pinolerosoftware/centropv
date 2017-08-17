<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ventas_model');
	}

    //[get]
    public function index(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		$dataE['titulo'] = 'Dashboard';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$dataE['menuActivo'] = 'Dashboard';
		$data['totalDia'] = $this->ventas_model->ventaDia($this->session->companyID);
		$data['totalMes'] = $this->ventas_model->ventaMes($this->session->companyID);
		$data['totalSemana'] = $this->ventas_model->ventaSemana($this->session->companyID);
		$data['topProductosMonto'] = $this->ventas_model->topProductosMesMonto($this->session->companyID);
		$data['topProductosCantidad'] = $this->ventas_model->topProductosMesCantidad($this->session->companyID);
		$dataP['linkScript'] = 'home';
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Home/home', $data);
		$this->load->view('principal/pie', $dataP);
    }

	//[get]
	public function detalle(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		$detalle = $this->uri->segment(3);
		$dataE['titulo'] = 'Ventas del ' . $detalle;
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$dataE['menuActivo'] = 'Dashboard';
		$data['dia'] = $detalle;
		if($detalle == 'dia'){
			$data['query'] = $this->ventas_model->ventaDiaDetalle($this->session->companyID);
		}elseif($detalle == 'semana'){
			$data['query'] = $this->ventas_model->ventaSemanaDetalle($this->session->companyID);
		}elseif($detalle == 'mes'){
			$data['query'] = $this->ventas_model->ventaMesDetalle($this->session->companyID);
		}else{
			redirect('/');
		}
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Home/detalle', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function ExportarCSV(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		$detalle = $this->uri->segment(3);
		/*$dataE['titulo'] = 'Ventas del ' . $detalle;
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;*/
		if($detalle == 'dia'){
			$data['query'] = $this->ventas_model->ventaDiaDetalle($this->session->companyID);
		}elseif($detalle == 'semana'){
			$data['query'] = $this->ventas_model->ventaSemanaDetalle($this->session->companyID);
		}elseif($detalle == 'mes'){
			$data['query'] = $this->ventas_model->ventaMesDetalle($this->session->companyID);
		}else{
			redirect('/');
		}
		//cabeceras para descarga
		$textoSalida = convertArrayFormatCSV($data['query'], "Código,Descripción,Cantidad,Precio,Iva,Contado,Credito");
		header('Content-Encoding: UTF-8');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-disposition: attachment; filename='. $detalle .'.csv');
		header('Content-Length: '. strlen($textoSalida) );
		echo $textoSalida;
		exit;
	}
}
