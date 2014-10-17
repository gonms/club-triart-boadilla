<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT documento, foto FROM noticias WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
    if (!empty($row['documento']))
        unlink("../docs/" . $row['documento']);
    if (!empty($row['foto']))
        unlink("../docs/" . $row['foto']);
    
    $sql = "DELETE FROM noticias WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    if (mysql_affected_rows() == 1)
    {
        $sql = "DELETE FROM noticias_orden WHERE orden = '" . $_GET['id'] . "'";
        $res = mysql_query($sql);
        if (mysql_affected_rows() == 1)
        {
            echo "OK";
        }
        else
        {
            echo "Error al borrar el orden: SQL: " . $sql;
        }
    }
    else
    {
        echo "Error al borrar los datos: SQL: " . $sql;
    }
    
    mysql_close($conn);
?>