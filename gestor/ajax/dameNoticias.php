<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM noticias_orden ORDER BY id";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_array($res))
    {
        $sql = "SELECT * FROM noticias WHERE id = '" . $row['orden'] . "'";
        $resNoticia = mysql_query($sql);
        $rowNoticia = mysql_fetch_array($resNoticia);
        $html .= '  <li class="ui-state-default" id="' . $rowNoticia['id'] . '">
                        <div class="left" style="width:70%;">
                            ' . utf8_encode($rowNoticia['titulo']) . '
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="dameNoticia(\'' . $rowNoticia['id'] . '\');return false;">modificar</a>
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="borrarNoticia(\'' . $rowNoticia['id'] . '\');return false;">borrar</a>
                        </div>
                    </li>';
    }
    
    mysql_close($conn);
    
    echo $html;
?>