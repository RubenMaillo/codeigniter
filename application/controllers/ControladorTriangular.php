<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorTriangular extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $this->load->view('vistaTriangular');


}
function recibirNumero(){


  $n= $this->input->post('numero');
  $this->load->view('vistaTriangular');
  $this->metodoTriangular($n);

}

function metodoTriangular($n){

$valorMax=1;
$valorAum=1;
$bool=false;

echo '<table>';
  for ($i=1;$i<=($n*2);$i++){
    echo '<tr>';
    for ($j=1;$j<=($n*2);$j++){

      if (!$bool){

        echo '<td>'.$valorMax.'</td>';
        if ($valorMax==$j){

          break;

        }
      }else{

        echo '<td>'.$valorAum.'</td>';
        $valorAum++;
        if ($valorMax==$valorAum){

          break;


        }

      }
  }

  if (!$bool){
  $valorMax++;
}
  $bool=!$bool;
  $valorAum=1;
  echo '</tr>';
  }
  echo '</table>';

}
}
?>
