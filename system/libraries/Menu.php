<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class CI_Menu{

    private $arrayMenu;
    public function __construct($array){

      $this->arrayMenu =$array;

    }
    function construir_Menu(){

      $ret_menu= "<nav><ul>";
      foreach($this->arrayMenu as $opcion){
          $ret_menu .="<li>".$opcion."</li>";
      }

      $ret_menu .="</ul></nav>";
      return $ret_menu;

    }


  }





?>
