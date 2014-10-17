<?php
    include_once("../funciones.inc.php");
    
    $txtError = "";
    $output_dir = "./docs/";
    
    if (!empty($_POST))
    {
        if ($_POST['d_accion'] == "nuevo")
        {
            if(isset($_FILES["d_file"]))
    		{
    			if ($_FILES["d_file"]["error"] > 0)
    			{
    			  $txtError =  "Error al subir el archivo: " . $_FILES["d_file"]["name"];
    			}
    			else
    			{
                    move_uploaded_file($_FILES["d_file"]["tmp_name"],$output_dir.$_FILES["d_file"]["name"]);
                    
                    $sql = utf8_decode("INSERT INTO documentos (titulo, doc) VALUES ('" . $_POST['d_titulo'] . "','" . $_FILES["d_file"]["name"] . "');");
                    mysql_query($sql);
                    $nID = mysql_insert_id();
                    $sql = utf8_decode("INSERT INTO documentos_orden (orden) VALUES ('" . $nID . "');");
                    mysql_query($sql);    		    
    			}
    		}
        }
        else if ($_POST['d_accion'] == "modificar")
        {
            if(!empty($_FILES["d_file"]["name"]))
    		{
    			$sql = "SELECT doc FROM documentos WHERE id = '" . $_POST['d_id'] . "'";
                $res = mysql_query($sql);
                $row = mysql_fetch_array($res);
                $file = $output_dir . $row['doc'];
                $boolean = unlink($file);
                if ($boolean)
                {
                    if ($_FILES["d_file"]["error"] > 0)
        			{
        			  $txtError =  "Error al subir el archivo: " . $_FILES["d_file"]["name"];
        			}
        			else
        			{
                        move_uploaded_file($_FILES["d_file"]["tmp_name"],$output_dir.$_FILES["d_file"]["name"]);
                        
                        $sqlfile = utf8_decode(", doc = '" . $_FILES["d_file"]["name"] . "' ");    		    
        			}
        		}
                else
                {
                    $txtError =  "Error al borrar el archivo: " . $row['doc'];
                }
            }
            
            $sql = utf8_decode("UPDATE documentos SET titulo = '" . $_POST['d_titulo'] . "'" . $sqlfile . " WHERE id = '" . $_POST['d_id'] . "';");
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
		@header("Location: index.php?op=Documentos");
	}
?>