<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class articulos extends CI_Controller {

	public function __construct(){
        parent :: __construct();
        $this->load->model("articulo_model");
		$this->load->library('form_validation');
    }

	public function index(){
		redirect("articulos/default");
	}
	public function default()
	{
		$this->load->view('header');
		$this->load->view('articulos_form');
		$datos["articulos"] = $this->articulo_model->mostrar();
		$this->load->view('articulos_view',$datos);
		$this->load->view('footer');
	}

	public function guardar(){
		$datos["nombre"]=$this->input->post("nombre");
		$datos["precio_unidad"]=(float)$this->input->post("precio_unidad");
		$datos["cantidad"] = (int)$this->input->post("cantidad");
		$datos["min_cantidad"] = (int)$this->input->post("min_cantidad");
		$this->articulo_model->nuevo($datos);
		redirect("articulos/index");
	}

	public function vender($id=null){
		$total = (int)$this->input->post("cantidad");
		$vendido = (int)$this->input->post("cant_venta");
		$datos["cantidad"] = $total - $vendido;
		$this->articulo_model->editar($id,$datos);
		redirect("articulos/index");
	}
	public function comprar($id=null){
		$total = (int)$this->input->get("cantidad");
		$compra = rand(10, 100);
		$datos["cantidad"] = $total + $compra;
		$this->articulo_model->editar($id,$datos);
		redirect("articulos/index");
	}

}