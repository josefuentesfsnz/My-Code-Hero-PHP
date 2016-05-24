<?php
    require_once 'db_conect.php';
    
    $sql = "SELECT lenguajes FROM lenguajes";

    if(!$resultado = $db->query($sql)){
        die('Ocurrio un error ejecutando el query [' . $db->error . ']');
    }

    while($fila = $resultado->fetch_assoc()){
        echo $fila['lenguajes'] . '<br />';
    }