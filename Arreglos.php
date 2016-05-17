<?php
    $arreglo_leng = array('php','css','html','JS');
    echo "$arreglo_leng[0]";
    echo "<br>";
    $array_asoc = array('id'=> '1', 'nombre'=>'jose', 'correo'=>'mowz@gmail.com', 'pais'=>'chile');
    echo $array_asoc['id'];
    echo "<br>";

    $libros = array();
    $libros[0] = array('titulo'=>'Aprendiendo PHP', 'autor'=>'Ramses Velasquez');
    $libros[1] = array('titulo'=>'Aprendiendo a desarrollar', 'autor'=>'CodeHero');
    $libros[2] = array('titulo'=>'Aprendiendo todo', 'autor'=>'MrRolanD');
    $nuevoArray = array('titulo'=>'GTA 5', 'autor'=>'Martin');
    array_push($libros, $nuevoArray);
    echo $libros[3]['titulo'];
    echo "<br>";
    array_unshift($libros, $nuevoArray);
    echo $libros[0]['titulo'];
    echo "<br>";
    array_pop($libros);
    array_shift($libros);
    echo "<br>";

    $colores = array('rojo', 'verde', 'azul');
    foreach ($colores as $color) {
        echo "Color: ".$color.", ";
    }
    echo "<br>";
    $nuevo = array('id'=>'1', 'nombre'=>'Martin','correo'=> 'josefuentes@gmail.com');
    foreach ($nuevo as $llave => $valor) {
        echo "$llave".": ".$valor;
        echo "<br>";
                
    }
    print_r($nuevo);
?>