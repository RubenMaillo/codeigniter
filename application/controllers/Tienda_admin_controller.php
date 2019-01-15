<?php
//extendemos CI_Controller
class Tienda_admin_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
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
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
       
    }
     
    //controlador por defecto
    public function index(){
        $dato['datos']=$this->Tienda_admin_model->verProductos();
        $dato['pagina']=1;

        $this->load->view("vista_MainAdmin", $dato);
    }
    public function login($usuario, $contrasena){
        $this->session->set_userdata('usuario', $usuario);
        $this->session->set_userdata('rol', 'Administrador');
        $this->index();
    }
    public function CambiarPagina($nuevaPagina){
        $dato['datos']=$this->Tienda_admin_model->verProductos();
        $dato['pagina']=$nuevaPagina;

        $this->load->view("vista_MainAdmin", $dato);
    }
    public function verCuentas(){
        $dato['datos']=$this->Tienda_admin_model->verCuentas();

        $this->load->view("vista_cuentas", $dato);
    }
    public function activarCuenta($id_usuario){
        $this->Tienda_admin_model->activarCuenta($id_usuario);
        $usuarios=$this->Tienda_admin_model->verUsuarios($id_usuario);
        foreach ($usuarios as $fila){
            $email=$fila->email;
            $nombre=$fila->nombre_usuario;
        }
        //enviar mail de que la cuenta se ha activado
        $this->email->from('pruebasegoijava@gmail.com', 'Egoi Perez');
        $this->email->to($email);
        $this->email->subject('Su cuenta ha sido activada');
        $this->email->message('Se ha activado su cuenta con nombre de usuario '.$nombre);

        $this->email->send();

        echo $this->email->print_debugger();
        $dato['datos']=$this->Tienda_admin_model->verCuentas();

        $this->load->view("vista_cuentas", $dato);

    }
    public function nuevoProducto(){
        $this->load->view("nuevo_producto_view");
    }
    public function anadirNuevo_Producto(){
        $arrayCategorias=array('', 'Sofás y sillones', 'Mesas', 'Auxiliares', 'Descanso');
        $arrayEstados=array('', 'Nuevo', 'En buen estado', 'Segunda mano', 'Para restauración');

        if (!file_exists("configuracion/imagenes/imagenesTienda/".$_FILES['archivo']['name'])){

            move_uploaded_file($_FILES['archivo']['tmp_name'], "configuracion/imagenes/imagenesTienda/".$_FILES['archivo']['name']);
        
        }
        if ($_POST['categoria']!=0 && $_POST['nombre']!="" && $_POST['precio']!="" && $_POST['stock'] && $_POST['estado'] && $_POST['ano'] && $_POST['desc'] && $_FILES['archivo']['name']!=""){
            $this->Tienda_admin_model->nuevoProducto($arrayCategorias[$_POST['categoria']], $_POST['nombre'], $_POST['precio'], $_POST['stock'], $arrayEstados[$_POST['estado']], $_POST['ano'], $_POST['desc'], $_FILES['archivo']['name']);
            echo '<script>alert("Se ha añadido el producto");
            window.location.href="../../../../../../../../../../../index.php/Tienda_admin_controller";</script>';
        }else{
            echo '<script>alert("Todos los campos son necesarios");
            window.location.href="../../../../../../../../../../../index.php/Tienda_admin_controller/nuevoProducto";</script>';
        }
    }
    public function verProducto($nombre){
        $nombre=urldecode($nombre);
        $datos=$this->Tienda_admin_model->verProducto($nombre);
        foreach ($datos as $fila){
            $info[0]=$fila->categoria;
            $info[2]=$fila->precio;
            $info[3]=$fila->stock;
            $info[4]=$fila->estado_producto;
            $info[5]=$fila->año_fabricacion;
            $info[6]=$fila->descripcion;
        }
        $info[1]=$nombre;
        $dato['datoss']=$info;

        $this->load->view("vermod_producto", $dato);

    }

    public function modificar_Producto($categoria, $nombre, $precio, $stock, $estado, $ano, $descripcion){
        $this->Tienda_admin_model->modProducto($categoria, $nombre, $precio, $stock, $estado, $ano, $descripcion);
        echo '<script>alert("Se ha modificado el producto");
        window.location.href="../../../../../../../../../../../index.php/Tienda_admin_controller";</script>';

    }
    public function eliminarProducto($nombre){
        $nombre=urldecode($nombre);
        $id_producto=$this->Tienda_admin_model->verProducto($nombre);
        foreach($id_producto as $fila){
            $id_real=$fila->id_producto;
        }
        $id_pedido=$this->Tienda_admin_model->verPedido($id_real);
        $id2;
        foreach($id_pedido as $fila){
            $id2=$fila->id_pedido;
        }
        $id_realX=$id2;
        $this->Tienda_admin_model->eliminarProducto($nombre, $id_real, $id_realX);

        echo '<script>alert("Se ha eliminado el producto");
        window.location.href="../../../../../../../../../../../index.php/Tienda_admin_controller";</script>';
    }

    public function verPedidos(){
        $datos['pedidos']=$this->Tienda_admin_model->verPedidos();

        $this->load->view("pedidos_admin", $datos);
    }
}

?>