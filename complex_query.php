<?php
# session_start();
include 'template-nidb_new.php';
# include'logo_nidb.html';include'simple_menu2.html';
include 'con2.php';
global $PHP;

if (isset($_SESSION['SCR_NAME_2'])) {
    $auth_name = $_SESSION['SCR_NAME_2'];
    $table = 'data2';
    $display = array();
}
# include'authentication.php';
print <<<HTML
<title>NVIK Query Builder</title>
<style>
a.rollover img {
        width: 180px;
        height: 175px;
}

a.rollover:hover > img {
        width: 380px;
        height: 440px;
}
</style>
<!--title>NVI's: Advance Search</title-->

<!--link href="stylep.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter-2.0.3.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter.filer.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter.pager.js" type="text/javascript"></script>

 <script type="text/javascript">
        $(document).ready(function() {
            $("#tableOne").tablesorter({ debug: false, sortList: [[0, 0]], widgets: ['zebra'] })
                        .tablesorterPager({ container: $("#pagerOne"), positionFixed: false })
                        .tablesorterFilter({ filterContainer: $("#filterBoxOne"),
                            filterClearContainer: $("#filterClearOne"),
                            filterColumns: [0, 1, 2, 3, 4, 5, 6],
                            filterCaseSensitive: false
                        });

            $("#tableTwo").tablesorter({ debug: false, sortList: [[0, 0]], widgets: ['zebra'] })
                .tablesorterPager({ container: $("#pagerTwo"), positionFixed: false })
                .tablesorterFilter({ filterContainer: $("#filterBoxTwo"),
                    filterClearContainer: $("#filterClearTwo"),
                    filterColumns: [0, 1, 2, 3, 4, 5, 6],
                    filterCaseSensitive: false
                });

            $("#tableTwo .header").click(function() {
                $("#tableTwo tfoot .first").click();
            });
        });


    </script-->

<script type="text/javascript">
function formValidation(form)
{
var ccc = document.getElementById("first_box").value;
if(ccc == "") {
alert("Please enter a keyword !!!");
return false;
}
}
var intTextBox=0;

//FUNCTION TO ADD TEXT BOX ELEMENT
function addElement()
{
intTextBox = intTextBox + 1;
var contentID = document.getElementById("content");
var newTBDiv = document.createElement("div");
newTBDiv.setAttribute("id","strText"+intTextBox);
newTBDiv.innerHTML = "<select name='op[]'> <option value='and'>AND</option> <option value='or'>OR</option> </select><select name='fieldsi[]'><option value='all'>All Fields</option><option value='' align='center' style='background-color: #FFCCCC'>Inhibitor Information</option><option value='inhibitor'>Inhibitor Name</option><option value='assay_type'>Assay Type</option><option value='assay_dis'>Assay Discription</option><option value='target'>Target</option><option value='cell_type'>Cell Type</option><option value='ic'>IC50 (in nM)</option><option value='ec'>EC50 (in nM)</option><option value='' align='center' style='background-color: #FFCCCC'>Physicochemical Properties</option><option value='mol_wt'>Mol Wt.</option><option value='smiles'>SMILES</option><option value='XLogP'>XlogP</option><option value='TopoPSA'>PSA</option><option value='nHBd'>H-Bond Donor</option><option value='nHBa'>H-Bond Acceptor</option><option value='nRotB'>No. of Rotatable Bond Count</option><option value='' align='center' style='background-color: #FFCCCC'>Miscellaneous</option><option value='pubchem_id'>PubChem ID</option><option value='chemspider'>ChemSpider ID</option><option value='pubmed_source_lit'>PubMed ID (Source Literature)</option><option value='' align='center' style='background-color: #FFCCCC'>Reference</option><option value='ref'>Reference</option></select><select name='fieldsi_op[]'><option value='like'>LIKE</option><option value='not like'>Not LIKE</option><option value='equal'>Equal to</option><option value='not_equal'>Not equal to</option><option value='='> = </option><option value='!='> != </option><option value='<='> <= </option><option value='>='> >= </option><option value='<'> < </option><option value='>'> > </option></select> <input type='text' id='" + intTextBox + "' name='keyword[]'>";
contentID.appendChild(newTBDiv)}

