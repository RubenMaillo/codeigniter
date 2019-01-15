<?php
                        //extendemos CI_Controller
class Bebidas_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url"); 
         
        //llamo o incluyo el modelo
        $this->load->model("Bebidas_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
       
    }
     
    //controlador por defecto
    public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        echo '<script>
            if (sessionStorage.getItem("iFiltrados")!=null){
                sessionStorage.clear();
            }
            </script>';
         
        $datos=$this->Bebidas_model->ver();
        $arrayID=array();
        $i=0;

        foreach($datos as $fila){
            $arrayID[$i++]=$fila;
        }
          $arrays['array1']=$arrayID;
          $this->load->view("Bebidas_view",$arrays);
    }
     
    //controlador para añadir
    public function add(){
        
        $this->load->view("anadir_view");
        //compruebo si se ha enviado submit
        if($this->input->post("submitw")){

            //hacemos las comprobaciones pertinentes de datos
            if ($this->input->post("bebida")!="" && is_numeric($this->input->post("ml")) && is_numeric($this->input->post("cafeina")) && is_numeric( $this->input->post("azucar"))){
             
                //llamo al metodo add
                $add=$this->Bebidas_model->add(
                    $this->input->post("bebida"),
                    $this->input->post("ml"),
                    $this->input->post("cafeina"),
                    $this->input->post("azucar")
                    );
            
                if($add==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Bebida añadida correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Bebida añadida incorrectamente');
                }
            
                //redirecciono la pagina a la url por defecto
                redirect("Bebidas_controller");
            }
        }
		
    }
     
    //controlador para modificar al que
    //le paso por la url un parametro
    public function mod($id_bebida){
        if(is_numeric($id_bebida)){
          $datos["mod"]=$this->Bebidas_model->mod($id_bebida);
          $this->load->view("modificar_view",$datos);
          if ($this->input->post("bebida")!="" && is_numeric($this->input->post("ml")) && is_numeric($this->input->post("cafeina")) && is_numeric( $this->input->post("azucar"))){
          if($this->input->post("submit")){
                $mod=$this->Bebidas_model->mod(
                        $id_bebida,
                        $this->input->post("submit"),
                        $this->input->post("bebida"),
                        $this->input->post("ml"),
                        $this->input->post("cafeina"),
                        $this->input->post("azucar")
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Bebida modificada correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Bebida modificada correctamente');
                }
                redirect("Bebidas_controller");
            }
        }
        }else{
            redirect("Bebidas_controller");
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_bebida){
        if(is_numeric($id_bebida)){
           
          $eliminar=$this->Bebidas_model->eliminar($id_bebida);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Bebida eliminada correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Bebida eliminada incorrectamente');
          }
          redirect("Bebidas_controller");
        }else{
          redirect("Bebidas_controller");
        }
    }
    public function filtro($texto){

        $datos=$this->Bebidas_model->ver();
        $arrayID=array();
        $i=0;

        foreach($datos as $fila){
            $arrayID[$i++]=$fila;
        }
          $bebidas['array1']=$arrayID;
          $bebidas['dato1']=$texto;
          $this->load->view("Bebidas_view",$bebidas);
        

    }
	
    public function ordenar_ID(){
        $datos=$this->Bebidas_model->ver();
        $array=array();
        $arrayID=array();
        $arrayID2=array();
        $i=0;
        $j=0;

        foreach($datos as $fila){
            $arrayID[$i++]=$fila->ID;
        }
        for ($i=count($arrayID)-1;$i>=0;$i--){
            $arrayID2[$j]=$arrayID[$i];
            $j++;
        }

        for ($i=0;$i<count($arrayID2);$i++){

            foreach ($datos as $fila){
        
              if ($arrayID2[$i]==$fila->ID){
        
                $array[$i]=$fila;
                break;
        
              }
            }
          }
          $arrays['array1']=$array;
          $arrays['id']='id';
          $this->load->view("Bebidas_view",$arrays);

    }
    public function ordenar_nombre(){
        $datos=$this->Bebidas_model->ver();
        $array=array();
        $arrayBebida=array();
        $i=0;
        $j=0;

        foreach($datos as $fila){
            $arrayBebida[$i++]=$fila->bebida;
        }

        sort($arrayBebida, SORT_NATURAL);

        for ($i=0;$i<count($arrayBebida);$i++){

            foreach ($datos as $fila){
        
              if ($arrayBebida[$i]==$fila->bebida){
        
                $array[$i]=$fila;
                break;
        
              }
            }
          }

          $arrays['array1']=$array;
          $arrays['id']='id';
          $this->load->view("Bebidas_view",$arrays);

    }
    public function ordenar_ml(){
         $datos=$this->Bebidas_model->ver();
        $array=array();
        $arrayMl=array();
        $i=0;
        $j=0;

        foreach($datos as $fila){
            $arrayMl[$i++]=$fila->ml;
        }

        sort($arrayMl, SORT_NUMERIC);

        for ($i=0;$i<count($arrayMl);$i++){

            foreach ($datos as $fila){
        
              if ($arrayMl[$i]==$fila->ml){
        
                $array[$i]=$fila;
                break;
        
              }
            }
          }

          $arrays['array1']=$array;
          $arrays['id']='id';
          $this->load->view("Bebidas_view",$arrays);
    }
    public function ordenar_cafeina(){
        $datos=$this->Bebidas_model->ver();
        $array=array();
        $arrayCafeina=array();
        $i=0;
        $j=0;

        foreach($datos as $fila){
            $arrayCafeina[$i++]=$fila->cafeina;
        }

        sort($arrayCafeina, SORT_NUMERIC);

        for ($i=0;$i<count($arrayCafeina);$i++){

            foreach ($datos as $fila){
        
              if ($arrayCafeina[$i]==$fila->cafeina){
        
                $array[$i]=$fila;
                break;
        
              }
            }
          }

          $arrays['array1']=$array;
          $arrays['id']='id';
          $this->load->view("Bebidas_view",$arrays);
    }
    public function ordenar_azucar(){
        $datos=$this->Bebidas_model->ver();
        $array=array();
        $arrayAzucar=array();
        $i=0;
        $j=0;

        foreach($datos as $fila){
            $arrayAzucar[$i++]=$fila->azucar;
        }

        sort($arrayAzucar, SORT_NUMERIC);

        for ($i=0;$i<count($arrayAzucar);$i++){

            foreach ($datos as $fila){
        
              if ($arrayAzucar[$i]==$fila->azucar){
        
                $array[$i]=$fila;
                break;
        
              }
            }
          }

          $arrays['array1']=$array;
          $arrays['id']='id';
          $this->load->view("Bebidas_view",$arrays);
    }
	
	}
?>
