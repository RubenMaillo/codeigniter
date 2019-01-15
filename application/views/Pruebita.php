<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pruebita extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $arrOrdenado=$this->ordenarCorredores();
  $dato['fecha']=date("Y");
  $dato['arrayOrden']=$arrOrdenado;
  $this->load->view('vistaBehobiaV2', $dato);

}

function ordenarCorredores(){

  $jsondata= file_get_contents("configuracion/JSON/corredores.json");
  $json= json_decode($jsondata, true);

  $corredores=$json['Corredores'];
  $corredor=$corredores['Corredor'];
  $i=0;

  foreach ($corredor as $datos){

      $arrTiempos[$i]=$datos['tiempo'];
      $i++;

  }

  sort($arrTiempos, SORT_NATURAL);

  for ($i=0;$i<count($arrTiempos);$i++){

    foreach ($corredor as $datos){

      if ($arrTiempos[$i]==$datos['tiempo']){

        if ($i>0){

          if ($arrOrdenado[$i-1]['num_dorsal']!=$datos['num_dorsal']){

            $arrOrdenado[$i]=$datos;
            break;

          }
        }else{

          $arrOrdenado[$i]=$datos;
          break;

        }

      }
    }
  }
  return $arrOrdenado;
}
}

?>
