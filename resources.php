<?php
include'template-nidb_new.php';
#head();
#side();
#include'logo_nidb.html';
#include'simple_menu2.html';
/*
print<<<HTML
<style type='text/css'>
a.down{text-decoration: none;}
</style>
<br>
<br>
<br>

<p>The following are some useful TB, <a href='#np_res' style='text-decoration: none;'><b>Natural Product</b></a> and <a href='#misc' style='text-decoration: none;'><b>Miscellaneous Resources</b></a> available in public domain:</p>
<a name='tb_res'>
<h2><u>TB Resources:</u></h2>
<table align='center' border='1px;' style='border-collapse: collapse;'>
<thead>
<tr bgcolor='green'><th><font color='white'>Resource</font></th><th><font color='white'>Description</font></th></tr>
</thead>
<tbody>
<tr><td><a href='http://www.mycpermcheck.aksotriffer.pharmazie.uni-wuerzburg.de/' target='_blank' class='down'><b>MycPermCheck</b></a></td><td>MycPermCheck is a freely accessible online tool for permeability prediction of small molecules against <i>Mycobacterium tuberculosis</i>. Basis of the prediction program is a logistic regression model of the physico-chemical properties of permeable substances.</td></tr>
<tr><td><a href='http://crdd.osdd.net/oscadd/mdri/' target='_blank' class='down'><b>MDRIpred</b></a></td><td>A webserver for predicting inhibitor against drug tolrent M.Tuberculosis.</td></tr>
<tr><td><a href='http://crdd.osdd.net/servers/ipw/about.php' target='_blank' class='down'><b>IPW</b></a></td><td>Interactome pathway (IPW) contains largest manually curated interactome of Mtb and encompasses a total of 1434 proteins connected through 2575 functional relationships and includes Interactions leading to gene regulation, signal transduction, metabolism, structural complex formation.</td></tr>
<tr><td><a href='http://proline.physics.iisc.ernet.in/Tbstructuralannotation/' target='_blank' class='down'><b>Structural annotation of Mycobacterium tuberculosis proteome</b></a></td><td>Structural annotation of Mycobacterium tuberculosis proteome.</td></tr>
<!--tr><td><a href='http://openbabel.org/docs/dev/Installation/install.html' target='_blank' class='down'><b>Open Babel</b></a></td><td>File format converter software</td></tr-->
<tr><td><a href='http://crdd.osdd.net/raghava/gdoq/index.html' target='_blank' class='down'><b>GDoQ</b></a></td><td>A open source Webserver for prediction of Mycobacterium Tuberculosis (M.Tb) inhibitors using QSAR and Docking statergies.GDoQ web server has been developed to serve scientific community working in the field of Drug Desigining for designing inhibitors against N-acetylglucosamine-1-phosphate uridyltransferase (GLMU) protein, a potential drug target involved in bacterial cell wall synthesis.</td></tr>
<tr><td><a href='http://crdd.osdd.net/raghava/kidoq/index.html' target='_blank' class='down'><b>KiDoQ</b></a></td><td>A webserver which allows the prediction of Ki value of a new ligand molecule against dihydrodipicolinate synthase (DHDPS).</td></tr>
<tr><td><a href='http://crdd.osdd.net/' target='_blank' class='down'><b>CRDD</b></a></td><td>CRDD (Computational Resources for Drug Discovery) is an important module of the in silico module of OSDD. The CRDD web portal provides computer resources related to drug discovery on a single platform.</td></tr>
<tr><td><a href='http://mybase.psych.ac.cn/' target='_blank' class='down'><b>MyBASE</b></a></td><td>An integrated platform focused on mycobacterial genome polymorphism, virulence factors, and essential genes</td></tr>
<tr><td><a href='http://mycobrowser.epfl.ch/' target='_blank' class='down'><b>MycoBrowser</b></a></td><td>A resource providing information from databases dedicated to the complete genomes of Mycobacterium tuberculosis, Mycobacterium leprae, Mycobacterium marinum and Mycobacterium smegmatis.</td></tr>
<tr><td><a href='http://tbrowse.osdd.net/' target='_blank' class='down'><b>TBrowse</b></a></td><td>A database dedicated to provide the scientific community an integrative genomic map of M. tuberculosis with millions of data-points representing different genomic features and computational predictions systematically collected from online resources and publications, including gene/operon predictions, orthologs, gene expression data, non-coding RNA, pathway/networks, regulatory elements, variation and repeats, subcellular localization, among others.</td></tr>
<tr><td><a href='http://www.nlm.nih.gov/medlineplus/tuberculosis.html' target='_blank' class='down'><b>Tuberculosis: MedlinePlus</b></a></td><td>A service of the U.S. National Library of Medicine (From the National Institutes of Health)</td></tr>
<tr><td><a href='http://www.tbdb.org/' target='_blank'
class='down'><b>TBDB</b></a></td><td>TBDatabase (TBDB) makes available the
tools and resources available at the Stanford Microarray Database and the
Broad Institute.</td></tr>
<tr><td><a href='http://tuberculist.epfl.ch/' target='_blank'
class='down'><b>TubercuList</b></a></td><td>The TubercuList knowledge base
integrates genome details, protein information, drug and transcriptome data,
mutant and operon annotation, bibliography, structural views and comparative
genomics, in a structured manner required for the rational development of new
diagnostic, therapeutic and prophylactic measures against
tuberculosis</td></tr>
<tr><td><a
href='http://www.broadinstitute.org/annotation/genome/mycobacterium_tuberculosis_spp/MultiHome.html'
target='_blank' class='down'><b>Mycobacterium tuberculosis Comparative
Database</b></a></td><td>Mycobacterium tuberculosis Comparative
Database</td></tr>
<tr><td><a href='http://www.webtb.org/' target='_blank'
class='down'><b>webTB</b></a></td><td>A resource for Mycobacterium
tuberculosis researchers</td></tr>
<tr><td><a href='http://www.tbdreamdb.com/' target='_blank'
class='down'><b>Tuberculosis Drug Resistance Mutation
Database</b></a></td><td>Allows users to visualize all the specific mutations
associated with resistance to each drug</td></tr>
</tbody>
</table>
<br>
<center><a href='#top' style='text-decoration: none;'><b>[Top]</b></a></center>
<br>
<a name='np_res'>
<h2><u>Natural Product Resources:</u></h2>
<table align='center' border='1px;' style='border-collapse: collapse;'>
<thead>
<tr bgcolor='green'><th><font color='white'>Resource</font></th><th><font color='white'>Description</font></th></tr>
</thead>
<tbody>
<tr><td><a href='http://pkuxxj.pku.edu.cn/UNPD/index.php' target='_blank' class='down'><b>Universal Natural Product Database (UNPD)</b></a></td><td>The Universal Natural Products Database (UNPD) was designed to be a comprehensive resource of natural products for virtual screening. UNPD comprises 208213 molecules in the current version and their identification information (chemical name, CAS registry number, molecular formula, molecular weight, international chemical identifier and simplified molecular input line entry specification) and molecular properties (AlogP, Number of Hydrogen Bond Acceptor, Number of Hydrogen Bond Donors, ).</td></tr>
<tr><td><a href='http://bioinf-applied.charite.de/supernatural_new/index.php?site=home' target='_blank' class='down'><b>Super Natural II</b></a></td><td>It contains 352,811 natural compounds including information on the 2d structures, physicochemical properties and potential vendors.</td></tr>
<tr><td><a href='http://nubbe.iq.unesp.br/portal/nubbedb.html' target='_blank' class='down'><b>NuBBE Database</b></a></td><td>NuBBE database (NuBBEDB) is a virtual database of natural products and derivatives from the Brazilian biodiversity containing the compounds obtained by the academic group NuBBE. NuBBEDB contains the main chemical and biological properties, and the 3D structure of the compounds.</td></tr>
<tr><td><a href='http://tcm.cmu.edu.tw/about01.php?menuid=1' target='_blank' class='down'><b>Traditional Chinese Medicine Database@Taiwan</b></a></td><td>The database contains 37,170 (32,364 non-duplicate) TCM compounds from 352 TCM ingredients.</td></tr>
<tr><td><a href='http://www.pharmaceutical-bioinformatics.de/streptomedb/' target='_blank' class='down'><b>StreptomeDB</b></a></td><td>Largest database of natural products isolated from Streptomyces. It contains >2400 unique and diverse compounds from >1900 different Streptomyces strains and substrains.</td></tr>
<tr><td><a href='http://lifecenter.sgst.cn/hit/' target='_blank' class='down'><b>HIT: linking herbal active ingredients to targets</b></a></td><td>HIT is a comprehensive and fully curated database to complement available resources on protein targets for FDA-approved drugs as well as the promising precursors. It currently contains about 1,301 known protein targets(221 proteins are described as direct targets) derived from more than 3,250 literatures, which covers about 586 active compounds from more than 1,300 reputable Chinese herbs.</td></tr>
<tr><td><a href='http://www.megabionet.org/tcmid/' target='_blank' class='down'><b>TCMID: Traditional Chinese Medicines Integrated Database</b></a></td><td>TCMID contains ~ 47 000 prescriptions, 8159 herbs, 25 210 compounds, 6828 drugs, 3791 diseases and 17 521 related targets, which is the largest data set for related field.</td></tr>
<tr><td><a href='http://58.40.126.120/him/index/index.html' target='_blank' class='down'><b>HIM-herbal ingredients in-vivo metabolism database</b></a></td><td>HIM contains 361 ingredients and 1104 corresponding in-vivo metabolites from 673 reputable herbs.</td></tr>
<tr><td><a href='http://www.napralert.org/' target='_blank' class='down'><b>NAPRALERT</b></a></td><td>NAPRALERT is a relational database of all natural products, including ethnomedical information, pharmacological/biochemical information of extracts of organisms in vitro, in situ, in vivo, in humans (case reports, non-clinical trials) and clinical studies. Similar information is available for secondary metabolites from natural sources.</td></tr>
<tr><td><a href='http://biolinfo.org/cmkb/index.php' target='_blank' class='down'><b>CMKb: a web-based prototype for integrating Australian Aboriginal customary medicinal plant knowledge</b></a></td><td>CMKb is an online relational database for collating, disseminating, visualising and analysing initially public domain data on customary medicinal plants. The database stores information related to taxonomy, phytochemistry, biogeography, biological activities of customary medicinal plant species as well as images of individual species. Known bioactive molecules are characterized within the chemoinformatics module of CMKb, with functions available for molecular editing and visualization.</td></tr>
<tr><td><a href='http://ebdb.org/' target='_blank' class='down'><b>The International Ethnobotany Database (ebDB)</b></a></td><td>It is a noncommercial repository for ethnobotanical data supporting multilingual functionality. This database contains a broad feature set and is designed specifically for ethnobotanical research providing complete location information, strong searching and data export features.</td></tr>
<!--tr><td><a href='' target='_blank' class='down'><b></b></a></td><td></td></tr>
<tr><td><a href='' target='_blank' class='down'><b></b></a></td><td></td></tr>
<tr><td><a href='' target='_blank' class='down'><b></b></a></td><td></td></tr-->
</tbody>
</table>
*/
print<<<HTML
<title>NVIK Useful Resources</title>
<style type='text/css'>
a.down{text-decoration: none;}
</style>
<a name='misc'>
<h2><center>Useful Resources</center></h2>
<table align='center' border='1px;' style='width: 70%;margin-right: 250px; border-collapse: collapse;' >
<thead>
<tr bgcolor='#3E6990'><th><font color='white'>Resource</font></th><th><font color='white'>Description</font></th></tr>
</thead>
<tbody>
<tr><td><a href='http://www.drugbank.ca/' target='_blank' class='down'><b>DrugBank</b></a></td><td>The DrugBank database is an online resource that combines detailed drug (i.e. chemical, pharmacological and pharmaceutical) data with comprehensive<br> drug target (i.e. sequence, structure, and pathway) information.</td></tr>
<tr><td><a href='https://pubchem.ncbi.nlm.nih.gov/' target='_blank' class='down'><b>PubChem</b></a></td><td>PubChem is a public repository for chemical molecules and their activities against biological assays. It comprises three interconnected databases:<br> (i) Compound (ii) Bioassay (iii) Substance.</td></tr>
<tr><td><a href='https://www.collaborativedrug.com/' target='_blank' class='down'><b>CDD database</b></a></td><td>The Collaborative Drug Discovery (CDD) Database is a collaborative "cloud-based" tool that aims to bring together neglected disease researchers and<br> other researchers from usually separate areas, to collaborate and to share compounds and drug discovery data in the research community.</td></tr>
<tr><td><a href='https://www.ebi.ac.uk/chembl/' target='_blank' class='down'><b>ChEMBL</b></a></td><td>An Open Data database containing binding, functional and ADMET information for a large number of drug-like bioactive compounds.</td></tr>
<tr><td><a href='http://www.chemspider.com/' target='_blank' class='down'><b>ChemSpider</b></a></td><td>ChemSpider is a free chemical structure database providing fast text and structure search access to over 32 million<br> structures from hundreds of data sources.</td></tr>
<tr><td><a href='http://www.ebi.ac.uk/chebi/' target='_blank' class='down'><b>ChEBI</b></a></td><td>Chemical Entities of Biological Interest (ChEBI) is a freely available dictionary of molecular entities focused on 'small'<br> chemical compounds.</td></tr>
<tr><td><a href='https://zinc.docking.org/' target='_blank' class='down'><b>ZINC</b></a></td><td>A free database of commercially-available compounds for virtual screening. ZINC contains over 35 million purchasable compounds in ready-to-dock,<br> 3D formats.</td></tr>
<tr><td><a href='https://www.chemdiv.com/' target='_blank' class='down'><b>Chemdiv</b></a></td><td>ChemDiv is now the recognized global leader in discovery chemistry with the industry’s largest, most diverse, and most pharmacologically-relevant<br> commercial collection of over 1,500,000 individually crafted, lead-like, drug-like small molecules. ChemDiv executes pre-clinical chemistry and biology for<br> drug development and clinical trials for an international portfolio of companies across the entire range of targets with small molecule and biotech drugs. </td></tr>
<tr><td><a href='http://bioinfo.imtech.res.in/manojk/antinipah/' target='_blank' class='down'><b>Anti-Nipah</b></a></td><td>Web resource, which comprising of a data repository, prediction method, and data visualization module. </td></tr>
<tr><td><a href='https://www.enaminestore.com/' target='_blank' class='down'><b>Enamine</b></a></td><td>EnamineStore is an e-commerce portal for online searching and ordering products by Enamine Ltd - a leading supplier of innovative chemistry<br> products for the drug discovery community. The online catalog contains more than 15 million small molecules, including building blocks, fragments,<br> and screening compounds.  </td></tr>




</tbody>
</table>
<br>

<br>
HTML;
#footer();
?>
