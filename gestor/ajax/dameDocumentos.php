<?php
    include_once("../../funciones.inc.php");
    
    $sql = "SELECT * FROM documentos_orden ORDER BY id";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_array($res))
    {
        $sql = "SELECT * FROM documentos WHERE id = '" . $row['orden'] . "'";
        $resDocumento = mysql_query($sql);
        $rowDocumento = mysql_fetch_array($resDocumento);
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
    
    mysql_close($conn);
    
    echo $html;
?>