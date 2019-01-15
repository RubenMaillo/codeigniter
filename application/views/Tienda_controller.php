<?php
//extendemos CI_Controller
class Tienda_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model("Tienda_model");
        $this->load->library("session");
       
    }
     
    //controlador por defecto
    public function index(){
        
        if (isset($_SESSION['filtro'])){
            if($_SESSION['filtro']=="ascendente"){
                echo "Ordeno Ascendentemente";
                $dato['datos']=$this->Tienda_model->verProductosAsc();
            }
            if($_SESSION['filtro']=="descendente"){
                echo "Ordeno Descendentemente";
                $dato['datos']=$this->Tienda_model->verProductosDesc();
            }
            if($_SESSION['filtro']==""){
                echo "Ordeno normalmente";
                $dato['datos']=$this->Tienda_model->verProductos();
            }
        }
        $dato['pagina']=1;

        $this->load->view("header_view", $dato);
        $this->load->view("productos_view", $dato);
        $this->load->view("carrito_view");

    }
    public function cambiarPagina($nuevaPagina){

        //está obteniendo descendente, y no consigo cambiarlo
        if (isset($_SESSION['filtro'])){
            if($_SESSION['filtro']=="ascendente"){
                echo "Ordeno Ascendentemente";
                $dato['datos']=$this->Tienda_model->verProductosAsc();
            }
            if($_SESSION['filtro']=="descendente"){
                echo "Ordeno Descendentemente";
                $dato['datos']=$this->Tienda_model->verProductosDesc();
            }
            if($_SESSION['filtro']==""){
                echo "Ordeno normalmente";
                $dato['datos']=$this->Tienda_model->verProductos();
            }
        }
        $dato['pagina']=$nuevaPagina;

        $this->load->view("header_view", $dato);
        $this->load->view("productos_view", $dato);
        $this->load->view("carrito_view");

    }
    public function verProducto($nombreProducto, $i){
        
        $dato['datos']=$this->Tienda_model->verProductos();
        $dato['producto']=$nombreProducto;
        $dato['numero']=$i;

        $this->load->view("header_view", $dato);
        $this->load->view("producto_view", $dato);
    }
    public function realizarCompra($id_usuario, $nombre_producto, $cantidad){
        $datos=$this->Tienda_model->verProductos();
        $id_producto="";
        $nombre_producto=urldecode($nombre_producto);
        foreach ($datos as $fila){
            if ($fila->nombre_producto==$nombre_producto){
                $id_producto=$fila->id_producto;
                break;
            }
        }
        $this->Tienda_model->añadirCompra($id_usuario, $id_producto, $cantidad);
        return "Añadido";
    }
    public function filtrar($tipo){
        switch ($tipo){
            case "ascendente":
                $dato['datos']=$this->Tienda_model->verProductosAsc();
                $dato['pagina']=1;
    
                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "descendente":

                $dato['datos']=$this->Tienda_model->verProductosDesc();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "sofas":

                $dato['datos']=$this->Tienda_model->verSofas();
                $dato['pagina']=1;
    
                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "mesas":

                break;
            case "auxiliares":

                break;
            case "descanso":

                break;
            case "baratos":

                break;
            case "caros":

                break;
            case "nuevos":

                break;
            case "antiguos":

                break;
            case "nuevo":

                break;
            case "buen":

                break;
            case "segunda":

                break;
            case "restaurar":

                break;
        }
    }
}
     
?>