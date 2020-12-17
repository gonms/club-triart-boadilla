<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM noticias_orden ORDER BY id";
    $res = $conn->query($sql);
    while ($row = $res->fetch_array())
    {
        $sql = "SELECT * FROM noticias WHERE id = '" . $row['orden'] . "'";
        $resNoticia = $conn->query($sql);
        $rowNoticia = $resNoticia->fetch_array();
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
    
    $conn->close();
    
    echo $html;
?>