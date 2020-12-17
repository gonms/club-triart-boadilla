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
$res = $conn->query($sql);
$aDocumentos = array();
while ($row = $res->fetch_array())
{
	$sql = "SELECT * FROM documentos WHERE id = '" . $row['orden'] . "'";
	$resDocumentos = $conn->query($sql);
	$rowDocumento = $resDocumentos->fetch_array();
	$aDocumentos[] = array(
						"titulo" => utf8_encode($rowDocumento['titulo']),
						"documento" => $rowDocumento['doc']
						);
}
$conn->close();

$smarty->assign("id", rand(1,3));
$smarty->assign("documentos", $aDocumentos);

$club = $smarty->fetch("club.tpl");

echo $club;

?>
