<?php
include'template-nidb_new.php';
include 'sidemenu.php';
print<<<HTML
<title>NVIK Statistics</title>
<head>
<style>
.center {
  text-align: center;
  margin-right: 60px;
}
</style>
</head>
<body>
<div class="center">
<a name='nipah_stat'>
<h2><center>Nipah Virus Inhibitors (NVIs) Statistics</center></h2>

<br><br>
<center><u><b>Table - 1:</b> General information about Nipah Virus Inhibitors (NVIs)</u></center>
<br>

<table border=1px; style='border-collapse:collapse;' align='center' width='700px'>
<tr bgcolor='#3E6990'><td align='center'><font color='white'>Total entries</font></td align='center'><td align='center'><font color='white'>Inhibitors</font></td align='center'><td align='center'><font color='white'>Targets</font></td align='center'><td align='center'><font color='white'>IC50 [uM]</font></td align='center'><td align='center'><font color='white'>Chemspider Ids</font></td align='center'></tr>
<tr><td align='center'>125</td><td align='center'>98</td><td align='center'>39</td><td align='center'>60</td><td align='center'>96</td></tr>
</table>
<br><br>
HTML;
#include'con1.php';
echo"<center><u><b>Table - 2:</b> Statistics of molecular properties of NVIs molecules</u></center>";
echo"<br>";
echo"<table border=2px; style='border-collapse:collapse;' align='center' width='500px'>";
$all = file("statistics_13_Nov_2019.txt");
foreach($all as $a){
#list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$ab,$ac,$ad) = split("\t",$a);
list($a,$b,$c,$d) = split("\t",$a);
$e = preg_replace("/\n$/","",$d);
print "<tr><td bgcolor='#3E6990'><font color='white'>$a</font></td><td align='center'>$b</td><td align='center'>$c</td><td align='center'>$d</td></tr>";
}
echo"</table>";
print<<<HTML
<br><br>

<center><u><b>Figure- 1:</b> Molecular weight distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/MW.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 2:</b> Hydrogen bond donor distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/HBD.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 3:</b> Hydrogen bond acceptor distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/HBA.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 4:</b> XLogP distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/XLogP.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 5:</b> Number of rotatable bonds distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/RotB.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 6:</b>Topological Polar surface area distribution comparison between NVIs with respect to Enamine antiviral library and FDA approved compounds</u></center>
<br>
<center><img width='66%' src='images/prop/TopoPSA.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>
</div>

</body>
HTML;
?>
