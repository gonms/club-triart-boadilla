<?php
ini_set(display_errors,true);
error_reporting(E_ALL);
/* SMARTY SETUP */
require('../smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
$smarty->setConfigDir('../configs/');
$smarty->setCacheDir('../cache/');
//$smarty->debugging = true;

include("../funciones.inc.php");

$sql = "SELECT * FROM noticias_orden";
$res = mysql_query($sql);
$aNoticias = array();
while ($row = mysql_fetch_array($res))
{
	$sql = "SELECT * FROM noticias WHERE id = '" . $row['orden'] . "'";
	$resNoticias = mysql_query($sql);
	$rowNoticia = mysql_fetch_array($resNoticias);
	$aNoticias[] = array(
						"imagen" => $rowNoticia['foto'],
						"fecha" => $rowNoticia['fecha'],
						"titulo" => utf8_encode($rowNoticia['titulo']),
						"cuerpo" => utf8_encode($rowNoticia['cuerpo']),
						"documento" => $rowNoticia['documento']
						);
}
mysql_close($conn);

$smarty->assign("noticias", $aNoticias);

$noticias = $smarty->fetch("noticias.tpl");

echo $noticias;

?>