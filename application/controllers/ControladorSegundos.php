<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorSegundos extends CI_Controller{

function __construct(){

  parent::__construct();
$this->load->helper('form');

}

function index(){

  $this->load->view('vistaSegundos');


}
function recibirSegundos(){

  $segundos1= $this->input->post('segundos');
  $resultado['recibido']=$this->metodoSegundos($segundos1);
  $this->load->view('vistaSegundos', $resultado);

}


function metodoSegundos($segundos1){

$resultados=array();
$minutos1=0;
$horas1=0;

//obtenemos los segundos y los pasamos a minutos
while ($segundos1>=60){

    $segundos1-=60;
    $minutos1++;

  }
//obtenemos los minutos y los pasamos a horas
  while ($minutos1>=60){

      $minutos1-=60;
      $horas1++;

    }
//ponemos los resultados y los devolvemos para mandarlos a la vista
     $resultados[0]='<h2>Resultado:</h2>';
     $resultados[1]='Horas : '. $horas1.' , Minutos : '.$minutos1.' , Segundos : '.$segundos1;

return $resultados;


}
}
?>
