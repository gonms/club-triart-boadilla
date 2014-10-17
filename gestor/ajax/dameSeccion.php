<?php
	include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM " . $seccion . "_orden ORDER BY id";
    $res = mysql_query($sql);
    while($row = mysql_fetch_array($res))
    {
        $grid .= '<li class="ui-state-default" id="' . $row['id'] . '">' . utf8_encode($row['titulo']) . '</li>';
    }
     
    mysql_close($conn);
    echo $grid;
?>