<?php
    require_once realpath(__DIR__.'/..')."/vendor/autoload.php";
    require_once __DIR__."/html_tag_helpers.php";
?>
<html>
<head>
  <title>Membaca File RDF</title>
</head>
<body>

<?php
  $data = \EasyRdf\Graph::newAndLoad('http://localhost/websemantik/satriani.rdf');
  $doc = $data->primaryTopic();
?>

<h3>Profil</h3>
Nama: <?= $doc->get('foaf:name') ?><br>

Nama depan: <?= $doc->get('foaf:givenName') ?><br>

Nama belakang: <?= $doc->get('foaf:familyName') ?><br>

Gender: <?= $doc->get('foaf:gender') ?><br>

Homepage: <?= $doc->get('foaf:homepage') ?><br>

Gambar: <br> <img src="<?= $doc->get('foaf:img') ?>"> <br>

Interest: <?php
foreach ($doc->all('foaf:interest') as $interest) {
	echo $interest->get('rdfs:label');
} ?><br>

Knows: <?php
foreach ($doc->all('foaf:knows') as $knows) {
	echo $knows->get('rdfs:label');
	echo ', ';
} ?><br>

Current Project: <?php 
foreach ($doc->all('foaf:currentProject') as $currentProject) {
	echo $currentProject->get('foaf:name');
} ?><br>

Past Project: <?php 
foreach ($doc->all('foaf:pastProject') as $pastProject) {
	echo $pastProject->get('foaf:name') ;
} ?><br>
<hr>

<h3>Media Sosial</h3>
<?php
    foreach ($doc->all('foaf:account') as $akun) {
        echo $akun->get('foaf:page');
        echo '<br>';
    }
?>

</body>
</html>
