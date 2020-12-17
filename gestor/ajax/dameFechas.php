<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM calendario ORDER BY fecha DESC";
    $res = $conn->query($sql);
    while ($row = $res->fetch_array())
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
    
    $conn->close();
    
    echo $html;
?>