//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement()
{
if(intTextBox != 0)
{
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
<option value='' align='center' style="background-color: #FFCCCC">Inhibitor Information</option>
<option value='inhibitor'>Inhibitor Name</option>
<option value='assay_type'>Assay Type</option>
<option value='assay_dis'>Assay Discription</option>
<option value='target'>Target</option>
<option value='cell_type'>Cell Type</option>
<option value='ic'>IC50 (in nM)</option>
<option value='ec'>EC50 (in nM)</option>
<option value='' align='center' style="background-color: #FFCCCC">Physicochemical Properties</option>
<option value='mol_wt'>Mol Wt.</option>

<option value='smiles'>SMILES</option>
<option value='XLogP'>XlogP</option>
<option value='TopoPSA'>PSA</option>
<option value='nHBd'>H-Bond Donor</option>
<option value='nHBa'>H-Bond Acceptor</option>
<option value='nRotB'>No. of Rotatable Bond Count</option>
<option value='' align='center' style="background-color: #FFCCCC">Miscellaneous</option>
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
            } 
            else {
                $qu_mul = $qu_mul . ' ' . "and $field_val not like '%$keyw%'";
            }
        } # # Coding for Complex Query End

        # # Coding for Single Query Start
        else {
            # echo $table."Y";
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

    $inst_full = array(
        'BGU' => 'Bangalore University, Bangalore',
        'BU' => 'Bharathidasan University, Tamil Nadu',
        'CDRI' => 'Central Drug Research Institute, Lucknow',
        'CECRI' => 'Central Electrochemical Research Institute, TN',
        'CFTRI' => 'Central Food Technological Research Institute, Mysore',
        'CIMAP' => 'Central Institute of Medicinal & Aromatic Plants, Lucknow',
        'CLRI' => 'Central Leather Research Institute, TN',
        'CSMCRI' => 'Central Salt & Marine Chemicals Research Institute, Gujarat',
        'CCMB' => 'Centre for Cellular and Molecular Biology, Hyderabad',
        'CBT' => 'Centre For Biochemical Technology, Delhi',
        'CUSAT' => 'Cochin University of Science & Technology, Kerala',
        'BAMU' => 'Dr Babasaheb Ambedkar Marathwada University, Aurangabad',
        'GU' => 'Goa University, Goa',
        'GNDU' => 'Guru Nanak Dev University, Punjab',
        'IISC' => 'Indian Institute of Sciences, Bangalore',
        'IITBM' => 'Indian Institute of Technology, Bombay',
        'IITDL' => 'Indian Institute of Technology, Delhi',
        'IITGW' => 'Indian Institute of Technology, Guwahati',
        'IITKN' => 'Indian Institute of Technology, Kanpur',
        'IITKH' => 'Indian Institute of Technology, Kharagpur',
        'IITMD' => 'Indian Institute of Technology, Madras',
        'IICB' => 'Indian Institute of Chemical Biology, Kolkatta',
        'IICT' => 'Indian Institute of Chemical Technology, Hyderabad',
        'IIIM' => 'Indian Institute of Integrative Medicine, Jammu Tawi',
        'IIP' => 'Indian Institute of Petroleum, Dehradun',
        'ITRC' => 'Industrial Toxicology Research Centre, Lucknow',
        'IGIB' => 'Institute of Genomics & Integrative Biology, Delhi',
        'IHBT' => 'Institute of Himalayan Bioresource Technolonogy, Palampur',
        'IMT' => 'Institute of Microbial Technology, Chandigarh',
        'ICGEB' => 'International Centre for Genetic Engineering and Biotechnology, New Delhi',
        'MCC' => 'Malabar Christian College, Kerala',
        'MU' => 'Manipur University, Manipur',
        'MGU' => 'MG University, Kerala',
        'NBRI' => 'National Botanical Research Institute, Lucknow',
        'NCL' => 'National Chemical Laboratory, Pune',
        'NIIST' => 'National Institute for Interdisciplinary Science and Technology, Thiruvananthapuram',
        'PYU' => 'Pondicherry University, Pondicherry',
        'SURT' => 'Saurashtra University, Rajkot',
        'SNCKL' => 'SN college, Kollam, Kerala',
        'NEIST' => 'The North East Institute of Science and Technology, Jorhat',
        'UBNWB' => 'University of Burdwan, West Bengal',
        'UCKLT' => 'University of Calcutta, Kolkatta',
        'UDDL' => 'University of Delhi,New Delhi',
        'UHHD' => 'University of Hyderabad, Hyderabad',
        'UJJM' => 'University of Jammu, Jammu',
        'UKWB' => 'University of Kalyani,West Bengal',
        'UMTN' => 'University of Madras, Tamil Nadu',
        'UNBDJ' => 'University of North Bengal, Darjeeling',
        'UPPN' => 'University of Pune, Pune',
        'VUWB' => 'Vidyasagar University, West Bengal',
        'GIPER' => 'Global Institute OF Pharmaceutical Education & Research, Kashipur, Udham Singh Nagar, Uttarakhand',
        'THAPU' => 'Thapar University, Patiala',
        'BHU' => 'Banaras Hindu University, Varanasi',
        'RNIPER' => 'National Institute of Pharmaceutical Education and Research (NIPER), Rae Bareli, Uttar Pradesh',
        'SATKCP' => 'Sat Kaival College of Pharmacy, Sarsa, Anand, Gujarat',
        'KBPL' => 'Kanashi Biotech Pvt. Ltd. A27- H block MIDC Pimpri, Pune: 411018',
        'AMRITA' => 'Amrita Vishwa Vidyapeetham, Amritapuri, Clappana P.O., Kollam, Kerala',
        'KLEU' => 'KLEU College of Pharmacy, Belgaum, Karnataka',
        'KUSK' => 'Kuvempu University, Shankaraghatta-577 451, Karnataka',
        'NITM' => 'Neelkanth Institute of Technology, Modipuram, Meerut-250110, U.P., India.',
        'SMBTCP' => 'S.M.B.T. College of Pharmacy, Dhamangaon, Nashik, Maharashtra.',
        'CSIRHQ' => 'CSIR, HQ, New Delhi.',
        'RAVEN' => 'Ravenshaw University, Cuttack, Odisha.'
    );

    # ################################
    # ### Display Results Coding Start
    # ################################
    # echo"$sql<br>";
    $res = mysql_query($sql) or die(mysql_error());
    $res_no = mysql_num_rows($res);
    if ($res_no == 0) {
        print "<font color='brown' size='6'><b>No Record Found in NVI's database coressponding to your keyword !!!</b></font><br><br><input type='button' value='Go Back' onClick='history.go(-1)'><br><br><br>";
    } else {
        $tot_res = mysql_num_rows($res);
        print <<<HTML
        <style>
        a.rollover img {
                width: 180px;
                height: 175px;
        }
        
        a.rollover:hover > img {
                width: 380px;
                height: 440px;
        }
        </style>
        <!--br><input type='button' value='Go Back' onClick='history.go(-1)'-->
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
            'drug_bank' => 'Drug Bank ID',
            'chemspider' => 'ChemSpider ID',
            'target' => 'Target',
            'assay_type' => 'Assay Type',
            'assay_dis' => 'Assay Description',
            'source' => 'Assay Source',
            'outcome' => 'Outcome',
            'ic' => 'IC50 (in nM)',
            'ec' => 'EC50 (in nM)',
            'cell_type' => 'Cell Type',
            'pubchem_id' => 'PubChem ID',
            'pubmed_source_lit' => 'PubMed ID [Source Literature]',
            'ref' => 'Reference(s)',
            'ref2' => 'Reference 2',
            'ref3' => 'Curator',
            'date' => 'Date',
            'mol_wt' => 'Molecular Weight (in g/mol)',
            'XLogP' => 'XLogP',
            'TopoPSA' => 'PSA',
            'nHBd' => 'H-bond Donor',
            'nHBa' => 'H-bond Acceptor',
            'nRotB' => 'No. of Rotatable Bond Count',
            'n_ring' => 'No. of Rings',
            'n_nitro' => 'No. of N',
            'n_O' => 'No. of O',
            'n_S' => 'No. of S',
            'mol_formula' => 'Molecular Formula',
            'smiles' => 'SMILES'
        );

        echo "<table id=\"tableTwo\" class=\"yui\" border = 2 align = center>";
        echo "<thead bgcolor=#3E6990 style=\"color:white;\">";
        for ($i = 0; $i < mysql_num_fields($res); $i ++) {
            $f_name = mysql_field_name($res, $i);
            # print $f_name."<br>";
            $header_full = $headers[$f_name];
            print "<th  width='10px;'><b>$header_full</b></th>";
        }
        print "</thead>";
        print "<tbody>";
        while ($row = mysql_fetch_array($res)) {
            print "<tr>";
            for ($i = 0; $i < mysql_num_fields($res); $i ++) {

                $f_name = mysql_field_name($res, $i);
                $f_val = $row[$f_name];
                if ($f_name == 'compound_id') {
                    print "<td><a href='search-nidb.php?compound_id=$f_val&type=compound_id' title='Click to See Details' style='text-decoration: none;padding-right:280px;'>$f_val</a></td>";
                } else if ($f_name == 'compound_image') {
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
                        /*
                         * echo'<center>
                         * <APPLET CODE="StructureEditorApplet.class" CODEBASE="sda/" width=700 height=450>';
                         * echo"
                         * <PARAM name=\"molFile\" value=\"$dir/$pub_id.MOL\">";
                         * echo'
                         * <PARAM name="maximizeScreen" value="yes">
                         * <PARAM name="backgroundColor" value="#FFFFFF">
                         * </APPLET></center>
                         * </td></tr>';
                         */
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
                                    print "<a href='' class='rollover'><img src='store_data/str_images_smile/$c_id.svg' width='180' height='105'></a>";

                                    # print"<img src='http://pubchem.ncbi.nlm.nih.gov/image/imgsrv.fcgi?t=l&cid=$all[0]'>";

                                    break;
                                }
                                # print "$b<br>";
                            }
                        } else {

                            # print"<a href='' class='rollover'><img src='store_data/str_images/$pub_id.svg' width='180' height='105'></a>";
                            # print"<a href='' class='rollover'><img src='store_data/str_images_svg/$c_id.svg' width='180' height='105'></a>";
                            print "<a href='' class='rollover'><img src='store_data/str_images/$c_id.png' width='180' height='105'></a>";
                        }
                        echo '</td>';
                    } 
                    else {
                        # print "<td>$pub_id</td>";
                        print "<td>$c_id</td>";
                    }
                } else {
                    print "<td>$f_val</td>";
                }
            }
            print "</tr>";
        }
        print "</tbody>";
        /*
         * print<<<HTML
         * <tfoot>
         * <tr id="pagerTwo">
         * <td colspan="25" style="border-right: solid 3px #7f7f7f;">
         * <img src="images/first.png" class="first"/>
         * <img src="images/prev.png" class="prev"/>
         * <input type="text" class="pagedisplay"/>
         * <img src="images/next.png" class="next"/>
         * <img src="images/last.png" class="last"/>
         * <select class="pagesize">
         * <option selected="selected" value="50">50</option>
         * <option value="100">100</option>
         * <option value="150">150</option>
         * <option value="200">200</option>
         * <option value="250">250</option>
         * <option value="300">300</option>
         * <option value="350">350</option>
         * <option value="400">400</option>
         *
         * </select>
         * </td>
         * </tr>
         * </tfoot>
         * HTML;
         */
        print "</table><br><br><br>";
        # print"$sql<br>";
    }
}

?>
