<?php
include'template-nidb_new.php';
include'con1.php';
#head();
#side();
#include'css.html';
#side();
if (isset($_GET['f'])) { 
	$fname = $_GET['f']; 
	}

global $fname;
// add for only show inhibitor without use of 'f' function //
$fname='inhibitor';
//$fname = $_GET['f'];
//print $fname;
include'for_browse.php';

/*
function side_bar(){
$res_all_biophytmol = mysql_query("select * from amphydb");
print"<table align='left' valign='top' border=2 style='border-collapse: collapse;'>";
print"<thead>";
print"<tr><td><font color='green'><b>Browse By</b></font></td></tr>";
for($i=0;$i<mysql_num_fields($res_all_biophytmol);$i++){
$f_name = mysql_field_name($res_all_biophytmol, $i);
#print $f_name."<br>";
if($f_name == 'plant_name' || $f_name == 'plant_family' || $f_name == 'origin' || $f_name == 'com_name' || $f_name == 'part_used' || $f_name == 'extract' || $f_name == 'target_bacteria' || $f_name == 'assay_test' || $f_name == 'inhibition' || $f_name == 'ethno_med_info' || $f_name == 'chem_class' || $f_name == 'active_comp_identified'){
$fname_full = array('plant_name' => 'Plant Source', 'plant_family' => 'Source Family', 'origin' => 'Origin', 'com_name' => 'Common Name', 'part_used' => 'Plant Part Used', 'extract' => 'Extract [%]', 'target_bacteria' => 'Target Bacteria', 'assay_test' => 'Assay / Test Done', 'inhibition' => 'Inhibition [%]', 'ethno_med_info' => 'Ethnomedicinal Information', 'source_class' => 'Classification [Source Based]', 'chem_class' => 'Chemical Classification [Active Compound]', 'active_comp_identified' => 'Active Compound Identified');
$name_dis = $fname_full[$f_name];
if($f_name == 'plant_name'){
print"<tr><td><b><a href='browse_plant.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'plant_family'){
print"<tr><td><b><a href='browse_family.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'com_name'){
#print"<tr><td><b><a href='browse_com_name.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'part_used'){
print"<tr><td><b><a href='browse_part.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'extract'){
print"<tr><td><b><a href='browse_extract.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'target_bacteria'){
print"<tr><td><b><a href='browse_target.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else if($f_name == 'origin'){
print"<tr><td><b><a href='browse_origin.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}
else{
print"<tr><td><b><a href='browse.php?f=$f_name' style='text-decoration: none;'>$name_dis</a></b></td></tr>";
}

}
}
print"</thead>";
print"</table>";
}
*/
#print"<fieldset name=KEYWORD style=\"height: auto; width: 1048px;\">";
print"<div width='1000'>";
print"<center><h2>Browse</h2></center>";

if($fname == 'inhibitor'){///////////////////////////////////Name////////////////////////////
side_bar();
$all_rec = file("nipah_inhibitor_sort.txt");
$rec = count($all_rec);
print"<b><center>Inhibitor_Name (Unique) = 98</center></b><br>";
print"<table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>Inhibitors</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#3E6990'><font color='white' size='3'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('nipah_inhibitor_sort.txt','r'); 
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
//print $name."<br>";
$name = addslashes($name);
$res = mysql_query("select 'inhibitor' from data where inhibitor = '$name'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
#print $name_send."\n";
#print"<tr><td><a href='browse_inhibitor.php?f=sp&sp_name=$name_send'><b><i>$name</i></b></a>";
print"<tr><td><a href='search-nidb.php?inhibitor=$name_send&type=inhibitor'><b><i>$name</i></b></a>";
#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";

print"</td><td>$entries_num</td></tr>";
}
}
print"</tbody>";
/*
print<<<HTML
<tfoot>
            <tr id="pagerTwo">
                <td colspan="25" style="border-right: solid 3px #7f7f7f;">
                        <img src="poly-img/first.png" class="first"/>
                        <img src="poly-img/prev.png" class="prev"/>
                        <input type="text" class="pagedisplay"/>
                        <img src="poly-img/next.png" class="next"/>
                        <img src="poly-img/last.png" class="last"/>
                        <select class="pagesize">
                                <option selected="selected"  value="50">50</option>

                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                                <option value="400">400</option>

                        </select>
                    </td>
            </tr>
        </tfoot>
HTML;
*/
print"</table><br><br>";
}
else if($fname == 'sp'){
$sp = $_GET['sp_name'];
//print $sp."<br>";
side_bar();
#print"<table id='tableTwo' class='yui' border='3' align='center' valign='top'>";
print"&nbsp&nbsp<br><table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#006699'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>Inhibitor Name</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#006699'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('plant_genus_species_unique','r');
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
if(preg_match("/$sp.*/",$name)){
$name = addslashes($name);
$res = mysql_query("select '$sp' from data where inhibitor like '$name%'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
#print $name_send."\n";
print"<tr><td><a href='search-nidb.php?inhibitor=$name_send&type=inhibitor'><b><i>$name</i></b></a>";

#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";

}
print"</td><td>$entries_num</td></tr>";

}

}
print"</tbody>";
/*
print<<<HTML
<tfoot>
            <tr id="pagerTwo">
                <td colspan="25" style="border-right: solid 3px #7f7f7f;">
                        <img src="poly-img/first.png" class="first"/>
                        <img src="poly-img/prev.png" class="prev"/>
                        <input type="text" class="pagedisplay"/>
                        <img src="poly-img/next.png" class="next"/>
                        <img src="poly-img/last.png" class="last"/>
                        <select class="pagesize">
                                <option selected="selected"  value="50">50</option>

                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                                <option value="400">400</option>

                        </select>
                    </td>
            </tr>
        </tfoot>
HTML;
*/
print"</table><br><br>";
print"</div>";
}
#footer();
?>
