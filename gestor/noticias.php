<?php
    include_once("../funciones.inc.php");
    $txtError = "";
    $output_dir = "./docs/";
    
    if (!empty($_POST))
    {
        if ($_POST['n_accion'] == "nuevo")
        {
            $campo = $valor = "";
            if(!empty($_FILES["n_documento"]["tmp_name"]))
    		{
    			if ($_FILES["n_documento"]["error"] > 0)
    			{
    			  $txtError =  "Error al subir el archivo: " . $_FILES["n_documento"]["name"];
    			}
    			else
    			{
                    move_uploaded_file($_FILES["n_documento"]["tmp_name"],$output_dir.$_FILES["n_documento"]["name"]);                   
                    $campo .= ",documento";
                    $valor .= ",'" . $_FILES["n_documento"]["name"] . "'";
    			}
    		}
            
            if(!empty($_FILES["n_foto"]["tmp_name"]))
    		{
    			if ($_FILES["n_foto"]["error"] > 0)
    			{
    			  $txtError =  "Error al subir la foto: " . $_FILES["n_foto"]["name"];
    			}
    			else
    			{
                    move_uploaded_file($_FILES["n_foto"]["tmp_name"],$output_dir.$_FILES["n_foto"]["name"]);                   
                    $campo .= ",foto";
                    $valor .= ",'" . $_FILES["n_foto"]["name"] . "'";
    			}
    		}
            
            $sql = utf8_decode("INSERT INTO noticias (titulo,fecha,cuerpo" . $campo . ") VALUES ('" . $_POST['n_titulo'] . "','" . $_POST['n_fecha'] . "','" . $_POST['n_cuerpo'] . "'" . $valor . ");");
            mysql_query($sql);
            $nID = mysql_insert_id();
            $sql = utf8_decode("INSERT INTO noticias_orden (orden) VALUES ('" . $nID . "');");
            mysql_query($sql);
        }
        else if ($_POST['n_accion'] == "modificar")
        {
            $sql = "SELECT documento, foto FROM noticias WHERE id = '" . $_POST['n_id'] . "'";
            $res = mysql_query($sql);
            $row = mysql_fetch_array($res);
            
            $sqlAdd = "";
            if(!empty($_FILES["n_documento"]["tmp_name"]))
    		{
    			if ($_FILES["n_documento"]["error"] > 0)
    			{
    			  $txtError =  "Error al subir el archivo: " . $_FILES["n_documento"]["name"];
    			}
    			else
    			{
                    if (!empty($row['documento']))
                        unlink($output_dir . $row['documento']);
                    move_uploaded_file($_FILES["n_documento"]["tmp_name"],$output_dir.$_FILES["n_documento"]["name"]);                   
                    $sqlAdd .= ",documento = '" . $_FILES["n_documento"]["name"] . "'";
    			}
    		}
            
            if(!empty($_FILES["n_foto"]["tmp_name"]))
    		{
    			if ($_FILES["n_foto"]["error"] > 0)
    			{
    			  $txtError =  "Error al subir la foto: " . $_FILES["n_foto"]["name"];
    			}
    			else
    			{
                    if (!empty($row['foto']))
                        unlink($output_dir . $row['foto']);
                    move_uploaded_file($_FILES["n_foto"]["tmp_name"],$output_dir.$_FILES["n_foto"]["name"]);                   
                    $sqlAdd .= ",foto = '" . $_FILES["n_foto"]["name"] . "'";
    			}
    		}
            
            $sql = utf8_decode("UPDATE noticias SET titulo = '" . $_POST['n_titulo'] . "', fecha = '" . $_POST['n_fecha'] . "', cuerpo = '" . $_POST['n_cuerpo'] . "'" . $sqlAdd . " WHERE id = '" . $_POST['n_id'] . "';");
            mysql_query($sql);
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
		@header("Location: index.php?op=Noticias");
	}
?>