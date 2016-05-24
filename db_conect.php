<?php
    $db = new mysqli('localhost','adminhero','', 'hero');
    if($db->connect_errno > 0)
    {
        die('Imposible conectar [' . $db->connect_error . ']');
    }
    

