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

//esta funcion ordena los corredores por tiempo, de menor a mayor y dejando los corredores que han abandonado al final
function ordenarCorredores(){

  $jsondata= file_get_contents("configuracion/JSON/corredores.json");
  $json= json_decode($jsondata, true);

  $corredores=$json['Corredores'];
  $corredor=$corredores['Corredor'];
  $i=0;
  $j=0;
  $arrDorsales=array();
  $arrTiemposA=array();

  //obtenemos los datos y guardamos en un array los tiempos que no sean abandonado y en otro los corredores con todos sus datos
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

//copia la imagen seleccionada a la ruta del servidor dada
function enviarImagen(){

  $dato['fecha']=date("Y");
  $dato['ruta1']=$_FILES['archivo']['name'];
  if (!file_exists("configuracion/imagenes/".$_FILES['archivo']['name'])){

    move_uploaded_file($_FILES['archivo']['tmp_name'], "configuracion/imagenes/".$_FILES['archivo']['name']);

  }
  $this->load->view('vistaNuevoCorredorV2', $dato);

}

//funcion para introducir un nuevo corredor, todos los datos son necesarios y en caso que hayamos elegido tiempo en segundos, controla que sea numérico
function introducirCorredor($num_dorsal, $archivo){

if (isset($_POST['tiempo']) && is_numeric($_POST['tiempo']) || $_POST['tiempo2']=="ABANDONA"){

  if (($_POST['nombre']!="" && $_POST['apellidos'] && $_POST['procedencia'] && $_POST['tiempo2']) || ($_POST['nombre']!="" && $_POST['apellidos'] && $_POST['procedencia'] && $_POST['tiempo'])){

    $jsondata= file_get_contents("configuracion/JSON/corredores.json");
    $json= json_decode($jsondata, true);
    $corredores=$json['Corredores'];
    $corredor=$corredores['Corredor'];

    if (isset($_POST['tiempo'])){

      $corredor[]=array(
        'num_dorsal'=> $num_dorsal,
        'nombre'=> $_POST['nombre'],
        'apellidos'=> $_POST['apellidos'],
        'procedencia'=> $_POST['procedencia'],
        'tiempo'=> $_POST['tiempo'],
        'imagen'=> $archivo
      );

    }else{

      $corredor[]=array(
        'num_dorsal'=> $num_dorsal,
        'nombre'=> $_POST['nombre'],
        'apellidos'=> $_POST['apellidos'],
        'procedencia'=> $_POST['procedencia'],
        'tiempo'=> $_POST['tiempo2'],
        'imagen'=> $archivo
      );

  }

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

}else{

  echo '<script>alert("Todos los campos son necesarios");</script>';
  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredorV2', $dato);

}

}else{

  echo '<script>alert("Los segundos tienen que ser numéricos");</script>';
  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredorV2', $dato);

}
}

function nuevoCorredor(){

  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoCorredorV2', $dato);

}

//funcion para ver los datos del corredor en el que se ha hecho click
function verCorredor($num_dorsal){

  $jsondata= file_get_contents("configuracion/JSON/corredores.json");
  $json= json_decode($jsondata, true);

  $corredores=$json['Corredores'];
  $corredor=$corredores['Corredor'];
  $arrDatos=array();

  foreach ($corredor as $datos){

    if ($datos['num_dorsal']==$num_dorsal){

      //llamamos a la vista de este corredor
      $dato['fecha']=date("Y");
      $dato['arr']=$datos;
      $this->load->view('vistaDatosCorredorV2', $dato);
      break;
      
    }


  }

}
}

?>
