<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM noticias WHERE id = '" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    if ($res->num_rows != 1)
    {
        echo "KO";
    }
    else
    {
        $row = $res->fetch_array();
        echo utf8_encode($row['titulo'] . "#" . $row['fecha'] . "#" . $row['cuerpo'] . "#" . $row['id']);
    }
    $conn->close();
?>