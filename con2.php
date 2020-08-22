<?php

$conn = mysql_connect('localhost' , 'nipah' , 'nipah_vm') or die(mysql_error());
mysql_select_db("nipah", $conn);

$db = "nipah";
$table = "data1";

?>