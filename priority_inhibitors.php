<?php
## by rakesh4osdd@gmail.com 
## read tsv file and display html table
include'template-nidb_new.php';
include 'sidemenu.php';
include'con1.php';
##include'for_browse.php';
print "<title>Priority Inhibitors</title>";
print"<center><h2>Priority Inhibitors Compounds</h2></center>";
#side_bar();
echo "<style>
thead {color:white;}
tbody {color:black;}
tfoot {color:red;}

table, th, td {
  border: 1px solid black;
}
</style>";
//print"<center><h3>Priority Inhibitors Compounds</h3></center>";
$row = 1;
if (($handle = fopen("priority_inhibitors.tsv", "r")) !== FALSE) {
   
    echo '<table border="1" align=center>';
   
    while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead bgcolor="#3E6990"><tr>';
        }else{
            echo '<tr>';
        }
       
        for ($c=0; $c < $num; $c++) {
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th>'.$value.'</th>';
            }else{
		if($c==0){echo "<td><a href=search-nidb.php?compound_id=$value&type=compound_id target=_blank>".$value.'</a></td>';}

		else{
                echo '<td>'.$value.'</td>';
		}
		#echo "$value<br>";
            }
        }
       
        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
	
    }
    echo '</tbody></table>';
    fclose($handle);

}
print "<div style=\"text-align:center;font-weight: bold;\";  ><br>
List of prioritized NVIs along with their biological activity, drug likeness profile and structural similarity to antiviral libraries.<br>
&#10004; for 'YES' and &#10008; for 'NO'<br>
* minimum value has been reported<br>
** minimum effective concentration<br>Accepted, Rejected, and PAINS fields are taken from FaF Drugs4</div>";
?>
