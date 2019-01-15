<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorDniPost extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $this->load->view('vistaDniPost');

}


function recibirDatos(){

  $datos['dni1']= $this->input->post('dni');
  $datos['letra1']= $this->input->post('letra');
  $datos['nombre1']= $this->input->post('nombre');
  $datos['sueldo1']= $this->input->post('sueldo');

  $this->load->view('vistaDniPost');
  $this->calcularLetra($datos['dni1'], $datos['letra1'], $datos['nombre1'], $datos['sueldo1']);

}


function calcularLetra($dni1, $letra1, $nombre1, $sueldo1){


  if ((isset($dni1))&&(isset($letra1))){

    //comprobamos si la letra corresponde con el if, si corresponde mostramos los datos, si no mostramos datos erróneo
    $letras= array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
    $res=0;
    $res=$dni1%23;
    if ($letras[$res]!=$letra1){

    $letra='';
    echo 'Letra incorrecta';

  }else{

    echo 'Letra correcta'.'<br>';
    echo 'DNI: '.$dni1.$letra1.'<br>';
    echo 'Nombre: '.$nombre1.'<br>';
    echo 'Sueldo: '.$sueldo1.'<br>';
    echo '<br>';
  }
  }


}




}

?>
