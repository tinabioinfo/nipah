<?php
include'template-nidb_new.php';
include'con1.php';
include 'sidemenu.php';
#head();
#side();
print<<<HTML
<title>NVIK Physicochemical Properties</title>
<style>
a.rollover img {
        width: 180px;
        height: 175px;
}

a.rollover:hover > img {
        width: 220px;
        height: 215px;
          }
th { word-wrap: break-word;max-width:150px; }
</style>
<br><br>
<center><h2><b>Table: Selected Physicochemical Properties of NVI's molecules</b></h2></center>
<br><br>
<center><table id='tableTwo' class='yui' border='3' style='margin-right: 90px';></center>
<thead><tr>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>NVI's Molecule</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>Compound ID</b>&nbsp;&nbsp;&nbsp</a></font></th>
<th align='center' bgcolor='#3E6990'><font color='white' size='3'><b>H-bond Acceptor</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>H-bond Donor</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>No. of rotatable bonds</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b> TopoPSA</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>Molecular Weight (g/mol)</b>&nbsp;&nbsp;&nbsp;</a></font></th>
<th align='center' bgcolor='#3E6990' class='tableHeader'><font color='white' size='3'><b>XLogP</b>&nbsp;&nbsp;&nbsp;</a></font></th></tr></thead>
<tbody>
HTML;
#$result = fopen('BioPhytMol_Physico_Prop.txt','r');
#$result = mysql_query("select pubchem_id,hb_a,hb_d,tpsa,mol_wt,xlog_p from amphydb where pubchem_id!='' and pubchem_id!='NR' and pubchem_id!='N/A'") or die(mysql_error());

#$result = mysql_query("select pubchem_id,compound_id,nHBa,nHBd,nRotB,TopoPSA,mol_wt,XLogP from data where pubchem_id REGEXP '[[:digit:]]' or pubchem_id REGEXP '%_self_drawn' GROUP BY pubchem_id") or die(mysql_error());

$result = mysql_query("select pubchem_id,compound_id,nHBa,nHBd,nRotB,TopoPSA,mol_wt,XLogP from data where compound_id REGEXP '[[:digit:]]' or compound_id REGEXP '%_self_drawn' GROUP BY compound_id") or die(mysql_error());

while($sep_val=mysql_fetch_array($result)){
#$name = fgets($result);
#$name = preg_replace("/\n$/","",$name);
#print $name."<br>";
#$sep_val = explode("\t",$name);
#if($name !== ''){
#print $name_send."\n";
$pub_id = $sep_val[1];
#$id = $sep_val[1];
#$id2 = $id ;
/*
if(preg_match("/\d+_self_drawn/",$pub_id)){
$pub_id = preg_replace("/_self_drawn/",'',$pub_id);
print"<tr><td align='center'><a href='search-nidb.php?pubchem_id=$pub_id&type=pubchem_id' title='Click to See Details' target='_blank'><b><i>$pub_id</i></b></a><br><a href='' class='rollover'><img src='store_data/str_images/$pub_id.png' width='180' height='105'></a></td>";

#print "<tr><td align='center'><a href='search-nidb.php? compound_id=$id2 &type=compound_id' target='_blank'>$id2</a></td></tr>";
}*/
if($pub_id==$pub_id)
{
	print"<tr><td align='center'><a href='search-nidb.php?compound_id=$pub_id&type=compound_id' title='Click to See Details' target='_blank'><b><i>$pub_id</i></b></a><br><a href='' class='rollover'><img src='store_data/str_images/$pub_id.png' width='180' height='105'></a></td>";
#print"<tr><td align='center'><a href='' class='rollover'><img src='store_data/str_images/$pub_id.png' width='180' height='105'></a></td>";
}
else{
print"<tr><td align='center'><a href='search-nidb.php?pubchem_id=$sep_val[0]&type=pubchem_id' title='Click to See Details' target='_blank'><b><i>$sep_val[0]</i></b></a><br><a href='' class='rollover'><img src='http://pubchem.ncbi.nlm.nih.gov/image/imgsrv.fcgi?t=l&cid=$sep_val[0]' width='180' height='105'></a></td>";
}

#print"<br><a href='http://crdd.osdd.net/drugpedia/index.php/$name' target='_blank'><b>(Drugpedia Detail)</b></a>";
for($i=1;$i<=7;$i++){
print"<td align='center'>$sep_val[$i]</td>";
}
print"</tr>";
#}
}

print<<<HTML
</tbody>
<tfoot>
            
        </tfoot>

</table><br><br>

<?php}?>
<br>
<br><br>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br>
<br>
HTML;
#footer();
?>
