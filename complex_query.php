<?php
# <!--Author: rakesh4osdd@gmail.com 26Aug2020 -->
include 'template-nidb_new.php';
include 'con2.php';
global $PHP;

if (isset($_SESSION['SCR_NAME_2'])) {
    $auth_name = $_SESSION['SCR_NAME_2'];
    $table = 'data2';
    $display = array();
}

print <<<HTML
<title>NVIK Query Builder</title>
<style>
    .minitable {min-width:1200px; min-height: 280px; margin:10px; padding-right: 250px;}
    th{color: blue; }
    td{padding:5px;}
    a.rollover img {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 100px;
    }
    
    a.rollover:hover > img {
            width: 200px;
    }
    
</style>

	<!-- jQuery -->
<script src="js/jquery-latest.min.js"></script>
	<!-- bootstrap css-->
	<link href="bootstrap-v3.min.css" rel="stylesheet">
	<link href="css/theme.bootstrap.css" rel="stylesheet">
	<!-- Tablesorter: required -->
	<script src="js/jquery.tablesorter.js"></script>
	<script src="js/jquery.tablesorter.widgets.js"></script>
<script>

$(function() {

	$.extend($.tablesorter.defaults, {
		widthFixed: true,
		widgets : ['zebra','columns'],
		sortList : [0]
	});
	
	$('.demo').tablesorter();
	
	// grey & dropbox themes need the {icon} for header icons
	$('.tablesorter-dropbox,.tablesorter-grey').tablesorter({
		headerTemplate: '{content}{icon}' // dropbox theme doesn't like a space between the content & icon
	});
	
	$('.tablesorter-bootstrap').tablesorter({
		theme : 'bootstrap',
		headerTemplate: '{content} {icon}',
		widgets    : ['zebra','columns', 'uitheme']
	});
	
	$('.tablesorter-jui').tablesorter({
		theme : 'jui',
		headerTemplate: '{content} {icon}',
		widgets    : ['zebra','columns', 'uitheme']
	});
	
});
</script>

<script type="text/javascript">
    function formValidation(form){
        var ccc = document.getElementById("first_box").value;
        if(ccc == "") {
        alert("Please enter a keyword !!!");
        return false;
        }
    }
    var intTextBox=0;
    
    //FUNCTION TO ADD TEXT BOX ELEMENT
    function addElement(){
        intTextBox = intTextBox + 1;
        var contentID = document.getElementById("content");
        var newTBDiv = document.createElement("div");
        newTBDiv.setAttribute("id","strText"+intTextBox);
        newTBDiv.innerHTML = "<select name='op[]'> <option value='and'>AND</option> <option value='or'>OR</option> </select><select name='fieldsi[]'><option value='all'>All Fields</option><option value='' align='center' style='background-color: #FFCCCC'>Inhibitor Information</option><option value='inhibitor'>Inhibitor Name</option><option value='assay_type'>Assay Type</option><option value='assay_dis'>Assay Discription</option><option value='target'>Target</option><option value='cell_type'>Cell Type</option><option value='ic'>IC50 (in nM)</option><option value='ec'>EC50 (in nM)</option><option value='' align='center' style='background-color: #FFCCCC'>Physicochemical Properties</option><option value='mol_wt'>Mol Wt.</option><option value='smiles'>SMILES</option><option value='XLogP'>XlogP</option><option value='TopoPSA'>PSA</option><option value='nHBd'>H-Bond Donor</option><option value='nHBa'>H-Bond Acceptor</option><option value='nRotB'>No. of Rotatable Bond Count</option><option value='' align='center' style='background-color: #FFCCCC'>Miscellaneous</option><option value='pubchem_id'>PubChem ID</option><option value='chemspider'>ChemSpider ID</option><option value='pubmed_source_lit'>PubMed ID (Source Literature)</option><option value='' align='center' style='background-color: #FFCCCC'>Reference</option><option value='ref'>Reference</option></select><select name='fieldsi_op[]'><option value='like'>LIKE</option><option value='not like'>Not LIKE</option><option value='equal'>Equal to</option><option value='not_equal'>Not equal to</option><option value='='> = </option><option value='!='> != </option><option value='<='> <= </option><option value='>='> >= </option><option value='<'> < </option><option value='>'> > </option></select> <input type='text' id='" + intTextBox + "' name='keyword[]'>";
        contentID.appendChild(newTBDiv)
    }
    
    //FUNCTION TO REMOVE TEXT BOX ELEMENT
    function removeElement(){
    if(intTextBox != 0){
        var contentID = document.getElementById("content");
        contentID.removeChild(document.getElementById("strText"+intTextBox));
        intTextBox = intTextBox-1;
        }
    }
