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
    <title>Login</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function(){
                <?php
                    if (isset($_SESSION['recuerdame'])){?>
                        $('#checkbox-1').prop('checked', true);
                        var str="<?php echo $_SESSION['recuerdame']; ?>";
                        $("#iUsuario").val(str);
                        <?php
                    }
                ?>
            $(".dialog").hide();
            $(".dialog2").hide();
            $("#checkbox-1").checkboxradio();
            $("button").eq(0).button({
                icon: "ui-icon-key",
                iconPosition: "end"
            });
            $("i").click(function(){
                 if($("i").hasClass("fa fa-eye-slash")){
                     //mostrar contraseña
                    $("#iContra").attr("type", "text");
                    $("i").removeClass("fa fa-eye-slash");
                    $("i").addClass("fa fa-eye");
                 }else{
                     //ocultar contraseña
                    $("#iContra").attr("type", "password");
                    $("i").removeClass("fa fa-eye");
                    $("i").addClass("fa fa-eye-slash");
                 }
            });
            $("button").click(function(){
                bool=false;
                if (iUsuario.value!="" && iContra.value!=""){
                    if ($("#checkbox-1").prop('checked')){
                        bool=true;
                    }
                        window.location.href="../../../../../index.php/Tienda_login_controller/comprobarLogin/"+iUsuario.value+"/"+iContra.value+"/"+bool;
                }else{
                    $(".dialog").dialog({
                        title: "Login incorrecto",
                        modal: true,
                        closeOnEscape: true,
                        buttons: {
                            "Cerrar": function() {
                                $(this).dialog("close");
                            }
                        }
                    });
                }
            });
            $(".credenciales").click(function(){
                $(".dialog2").dialog({
                    title: "Recuperación de datos",
                        modal: true,
                        closeOnEscape: true,
                        buttons: {
                            "Enviar": function() {
                                if (inputMail.value!=""){
                                    bool=validar_email(inputMail.value);
                                    inputMail.value=inputMail.value.replace("@", "¿");
                                    bool ? window.location.href="../../../../../../index.php/Tienda_login_controller/recibirCredenciales/"+inputMail.value : alert("El formato del email no es válido");
                                }else{
                                    alert("Tiene que introducir un email");
                                }
                            },
                            "Cancelar": function() {
                                $(this).dialog("close");
                            }
                        }
                });
            })
        });

        function validar_email(email) 
        {
            var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email) ? true : false;
        }
    </script>
    <main class="login">
        <h1>Login</h1>
        <hr>
        <section class="labels">
            <label for="user">Usuario</label><br>
            <label for="pass">Contraseña</label>
        </section>
        <section class="inputs">
            <input type="text" id="iUsuario">
            <i class="fa fa-eye-slash" style="position:fixed; margin-left:11.5%;margin-top:0.65%;z-index:900"></i>
            <input type="password" id="iContra">
        </section>
        <hr>
        <section class="opciones">
            <label for="checkbox-1" class="green">Recuérdame</label>
            <input type="checkbox" name="checkbox-1" id="checkbox-1"><br><br>
            <a class="credenciales">¿Has olvidado tus credenciales?</a><br><br>
            <p>¿No tienes una cuenta aún?<a href="../../../../index.php/Tienda_login_controller/Registro">Regístrate</a></p><br>
            <button>Iniciar sesión</button>
        </section>
    </main>
    <section class="dialog">
        <p>Todos los datos son necesarios</p>       
    </section>
    <section class="dialog2">
        <label>Introduce tu email <input type="email" id="inputMail"></label>     
    </section>
</body>
</html>