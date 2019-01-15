<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Welcome extends CI_Controller {

public function ejercicio1(){

  $datos1['num1']=1;
  $datos1['num2']=-4;

  $this->load->view('welcome_message1', $datos1);

}

public function ejercicio2(){

$datos2['cadena']='hola.mundo';
$datos2['blanco']=' ';
$datos2['punto']='.';
$datos2['guion']='-';


  $this->load->view('welcome_message2', $datos2);

}

public function ejercicio3(){

$datos3['maximo']=50;
$datos3['minimo']=1;

  $this->load->view('welcome_message3', $datos3);

}

public function ejercicio4(){

$datos4['cadena1']='holamundo';
$datos4['cadena2']='HOLAMUNDO';
$datos4['cadena3']='holamundo';
$datos4['cadena4']=' hola mundo ';

  $this->load->view('welcome_message4', $datos4);

}

public function ejercicio5(){

$datos5['cadena1']='egoi';
$datos5['cadena2']='perez';

  $this->load->view('welcome_message5', $datos5);

}

public function ejercicio6(){

$datos6['cadena']='hola mundo que tal soy egoi';

  $this->load->view('welcome_message6', $datos6);

}

public function ejercicio7(){

$datos7['cadena']='hola mundo estoy mundo';
$datos7['palabra']='mundo';

  $this->load->view('welcome_message7', $datos7);

}


}

?>
