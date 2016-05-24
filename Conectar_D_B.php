<?php
    $salto = '<br>';
    $db = new mysqli('localhost','adminhero','', 'hero');


    if ($db->connect_errno > 0) {
        die('Imposible conectar [  '.$db->connect_error.'   ]');
    }else {
        echo "conectado".$salto;
    }
    
    $query= 'SELECT * FROM `lenguajes`' ;

    if(!$resultado = $db->query($query))
    {
        die('Ocurrio un error ejecutando el query [' . $db->error . ']');
    }

    while ($fila = $resultado->fetch_assoc()) {
        echo $fila['id'].$salto;
    }
    echo $resultado->num_rows . $salto;
    /*
    $consulta = "INSERT INTO lenguajes (lenguajes,descripcion) VALUES ('C++','')";
    if(! $db->query($consulta))
    {
        die('Ocurrio un error ejecutando el query [' . $db->error . ']');
    }
    */
    $sql = "UPDATE lenguajes SET  descripcion =  'Lenguaje C++, es un derivado de C' WHERE  id =5;";
    if(! $db->query($sql) )
    {
        die('Ocurrio un error ejecutando el query ['.$db->error . ']');
    }
    echo 'Filas Modificadas: '.$db->affected_rows;

    $delete = 'DELETE FROM lenguajes WHERE  id = 5;';

    if (! $db->query($delete))
    {
        die('error al eliminar: '.$db->error);
    }


?>