<?php
function side_bar(){
$res_all_biophytmol = mysql_query("SELECT *from data");
print"<table align='center' valign='top' border=2 style='border-collapse: collapse; text-align: center; background: #f1f1f1; text-color: black;' width=800px;>";
print"<thead>";
print"<tr><td bgcolor='#3E6990' align='center' colspan=4><font color='white'><b>Small Molecule Inhibitors</b></font></td></tr>";
for($i=0;$i<mysql_num_fields($res_all_biophytmol);$i++){
$f_name = mysql_field_name($res_all_biophytmol, $i);
if($f_name == 'inhibitor' ||$f_name =='target'||$f_name == 'assay_type'||$f_name == 'cell_type'|| $f_name == 'ic'  || $f_name == 'ec'||$f_name=='pubmed_source_lit') 
{
    $fname_full = array('inhibitor' => 'Inhibitors','target'=>'Targets/Mechanisms' , 'assay_type' => 'Assay Type','cell_type' => 'Cell Type','ic' => 'IC50 (in nM)', 'ec' => 'EC50( in nM)','pubmed_source_lit' => 'Pubmed (Source Literature)');
    $name_dis = $fname_full[$f_name];

   
 if($f_name == 'inhibitor'){
    print"<tr><td><b><a href='browse_inhibitor.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td>";}
  else if($f_name == 'cell_type'){
print"<tr><td><b><a href='browse_celltype.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}  
else if($f_name == 'extract'){
print"<tr><td><b><a href='browse_extract.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td>";
}
else if($f_name == 'target'){
print"<tr><td><b><a href='browse_target.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'ic'){
print"<tr><td><b><a href='browse_ic.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'ec'){
print"<tr><td><b><a href='browse_ec.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'pubmed_source_lit'){
print"<tr><td><b><a href='browse_pubmed.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'assay_type'){
print"<tr><td><b><a href='c_browse_assay.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else {
if($f_name == 'assay_tesot' || $f_name == 'inhibition' ){
$s1 = '<tr><td>';
$s2 = '</td>';
}
else{
#$s1 = '<tr><td colspan=2>';
$s2 = '</td>';
$s1 = '</tr>';
}
print"$s1<b><a href='browse.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b>$s2";
}
}
}
print"<tr><td bgcolor='#3E6990' align='center' colspan=4><font color='white'><b>Other Inhibitors</b></font></td></tr>";
print"<tr><td><b><a href='browse_other_inhibitor.php' style='text-decoration: none;'>Other Inhibitor Compounds</a></b></font></td></tr>";
print"</thead>";
print"</table><br><br><br>";
#echo"<br><br><br><br><br><center><h2><u>Browsing Results</u></h2></center>";}
}
?>
