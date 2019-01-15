<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ControladorBiblioteca extends CI_Controller{

function __construct(){

  parent::__construct();
  $this->load->helper('form');

}

function index(){

  $dato['fecha']=date("Y");
  $dato['libros']='Libros';
  $dato['socios']='Socios';
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaMain', $dato);
  $this->load->view('vistaFooter', $dato);

}

public function mostrarLibros(){

  $dato['texto']='Hola';
  $dato['fecha']=date("Y");
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaLibros2', $dato);
  $this->load->view('vistaFooter', $dato);

}

public function mostrarSocios(){

  $dato['texto']='Adios';
  $dato['fecha']=date("Y");
  $this->load->view('vistaHeader', $dato);
  $this->load->view('vistaSocios', $dato);
  $this->load->view('vistaFooter', $dato);

}
public function filtrarSocios(){

  $this->load->view('vistaHeader');
  $datos['dni1'] = $this->input->post('dni');
  $datos['nombre1'] = $this->input->post('nombre');
  $dato['fecha']=date("Y");
  $this->load->view('vistaSocios', $datos);
  $this->load->view('vistaFooter', $dato);


}
public function filtrarLibros(){

  $this->load->view('vistaHeader');
  $datos['titulo1'] = $this->input->post('titulo');
  $datos['autor1'] = $this->input->post('autor');
  $datos['tematica1'] = $this->input->post('tematica');
  $dato['fecha']=date("Y");
  $this->load->view('vistaLibros2', $datos);
  $this->load->view('vistaFooter', $dato);


}

public function mostrarDatosSocio($informacion){

  $this->load->view('vistaHeader');
  $dato['fecha']=date("Y");
  $dato['informacion1']=$informacion;
  $this->load->view('vistaDatosSocio', $dato);
  $this->load->view('vistaFooter', $dato);


}

public function nuevoSocio(){

  $this->load->view('vistaHeader');
  $dato['fecha']=date("Y");
  $this->load->view('vistaNuevoSocio');
  $this->load->view('vistaFooter', $dato);


}

public function introducirSocio($id_socio){

//hacer que la funcion recoga el id de vista nuevo socio y lo pase tambien al xml,
//una vez introducidos los datos, mostrar un mensaje de que se han introducido y mostrar la vistaSocios
    $xml =new DomDocument ("1.0", "UTF-8");
    $xml -> LOAD ("configuracion/xml/socios.xml");

    $nombre1=$_POST['nombre'];
    $dni1=$_POST['dni'];
    $domicilio1=$_POST['domicilio'];
    $telefono1=$_POST['telefono'];
    $fecha_alta1=$_POST['fecha_alta'];
    $fecha_baja1='No';

    //comprobar que todos los campos tengan texto
    if ($nombre1!="" && $dni1!="" && $domicilio1!="" && $telefono1!="" && $fecha_alta1!="" && $fecha_baja1!=""){

      //comprobar que el teléfono introducido sea numérico
      if (is_numeric($telefono1)){

        $letras= array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
        $res=intval(substr($dni1, 0, 8))%23;

        //comprobar que el dni es correcto
        if ($letras[$res]==substr($dni1, 8, 9)){

          $bool=false;
          $socios= simplexml_load_file("configuracion/xml/socios.xml");

            foreach ($socios as $socio){

              if ($socio->dni==$dni1){

                $bool=true;

              }
            }

            if (!$bool){

              $SOCIOSTag= $xml -> getElementsByTagname('socios')->item(0);
              $socioTag=$xml->createElement("socio");

              $idTag= $xml->createElement("id_socio", $id_socio);
              $nombreTag = $xml->createElement("nombre_apellidos", $nombre1);
              $dniTag= $xml->createElement("dni", $dni1);
              $domicilioTag= $xml->createElement("domicilio", $domicilio1);
              $telefonoTag= $xml->createElement("telefono", $telefono1);
              $fecha_altaTag=$xml->createElement("fecha_alta", $fecha_alta1);
              $fecha_bajaTag=$xml->createElement("fecha_baja", $fecha_baja1);

              $socioTag->appendChild ($idTag);
              $socioTag->appendChild ($nombreTag);
              $socioTag->appendChild ($dniTag);
              $socioTag->appendChild ($domicilioTag);
              $socioTag->appendChild ($telefonoTag);
              $socioTag->appendChild ($fecha_altaTag);
              $socioTag->appendChild ($fecha_bajaTag);

              $SOCIOSTag->appendChild($socioTag);
              $xml->save("/var/www/html/codeigniter/configuracion/xml/socios.xml");

              $dato['fecha']=date("Y");
              $this->load->view('vistaHeader');
              $this->load->view('vistaSocios');
              $this->load->view('vistaFooter', $dato);
              echo "<script>alert('Se ha introducido un nuevo socio con ID ".$id_socio."');</script>";

            }else{

              $this->load->view('vistaHeader');
              $dato['fecha']=date("Y");
              $this->load->view('vistaNuevoSocio');
              $this->load->view('vistaFooter', $dato);
              echo "<script>alert('Ya existe un socio con el mismo DNI');</script>";

            }

          }else{

            $this->load->view('vistaHeader');
            $dato['fecha']=date("Y");
            $this->load->view('vistaNuevoSocio');
            $this->load->view('vistaFooter', $dato);
            echo "<script>alert('El dni introducido es incorrecto');</script>";

          }

        }else{

          $this->load->view('vistaHeader');
          $dato['fecha']=date("Y");
          $this->load->view('vistaNuevoSocio');
          $this->load->view('vistaFooter', $dato);
          echo "<script>alert('El campo del teléfono debe ser númerico');</script>";

        }

      }else{

        $this->load->view('vistaHeader');
        $dato['fecha']=date("Y");
        $this->load->view('vistaNuevoSocio');
        $this->load->view('vistaFooter', $dato);
        echo "<script>alert('Todos los campos son necesarios');</script>";

      }
    }
}
?>
