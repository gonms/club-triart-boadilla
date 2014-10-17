$(document).ready(function() 
{
    $(".tab_content").hide();
    $("ul.tabs li:first").addClass("active").show();
    $(".tab_content:first").show();
    
    $("ul.tabs li").click(function()
    {
        $("ul.tabs li").removeClass("active");
    	$(this).addClass("active");
    	$(".tab_content").hide();
    
    	var activeTab = $(this).find("a").attr("href");
    	$(activeTab).fadeIn();
    	return false;
    });
    
    $('#aNoticias').click(dameNoticias);
    $('#aDocumentos').click(dameDocumentos);
    $('#aCalendario').click(dameFechas);
    
    $("#stbNoticias, #stbDocumentos, #stbCalendario").sortable({
			connectWith: ".connectedSortable"
		}).disableSelection();
        
    dameNoticias();
	
});

/* N O T I C I A S */
function dameNoticias()
{
    $.get("ajax/dameNoticias.php", function(data){ 
        $('#stbNoticias').html(data);
    });
    $('#noticiaEdit').hide();
}

function dameNoticia(eID)
{
    window.location.href = "index.php?op=Noticias&id=" + eID;
}

function nuevaNoticia()
{
    //limpiaCampos('e');
    $('#noticiaEdit').show();
    $(".input").cleditor({width:"80%", height:"300px"});
}

function compruebaNoticias()
{    
    var error = "";
    if ($('#n_titulo').val() == "")
    {
        error += "- Indica el titulo<br />";
    }
    if ($('#n_fecha').val() == "")
    {
        error += "- Indica la fecha<br />";
    }
    if ($('#n_cuerpo').val() == "")
    {
        error += "- Indica la descripción de la noticia<br />";
    }

    if (error != "")
    {
        $('#errorNoticias').html("<p>Se han detectado los siguientes errores:</p><p class='error'>" + error + "</p>");
        return false;
    }
}


function modificarNoticia(eID)
{
    //limpiaCampos('e');
    $.get("ajax/dameNoticia.php",{id: eID}, function(data){
        if (data == "KO")
        {
            alert("Se produjo un error al intentar recuperar la noticia");   
        } 
        else
        {
            var aDatos = data.split("#");
            $('#n_titulo').val(aDatos[0]);
            $('#n_fecha').val(aDatos[1]);
            $('#n_cuerpo').html(aDatos[2]);
            $('#n_id').val(aDatos[3]);
            $('#n_accion').val("modificar");
            $('#noticiaEdit').show();
            $(".input").cleditor({width:"80%", height:"300px"});
        }
    });
}

function borrarNoticia(eID)
{
    if (confirm(String.fromCharCode(191) + "Deseas borrar esta noticia?"))
    {
        $.get("ajax/borraNoticia.php",{id: eID}, function(data){
            if (data == "OK")
            {
                alert("Noticia borrada correctamente");
                dameNoticias();
            }
            else
                alert(data);
        });
    }
}
/* N O T I C I A S */

/* D O C U M E N T O S */
function dameDocumentos()
{
    $.get("ajax/dameDocumentos.php", function(data){ 
        $('#stbDocumentos').html(data);
    });
    $('#documentoEdit').hide();
}

function dameDocumento(eID)
{
    window.location.href = "index.php?op=Documentos&id=" + eID;
}

function nuevoDocumento()
{
    //limpiaCampos('e');
    $('#documentoEdit').show();
    $(".input").cleditor({width:"80%", height:"300px"});
}

function compruebaDocumentos()
{    
    var error = "";
    if ($('#d_titulo').val() == "")
    {
        error += "- Indica el titulo<br />";
    }
    if (error != "")
    {
        $('#errorDocumentos').html("<p>Se han detectado los siguientes errores:</p><p class='error'>" + error + "</p>");
        return false;
    }
}


function modificarDocumento(eID)
{
    //limpiaCampos('e');
    $.get("ajax/dameDocumento.php",{id: eID}, function(data){
        if (data == "KO")
        {
            alert("Se produjo un error al intentar recuperar el documento");   
        } 
        else
        {
            var aDatos = data.split("#");
            $('#d_titulo').val(aDatos[0]);
            $('#d_documento').val(aDatos[1]);
            $('#d_id').val(aDatos[2]);
            $('#d_accion').val("modificar");
            $('#documentoEdit').show();
            $(".input").cleditor({width:"80%", height:"300px"});
        }
    });
}

function borrarDocumento(eID)
{
    if (confirm(String.fromCharCode(191) + "Deseas borrar este documento?"))
    {
        $.get("ajax/borraDocumento.php",{id: eID}, function(data){
            if (data == "OK")
            {
                alert("Documento borrado correctamente");
                dameDocumentos();
            }
            else
                alert(data);
        });
    }
}
/* D O C U M E N T O S */


/* C A L E N D A R I O */
function dameFechas()
{
    $.get("ajax/dameFechas.php", function(data){ 
        $('#stbCalendario').html(data);
    });
    $('#calendarioEdit').hide();
}

function dameFecha(eID)
{
    window.location.href = "index.php?op=Calendario&id=" + eID;
}

function nuevaFecha()
{
    //limpiaCampos('e');
    $('#calendarioEdit').show();
    $(".input").cleditor({width:"80%", height:"300px"});
}

function compruebaFecha()
{    
    var error = "";
    if ($('#c_titulo').val() == "")
    {
        error += "- Indica el titulo<br />";
    }
    if ($('#c_fecha').val() == "")
    {
        error += "- Indica la fecha<br />";
    }
    if ($('#c_hora').val() == "")
    {
        error += "- Indica la hora<br />";
    }

    if (error != "")
    {
        $('#errorCalendario').html("<p>Se han detectado los siguientes errores:</p><p class='error'>" + error + "</p>");
        return false;
    }
}


function modificarFecha(eID)
{
    //limpiaCampos('e');
    $.get("ajax/dameFecha.php",{id: eID}, function(data){
        if (data == "KO")
        {
            alert("Se produjo un error al intentar recuperar la noticia");   
        } 
        else
        {
            var aDatos = data.split("#");
            $('#c_fecha').val(aDatos[0]);
            $('#c_hora').val(aDatos[1]);
            $('#c_titulo').val(aDatos[2]);
            $('#c_id').val(aDatos[3]);
            $('#c_accion').val("modificar");
            $('#calendarioEdit').show();
            $(".input").cleditor({width:"80%", height:"300px"});
        }
    });
}

function borrarFecha(eID)
{
    if (confirm(String.fromCharCode(191) + "Deseas borrar este evento?"))
    {
        $.get("ajax/borraFecha.php",{id: eID}, function(data){
            if (data == "OK")
            {
                alert("Evento borrado correctamente");
                dameFechas();
            }
            else
                alert(data);
        });
    }
}
/* C A L E N D A R I O */



function guardaPosicionesSeccion(sec)
{
    var result = $('#stb' + sec).sortable('toArray');
    $.post("ajax/guardaSeccion.php",{datos: result, seccion: sec}, function(data)
    {
        alert(data);
    });
}