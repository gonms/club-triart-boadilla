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

$sql = "SELECT * FROM documentos_orden";
$res = mysql_query($sql);
$aDocumentos = array();
while ($row = mysql_fetch_array($res))
{
	$sql = "SELECT * FROM documentos WHERE id = '" . $row['orden'] . "'";
	$resDocumentos = mysql_query($sql);
	$rowDocumento = mysql_fetch_array($resDocumentos);
	$aDocumentos[] = array(
						"titulo" => utf8_encode($rowDocumento['titulo']),
						"documento" => $rowDocumento['doc']
						);
}
mysql_close($conn);

$smarty->assign("id", rand(1,3));
$smarty->assign("documentos", $aDocumentos);

$club = $smarty->fetch("club.tpl");

echo $club;

?>