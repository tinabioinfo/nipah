<?php
include'template-nidb_new.php';
include 'sidemenu.php';
#head();
#side();
print<<<HTML
<title>NVIK Statistics</title>
<a name='biophyt_stat'>
<h2><center>NVI's Statistics</center></h2>
<!--b>Over all statistics such total entries, No. of inhibitors, origin-wise
distribution, family-wise distribution, plant parts used, target bacteria etc. </b>
<br><br>
<b>Similarity statistics with known anti-TB drugs, Nutraceutical drugs, FDA
approved drugs etc.</b-->
<br><br>
<center><u><b>Table - 1:</b> General information about NVI's</u></center>
<br>

<table border=1px; style='border-collapse:collapse;' align='center' width='600px'>
<tr bgcolor='#3E6990'><td align='center'><font color='white'>Total entries</font></td align='center'><td align='center'><font color='white'>Inhibitors</font></td align='center'><td align='center'><font color='white'>Targets</font></td align='center'><td align='center'><font color='white'>IC50 [uM]</font></td align='center'><td align='center'><font color='white'>Chemspider Ids</font></td align='center'></tr>
<tr><td align='center'>125</td><td align='center'>98</td><td align='center'>39</td><td align='center'>60</td><td align='center'>96</td></tr>
</table>
<!--br><br-->
<br><br>
HTML;
#include'con1.php';
echo"<center><u><b>Table - 2:</b> Statistics of molecular properties of NVI's molecules</u></center>";
echo"<br>";
echo"<table border=2px; style='border-collapse:collapse;' align='center' width='450px'>";
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

<!--center><u><b>Figure- 1:</b> Molecular weight distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/MW1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 2:</b> Hydrogen bond donor distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/hbd1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 3:</b> Hydrogen bond acceptor distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/hba1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 4:</b> XLogP distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/Xlogp1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 5:</b> No. of rotatable bonds distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/rotb1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 6:</b>Topological Polar surface area distribution of NVI's compounds</u></center>
<br>
<center><img width='900' height=460' src='images/topopsa1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br-->

<center><u><b>Figure- 1:</b> Molecular weight distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/MW_4.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 2:</b> Hydrogen bond donor distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/hbd_1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 3:</b> Hydrogen bond acceptor distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/hba_1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 4:</b> XLogP distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank, <br>FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/XLogp_1.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 5:</b> Number of rotatable bonds distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/RotB.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<center><u><b>Figure- 6:</b>Topological Polar surface area distribution comparison between NVI's compounds, FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs </u></center>
<br>
<center><img width='900' height=460' src='images/TopoPSA.png' border=0px; style='border-collapse:collapse;'></center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br>

<!--center><u><b>Figure- 13:</b> NVI's compounds showing similarity with FDA approved small molecule drugs from Drugbank,<br> FDA approved Nutraceutical drugs from Drugbank and Anti-TB drugs</u>
<br><br>
<img width='900' height=460' src='images/venny.png' border=0px; style='border-collapse:collapse;'>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br>

<center><u><b>Figure- 13:</b> Distribution of NVI's compounds against various Mycobacterial Species</u></center>
<img width='650' height=750' src='images/target_bac.jpg'>
</center>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br><br-->
HTML;
#footer();
?>