</script>

<font face="Verdana"><center><h2><b>Query Builder</b></h2></font>
<p align='center'><b>Users may build complex queries using the logical operators 'AND' and 'OR'. Each sub-query can be built <br>using other operators such as LIKE, NOT LIKE, EQUAL and NOT EQUAL TO while dealing with strings<br> like
words or letters and =, !=, <=, >=, < and > while dealing with numerical values.<br> The Query builder aids to the flexibility of performing search on a number of fields simultaneously.</p></b><br>
<form name='form1' action='$PHP' method='post' onsubmit="return formValidation(this);">
<select name='fieldsi[]' style="font-size:20px">
<option value='all'>All Fields</option>
<option value='inh' align='center' style="background-color: #FFCCCC">Inhibitor Information</option>
<option value='inhibitor'>Inhibitor Name</option>
<option value='assay_type'>Assay Type</option>
<option value='assay_dis'>Assay Description</option>
<option value='target'>Target</option>
<option value='cell_type'>Cell Type</option>
<option value='ic'>IC50 (in nM)</option>
<option value='ec'>EC50 (in nM)</option>
<option value='physiochem' align='center' style="background-color: #FFCCCC">Physicochemical Properties</option>
<option value='mol_wt'>Mol Wt.</option>

<option value='smiles'>SMILES</option>
<option value='XLogP'>XlogP</option>
<option value='TopoPSA'>PSA</option>
<option value='nHBd'>H-Bond Donor</option>
<option value='nHBa'>H-Bond Acceptor</option>
<option value='nRotB'>No. of Rotatable Bond Count</option>
<option value='misc' align='center' style="background-color: #FFCCCC">Miscellaneous</option>
<option value='pubchem_id'>PubChem ID</option>
<option value='chemspider'>ChemSpider ID</option>
<option value='pubmed_source_lit'>PubMed ID (Source Literature)</option>
<!--option value='' align='center' style="background-color: #FFCCCC">Reference</option>
<option value='ref'>Reference 1</option -->
</select>
<select name='fieldsi_op[]' style="font-size:20px">
<option value='like'>LIKE</option>
<option value='not like'>Not LIKE</option>
<option value='equal'>Equal to</option>
<option value='not_equal'>Not equal to</option>
<option value='='> = </option>
<option value='!='> != </option>
<option value='<='> &lt= </option>
<option value='>='> &gt= </option>
<option value='<'> &lt </option>
<option value='>'> &gt </option>
</select>

<input type='text' name='keyword[]' id='first_box' size='50' style="font-size: 20px;">
<!-- input type="button" onclick="addElement()" value="+">&nbsp;<input type="button" onclick="removeElement()" value="-" -->
<div id="content" ></div>
<br>
<input type='submit' value='Search' style="font-size:20px">
</form>
<br>
<br>

HTML;

