<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

  class ControladorExamen extends CI_Controller{

function __construct(){

  parent::__construct();

}

function index(){


  $tabla['ordenada']=$this->crearTabla();
  $this->load->view('vistaLibros', $tabla);
  //queremos cargar la vistaLibros pasándole la tabla como datos

}

function crearTabla(){

    $libros= simplexml_load_file("configuracion/xml/libros2.xml");
    $i=0;

    foreach ($libros as $libro){

      $tabla[$i]=$libro->num_ejemplares;
      //
      $i++;

    }

    sort($tabla, SORT_NUMERIC);

    for ($i=0;$i<count($tabla);$i--){

      foreach ($libros as $libro){

        if ($tabla[$i]==$libro->num_ejemplares){

          $tablaOrdenada[$i]=$libro;
          break;

        }
      }
    }


  return $tablaOrdenada;

}

function mostrarISBN ($isbn){

  $libros= simplexml_load_file("configuracion/xml/libros2.xml");

  foreach ($libros as $libro){

    if ($libro->isbn==$isbn){

      $str='Título del libro: '.$libro->titulo.'<br> ISBN: '.$isbn;
      break;

    }

  }

  $datos['str']=$str;
  $this->load->view('vistaISBN', $datos);

}

}

?>
