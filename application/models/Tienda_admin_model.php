<?php
//extendemos CI_Model
class Tienda_admin_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
    public function verProductos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verProducto($nombre){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE nombre_producto='".$nombre."';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verPedido($id_c){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Pedido WHERE id_compra='".$id_c."';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verCuentas(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario WHERE tipo_usuario='Cliente';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

    public function verUsuarios($id_usuario){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario WHERE id_usuario='".$id_usuario."';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verPedidos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Pedido;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    
    public function activarCuenta($id_usuario){
        //Hacemos una consulta
        $strFechaActual=date("d")."/". date("m")."/".date("Y");

        $this->db->query("UPDATE Usuario SET estado = 'Activada' WHERE id_usuario=".$id_usuario.";");
        $this->db->query("UPDATE Usuario SET fecha_act = '".$strFechaActual."' WHERE id_usuario=".$id_usuario.";");
         
    }
    public function nuevoProducto($categoria, $nombre, $precio, $stock, $estado, $ano, $descripcion, $imagen){
        $this->db->query("INSERT into Producto (categoria, nombre_producto, precio, stock, estado_producto, año_fabricacion, descripcion, imagen) values ('".$categoria."', '".$nombre."', ".$precio.", ".$stock.", '".$estado."', ".$ano.", '".$descripcion."', '".$imagen."')");
    }

    public function modProducto($categoria, $nombre, $precio, $stock, $estado, $ano, $descripcion){
        $categoria=urldecode($categoria);
        $nombre=urldecode($nombre);
        $estado=urldecode($estado);
        $descripcion=urldecode($descripcion);
        $this->db->query("UPDATE Producto SET categoria = '".$categoria."'  WHERE nombre_producto='".$nombre."';");
        $this->db->query("UPDATE Producto SET precio = ".$precio."  WHERE nombre_producto='".$nombre."';");
        $this->db->query("UPDATE Producto SET stock = ".$stock."  WHERE nombre_producto='".$nombre."';");
        $this->db->query("UPDATE Producto SET estado_producto = '".$estado."'  WHERE nombre_producto='".$nombre."';");
        $this->db->query("UPDATE Producto SET año_fabricacion = ".$ano."  WHERE nombre_producto='".$nombre."';");
        $this->db->query("UPDATE Producto SET descripcion = '".$descripcion."'  WHERE nombre_producto='".$nombre."';");
    }
    public function eliminarProducto($nombre, $id, $id2){
        $this->db->query("DELETE FROM Compra WHERE id_producto='".$id."';");
        $this->db->query("DELETE FROM Pedido WHERE id_pedido='".$id2."';");
        $this->db->query("DELETE FROM Producto WHERE nombre_producto='".$nombre."';");
    }
}
?>