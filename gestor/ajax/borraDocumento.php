<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT doc FROM documentos WHERE id = '" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    $row = $res->fetch_array();
    unlink("../docs/" . $row['doc']);

    $sql = "DELETE FROM documentos WHERE id = '" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    if ($conn->affected_rows == 1)
    {
        $sql = "DELETE FROM documentos_orden WHERE orden = '" . $_GET['id'] . "'";
        $res = $conn->query($sql);
        if ($conn->affected_rows == 1)
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
    
    $conn->mysql();
?>