<?php
$id = $_REQUEST['id'];
$db_id = "3D_".$_REQUEST['db_id'];
$dir = $_REQUEST['dir'];
//echo"$id";
$file = file("$dir/$id.sdf");
header("Content-type: text");
header("Content-Disposition: attachment; filename=$db_id.sdf");
foreach($file as $file2){
echo $file2;
}
#echo "id= $id,\n db_id= $db_id,\n dir=$dir,\n file= $file \n";
#include 'library/closedb.php';
#exit;
?>
