<?php
error_reporting(0);
	$conn = new mysqli("localhost","root","CxzYD8ojX4","triart");
    
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
