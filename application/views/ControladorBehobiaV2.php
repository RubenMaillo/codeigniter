<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorBehobiaV2 extends CI_Controller{

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
  $j=0;
  $arrDorsales=array();
  $arrTiemposA=array();

  foreach ($corredor as $datos){

    if ($datos['tiempo']=='ABANDONA'){
      $arrTiemposA[$j]=$datos;
      $j++;
    }else{
      $arrTiempos[$i]=$datos['tiempo'];
      $i++;
    }
  }
  $contador=0;
  sort($arrTiempos, SORT_NATURAL);

  for ($i=0;$i<count($arrTiempos);$i++){
    $repetido=false;
    foreach ($corredor as $datos){

      if ($arrTiempos[$i]==$datos['tiempo']){

        $arrOrdenado[$i]=$datos;
        break;

      }
    }
  }

  for ($j=0;$j<count($arrTiemposA);$j++){

    $arrOrdenado[$i++]=$arrTiemposA[$j];

  }

  return $arrOrdenado;

}

function introducirCorredor($num_dorsal){
  echo $_FILES['archivo']['tmp_name'];
  $jsondata= file_get_contents("configuracion/JSON/corredores.json");
  $json= json_decode($jsondata, true);
  $corredores=$json['Corredores'];
  $corredor=$corredores['Corredor'];

  $corredor[]=array(
    'num_dorsal'=> $num_dorsal,
    'nombre'=> $_POST['nombre'],
    'apellidos'=> $_POST['apellidos'],
    'procedencia'=> $_POST['procedencia'],
    'tiempo'=> $_POST['tiempo']
  );

  $corredores['Corredor']=$corredor;
  $raiz['Corredores']=$corredores;

  $final_data=json_encode($raiz);

  if (file_put_contents("configuracion/JSON/corredores.json", $final_data)){

    echo '<script>alert("Se han introducido los datos");</script>';
    $arrOrdenado=$this->ordenarCorredores();
    $dato['fecha']=date("Y");
    $dato['arrayOrden']=$arrOrdenado;
    $this->load->view('vistaBehobiaV2', $dato);

  }else{

    echo '<script>alert("Error");</script>';
    $dato['fecha']=date("Y");
    $this->load->view('vistaNuevoCorredorV2', $dato);

  }
}

function nuevoCorredor(){

  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredorV2', $dato);

}
}

?>
