<?php

if(!empty($_POST["btnregistrar"])){
    //echo "<div class='alert alert-inf-o'>Boton Presionado</div>";
    $imagen=$_FILES["imagen"]["tmp_name"]; //el tmp_name es para obtener el nombre del archivo temporal
    // y el imagen es el nombre o name del control input de tipo file

    $nombreImagen=$_FILES["imagen"]["name"]; // el name captura el nombre dle archivo

    $tipoimagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION)); //CON esto solo se obtiene el 
    //formato del archivo
    //echo "<div class='alert alert-info'>$nombreImagen</div>";
    $sizeimagen = $_FILES["imagen"]["size"];
    //echo "<div class='alert alert-info'>$sizeimagen</div>";
    $directorio = "archivos/";



    if (($tipoimagen == "jpg") or ($tipoimagen == "jpeg") or ($tipoimagen == "png")) {
        //almacenando la ruta de nuestra imagen en la base de datos.
        $registro = $conexion->query("INSERT INTO img(foto) values ('')"); //primero se registra para despues tomar
        //el id y este seria el nuevo nombre del archivos.
        $idRegistro = $conexion->insert_id;
        $ruta = $directorio.$idRegistro.".".$tipoimagen;
        $actualizarImagen = $conexion->query("UPDATE img SET foto = '$ruta' WHERE idimg = $idRegistro");

        //almacenando la imagen dentro de nuestro servidor
        if(move_uploaded_file($imagen, $ruta)){

            echo "<div class='alert alert-info'>Imagen guardada existosamente.</div>";

        }else{
            echo "<div class='alert alert-danger'>Error al guardar la imagen.</div>";
        }


    } else {
        echo "<div class='alert alert-info'>No se acepta ese formato</div>";
    }

    ?>

    <script>
        history.replaceState(null, null, location.pathname); //esto me permite deshabilitar la ventana de confirmacion
        //de reenvio de los datos anteriormente introducidos.
    </script>

<?php    

}

?>