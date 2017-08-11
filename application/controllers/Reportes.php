<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('ventas_model');
	}

    //[get]
    public function index(){
        if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['marca_v'] == '0') redirect('/');
        $dataE['titulo'] = 'Reporte de ventas';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
        $dataP['linkScript'] = 'ReporteVenta';
        $this->load->view('principal/encabezado', $dataE);		
		$this->load->view('Reportes/ventas');		
		$this->load->view('principal/pie', $dataP);
    }

    //[get] json
	public function getVenta(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode(
                            $this->ventas_model->reporteVenta(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            )
                        );
	}

    //[get] json
    //d significa descarga
	public function dVenta(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
        $data['query'] =  $this->ventas_model->reporteVenta(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            );
        $detalle = "ventas - ". getDateToDataBaseCustom($this->input->post('fechaInicio')) . " - " . getDateToDataBaseCustom($this->input->post('fechaFin'));
		$textoSalida = convertArrayFormatCSV($data['query'], "Cliente,SubTotal,Iva,Total,Cancelada");
        header('Content-Encoding: UTF-8');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-disposition: attachment; filename='. $detalle .'.csv');
		header('Content-Length: '. strlen($textoSalida) );
		echo $textoSalida;
		exit;
	}

     //[get] json
	public function getVentaProductos(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode(
                            $this->ventas_model->reporteVentaProductos(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            )
                        );
	}
    //descargar [get]
    public function dVentaProductos(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		$data['query'] =  $this->ventas_model->reporteVentaProductos(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            );
        $detalle = "productos - ". getDateToDataBaseCustom($this->input->post('fechaInicio')) . " - " . getDateToDataBaseCustom($this->input->post('fechaFin'));
		$textoSalida = convertArrayFormatCSV($data['query'], "Producto,Cantidad,Monto");
        header('Content-Encoding: UTF-8');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-disposition: attachment; filename='. $detalle .'.csv');
		header('Content-Length: '. strlen($textoSalida) );
		echo $textoSalida;
		exit;
	}

     //[get] json
	public function getVentaUsuarios(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode(
                            $this->ventas_model->reporteVentaUsuarios(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            )
                        );
	}
    //descargar [get]
    public function dVentaUsuarios(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		$data['query'] =  $this->ventas_model->reporteVentaUsuarios(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            );
        $detalle = "usuarios - ". getDateToDataBaseCustom($this->input->post('fechaInicio')) . " - " . getDateToDataBaseCustom($this->input->post('fechaFin'));
		$textoSalida = convertArrayFormatCSV($data['query'], "Usuarios,	Cantidad de venta,Monto de ventas");
        header('Content-Encoding: UTF-8');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-disposition: attachment; filename='. $detalle .'.csv');
		header('Content-Length: '. strlen($textoSalida) );
		echo $textoSalida;
		exit;
	}

    //[get] json
	public function getVentaClientes(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		echo json_encode(
                            $this->ventas_model->reporteVentaClientes(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            )
                        );
	}

    //descargar [get]
    public function dVentaClientes(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		//if($this->session->permisos['factura_n'] == '0') redirect('/');
		$data['query'] =  $this->ventas_model->reporteVentaClientes(
                                                getDateToDataBaseCustom($this->input->post('fechaInicio')),
                                                getDateToDataBaseCustom($this->input->post('fechaFin')),
                                                $this->session->companyID
                                            );
        $detalle = "clientes - ". getDateToDataBaseCustom($this->input->post('fechaInicio')) . " - " . getDateToDataBaseCustom($this->input->post('fechaFin'));
		$textoSalida = convertArrayFormatCSV($data['query'], "Clientes,SubTotal,Iva,Total");
        header('Content-Encoding: UTF-8');
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-disposition: attachment; filename='. $detalle .'.csv');
		header('Content-Length: '. strlen($textoSalida) );
		echo $textoSalida;
		exit;
	}
}