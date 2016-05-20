<?php
/*

            COOKIE
            ______

*/
    $ip = '10.10.1.10';
    setcookie('ip', $ip);
    if (isset($_COOKIE['ip']))
    {
        echo "ip = ".$_COOKIE['ip'];
    }else
    {
        echo "no existe, la creo";
        /*
        elimino por si esa dañada
        tercer parametro vacio 
        tiempo negativo
        */
        setcookie('ip', $ip,'', time()-1000);
        setcookie('ip', $ip);
    }


/*
            SESSION
            _______



*/
    echo "<br>";
    session_start();

    $_SESSION['nombreUsuario'] = "jose";
    $_SESSION['password'] = "12345";

    if (isset($_SESSION['nombreUsuario'])) {
        echo $_SESSION['nombreUsuario'].", ".$_SESSION['password'];
    }


?>