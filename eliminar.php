<?php
    require 'conexion.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM personas WHERE id = '$id' ";

    if(! $db->query($sql)){
         die('Ocurrio un error ejecutando el query [' . $db->error . ']');
    }else{

        header('Content-Type: application/json');
        echo json_encode(array('exito'=>true));
    }

    $db->close();

?>