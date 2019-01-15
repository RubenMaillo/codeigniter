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


}
?>
