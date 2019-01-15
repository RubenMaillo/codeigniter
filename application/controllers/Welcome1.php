<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Welcome1 extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->library('Menu', array('Egoi', 'Pérez', 'Hernández'));

}

function index(){

$datos['datos_menu'] = $this->menu->construir_Menu();

  $this->load->view('welcome_message', $datos);

}
}

?>
