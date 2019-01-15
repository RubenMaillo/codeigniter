<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio10 extends CI_Controller {


function __construct(){
	parent:: __construct();
		$this->load->helper('form');
		$this->load->library('Liblista');
}
		
	public function index(){
	$this->load->view('Vista10');
	}
	public function recibirdatos(){
		$producto = $this->input->post('producto');
		$datos['milista'] = $this->liblista->construirLinks($producto);
		$this->load->view('Vista10',$datos);

	}

		public function mostrar(){
			$producto = $this->input->post('producto');
			
		}
		public function recogerdatos($tipo,$i){
			echo "Producto seleccionado: ". $tipo;
			echo "<br>";
			echo "ID producto seleccionado: ".$i;
		}

}
