<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorFibonacci extends CI_Controller{

function __construct(){

  parent::__construct();

}

function index(){

  $resultado['recibido']=$this->metodoFibonacci();
  $this->load->view('vistaFibonacci', $resultado);

}


function metodoFibonacci(){

  $resultados=array();
  $sucesion=[0, 1];
  $posAA=0;
  $posA=1;
  $pos=2;
//for para calcular los números de la sucesión teniendo la posición actual cogemos los 2 números anteriores y los sumamos
  for ($pos;$pos<50;$pos++){

    $sucesion[$pos]=$sucesion[$posA]+$sucesion[$posAA];
    $posA++;
    $posAA++;

  }
//otro for para introducir los datos en el array que se mostrará en la vista
for ($i=0;$i<50;$i++){

  $resultados[$i]= 'Número '.($i+1).'.- ('.$sucesion[$i].')<br>';

}

return $resultados;
}
}
?>
