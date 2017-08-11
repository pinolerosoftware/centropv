<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('productos_model');
		$this->load->model('marcas_model');
		$this->load->model('categorias_model');
	}

	//[get]
	public function index(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_v'] == '0') redirect('/');
		$data['query'] = $this->productos_model->getAllProducts($this->session->companyID);
		$data['editar'] = $this->session->permisos['producto_m'];
		$data['eliminar'] = $this->session->permisos['producto_e'];
		$data['nuevo'] = $this->session->permisos['producto_n'];
		$dataE['titulo'] = 'Productos';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Productos/productos', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function nueva(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_n'] == '0') redirect('/');
		$dataE['titulo'] = 'Nuevo producto';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$data['brand'] = $this->marcas_model->getAllBrands($this->session->companyID);
		$data['category'] = $this->categorias_model->getAllCategorys($this->session->companyID);
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Productos/nueva', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function modificar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_m'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->productos_model->getSingleProduct($id, $this->session->companyID);
		$data['brand'] = $this->marcas_model->getAllBrands($this->session->companyID);
		$data['category'] = $this->categorias_model->getAllCategorys($this->session->companyID);
		$dataE['titulo'] = 'Modificar Producto';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Productos/editar', $data);
		$this->load->view('principal/pie');
	}

	//[get]
	public function eliminar(){		
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_e'] == '0') redirect('/');
		$id = $this->uri->segment(3);
		$data['query'] = $this->productos_model->getSingleProduct($id, $this->session->companyID);
		$dataE['titulo'] = 'Eliminar Producto';
		$dataE['companyName'] = $this->session->name;
		$dataE['permisos'] = $this->session->permisos;
		$dataE['administrator'] = $this->session->administrator;
		$this->load->view('principal/encabezado', $dataE);
		$this->load->view('Productos/eliminar', $data);
		$this->load->view('principal/pie');
	}

	//[post]
	public function guardar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_n'] == '0') redirect('/');
		$data = array(
				'companyID' => $this->session->companyID,
				'codigo' => $this->input->post("codigo"),
				'descripcion' => $this->input->post("descripcion"),
				'codigo_barra' => $this->input->post("codigo_barra"),
				'brandID' => $this->input->post("brandID"),
				'categoryID' => $this->input->post("categoryID"),
				'service' => ($this->input->post("service") == 'on')?1:0,
				'taxFree' => ($this->input->post("taxFree") == 'on')?1:0,
				'precio' => $this->input->post("precio")
			);		
		$this->productos_model->insertProducts($data);		
		redirect('productos');
	}

	//[post]
	public function editar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_m'] == '0') redirect('/');
		$data = array(				
				'codigo' => $this->input->post("codigo"),
				'descripcion' => $this->input->post("descripcion"),
				'codigo_barra' => $this->input->post("codigo_barra"),
				'brandID' => $this->input->post("brandID"),
				'categoryID' => $this->input->post("categoryID"),
				'service' => ($this->input->post("service") == 'on')?1:0,
				'taxFree' => ($this->input->post("taxFree") == 'on')?1:0,
				'precio' => $this->input->post("precio")
			);
		$this->productos_model->updateProducts($this->input->post("productID"), $this->session->companyID, $data);
		redirect('productos');
	}

	//[post]
	public function borrar(){
		if(!isset($this->session->usercompanyID)) redirect('login');
		if($this->session->permisos['producto_e'] == '0') redirect('/');
		$this->productos_model->deleteProducts($this->input->post("productID"), $this->session->companyID);
		redirect('productos');
	}
}