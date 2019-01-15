<?php
//extendemos CI_Controller
class Tienda_login_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model("Tienda_login_model");
        $this->load->library("session");
       
    }
     
    //controlador por defecto
    public function index(){
        $this->load->view("login_view");
    }
}

?>