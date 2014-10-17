<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM calendario ORDER BY fecha DESC";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_array($res))
    {
        $html .= '  <li class="ui-state-default" id="' . $row['id'] . '">
                        <div class="left" style="width:70%;">
                            ' . myToDate($row['fecha']) . " " . $row['hora'] . " " . utf8_encode($row['titulo']) . '
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="dameFecha(\'' . $row['id'] . '\');return false;">modificar</a>
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="borrarFecha(\'' . $row['id'] . '\');return false;">borrar</a>
                         </div>
                    </li>';
    }
    
    mysql_close($conn);
    
    echo $html;
?>