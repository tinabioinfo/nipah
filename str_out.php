<?php
include'template-nidb_new.php';
#print_r($_FILES);
#echo "<br><br>";
#print_r($_POST);
$filename = $_FILES['myfile']['name'];
$smil = $_POST['smil'];
$smi = $_POST['smi'];
$file2use = 'combine.fs';
$tmpfname = tempnam("output", "img_");
#echo "tmp name: $fname $tmpfname";
## move uploaded file to specific directory
$uploads_dir = 'uploaded_files';
$tmp_name = $_FILES['myfile']['tmp_name'];
shell_exec("find output/ -type f -mtime +180 -print | xargs rm -rf ; find uploaded_files/ -type f -mtime +180 -print | xargs rm -rf");
if(!empty($_FILES['myfile']['name'])){
	$tmp_name = $_FILES['myfile']['tmp_name'];
	move_uploaded_file($tmp_name, "uploaded_files/$filename");
	echo "<pre><h2><b><center>The file $filename has been uploaded. <br>Structure similarity search (Tanimoto coefficient >0.8) result: </center></h2></b></pre>";
	$output= shell_exec("LD_LIBRARY_PATH='/usr/local/lib:/usr/lib64:/usr/lib'; /usr/bin/obabel data/$file2use -O $tmpfname.svg -s $(/usr/bin/obabel \"uploaded_files/$filename\" -osmi) -at0.8");
}
elseif(!empty($_POST['smil'])){
	echo "<pre><h2><b><center>The input smile:<br>$smil <br><br>Structure similarity search (Tanimoto coefficient >0.8) result: </center></h2></b></pre>";
	$output= shell_exec(" LD_LIBRARY_PATH='/usr/local/lib:/usr/lib64:/usr/lib'; /usr/bin/obabel data/$file2use -O  $tmpfname.svg -s \"$smil\" -at0.8");
	
}
elseif(!empty($_POST['smi'])){
	echo "<pre><h2><b><center>Input smile from moleculer editor:<br>$smi <br><br>Structure similarity search (Tanimoto coefficient >0.8) result: </center></h2></b></pre>";
        $output= shell_exec(" LD_LIBRARY_PATH='/usr/local/lib:/usr/lib64:/usr/lib'; /usr/bin/obabel data/$file2use -O  $tmpfname.svg -s \"$smi\" -at0.8");

}

else{
	echo "<center><h1><br>Input data not found<br></h1></center>";

}
$fname= basename("$tmpfname");
#    echo "<center><img src=output/$fname.svg alt=\"$fileName\" width=\"1080px\" align=middle></center>";
#echo "<pre><h2><b><center><a href = output/$fname.svg download>Click here to download the result file</a></center></h2></b></pre>";

## check empty file
  if(filesize("output/$fname.svg")) {
    // your file is not empty
    ## show the output svg image file
    echo "<iframe style=\"margin-left: 300px; width=\"100%\";\" width=\"1080px\" height=\"500\" src=\"output/$fname.svg\" /></iframe>";
    #echo "<center><img src=output/$fname.svg alt=\"$filename\" width= \"1080px\" align=middle></center>";
    echo "<pre><h2><b><center><a href =output/$fname.svg download>Click here to download the result file</a></center></h2></b></pre>";
  }
  else {
    // show empty file 
    echo "<center><h2><br>No similar structure found!<br><h2></center>";
    echo "<center><embed src=images/not_found.svg alt=\"Not Found\" align=middle></center>";
  }

echo "<center><form> <input type=\"button\" value=\"Go back!\" onclick=\"history.back()\" style=\"font-size: 20px;\"></form></center>";
/*
global $fileName;
if(isset($_FILES['myfile']['name'])){
        $fileName = $_FILES['myfile']['name'];
        shell_exec("rm uploaded_files/$fileName");
}
$fileName = $_FILES['myfile']['name'];
$currentDir = getcwd();
$uploadDirectory = "/uploaded_files/";
$uploadPath = $currentDir . $uploadDirectory . basename($fileName);
$fileTmpName  = $_FILES['myfile']['tmp_name'];
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
$file2use = 'combine.fs';
$output_file=shell_exec("date +%N");
#$fname=substr_replace($output_file ,"",-1);
#$output = shell_exec("./jc.sh uploaded_files/$fileName  $file2use $fname");
#$output= shell_exec("export PATH=/usr/local/bin/:$PATH/; obabel data/$2 -O output/$3.svg -s $1")

## execute structure search command obabel
if(isset($_FILES['myfile']['name'])){ 
	$fname=substr_replace($output_file ,"",-1);
	$output= shell_exec("export PATH=/usr/local/bin:$PATH/; obabel data/$file2use -O output/$fname.svg -s uploaded_files/$fileName");
}
elseif(!empty($_POST['smil'])){ 
	$fname = 'test5';
	$output= shell_exec("export PATH=/usr/local/bin:$PATH/; obabel data/$file2use -O output/$fname.svg -s \"$smile_value\"");
}
else{
	echo "<center><h1><br>Input data not found<br></h1></center>";
}
echo "<pre><h2><b><center>The file $fileName has been uploaded. <br>Structure similarity search result: </center></h2></b></pre>";

## check empty file
  if(filesize("output/$fname.svg")) {
    // your file is not empty
    ## show the output svg image file
    echo "<center><img src=output/$fname.svg alt=\"$fileName\" align=middle></center>";
    echo "<pre><h2><b><center><a href =output/$fname.svg download>Click here to download the result file</a></center></h2></b></pre>";
  }
  else {
    // show empty file 
    echo "<center><h2><br>No similar structure found!<br><h2></center>";
    echo "<center><embed src=images/not_found.svg alt=\"Not Found\" align=middle></center>";
  }
#echo "<center> <iframe src=output/$fname.svg align=middle width=1200 height=550 ></iframe> </center>";
*/
?>
