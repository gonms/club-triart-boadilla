<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT doc FROM documentos WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
    unlink("../docs/" . $row['doc']);

    $sql = "DELETE FROM documentos WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    if (mysql_affected_rows() == 1)
    {
        $sql = "DELETE FROM documentos_orden WHERE orden = '" . $_GET['id'] . "'";
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