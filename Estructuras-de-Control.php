<?php
    $variable = 1;
    if ($variable > 2) {
        echo "es mayor";
    }else {
        echo "es menor";
    }
    echo "<br>";


    $usuario = "SuperUsuario";
    if ($usuario == "admin")
    {
        echo 'Hola Admin, tiene todos los permisos';
    }
    else if ($usuario == 'SuperUsuario') {
        echo "hola SuperUsuario";
    }
    else {
        echo 'Hola ' . $usuario ;
    }
    echo "<br>";

    $opcion = 3;
    switch ( $opcion) {
        case '1':
            echo "la variable es 1";
            break;
        case '2':
            echo "la variable es 2";
            break;
        case '3':
            echo "la variable es 3";
            break;
        
        default:
            echo "opcion default";
            break;
    }
    echo "<br>";

    $repeticionDeCiclos = 4;
    $cont = 0;
    while ($repeticionDeCiclos > $cont) {
        $cont++;
        echo "$cont";
        echo "<br>";
    }
    $cont = 0;

    do {
        echo "$cont";
        $cont++;
    } while ($cont < 10);
    


    ?>