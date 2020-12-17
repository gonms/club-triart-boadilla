<?php

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Gestor de contenidos Club Triart Boadilla</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
    <style type="text/css">
	   ul#stbNoticias li, ul#stbDocumentos li, ul#stbCalendario li {cursor: move;margin: 10px 0;}
       
       td {vertical-align: top;text-align: center;}
       td p {margin:0;padding:0;color:#003063;font-family:arial;font-size:16px;font-weight:bold;text-align:center;}
	</style>
</head>
<body>
    <div class="header">
        <p style="float:left;margin:5px 10px 5px 0;padding:0;"><img src="images/photo.jpg" width="100" height="100" /></p>
        <p style="float:left;margin:0;line-height:110px;padding:0;color:#000000;font-family:arial;font-size:16px;font-weight:bold;">Gestor de contenidos Club Triart</p>
    </div>
    <br />
    <ul class="tabs">
        <li id="aNoticias"><a href="#tabNoticias" >Noticias</a></li>
        <li id="aDocumentos"><a href="#tabDocumentos">Documentos</a></li>
        <li id="aCalendario"><a href="#tabCalendario">Calendario</a></li>
    </ul>
    
    <div class="tab_container">
        <div id="tabNoticias" class="tab_content">
            <ul id="stbNoticias" class="connectedSortable ui-sortable">
            </ul>
            <input type="button" name="btnGuardarNoticias" value="Guardar posiciones" onclick="guardaPosicionesSeccion(\'Noticias\');" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
            <br />
            <br />
            <input type="button" name="btnNuevaNoticia" value="Nueva noticia" onclick="nuevaNoticia();" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
            <div id="noticiaEdit" class="dEdit">
                <form name="fNoticias" method="post" action="noticias.php" onsubmit="return compruebaNoticias();" enctype="multipart/form-data">
                    <label for="n_titulo">Titulo</label>
                    <input type="text" class="caja" id="n_titulo" name="n_titulo" size="50" />
                    <label for="n_fecha">Fecha</label>
                    <input type="text" class="caja" id="n_fecha" name="n_fecha" size="10" />
                    <label for="n_cuerpo" id="l_cuerpo">Noticia</label>
                    <textarea class="input" name="n_cuerpo" id="n_cuerpo"></textarea>
                    <label for="n_documento">Documento</label>
                    <input type="file" class="caja" id="n_documento" name="n_documento" size="50" />
                    <label for="n_foto">Foto</label>
                    <input type="file" class="caja" id="n_foto" name="n_foto" size="50" />
                    <input type="hidden" name="n_id" id="n_id" />
                    <input type="hidden" name="n_accion" id="n_accion" value="nuevo" />
                    <br /><br />
                    <input type="submit" name="btnEnviar" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
                </form>
                <div id="errorNoticias"></div>
            </div>
        </div>
        
        <div id="tabDocumentos" class="tab_content">
            <ul id="stbDocumentos" class="connectedSortable ui-sortable">
            </ul>
            <input type="button" name="btnGuardarDocumentos" value="Guardar posiciones" onclick="guardaPosicionesSeccion(\'Documentos\');" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
            <br />
            <br />
            <input type="button" name="btnNuevoDocumento" value="Nuevo documento" onclick="nuevoDocumento();" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
            <div id="documentoEdit" class="dEdit">
                <form name="fDocumento" method="post" action="documentos.php" onsubmit="return compruebaDocumentos();" enctype="multipart/form-data">
                    <label for="d_titulo">Título</label>
                    <input type="text" class="caja" id="d_titulo" name="d_titulo" size="50" />
                    <label for="d_file">Documento</label>
                    <input type="file" class="caja" id="d_file" name="d_file" size="50" />
                    <input type="hidden" name="d_id" id="d_id" />
                    <input type="hidden" name="d_accion" id="d_accion" value="nuevo" />
                    <br /><br />
                    <input type="submit" name="btnEnviar" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
                </form>
                <div id="errorDocumentos"></div>
            </div>
        </div> 
        
        <div id="tabCalendario" class="tab_content">
            <ul id="stbCalendario" class="connectedSortable ui-sortable">
            </ul>
            <input type="button" name="btnNuevoCalendario" value="Nueva fecha" onclick="nuevaFecha();" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
            <div id="calendarioEdit" class="dEdit">
                <form name="fCalendario" method="post" action="calendario.php" onsubmit="return compruebaCalendario();" enctype="multipart/form-data">
                    <label for="c_fecha">Fecha <strong>(dd/mm/yyyy)</strong></label>
                    <input type="text" class="caja" id="c_fecha" name="c_fecha" size="10" />
                    <label for="c_hora">Hora</label>
                    <input type="text" class="caja" id="c_hora" name="c_hora" size="10" />
                    <label for="c_titulo">Titulo</label>
                    <input type="text" class="caja" id="c_titulo" name="c_titulo" size="50" />                    
                    <input type="hidden" name="c_id" id="c_id" />
                    <input type="hidden" name="c_accion" id="c_accion" value="nuevo" />
                    <br /><br />
                    <input type="submit" name="btnEnviar" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" />
                </form>
                <div id="errorCalendario"></div>
            </div>
        </div>       
    </div>';
    
    if (!empty($_GET))
    {
        echo ' 
            <script type="text/javascript">
                $(document).ready(function() 
                {
                    $("ul.tabs li").removeClass("active");
                	$(".tab_content").hide();
                	var activeTab = "#tab' . $_GET['op'] . '";
                	$(activeTab).fadeIn();
                    $("#a' . $_GET['op'] . '").addClass("active");
        ';
        if ($_GET['op'] == "Noticias")
        {
            echo ' dameNoticias();';
                    
            if (!empty($_GET['id'])) echo 'modificarNoticia(\'' . $_GET['id'] . '\');';
        }
        else if ($_GET['op'] == "Documentos")
        {
            echo ' dameDocumentos();';
            
            if (!empty($_GET['id'])) echo 'modificarDocumento(\'' . $_GET['id'] . '\');';
        }
        else if ($_GET['op'] == "Calendario")
        {
            echo ' dameFechas();';
            
            if (!empty($_GET['id'])) echo 'modificarFecha(\'' . $_GET['id'] . '\');';
        }
        
        echo '
                });
            </script>
        ';
    }
    else
    {
        echo '
            <script type="text/javascript">
                $(document).ready(function() 
                {
                    $("ul.tabs li").removeClass("active");
                	$(".tab_content").hide();
                	$(activeTab).fadeIn();
                    $("#aNoticias").addClass("active");
                    dameNoticias();
            </script>';
    }
    
    echo '
</body>
</html>';
?>
