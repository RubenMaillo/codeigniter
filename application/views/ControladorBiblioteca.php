<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorBiblioteca extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $dato['fecha']=date("Y");
  $dato['libros']='Libros';
  $dato['socios']='Socios';
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaMain', $dato);
  $this->load->view('vistaFooter', $dato);

}

public function mostrarLibros(){

  $dato['texto']='Hola';
  $dato['fecha']=date("Y");
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaLibros', $dato);
  $this->load->view('vistaFooter', $dato);

}

public function mostrarSocios(){

  $dato['texto']='Adios';
  $dato['fecha']=date("Y");
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaSocios', $dato);
  $this->load->view('vistaFooter', $dato);

}
public function filtrarSocios(){

  $this->load->view('vistaHeader');
  $datos['dni1'] = $this->input->post('dni');
  $datos['nombre1'] = $this->input->post('nombre');
  $dato['fecha']=date("Y");
  $this->load->view('vistaSocios', $datos);
  $this->load->view('vistaFooter', $dato);


}


}
?>
