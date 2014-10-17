<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM calendario WHERE id = '" . $_GET['id'] . "'";
    $res = mysql_query($sql);
    if (mysql_num_rows($res) != 1)
    {
        echo "KO";
    }
    else
    {
        $row = mysql_fetch_array($res);
        echo myToDate($row['fecha']) . "#" . $row['hora'] . "#" . utf8_encode($row['titulo']) . "#" . $row['id'];
    }
    mysql_close($conn);
?>