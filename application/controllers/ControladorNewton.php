<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorNewton extends CI_Controller{

function __construct(){

  parent::__construct();

}

function index(){

  $this->load->view('vistaNewton');

}


function metodoNewton(){


$num1 = $this->input->get('num');
$resultado = 1.0;
$i=0;

while($i<25){

  $resultado-=(($resultado*$resultado-$num1)/(2*$resultado));
  $i++;

}

  echo 'Resultado: '.$resultado;


}
}
?>
