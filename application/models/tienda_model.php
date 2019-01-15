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
        $consulta=$this->db->query("SELECT * FROM Producto;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verProductosAsc(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto ORDER BY nombre_producto ASC;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verProductosDesc(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto ORDER BY nombre_producto DESC;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verSofas(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE Categoria='Sofas y sillones';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verMesas(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE Categoria='Mesas';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verAuxiliares(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE Categoria='Auxiliares';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verDescanso(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE Categoria='Descanso';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verBaratos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto ORDER BY precio ASC;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verCaros(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto ORDER BY precio DESC;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verNuevos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE año_fabricacion>=2016;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verAntiguos(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE año_fabricacion<2016;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verNuevo(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE estado_producto='Nuevo';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verBuen(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE estado_producto='Buen estado';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verSegunda(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE estado_producto='Segunda mano';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verRestaurar(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Producto WHERE estado_producto='Para restauración';");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }

    public function verPrecios(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT nombre_producto, precio FROM Producto;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verCompras(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT id_compra FROM Compra;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verPedidos($id_cliente){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Pedido WHERE id_usuario=".$id_cliente.";");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     public function verUsuarios($nombre){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT id_usuario FROM Usuario WHERE nombre_usuario='".$nombre."';");
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verDatosUsuario($nombre){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Usuario WHERE nombre_usuario='".$nombre."';");
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
    public function verEmail($id){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT email FROM Usuario WHERE id_usuario='".$id."';");
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
   
    public function añadirCompra($id_compra, $id_usuario, $id_producto, $cantidad){
        //Hacemos una consulta
        $this->db->query("INSERT into Compra (id_compra, id_usuario, id_producto, cantidad) values (".$id_compra.", ".$id_usuario.", ".$id_producto.", ".$cantidad.")");
        
    }
    public function añadirPedido($id_compra, $precioT, $fecha_pedido, $hora_pedido, $facturado, $id_usuario){
        $this->db->query("INSERT into Pedido (id_compra, precio_total, fecha_pedido, hora_pedido, facturado, id_usuario) values (".$id_compra.", ".$precioT.", '".$fecha_pedido."', '".$hora_pedido."', '".$facturado."', ".$id_usuario.")");
    }
}
?>
