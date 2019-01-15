<?php
//extendemos CI_Model
class Tienda_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function verProductos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
 
 
}
?>
