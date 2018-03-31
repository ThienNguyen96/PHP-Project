<?php
	$conn = mysql_connect("localhost","root","") or die("ERROR CONNECT !");
	mysql_select_db("pizza",$conn);
	mysql_query("set names utf8");
?>