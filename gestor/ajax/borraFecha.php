<?php
    include_once("../../funciones.inc.php");
    
    $sql = "DELETE FROM calendario WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    if (mysql_affected_rows() == 1)
    {
        echo "OK";
    }
    else
    {
        echo "Error al borrar los datos: SQL: " . $sql;
    }
    
    mysql_close($conn);
?>