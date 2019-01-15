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
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model("Tienda_admin_model");
        $this->load->library("session");
        $config= Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'mailpath' => '/usr/sbin/sendmail',
            'smtp_port' => 465,
            'smtp_user' => 'pruebasegoijava@gmail.com',
            'smtp_pass' => 'txepetx13',
            'mailtype' => 'text',
            'newline' => "\r\n",
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->load->library('encryption');
        $this->encryption->initialize(
            array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => 'X9n/5};j;]6[y}PG'
            )
        );
       
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
    public function login($usuario, $contrasena){
        $this->session->set_userdata('usuario', $usuario);
        $this->session->set_userdata('rol', 'Cliente');
        $this->index();
    }
    public function verMisDatos($nombre){
        //crear vista para visualizar mis datos
        $dato['datos']=$this->Tienda_model->verDatosUsuario($nombre);

        $this->load->view("misDatos_view", $dato);
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
    public function verPedido(){
        $str=$_SESSION['usuario'];
        $id=$this->Tienda_model->verUsuarios($str);
        foreach($id as $fila) {
            $id_user=$fila->id_usuario;
        }
        $dato['datos']=$this->Tienda_model->verPedidos($id_user);
        $this->load->view("pedidos_view", $dato);
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
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <link rel="stylesheet" href="../../../../../../../configuracion/css/estilos_tienda.css">
            </head>
            <body>
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
                            var cantidades=[];
                            var ids=[];';
                    echo 'var precioT='.$precioT.';';    
                            for($i=0;$i<count($CCompra);$i++){
                                echo 'cantidades['.$i.']='.$CCompra[$i].';';
                                echo 'ids['.$i.']='.$IDCompra[$i].';';
                            }
            echo '          var strCant=cantidades.toString();
                            var strIds=ids.toString();
                            strCant=strCant.replace(/,/g, "o");
                            strIds=strIds.replace(/,/g, "0");
                            window.location.href="../../../../../../index.php/Tienda_controller/compraFinal/"+strIds+"_"+strCant+"/"+precioT;'; 
            echo '           },';    
            echo '          "Cancelar": function() {
                                $( this ).dialog( "close" );
                            } 
                    },
                    beforeClose: function( event, ui ) {
                        window.location.href="../../../../../../index.php/Tienda_controller";
                    }
                });
                </script>
                </body>
                </html>';
        }else{
            echo "No existen objetos";
        }
        
    }
    public function compraFinal($informacion, $precioT){
        //formatear datos
        $informacion=urldecode($informacion);
        $strIds=substr($informacion, 0, strrpos($informacion, '_'));
        $strCantidades=substr($informacion, strrpos($informacion, '_')+1, strlen($informacion));

        for ($i=0;$i<substr_count($informacion, '0', 0, strpos($informacion, '_'));$i++){
            $IDCompra[$i]=substr($strIds, 0, strpos($strIds, '0'));
            $strIds=substr($strIds, strpos($strIds, '0')+1, strlen($strIds));
        }
        $IDCompra[$i]=substr($strIds, 0, strlen($strIds));

        for ($i=0;$i<substr_count($informacion, 'o', strrpos($informacion, '_')+1);$i++){
            $CCompra[$i]=substr($strCantidades, 0, strpos($strCantidades, 'o'));
            $strCantidades=substr($strCantidades, strpos($strCantidades, 'o')+1, strlen($strCantidades));
        }
        $CCompra[$i]=substr($strCantidades, 0, strlen($strCantidades));

        $ultimoID=$this->Tienda_model->verCompras();
        if (count($ultimoID)==0){
            $ultimoID=1;
        }else{
            foreach($ultimoID as $ids){
               $ultimoID=$ids->id_compra;
            }
            $ultimoID++;
        }
        $str=$_SESSION['usuario'];
        $id=$this->Tienda_model->verUsuarios($str);
        foreach($id as $fila) {
            $id_user=$fila->id_usuario;
        }
        
        for ($i=0;$i<count($IDCompra);$i++){
            $this->Tienda_model->añadirCompra($ultimoID, $id_user, $IDCompra[$i], $CCompra[$i]);
        }
        date_default_timezone_set("Europe/Madrid");
        setlocale(LC_TIME,"es_ES");
		
        $strFechaActual=date("d/m/Y");
        $strHoraActual=date("H:i:s");
        
        $this->Tienda_model->añadirPedido($ultimoID, $precioT, $strFechaActual, $strHoraActual, 'F', $id_user);
        $emails=$this->Tienda_model->verEmail($id_user);
        foreach($emails as $fila){
            $email=$fila->email;
        }
        //enviar email de que se ha realizado la compra
        $this->email->from('pruebasegoijava@gmail.com', 'Egoi Perez');
        $this->email->to($email);
        $this->email->subject('Pedido Nº '.$ultimoID);
        $this->email->message('Se ha realizado el pedido a día: '.$strFechaActual.' , a las '. $strHoraActual.' con un precio total de '. $precioT.' €');

        $this->email->send();

        echo $this->email->print_debugger();

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <link rel="stylesheet" href="../../../../../../../configuracion/css/estilos_tienda.css">
            </head>
            <body>
                <section class="dialog">
                    <p>Gracias por realizar una compra en nuestra web</p>
                </section>
            <script>
                localStorage.clear();';
                $this->session->unset_userdata("compra");
           echo '$(".dialog").dialog({
                    modal: true,
                    title: "¡Compra realizada!",
                    minWidth: 200,
                    buttons: { 
                        "Volver al menú": function() {
                            $(this).dialog("close");
                        }
                    }, 
                    beforeClose: function( event, ui ) {
                        window.location.href="../../../../../../../index.php/Tienda_controller";
                    }
                });
            </script>
            </body>
            </html>';

    }
    public function vaciarCarro(){
        $this->session->unset_userdata('compra');
        $this->index();
    }
    public function eliminarObj($nombre){
        $j=0;
        $nombre=urldecode($nombre);
        if (count($_SESSION['compra'])>1){
            for ($i=0;$i<count($_SESSION['compra']);$i++){
                if ($nombre!=$_SESSION['compra'][$i]){
                    $productos[$j++]=$_SESSION['compra'][$i];
                }
            }
            $this->session->set_userdata('compra', $productos);
        }else{
            $this->session->unset_userdata('compra');
        }
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