<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="../../../../configuracion/css/estilos_login.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function(){
            $("button").button();
            $("i").click(function(){
                 if($("i").hasClass("fa fa-eye-slash")){
                     //mostrar contraseña
                    $("#iContra").attr("type", "text");
                    $("#iContra2").attr("type", "text");
                    $("i").removeClass("fa fa-eye-slash");
                    $("i").addClass("fa fa-eye");
                 }else{
                     //ocultar contraseña
                    $("#iContra").attr("type", "password");
                    $("#iContra2").attr("type", "password");
                    $("i").removeClass("fa fa-eye");
                    $("i").addClass("fa fa-eye-slash");
                 }
            });
            $(".cancelar").click(function(){
                window.location.href="../../../../index.php/Tienda_login_controller";
            });
            $(".registrar").click(function(){
                if (iUsuario.value!="" && iContra.value!="" && iContra2.value!="" && iEmail.value!=""){
                    //si las contraseñas coinciden y todos los campos están completos
                    if (iContra.value==iContra2.value){
                        bool=validar_email(iEmail.value);
                        if (bool){
                            iEmail.value=iEmail.value.replace("@", "¿");
                            window.location.href="../../../../index.php/Tienda_login_controller/Registrar/"+iUsuario.value+"/"+iContra.value+"/"+iEmail.value;
                        }else{
                            alert("El email introducido no es correcto");
                        }
                    //si las contraseñas no coinciden
                    }else{
                        alert("Las contraseñas no coinciden");
                    }
                //si algún campo esta vacío
                }else{
                    alert("Todos los campos son necesarios");
                }
            });
        });
        function validar_email(email) 
        {
            var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email) ? true : false;
        }
    </script>
    <main class="registro">
        <h1>Registro de clientes</h1>
        <hr>
        <section class="labels2">
            <label for="user">Usuario</label><br>
            <label for="pass">Contraseña</label><br>
            <label for="pass2">Confirmar contraseña</label><br>
            <label for="email">Email</label>
        </section>
        <section class="inputs2">
            <input type="text" id="iUsuario">
            <i class="fa fa-eye-slash" style="position:fixed; margin-left:11.5%;margin-top:0.65%;z-index:900"></i>
            <input type="password" id="iContra">
            <i class="fa fa-eye-slash" style="position:fixed; margin-left:11.5%;margin-top:0.65%;z-index:900"></i>
            <input type="password" id="iContra2">
            <input type="email" id="iEmail">
            <br><br>
            <button class="cancelar">Cancelar</button>
            <button class="registrar">Registrarse</button>
        </section><br>
            <?php echo $captcha['image'];?>
    </main>
</body>
</html>