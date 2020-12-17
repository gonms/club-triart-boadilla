<?php
	include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM " . $seccion . "_orden ORDER BY id";
    $res = $conn->query($sql);
    while($row = $res->fetch_array())
    {
        $grid .= '<li class="ui-state-default" id="' . $row['id'] . '">' . utf8_encode($row['titulo']) . '</li>';
    }
     
    $conn->close();
    echo $grid;
?>