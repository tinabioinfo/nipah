<?php
#session_start();
include'template-nidb_new.php';
#include'contact.html';

print<<<HTML
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <h1 style="text-align:center; margin-right: 15%;">Contact Us</h1>    
<!--
<div class="about-section">
<h1>About Us Page</h1>
<p>Some text about who we are and what we do.</p>
<p>Resize the browser window to see that this page is responsive by the way.</p>
</div>
-->
HTML;

print <<<HTML2
<div class="row">
  <div class="column1" style="width: 42%;text-align: center;"">
    <div class="card">
      <img src="images/anshu_maam.jpg" alt="Dr. Anshu" style="height:280px;">
      <div class="container">
        <h2><a href='https://scholar.google.com/citations?user=lRVbF9sAAAAJ&hl' target=_blank>Dr. Anshu Bhardwaj</a></h2>
        <p><a class="title">Senior Scientist,</a> CSIR-Institute of Microbial Technology (CSIR-IMTECH)</p>
        <p><a class=title>Assistant Professor,</a> The Academy of Scientific & Innovative Research (AcSIR)</p>
        <p>Council of Scientific and Industrial Research (CSIR) Chandigarh, India.</p>
        <p><i><b>Twitter</b>: <a href='https://twitter.com/AnshuB'>@anshuB<a>, <b>Skype</b>: anshu.bhardwaj</i></p>
        <p><a href="mailto:anshu@imtech.res.in">anshu@imtech.res.in<br></a></p>
      </div>

    </div>

	
  </div>
    <div class="column1" style="width: 42%;text-align: center;"">
    <div class="card">
      <img src="images/vi.jpg" alt="Dr. Vinod Scaria" style="height:277px;">
      <div class="container">
        <h2><a href='https://scholar.google.com/citations?user=lRVbF9sAAAAJ&hl' target=_blank>Dr. Vinod Scaria</a></h2>
        <p><a class="title">Principal Scientist, </a> </p>
		<p>Genome Informatics,<br> <br>CSIR-Institue of Genomics And Integrative Biology (CSIR-IGIB),</p>
		<p> South Campus, Mathura Road, New Delhi, India</p>
        <p><a href="mailto:vinods@igib.res.in">vinods@igib.res.in<br></a></p>
      </div>

    </div>

	
  </div>
 </div>
HTML2;

$all = file("data/contact.tsv");
foreach($all as $a){
    list($pic,$social, $name,$position,$affiliation,$email) = split("\t",$a);
    //$e = preg_replace("/\n$/","",$d);
    print <<<HTML1
    <div class="row1">
    <div class="column1">
    <div class="card">
        <img src="$pic" alt="$name" style="height:250px;">
        <div class="container">
        <h2><a href="$social" target=_blank>$name</a></h2>
        <p class=title>$position</p>
        <p>$affiliation</p>
        <p><a href="mailto:$email">$email</a></p>  
    </div>
    </div>
    </div>
HTML1;
}

echo "</div></body>";





#<!-- This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License. -->
echo "<p style=\"margin-left: 180px;\">";
include('LICENSE');
echo "</p>";
?>