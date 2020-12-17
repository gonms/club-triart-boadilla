<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM calendario WHERE id = '" . $_GET['id'] . "'";
    $res = $conn->query($sql);
    if ($res->num_rows != 1)
    {
        echo "KO";
    }
    else
    {
        $row = $res->fetch_array();
        echo myToDate($row['fecha']) . "#" . $row['hora'] . "#" . utf8_encode($row['titulo']) . "#" . $row['id'];
    }
    $conn->close();
?>