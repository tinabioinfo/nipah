<?php
include'template-nidb_new.php';
include'con1.php';
#head();
#side();
#include'css.html';
#side();
if(isset($_GET['f'])){
    $fname = $_GET['f'];
}


global $fname;
#$fname = $_GET['f'];
//print $fname;
include'for_browse.php';
print"<center><h2>Browse</h2></center>";


if($fname == 'assay_type')
side_bar();
$all_rec = file("category.txt");
$rec = count($all_rec);

print"<b><center>Assay_Type (Unique) = $rec </center></b><br>";
print"<table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>Assay_type</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#3E6990'><font color='white' size='3'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>"; 
$result = fopen('category.txt','r');
echo"<tbody>";


$name = preg_replace("/\n$/","","HTS immunolabeling assay");
$name = ucfirst(addslashes($name));
$res = mysql_query( "select `assay_type` from `data` where `assay_type` like '$name'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='search-nidb.php?assay_type=$name_send&type=assay_type'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
print"</td><td>$entries_num</td></tr>";
}


$name = preg_replace("/\n$/","","Citotoxicity Kit Assay");
#$name = ucfirst(addslashes($name));
#$res = mysql_query( "select `assay_type` from `data` where `assay_type` like '$name'");
#$entries_num = mysql_num_rows($res);

$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='browse_assay_cito.php'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
print"</td><td>4</td></tr>";
}



$name = preg_replace("/\n$/","","Cytopathic Effect (CPE) Visual Assay");
$name = ucfirst(addslashes($name));
$res = mysql_query( "select `assay_type` from `data` where `assay_type` like '$name'");

#$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='browse_assay_cyto.php'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
print"</td><td>3</td></tr>";
}


$name = preg_replace("/\n$/","","Reporter assay.");
$name = ucfirst(addslashes($name));
$res = mysql_query( "select `assay_type` from `data` where `assay_type` like '$name'");

#$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
#print $name_send."\n";
print"<tr><td><a href='browse_assay_rep.php'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
print"</td><td>2</td></tr>";
}

$name = preg_replace("/\n$/","","Cell-Cell Fusion Assay");
$name = ucfirst(addslashes($name));
$res = mysql_query( "select `assay_type` from `data` where `assay_type` like '%$name%'");

#$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='browse_assay_cell.php'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
print"</td><td>1</td></tr>";
}



?>
