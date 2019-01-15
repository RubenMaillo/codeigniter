<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Menu{

    private $arrayMenu;
    public function _construct($array){

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
