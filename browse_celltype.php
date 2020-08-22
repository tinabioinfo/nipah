<?php
include'template-nidb_new.php';
include'con1.php';
#head();
#side();

if(isset($_GET['f'])){
    $fname = $_GET['f'];
}
global $fname;
$fname='cell_type';
#$fname = $_GET['f'];
include'for_browse.php';
print"<center><h2>Browse</h2></center>";

if($fname == 'cell_type'){///////////////////////////////////Name////////////////////////////
side_bar();
$all_rec = file("extract_final_unique.txt");
$rec = count($all_rec);
print"<center><b>Cell Type (Unique) = $rec</center></b><br>";
print"<table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>Cell Type</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#3E6990'><font color='white' size='3'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('extract_final_unique.txt','r'); 
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
$name = ucfirst(addslashes($name));
$res = mysql_query("select 'cell_type' from data where cell_type like '%$name%'");
$entries_num = mysql_num_rows($res);

$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='search-nidb.php?cell_type=$name_send&type=cell_type'><b><i>$name</i></b></a>";


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
side_bar();
#print"<table id='tableTwo' class='yui' border='3' align='center' valign='top'>";
print"<table bordercolor='black' border='3' align='center' id='tableTwo' class='yui'>";
print"<thead><tr><th align='center' bgcolor='#3E6990'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>Plant family</b>&nbsp;&nbsp;&nbsp;</a></font></th><th align='center' bgcolor='#3E6990'><font color='white' size='3'><a href='#' title='Click Header to Sort'><b>No. of Entries</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>";
$result = fopen('plant_genus_species_unique','r');
echo"<tbody>";
while(!feof($result)){
$name = fgets($result);
$name = preg_replace("/\n$/","",$name);
if(preg_match("/$sp.*/",$name)){
$name = addslashes($name);
$res = mysql_query("select 'cell_type' from data where cell_type like '%$name%'");
$entries_num = mysql_num_rows($res);
$name_send = urlencode($name);
if($name_send !== ''){
print"<tr><td><a href='search-nidb.php?cell_type=$name_send&type=cell_type'><b><i>$name</i></b></a>";


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
