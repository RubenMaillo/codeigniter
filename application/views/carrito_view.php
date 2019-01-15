    <article id="carrito">
        <h1>Carrito</h1>
        <center>
        <table id="contenido" border=1 cellpadding=10px>
            <tr>
                <td>Nombre producto</td>
                <td colspan=2>Cantidad</td>
                <td>Precio</td>
                <td></td>
            </tr>
        </table><br>
        <button onclick="vaciar()">Vaciar Carro</button>
        <button onclick="comprar()">Comprar</button>
        <br>
        </center>
                
    </article>

</section>
    <script>
        function vaciar(){
            localStorage.clear();
            window.location.href="../../../../../index.php/Tienda_controller/vaciarCarro";
        }
        function comprar(){
            //realizarlo con variables de sesión
            var numObjetos=$(".objetos").length;
            nombres=[];
            cantidades=[];
            for (i=0;i<numObjetos;i++){
                cantidades[i]=$("#cantidad"+(i+1)).text();
                nombres[i]=$(".links:eq("+i+")").text();
            }
            var strCant=cantidades.toString();
            var strNom=nombres.toString();
            strCant=strCant.replace(/,/g, 'o');
            strNom=strNom.replace(/,/g, '0');
            window.location.href="../../../../../../index.php/Tienda_controller/realizarCompra/"+strNom+"_"+strCant;
        }
    </script>
</body>
</html>