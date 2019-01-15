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
                $dato['datos']=$this->Tienda_model->verProductosAsc();
            }
            if($_SESSION['filtro']=="descendente"){
                $dato['datos']=$this->Tienda_model->verProductosDesc();
            }
            if($_SESSION['filtro']=="sofas"){
                $dato['datos']=$this->Tienda_model->verSofas();
            }
            if($_SESSION['filtro']=="mesas"){
                $dato['datos']=$this->Tienda_model->verMesas();
            }
            if($_SESSION['filtro']=="auxiliares"){
                $dato['datos']=$this->Tienda_model->verAuxiliares();
            }
            if($_SESSION['filtro']=="descanso"){
                $dato['datos']=$this->Tienda_model->verDescanso();
            }
            if($_SESSION['filtro']=="baratos"){
                $dato['datos']=$this->Tienda_model->verBaratos();
            }
            if($_SESSION['filtro']=="caros"){
                $dato['datos']=$this->Tienda_model->verCaros();
            }
            if($_SESSION['filtro']=="nuevos"){
                $dato['datos']=$this->Tienda_model->verNuevos();
            }
            if($_SESSION['filtro']=="antiguos"){
                $dato['datos']=$this->Tienda_model->verAntiguos();
            }
            if($_SESSION['filtro']=="nuevo"){
                $dato['datos']=$this->Tienda_model->verNuevo();
            }
            if($_SESSION['filtro']=="buen"){
                $dato['datos']=$this->Tienda_model->verBuen();
            }
            if($_SESSION['filtro']=="segunda"){
                $dato['datos']=$this->Tienda_model->verSegunda();
            }
            if($_SESSION['filtro']=="restaurar"){
                $dato['datos']=$this->Tienda_model->verRestaurar();
            }
            if($_SESSION['filtro']==""){
                $dato['datos']=$this->Tienda_model->verProductos();
            }
        }else{
            $this->session->set_userdata('filtro', '');
                $dato['datos']=$this->Tienda_model->verProductos();
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
                $dato['datos']=$this->Tienda_model->verProductosAsc();
            }
            if($_SESSION['filtro']=="descendente"){
                $dato['datos']=$this->Tienda_model->verProductosDesc();
            }
            if($_SESSION['filtro']=="sofas"){
                $dato['datos']=$this->Tienda_model->verSofas();
            }
            if($_SESSION['filtro']=="mesas"){
                $dato['datos']=$this->Tienda_model->verMesas();
            }
            if($_SESSION['filtro']=="auxiliares"){
                $dato['datos']=$this->Tienda_model->verAuxiliares();
            }
            if($_SESSION['filtro']=="descanso"){
                $dato['datos']=$this->Tienda_model->verDescanso();
            }
            if($_SESSION['filtro']=="baratos"){
                $dato['datos']=$this->Tienda_model->verBaratos();
            }
            if($_SESSION['filtro']=="caros"){
                $dato['datos']=$this->Tienda_model->verCaros();
            }
            if($_SESSION['filtro']=="nuevos"){
                $dato['datos']=$this->Tienda_model->verNuevos();
            }
            if($_SESSION['filtro']=="antiguos"){
                $dato['datos']=$this->Tienda_model->verAntiguos();
            }
            if($_SESSION['filtro']=="nuevo"){
                $dato['datos']=$this->Tienda_model->verNuevo();
            }
            if($_SESSION['filtro']=="buen"){
                $dato['datos']=$this->Tienda_model->verBuen();
            }
            if($_SESSION['filtro']=="segunda"){
                $dato['datos']=$this->Tienda_model->verSegunda();
            }
            if($_SESSION['filtro']=="restaurar"){
                $dato['datos']=$this->Tienda_model->verRestaurar();
            }
            if($_SESSION['filtro']==""){
                $dato['datos']=$this->Tienda_model->verProductos();
            }
        }else{
            $this->session->set_userdata('filtro', '');
            $dato['datos']=$this->Tienda_model->verProductos();
        }
        $dato['pagina']=$nuevaPagina;

        $this->load->view("header_view", $dato);
        $this->load->view("productos_view", $dato);
        $this->load->view("carrito_view");

    }
    public function verProducto($nombreProducto, $i){
        
        $dato['datos']=$this->Tienda_model->verProductos();
        $dato['producto']=$nombreProducto;
        $dato['numero']=$i+1;

        $this->load->view("header_view", $dato);
        $this->load->view("producto_view", $dato);
    }

    public function anadir_Carro($producto){

        $producto=urldecode($producto);

        if (isset($_SESSION['compra'])){
            $productos=$_SESSION['compra'];
            $productos[count($productos)]=$producto;
        }else{
            $productos[0]=$producto;
        }
        
        $this->session->set_userdata('compra', $productos);
        $this->cambiarPagina(1);

    }
    public function realizarCompra($informacion){
        if (isset($_SESSION['compra'])){
            for ($i=0;$i<count($_SESSION['compra']);$i++){
                $productos[$i]=$_SESSION['compra'][$i].'<br>';
            }
        }else{
            echo "No existen objetos";
        }
        //introducir en bbdd la compra, deberemos obtener la cantidad asociada a cada producto
        $informacion=urldecode($informacion);
        $strNom=substr($informacion, 0, strrpos($informacion, '_'));
        $strCantidades=substr($informacion, strrpos($informacion, '_')+1, strlen($informacion));
        for ($i=0;$i<substr_count($informacion, '0', 0, strpos($informacion, '_'));$i++){
            $NCompra[$i]=substr($strNom, 0, strpos($strNom, '0'));
            $strNom=substr($strNom, strpos($strNom, '0')+1, strlen($strNom));
            
        }
        $NCompra[$i]=substr($strNom, 0, strlen($strNom));
        for ($i=0;$i<substr_count($informacion, 'o', strrpos($informacion, '_')+1);$i++){
            $CCompra[$i]=substr($strCantidades, 0, strpos($strCantidades, 'o'));
            $strCantidades=substr($strCantidades, strpos($strCantidades, 'o')+1, strlen($strCantidades));
        }
        $CCompra[$i]=substr($strCantidades, 0, strlen($strCantidades));
        $productosC=$this->Tienda_model->verProductos();

        for ($i=0;$i<count($CCompra);$i++){
            foreach ($productosC as $productos){
                if ($productos->nombre_producto==$NCompra[$i]){
                    $IDCompra[$i]=$productos->id_producto;
                    $PCompra[$i]=$productos->precio;
                    break;
                }
            }
        }
        //se generará el diálogo
        echo '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="https://resources/demos/style.css">
            <link rel="stylesheet" href="../../../../../../../configuracion/css/estilos_tienda.css">
            <section class="dialog">
            <table>
            <tr style="background: #4CAF50;color:white">
                <td>Nombre</td><td>Cantidad</td><td>Precio</td>
            </tr>
            ';
            $precioT=0;
            for ($i=0;$i<count($NCompra);$i++){
                $precioT+=($PCompra[$i]*$CCompra[$i]);
                echo '<tr><td>'.($i+1).'.- '.$NCompra[$i].'</td><td>'.$CCompra[$i].'</td><td>'.($PCompra[$i]*$CCompra[$i]).' €</td></tr>';
            }

        echo '<tr>
                <td class="total" colspan=2>Precio Total</td><td class="rojo">'.$precioT.' €</td>
            </tr>
            </table>
            </section>
            <script>
            $(".dialog").dialog({
                modal: true,
                title: "Compra",
                minWidth: 400,
                buttons: { 
                    "Comprar": function() {
                        ';
                        echo $i.'/';
                   echo' },    
                    "Cancelar": function() {
                        window.location.href="../../../../index.php/Tienda_controller";
                    }
                }
            });
            </script>';


    }
    public function vaciarCarro(){
        $this->session->unset_userdata('compra');
        $this->index();
    }
    public function filtrar($tipo){
        $tipo=urldecode($tipo);
        switch ($tipo){
            case "blanco":

                $this->session->set_userdata('filtro', '');
                $dato['datos']=$this->Tienda_model->verProductos();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Ascendente":
            
                $this->session->set_userdata('filtro', 'ascendente');
                $dato['datos']=$this->Tienda_model->verProductosAsc();
                $dato['pagina']=1;
    
                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Descendente":

                $this->session->set_userdata('filtro', 'descendente');
                $dato['datos']=$this->Tienda_model->verProductosDesc();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Sofás y sillones":

                $this->session->set_userdata('filtro', 'sofas');
                $dato['datos']=$this->Tienda_model->verSofas();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Mesas":

                $this->session->set_userdata('filtro', 'mesas');
                $dato['datos']=$this->Tienda_model->verMesas();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Auxiliares":

                $this->session->set_userdata('filtro', 'auxiliares');
                $dato['datos']=$this->Tienda_model->verAuxiliares();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;

            case "Descanso":

                $this->session->set_userdata('filtro', 'descanso');
                $dato['datos']=$this->Tienda_model->verDescanso();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Más baratos primero":

                $this->session->set_userdata('filtro', 'baratos');
                $dato['datos']=$this->Tienda_model->verBaratos();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Más caros primero":

                $this->session->set_userdata('filtro', 'caros');
                $dato['datos']=$this->Tienda_model->verCaros();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Nuevos primero":

                $this->session->set_userdata('filtro', 'nuevos');
                $dato['datos']=$this->Tienda_model->verNuevos();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Antiguos primero":

                $this->session->set_userdata('filtro', 'antiguos');
                $dato['datos']=$this->Tienda_model->verAntiguos();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Nuevo":

                $this->session->set_userdata('filtro', 'nuevo');
                $dato['datos']=$this->Tienda_model->verNuevo();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "En buen estado":

                $this->session->set_userdata('filtro', 'buen');
                $dato['datos']=$this->Tienda_model->verBuen();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Segunda mano":

                $this->session->set_userdata('filtro', 'segunda');
                $dato['datos']=$this->Tienda_model->verSegunda();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
            case "Para restauración":

                $this->session->set_userdata('filtro', 'restaurar');
                $dato['datos']=$this->Tienda_model->verRestaurar();
                $dato['pagina']=1;

                $this->load->view("header_view", $dato);
                $this->load->view("productos_view", $dato);
                $this->load->view("carrito_view");
                break;
        }
    }
}
     
?>