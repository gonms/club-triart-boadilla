<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM documentos_orden ORDER BY id";
    $res = $conn->query($sql);
    while ($row = $res->fetch_array())
    {
        $sql = "SELECT * FROM documentos WHERE id = '" . $row['orden'] . "'";
        $resDocumento = $conn->query($sql);
        $rowDocumento = $resDocumento->fetch_array();
        $html .= '  <li class="ui-state-default" id="' . $rowDocumento['id'] . '">
                        <div class="left" style="width:70%;">
                            ' . utf8_encode($rowDocumento['titulo']) . '
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="dameDocumento(\'' . $rowDocumento['id'] . '\');return false;">modificar</a>
                        </div>
                        <div class="left" style="width:15%;">
                            <a href="#" onclick="borrarDocumento(\'' . $rowDocumento['id'] . '\');return false;">borrar</a>
                         </div>
                    </li>';
    }
    
    $conn->close();
    
    echo $html;
?>