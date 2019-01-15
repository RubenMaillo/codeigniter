<?php
//extendemos CI_Model
class Bebidas_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM bebidas;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($bebida,$ml,$cafeina,$azucar){
        $consulta=$this->db->query("SELECT bebida FROM bebidas WHERE bebida LIKE '$bebida'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO bebidas VALUES(NULL,'$bebida','$ml','$cafeina','$azucar');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($id_bebida,$modificar="NULL",$bebida="NULL",$ml="NULL",$cafeina="NULL",$azucar="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM bebidas WHERE ID=$id_bebida");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE bebidas SET bebida='$bebida', ml='$ml',
              cafeina='$cafeina', azucar='$azucar' WHERE ID=$id_bebida;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_bebida){
       $consulta=$this->db->query("DELETE FROM bebidas WHERE ID=$id_bebida");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>
