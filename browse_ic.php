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
$fname='ic';

#$fname = $_GET['f'];
//print $fname;
include'for_browse.php';
print"<center><h2>Browse</h2></center>";

if($fname == 'ic'){///////////////////////////////////Name////////////////////////////
side_bar();
$all_rec = file("plant_family_unique");
$rec = count($all_rec);
print"<b><center>IC50[nM] (Unique) = $rec</center></b><br>";
print"<table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>IC50[nM]</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#3E6990'><font color='white' size='3'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('plant_family_unique','r'); 
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
//print $name."<br>";
$name = addslashes($name);
$res = mysql_query("select 'ic' from data where ic like '$name'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
#print $name_send."\n";
print"<tr><td><a href='search-nidb.php?ic=$name_send&type=ic'><b><i>$name</i></b></a>";

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
print"<table bordercolor='black' bgcolor='#B4CFEC' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#006699'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>Plant family</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#006699'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('plant_genus_species_unique','r');
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
if(preg_match("/$sp.*/",$name)){
$name = addslashes($name);
$res = mysql_query("select 'ic' from data where ic like '%$name%'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
#print $name_send."\n";
print"<tr><td><a href='search-nidb.php?ic=$name_send&type=ic'><b><i>$name</i></b></a>";

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
}
#footer();
?>
