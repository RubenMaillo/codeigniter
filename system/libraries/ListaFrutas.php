<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class CI_ListaFrutas{

    private $arrayFrutas;
    public function __construct($array){

      $this->arrayFrutas =$array;

    }
    function construir_Lista(){

      for ($i=0;$i<100;$i++){

      $ret_menu= "<nav><ul>";
      foreach($this->arrayFrutas as $opcion){
          $ret_menu .="<li>".$opcion.$i."</li>";
      }

      $ret_menu .="</ul></nav>";
      return $ret_menu;

    }
  }

  }
?>
