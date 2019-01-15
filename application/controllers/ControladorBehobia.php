<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorBehobia extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $arrOrdenado=$this->ordenarCorredores();
  $dato['fecha']=date("Y");
  $dato['arrayOrden']=$arrOrdenado;
  $this->load->view('vistaBehobia', $dato);

}

function ordenarCorredores(){

  $arrCorredores=array();
  $arrOrdenado=array();
  $corredores= simplexml_load_file("configuracion/xml/corredores.xml");
  $i=0;

  foreach ($corredores as $corredor){

    $arrCorredores[$i]=$corredor->tiempo;
    $i++;

  }

  sort($arrCorredores, SORT_NATURAL);

  for ($i=0;$i<count($arrCorredores);$i++){

    foreach ($corredores as $corredor){

      if ($arrCorredores[$i]==$corredor->tiempo){

        $arrOrdenado[$i]=$corredor;

        break;

      }
    }
  }
  return $arrOrdenado;
}

function nuevoCorredor(){

  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredor', $dato);

}

function introducirCorredor($num_dorsal){

  $xml =new DomDocument ("1.0", "UTF-8");
  $xml -> LOAD ("configuracion/xml/corredores.xml");

  $nombre1=$_POST['nombre'];
  $apellidos1=$_POST['apellidos'];
  $procedencia1=$_POST['procedencia'];
  $tiempo1=$_POST['tiempo'];

  if ($nombre1!="" && $apellidos1!="" && $procedencia1!="" && $tiempo1!=""){

    $CORREDORESTag= $xml -> getElementsByTagname('corredores')->item(0);
    $corredorTag=$xml->createElement("corredor");

    $dorsalTag= $xml->createElement("num_dorsal", $num_dorsal);
    $nombreTag = $xml->createElement("nombre", $nombre1);
    $apellidosTag= $xml->createElement("apellidos", $apellidos1);
    $procedenciaTag= $xml->createElement("procedencia", $procedencia1);
    $tiempoTag= $xml->createElement("tiempo", $tiempo1);


    $corredorTag->appendChild ($dorsalTag);
    $corredorTag->appendChild ($nombreTag);
    $corredorTag->appendChild ($apellidosTag);
    $corredorTag->appendChild ($procedenciaTag);
    $corredorTag->appendChild ($tiempoTag);

    $CORREDORESTag->appendChild($corredorTag);
    $xml->save("/var/www/html/codeigniter/configuracion/xml/corredores.xml");

    $arrCorredores=array();
    $arrOrdenado=array();
    $corredores= simplexml_load_file("configuracion/xml/corredores.xml");
    $i=0;

    foreach ($corredores as $corredor){

      $arrCorredores[$i]=$corredor->tiempo;
      $i++;

    }

    sort($arrCorredores, SORT_NATURAL);

    for ($i=0;$i<count($arrCorredores);$i++){

      foreach ($corredores as $corredor){

        if ($arrCorredores[$i]==$corredor->tiempo){

          $arrOrdenado[$i]=$corredor;

          break;

        }
      }
    }
    echo '<script> alert("Se ha introducido un nuevo corredor"); </script>';
    $dato['fecha']=date("Y");
    $dato['arrayOrden']=$arrOrdenado;
    $this->load->view('vistaBehobia', $dato);

}else{

  echo '<script> alert("Todos los campos son necesarios"); </script>';
  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredor', $dato);

}

}
}
?>
