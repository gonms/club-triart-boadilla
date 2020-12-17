<?php

/* SMARTY SETUP */
require('../smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
$smarty->setConfigDir('../configs/');
$smarty->setCacheDir('../cache/');
//$smarty->debugging = true;

$mes = date("m");
$ano = date("Y");

include("../funciones.inc.php");

function ultimoDia($mes,$ano){ 
   	$ultimo_dia=28; 
   	while (checkdate($mes,$ultimo_dia + 1,$ano)){ 
      	 $ultimo_dia++; 
   	} 
   	return $ultimo_dia; 
} 

function dame_nombre_mes($mes){ 
   	 switch ($mes){ 
      	 case 1: 
         	 $nombre_mes="Enero"; 
         	 break; 
      	 case 2: 
         	 $nombre_mes="Febrero"; 
         	 break; 
      	 case 3: 
         	 $nombre_mes="Marzo"; 
         	 break; 
      	 case 4: 
         	 $nombre_mes="Abril"; 
         	 break; 
      	 case 5: 
         	 $nombre_mes="Mayo"; 
         	 break; 
      	 case 6: 
         	 $nombre_mes="Junio"; 
         	 break; 
      	 case 7: 
         	 $nombre_mes="Julio"; 
         	 break; 
      	 case 8: 
         	 $nombre_mes="Agosto"; 
         	 break; 
      	 case 9: 
         	 $nombre_mes="Septiembre"; 
         	 break; 
      	 case 10: 
         	 $nombre_mes="Octubre"; 
         	 break; 
      	 case 11: 
         	 $nombre_mes="Noviembre"; 
         	 break; 
      	 case 12: 
         	 $nombre_mes="Diciembre"; 
         	 break; 
   	} 
   	return $nombre_mes; 
} 

function calcula_numero_dia_semana($dia,$mes,$ano){ 
   	$numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$ano)); 
   	if ($numerodiasemana == 0) 
      	 $numerodiasemana = 6; 
   	else 
      	 $numerodiasemana--; 
   	return $numerodiasemana; 
} 

$sql = "SELECT * FROM calendario WHERE fecha >= '" . $ano . "-" . $mes . "-01' and fecha <= '" . $ano . "-" . $mes . "-" . ultimoDia($mes,$ano) . "'";
$res = $conn->query($sql);
$aDias = array();
while ($row = $res->fetch_array())
{
	list($ano_evento,$mes_evento,$dia_evento) = explode("-",$row['fecha']);
	$aDias[] = $dia_evento;
	$aEventos[] = array(
						"dia" => intval($dia_evento),
						"hora" => $row['hora'],
						"titulo" => utf8_encode($row['titulo'])
						);
}
$conn->close();


//tomo el nombre del mes que hay que imprimir
$nombre_mes = dame_nombre_mes($mes);

//construyo la tabla general
//calculo el mes y ano del mes anterior
$mes_anterior = $mes - 1;
$ano_anterior = $ano;
if ($mes_anterior==0){
  $ano_anterior--;
  $mes_anterior=12;
}
//calculo el mes y ano del mes siguiente
$mes_siguiente = $mes + 1;
$ano_siguiente = $ano;
if ($mes_siguiente==13){
  $ano_siguiente++;
  $mes_siguiente=1;
}

//Variable para llevar la cuenta del dia actual
$dia_actual = 1;

//calculo el numero del dia de la semana del primer dia
$numero_dia = calcula_numero_dia_semana(1,$mes,$ano);

//calculo el último dia del mes
$ultimo_dia = ultimoDia($mes,$ano);

$aCalendario = array();
//escribo la primera fila de la semana
for ($i=0;$i<7;$i++){
  if ($i < $numero_dia){
     //si el dia de la semana i es menor que el numero del primer dia de la semana no pongo nada en la celda
     $aCalendario[] = '<li class="tdDisabled"></li>';
  } else {
  	if (in_array($dia_actual,$aDias))
  	{
  		$aCalendario[] = '<li id="d'.$dia_actual.'" class="event" onclick="$(\'#evento_' . $dia_actual . '\').show();">' . $dia_actual . '</li>';
  	}
  	else
  	{
     	$aCalendario[] = '<li id="d'.$dia_actual.'">' . $dia_actual . '</li>';
    }
     $dia_actual++;
  }
}

//recorro todos los demás días hasta el final del mes
while ($dia_actual <= $ultimo_dia){
  //si estamos a principio de la semana escribo el <TR>
  
  if (in_array($dia_actual,$aDias))
  	{
  		$aCalendario[] = '<li id="d'.$dia_actual.'" class="event" onclick="$(\'#evento_' . $dia_actual . '\').show();">' . $dia_actual . '</li>';
  	}
  	else
  	{
     	$aCalendario[] = '<li id="d'.$dia_actual.'">' . $dia_actual . '</li>';
    }
  $dia_actual++;
}

//compruebo que celdas me faltan por escribir vacias de la última semana del mes
$ultimo_dia = calcula_numero_dia_semana($ultimo_dia,$mes,$ano);
for ($i=++$ultimo_dia;$i<7;$i++){
  $aCalendario[] = '<li class="tdDisabled"></li>';
}

$smarty->assign("nombreMes", $nombre_mes);
$smarty->assign("ano", $ano);
$smarty->assign("calendario", $aCalendario);
$smarty->assign("eventos", $aEventos);

$calendario = $smarty->fetch("calendario.tpl");

echo $calendario;

?>
