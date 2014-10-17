<?php
error_reporting(0);
	$conn = mysql_connect("localhost","root","CxzYD8ojX4");
	mysql_select_db("triart",$conn);
    
    function myToDate($f)
    {
        list($y,$m,$d) = explode("-",$f);
        return $d . "/" . $m . "/" . $y;
    }
    
    function dateToMy($f)
    {
        list($d,$m,$y) = explode("/",$f);
        return $y . "-" . $m . "-" . $d;
    }		
?>
