<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorDinero extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $this->load->view('vistaDinero');


}
function recibirDinero(){


  $dinero1= $this->input->post('dinero');
  $resultado['recibido']=$this->metodoDinero($dinero1);
  $resultado['dinero']=$dinero1;
  $this->load->view('vistaDinero', $resultado);

}

function metodoDinero($dinero1){

  $dinero=round($dinero1, 3);
  //tenemos un array de monedas para ir comprobando y restando
  $monedas= array(0.01, 0.02, 0.05, 0.1, 0.2, 0.5, 1, 2);
  $billetes= array(5, 10, 20, 50, 100, 200, 500);
  $resultados= array();
  $j=0;

//haremos el while mientras que el dinero que nos han introducido sea mayor a 0
while ($dinero>0){
  //si el dinero introducido es menor a 5 entonces utilizamos el array de monedas para restar e introducirlo en el array de resultados
  if ($dinero<5){
    for ($i=7; $i>=0; $i--){
      while (($dinero)>=$monedas[$i]){

        $dinero-=$monedas[$i];
        $dinero=round($dinero, 3);
        $resultados[$j++]='Una moneda de '.$monedas[$i].' €';

      }
      }
}
//si es mayor o igual a 5 entonces utilizaremos el array de billetes
  if ($dinero>=5){
    for ($i=6; $i>=0; $i--){
      while ($dinero>=$billetes[$i]){

        $dinero-=$billetes[$i];
        $resultados[$j++]='Un billete de '.$billetes[$i].' €';

    }
  }
}

}

return $resultados;

}
}
?>
