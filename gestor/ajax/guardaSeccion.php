<?php

    if (!empty($_POST['datos']))
    {
        include_once("../../funciones.inc.php");
        
        $seccion = strtolower($_POST['seccion']);
        
        $sql = "TRUNCATE TABLE " . $seccion . "_orden;";
        mysql_query($sql);
        $sql = "INSERT INTO " . $seccion . "_orden (orden) VALUES";
        foreach($_POST['datos'] as $k => $v)
        {
            $sql .= "('" . $v . "'),";
        }
        $sql = substr($sql,0,-1);
        mysql_query($sql);        
        mysql_close($conn);
        echo "Posiciones guardadas correctamente";        
    }
?>