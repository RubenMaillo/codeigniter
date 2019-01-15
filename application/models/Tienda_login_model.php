<?php
//extendemos CI_Model
class Tienda_login_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
    public function verCuentas(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verEmails(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT email FROM Usuario;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verUsers(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT nombre_usuario FROM Usuario;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verDatosConEmail($email){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario WHERE email='".$email."';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function añadirUser($usuario, $contrasena, $tipo_usuario, $estado, $email){
        //Hacemos una consulta
        $this->db->query("INSERT into Usuario (nombre_usuario, contrasena, tipo_usuario, estado, fecha_act, fecha_baja, email) values ('".$usuario."', '".$contrasena."', '".$tipo_usuario."', '".$estado."', NULL, NULL, '".$email."')");
         
    }
}
?>