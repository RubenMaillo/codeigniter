<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorPerfectos extends CI_Controller{

function __construct(){

  parent::__construct();

}

function index(){

  $this->metodoPerfectos();

}


function metodoPerfectos(){

  $perfectos=array();
  $divis=array();
  $auxiliares=array();
  $indice=2;

for ($numero=1; $numero<=6;$numero++){
      $n=0;
      $auxiliar=$numero;

      while ($auxiliar>$indice){

        if (($auxiliar%$indice)==0){

          $auxiliar/=$indice;
          $auxiliares[$n++]=$auxiliar;

        }else{

          $indice++;

        }

        if ($auxiliar==$indice){

            for ($i=0;$i<count($auxiliares);$i++){

              echo $auxiliares[$i].'<br>';

            }

        }
}
      $indice=2;


  }

}
}
?>
