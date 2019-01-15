<?php
//extendemos CI_Controller
class Tienda_login_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper('captcha');
        $this->load->helper('string');
        
        $this->load->library('image_lib');
        $this->load->library("session");
        $this->load->library('encryption');
        $this->encryption->initialize(
            array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => 'X9n/5};j;]6[y}PG'
            )
        );
        $this->encryption->initialize(
            array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => 'X9n/5};j;]6[y}PG'
            )
        );
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
        $this->load->model("Tienda_login_model");

        $this->rand = random_string('alnum', 6);
       
    }
     
    //controlador por defecto
    public function index(){
        $this->load->view("login_view");
    }
    public function comprobarLogin($usuario, $contrasena, $recuerdame){
        
        $usuarios=$this->Tienda_login_model->verCuentas();
        $bool=false;
        foreach ($usuarios as $datos){
            if  ($this->encryption->decrypt($datos->contrasena)!=""){
                $datos->contrasena=$this->encryption->decrypt($datos->contrasena);
            }
            if ($datos->nombre_usuario==$usuario && $datos->contrasena==$contrasena){
                $bool=true;
                if ($datos->estado=="Activada"){
                    if ($recuerdame=="true"){
                        $this->session->set_userdata('recuerdame', $usuario);
                    }else{
                        $this->session->unset_userdata('recuerdame');
                    }
                    echo '<script>window.location.href="../../../../../../index.php/Tienda_controller/login/'.$usuario.'/'.$contrasena.'";</script>';
                }else{
                    if ($datos->tipo_usuario=="Cliente"){
                        echo '<script>alert("La cuenta no está activada aún");
                        window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
                    }else{
                        if ($recuerdame=="true"){
                            $this->session->set_userdata('recuerdame', $usuario);
                        }else{
                            $this->session->unset_userdata('recuerdame');
                        }
                        echo '<script>window.location.href="../../../../../../index.php/Tienda_admin_controller/login/'.$usuario.'/'.$contrasena.'";</script>';
                    }
                }
            }
        }
        if (!$bool){
            echo '<script>alert("Los datos no son correctos");
            window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
        }
    }
    public function recibirCredenciales($email){
        $email=urldecode($email);
        $email=str_replace("¿", "@", $email);
        $emails=$this->Tienda_login_model->verEmails();
        $bool=false;
        foreach ($emails as $dato){
            if ($dato->email==$email){
                $bool=true;
                break;
            }
        }
        if ($bool){
            $datos=$this->Tienda_login_model->verDatosConEmail($email);
            foreach ($datos as $dato){
                $datoU=$dato->nombre_usuario;
                $datoC=$dato->contrasena;
            }

            //se enviará el email con los credenciales--usuario y contraseña
            $this->email->from('pruebasegoijava@gmail.com', 'Egoi Perez');
            $this->email->to($email);
            $this->email->subject('Recuperación de credenciales');
            $this->email->message('Usuario: '.$datoU.' | Contraseña: '.$datoC);

            $this->email->send();

            echo $this->email->print_debugger();
            echo '<script>alert("Se ha enviado el email satisfactoriamente");
                window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
        }else{
            echo '<script>alert("El email introducido no está registrado");
                window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
        }
    }
   
    public function Registrar($usuario, $contrasena, $email){
        //es necesario comprobar que el ni el usuario ni el email estén ya repetidos, ya que son campos únicos
        $email=urldecode($email);
        $email=str_replace("¿", "@", $email);
        $boolEm=$this->ComprobarMail($email);
        $boolUs=$this->ComprobarUser($usuario);
        if (!$boolEm && !$boolUs){
            
            $encriptada = $this->encryption->encrypt($contrasena);
            $this->Tienda_login_model->añadirUser($usuario, $encriptada, 'Cliente', 'Desactivada', $email);
            echo '<script>alert("Se ha registrado el usuario");
            window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
        }else{
            if ($boolEm && $boolUs){
                echo '<script>alert("Tanto el nombre de usuario como el email ya existen");';
                echo 'window.location.href="../../../../../../index.php/Tienda_login_controller/Registro";</script>';
            }else{
                if ($boolEm){
                    echo '<script>alert("El email introducido ya existe");';
                    echo 'window.location.href="../../../../../../index.php/Tienda_login_controller/Registro";</script>';
                }
                if ($boolUs){
                    echo '<script>alert("El nombre de usuario introducido ya existe");';
                    echo 'window.location.href="../../../../../../index.php/Tienda_login_controller/Registro";</script>';
                }
            }
        }
    }
    public function ComprobarMail($email){
        $bool=false;
        $emails=$this->Tienda_login_model->verEmails();
        foreach($emails as $datos){
            if ($datos->email==$email){
                $bool=true;
                break;
            }
        }
        return $bool;
    }
    public function ComprobarUser($usuario){
        $bool=false;
        $usuarios=$this->Tienda_login_model->verUsers();
        foreach($usuarios as $datos){
            if ($datos->nombre_usuario==$usuario){
                $bool=true;
                break;
            }
        }
        return $bool;
    }
    public function Registro(){
        $data['captcha']=$this->generarCaptcha();
       
        $this->load->view("registro_view", $data);
    }
    public function generarCaptcha(){
        $config_captcha = array(
            'word'          => $this->rand,
            'img_path'      => './captcha/',
            'img_url'       => 'http://192.168.1.64/captcha/',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 80, 50),
                    'border' => array(255, 255, 255),
                    'text' => array(80, 20, 60),
                    'grid' => array(0, 40, 40)
            )
        );
        $cap = create_captcha($config_captcha);
        return $cap;
    }
    public function cerrarSesion(){
        $this->session->unset_userdata("rol");
        $this->session->unset_userdata("usuario");
        $this->session->unset_userdata("compra");
        echo '<script>localStorage.clear();
        window.location.href="../../../../../../index.php/Tienda_login_controller";</script>';
    }
}

?>