if (isset($_POST['keyword'])) {
    $key = $_POST['keyword'];
    // $op = $_POST['op'];
    $field = $_POST['fieldsi'];
    $field_op = $_POST['fieldsi_op'];
    /*
     * print $key[0]."<br>";
     * print $key[1]."<br>";
     * print $op[0]."<br>";
     * print $op[1]."<br>";
     * print $field[0]."<br>";
     * print $field[1]."<br>";
     */
    for ($i = 0; $i < count($key); $i ++) {
        # print $i."<br>";
        # print $key[$i]."<br>";
        $keyw = $key[$i];
        # print $field[$i]."<br>";
        $field_val = $field[$i];
        $field_op_val = $field_op[$i];
        # # Coding for Complex Query Start
        if ($i > 0) {
            $j = $i - 1;
            # print $op[$j]."<br>";
            global $op;
            $operate = $op[$j];
            if ($operate != 'not') {
                if ($field_val == 'all') {
                    $result = mysql_query("SHOW COLUMNS FROM $table");
                    
                    if (mysql_num_rows($result) > 0) {
                        $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            if ($i == 0) {
                                $fi_name = $row[0];
                                $display["$fi_name"] = 0;
                                /*
                                 * if(preg_match('/\./', $fi_name)){
                                 *
                                 * }
                                 * else{
                                 * $fi_name = 'iict_design.'."$fi_name";
                                 * }
                                 */
                                $qu_mul = $qu_mul . ' ' . $operate . ' ' . "$fi_name $field_op_val '%$keyw%'";
                                
                                print "$qu_mul = $qu_mul.' '.$operate.' '.$fi_name $field_op_val '%$keyw%'";
                            } else {
                                $fi_name = $row[0];
                                $display["$fi_name"] = 0;
                                /*
                                 * if(preg_match('/\./', $fi_name)){
                                 *
                                 * }
                                 * else{
                                 * $fi_name = 'iict_design.'."$fi_name";
                                 * }
                                 */
                                
                                $qu_mul .= " or " . "$fi_name $field_op_val '%$keyw%'";
                            }
                            $i ++;
                        }
                    }
                    
                    # echo $qu_mul."<br>";
                } else {
                    $display["$field_val"] = 0;
                    /*
                     * if(preg_match('/\./', $field_val)){
                     *
                     * }
                     * else{
                     * $field_val = 'iict_design.'."$field_val";
                     * }
                     */
                    global $qu_mul;
                    if (! preg_match('/[like]/i', $field_op_val)) {
                        $qu_mul = $qu_mul . ' ' . $operate . ' ' . "$field_val $field_op_val $keyw";
                    } else if (preg_match('/equal/i', $field_op_val)) {
                        $qu_mul = $qu_mul . ' ' . $operate . ' ' . "$field_val ='$keyw'";
                    } else if (preg_match('/not_equal/i', $field_op_val)) {
                        $qu_mul = $qu_mul . ' ' . $operate . ' ' . "$field_val !='$keyw'";
                    } else {
                        $qu_mul = $qu_mul . ' ' . $operate . ' ' . "$field_val $field_op_val '%$keyw%'";
                    }
                }
            } else {
                $qu_mul = $qu_mul . ' ' . "and $field_val not like '%$keyw%'";
            }
        } # # Coding for Complex Query End
        
        # # Coding for Single Query Start
        else {
            # echo $table."Y";
            if ($field_val == 'all' || $field_val == 'inh' || $field_val == 'physiochem' || $field_val == 'misc') {
                $result = mysql_query("SHOW COLUMNS FROM $table");
                
                if (mysql_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysql_fetch_array($result)) {
                        if ($i == 0) {
                            $fi_name = $row[0];
                            $display["$fi_name"] = 0;
                            /*
                             * if(preg_match('/\./', $fi_name)){
                             *
                             * }
                             * else{
                             * $fi_name = 'iict_design.'."$fi_name";
                             * }
                             */
                            if (! preg_match('/[like]/i', $field_op_val)) {
                                $qu = "$fi_name $field_op_val $keyw";
                            } else if (preg_match('/equal/i', $field_op_val)) {
                                $qu = "$fi_name ='$keyw'";
                            } else if (preg_match('/not_equal/i', $field_op_val)) {
                                $qu = "$fi_name !='$keyw'";
                            } else {
                                $qu = "$fi_name $field_op_val '$keyw'";
                            }
                        } else {
                            $fi_name = $row[0];
                            $display["$fi_name"] = 0;
                            /*
                             * if(preg_match('/\./', $fi_name)){
                             *
                             * }
                             * else{
                             * $fi_name = 'iict_design.'."$fi_name";
                             * }
                             */
                            if (! preg_match('/[like]/i', $field_op_val)) {
                                $qu .= " or " . "$fi_name $field_op_val $keyw";
                            } else if (preg_match('/equal/i', $field_op_val)) {
                                $qu .= " or " . "$fi_name ='$keyw'";
                            } else if (preg_match('/not_equal/i', $field_op_val)) {
                                $qu .= " or " . "$fi_name !='$keyw'";
                            } else {
                                $qu .= " or " . "$fi_name $field_op_val '%$keyw%'";
                            }
                        }
                        $i ++;
                    }
                }
            } else {
                /*
                 * if(preg_match('/\./', $field_val)){
                 *
                 * }
                 * else{
                 * $field_val = 'iict_design.'."$field_val";
                 * }
                 */
                $display["$field_val"] = 0;
                if (! preg_match('/[like]/i', $field_op_val)) {
                    $qu = "$field_val $field_op_val $keyw";
                } else if (preg_match('/equal/i', $field_op_val)) {
                    $qu = "$field_val ='$keyw'";
                } else if (preg_match('/not_equal/i', $field_op_val)) {
                    $qu = "$field_val !='$keyw'";
                } else {
                    $qu = "$field_val $field_op_val '%$keyw%'";
                }
            }
        }
        # # Coding for Single Query End
    }
    
    $display["compound_id"] = 0;
    $display["compound_image"] = 0;
    $display["inhibitor"] = 0;
    $display["ic"] = 0;
    $display["ec"] = 0;
    $display["target"] = 0;
    foreach ($display as $key => $value) {
        # print"$key<br>";
        global $dis;
        $dis = "$dis" . "$key,";
    }
    $dis = preg_replace("/,$/", '', $dis);
    global $qu_mul;
    $qu_pre = "select $dis from $table where ";
    $sql = "$qu_pre" . "$qu" . "$qu_mul";
    # #exit;
    # echo"$sql<br>";
    
    # ################################
    # ### Display Results Coding Start
    # ################################
    # echo"$sql<br>";
    ## start of logic for remove empty value column
    $res1 = mysql_query($sql) or die(mysql_error());
    # # check for empty column header
    for ($i = 0; $i < mysql_num_fields($res1); $i ++) {
        $f_name1 = mysql_field_name($res1, $i);
        if ($f_name1 == 'compound_image') {
            # print $f_name1." keep $i <br>";
            $keep_header_i = $i;
        }
    }
    for ($i = 0; $i < 24; $i ++) {
        $flag[$i] = 0;
    }
    # # check for empty column value
    while ($row1 = mysql_fetch_array($res1)) {
        for ($j = 0; $j < mysql_num_fields($res1); $j ++) {
            
            $f_name1 = mysql_field_name($res1, $j);
            $f_val1 = $row1[$f_name1];
            # ## check code loop
            # print "initial $f_val <br>";
            if (is_null($f_val1) && $keep_header_i != $j && $flag[$j] != 1) {
                # print "<br>remove $f_val1 $j <br>";
                $no_value[$j] = $j;
            } else {
                $no_value[$j] = 30; # # 30 is just more than total column number for compare
                $flag[$j] = 1;
            }
            # ##
        }
    }
    ## End of logic for remove empty value column
    
    $res = mysql_query($sql) or die(mysql_error());
    $res_no = mysql_num_rows($res);
    if ($res_no == 0) {
        print "<font color='brown' size='6'><b>No Record Found in NVI's database coressponding to your keyword !!!</b></font><br><br><input type='button' value='Go Back' onClick='history.go(-1)'><br><br><br>";
    } else {
        $tot_res = mysql_num_rows($res);
        print <<<HTML
                                <!--br><input type='button' value='Go Back' onClick='history.go(-1)'-->
                                <div class="minitable">
                                <b>Total Records Found = $tot_res</b>
                                <br>
                                <br>
HTML;
        // $headers = array('compound_id' => 'Compound ID','compound_image' => 'Compound Structure','plant_name' => 'Plant Source','plant_family' => 'Source Family','origin' => 'Origin','com_name' => 'Common Name','part_used' => 'Plant Part Used','extract' => 'Extract','target_bacteria' => 'Target Bacteria','assay_test' => 'Assay / Test Done','pos_control' => 'Positive Control Used (conc.)','inhibition' => 'Inhibition [%]','activity' => 'Activity [MIC] &micro;g/ml','activity_in_dilutn' => 'Activity (In terms of dilution)','inhibition_zone' => 'Activity (Zone of inhibition in mm)','active_comp_identified' => 'Active Compound Identified','pubchem_id' => 'PubChem ID','ethno_med_info' => 'Ethnomedicinal Information','pubmed_source_lit' => 'PubMed ID [Source Literature]','ext_pre' => 'Extract Preparation','source_class' => 'Classification [Source Based]','chem_class' => 'Chemical Classification [Active Compound]','tar_pro' => 'Target Protein','media_antimicro_test' => 'Media / Broth Used [Antimicrobial Assay/Test]','conc_pos_control' => 'Active Concentration [Positive Control]','cyto_assay' => 'Cytotoxicity Assay [AID]','cyto_conc_ext' => 'Cytotoxic Concentration of Extract / Active Compound [&micro;g/ml]','ref1' => 'Reference 1','ref2' => 'Reference 2','ref3' => 'Reference 3', 'date' => 'Date', 'mol_wt' => 'Molecular Weight', 'xlog_p' => 'XLogP', 'tpsa' => 'PSA', 'hb_d' => 'H-bond Donor', 'hb_a' => 'H-bond Acceptor', 'n_rot_bond' => 'No. of Rotatable Bond Count', 'n_ring' => 'No. of Rings', 'n_nitro' => 'No. of N', 'n_O' => 'No. of O', 'n_S' => 'No. of S', 'mol_formula' => 'Molecular Formula', 'smiles' => 'SMILES');
        // $headers = array('compound_id' => 'Compound ID','compound_image' => 'Compound Structure','inhibitor' => 'Inhibitor','ic' => 'IC50 (in nM)','drug_bank' => 'Drug Bank ID','chemspider' => 'ChemSpider ID','target' => 'Target','assay_type' => 'Assay Type','assay_dis' => 'Assay Description','source' => 'Assay Source','outcome' => 'Outcome','ec' => 'EC50 (in nM)','cell_type' => 'Cell Type','pubchem_id' => 'PubChem ID','pubmed_source_lit' => 'PubMed ID [Source Literature]','ref' => 'Reference(s)','ref2' => 'Reference 2','ref3' => 'Curator', 'date' => 'Date', 'mol_wt' => 'Molecular Weight', 'xlog_p' => 'XLogP', 'tpsa' => 'PSA', 'hb_d' => 'H-bond Donor', 'hb_a' => 'H-bond Acceptor', 'n_rot_bond' => 'No. of Rotatable Bond Count', 'n_ring' => 'No. of Rings', 'n_nitro' => 'No. of N', 'n_O' => 'No. of O', 'n_S' => 'No. of S', 'mol_formula' => 'Molecular Formula', 'smiles' => 'SMILES');
        $headers = array(
            'compound_id' => 'Compound ID',
            'compound_image' => 'Compound Structure',
            'inhibitor' => 'Inhibitor',
            'pubchem_id' => 'PubChem ID',
            'drug_bank' => 'Drug Bank ID',
            'chemspider' => 'ChemSpider ID',
            'smiles' => 'SMILES',
            'mol_wt' => 'Molecular Weight (in g/mol)',
            'target' => 'Target',
            'assay_type' => 'Assay Type',
            'assay_dis' => 'Assay Description',
            'source' => 'Assay Source',
            'outcome' => 'Outcome',
            'ic' => 'IC50 (in nM)',
            'ec' => 'EC50 (in nM)',
            'nHBd' => 'H-bond Donor',
            'nHBa' => 'H-bond Acceptor',
            'nRotB' => 'No. of Rotatable Bond Count',
            'TopoPSA' => 'PSA',
            'XLogP' => 'XLogP',
            'cell_type' => 'Cell Type',
            'ref' => 'Reference(s)',
            'pubmed_source_lit' => 'PubMed ID [Source Literature]',
            'ref3' => 'Curator'
        );
        
        echo "<table class=\"tablesorter-bootstrap\" border = 2 align = center>";
        echo "<thead bgcolor=#3E6990 style=\"color:white;\">";
        for ($i = 0; $i < mysql_num_fields($res); $i ++) {
            $f_name = mysql_field_name($res, $i);
            # print $f_name."<br>";
            $header_full = $headers[$f_name];
            if ($no_value[$i] != $i) {
                print "<th><b>$header_full</b></th>";
            }
        }
        print "</thead>";
        print "<tbody>";
        while ($row = mysql_fetch_array($res)) {
            print "<tr>";
            for ($i = 0; $i < mysql_num_fields($res); $i ++) {
                
                $f_name = mysql_field_name($res, $i);
                $f_val = $row[$f_name];
                
                if ($f_name == 'compound_id') {
                    print "<td><a href='search-nidb.php?compound_id=$f_val&type=compound_id' title='Click to See Details' style='text-decoration: none;padding-right:20px;'>$f_val</a></td>";
                }
                else if ($f_name == 'compound_image') {
                    $c_id = $row['compound_id'];
                    $res_pub = mysql_query("select pubchem_id from $table where compound_id='$c_id'");
                    $all_re = mysql_fetch_array($res_pub);
                    $pub_id = $all_re['pubchem_id'];
                    if (preg_match("/\d+_self_drawn/", $c_id)) {
                        $dir = 'data/Structures_Marvin_conversion';
                        $pub_id = preg_replace("/_self_drawn/", '', $pub_id);
                    } else if (preg_match("/\d#SID/", $pub_id)) {
                        $pub_id = preg_replace("/#.*/", '', $pub_id);
                        $dir = 'data/structures';
                        # print $pub_id."<br>";
                    } else if (preg_match("/\d+/", $pub_id)) {
                        $dir = 'data/structures';
                    }
                    if (preg_match("/\d+/", $c_id)) {
                        print "<td valign='top'>";
                        if (! file_exists("store_data/str_images/$c_id.png")) {
                            $a = file("store_data/smiles.txt");
                            foreach ($a as $b) {
                                $all = split("\t", $b);
                                $smi_id = $all[1];
                                $smi = $all[0];
                                # $smi = preg_replace("\n$","",$smi);
                                if (preg_match("/.*$c_id.*/", $smi_id)) {
                                    # print $all[0]."<br>";
                                    # print $idi;
                                    exec("/usr/bin/obabel -:\"$all[0]\" -O store_data/str_images_smile/$c_id.svg");
                                    print "<a href='' class='rollover'><img src='store_data/str_images_smile/$c_id.svg'></a>";
                                    
                                    # print"<img src='http://pubchem.ncbi.nlm.nih.gov/image/imgsrv.fcgi?t=l&cid=$all[0]'>";
                                    
                                    break;
                                }
                                # print "$b<br>";
                            }
                        } else {
                            print "<a href='store_data/str_images/$c_id.png' class='rollover'><img src='store_data/str_images/$c_id.png'></a>";
                        }
                        echo '</td>';
                    } else {
                        # print "<td>$pub_id</td>";
                        print "<td>$c_id</td>";
                    }
                }
                else if ($f_name == 'ref'){
                    print "<td><a href=\"$f_val\" target= _blank>$f_val</a></td>";
                    
                }
                else {
                    if ($no_value[$i] != $i) {
                        print "<td>$f_val</td>";
                    }
                }
            }
            print "</tr>";
        }
        print "</tbody>";
        print "</table><br><br><br>";
        # print"$sql<br>";
    }
}
echo "</div>";
?>