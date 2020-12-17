<?php
    include_once("../../funciones.inc.php");
    
    $sql = "DELETE FROM calendario WHERE id = '" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    if ($conn->affected_rows == 1)
    {
        echo "OK";
    }
    else
    {
        echo "Error al borrar los datos: SQL: " . $sql;
    }
    
    $conn->close();
?>