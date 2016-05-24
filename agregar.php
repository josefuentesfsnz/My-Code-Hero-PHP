<?php
    require 'conexion.php';

    extract($_POST);

    $sql = "INSERT INTO personas (id, nombre, correo, sexo) VALUES (NULL, '$nombre', '$correo', $sexo)";

    if(! $db->query($sql)){
         die('Ocurrio un error ejecutando el query [' . $db->error . ']');
    }else{

        // Con la función header podemos indicar al explorar que el tipo de contenido será JSON
        // en caso de no hacer esto en el PHP entonces tendríamos que convertir el texto a JSON en el javascript
        header('Content-Type: application/json');

        //Luego vamos a crear un arreglo con toda la información que queremos enviar como respuesta y lo convertimos a JSON
        // para esto utilizamos la función json_encode
        echo json_encode(array('exito'=>true, 'id'=>$db->insert_id, 'nombre'=>$nombre, 'correo'=>$correo, 'sexo'=> ($sexo == 1? 'M':'F') ));
    }

    $db->close();

?>