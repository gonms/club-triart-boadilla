<?php
    include_once("../funciones.inc.php");
    $txtError = "";
    if (!empty($_POST))
    {
        if ($_POST['c_accion'] == "nuevo")
        {
            $sql = utf8_decode("INSERT INTO calendario (titulo,fecha,hora) VALUES ('" . $_POST['c_titulo'] . "','" . dateToMy($_POST['c_fecha']) . "','" . $_POST['c_hora'] . "');");
            $conn->query($sql);
            
        }
        else if ($_POST['c_accion'] == "modificar")
        {
            $sql = utf8_decode("UPDATE calendario SET titulo = '" . $_POST['c_titulo'] . "', fecha = '" . dateToMy($_POST['c_fecha']) . "', hora = '" . $_POST['c_hora'] . "' WHERE id = '" . $_POST['c_id'] . "';");
            $conn->query($sql);
        }
    }
    mysql_close($conn);
    if ($txtError != "")
	{
		echo '	<div>
			        <p style="float:left;margin:5px 10px 5px 0;padding:0;"><img src="images/photo.jpg" width="100" height="100" /></p>
                    <p style="float:left;margin:0;line-height:110px;padding:0;color:#000000;font-family:arial;font-size:16px;font-weight:bold;">Gestor de contenidos Club Triart</p>
			    </div>
			    <div style="clear:both;">
			    	<br/><br/><p>'.$txtError.'</p>
					<a href="index.php">Volver.</a>
				</div>';
	}
    else
    {
		@header("Location: index.php?op=Calendario");
	}
?>