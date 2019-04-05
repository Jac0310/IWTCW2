<?php
$yearRestriction = $_GET['yearRestriction'];
if ($yearRestriction == 'Contains') { $year = $_GET['year'];}
else { $year = ''; }

$catRestriction =$_GET['catRestriction'];
if ($catRestriction == 'Contains') { $category = $_GET['category'];}
else {$category = '';}

$infoRestriction = $_GET['infoRestriction'];
if ($infoRestriction == 'Contains') {$info= $_GET['info'];}
else {$info = '';}

$nomRestriction = $_GET['nomRestriction'];
if ($nomRestriction == 'Contains') { $nominee= $_GET['nominee']; }
else {$nominee = '';}

$wonRestriction = $_GET['Won'];
if ($wonRestriction == 'All') { $won = '';}
else if ($wonRestriction == 'Win') { $won = 'yes';}
else { $won = 'no';}

$xmlDoc = new DomDocument();
$xmlDoc->load("/home/jthoma24/public_www/oscars/oscars.xml");
$xslDoc = new DomDocument();
$xslDoc->load("/home/jthoma24/public_www/oscars/oscarTransform.xsl");
$processor = new XSLTProcessor();

$processor->setParameter('', 'year', $year);
$processor->setParameter('', 'category', $category);
$processor->setParameter('', 'info', $info);
$processor->setParameter('', 'nominee', $nominee);
$processor->setParameter('', 'won', $won);

$xslDoc = $processor->importStylesheet($xslDoc);
$htmlDoc = $processor->transformToDoc($xmlDoc);
print $htmlDoc->saveXML();
?>