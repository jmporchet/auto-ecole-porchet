<?php
$file = file_get_contents('./clients.json');
$contents = json_decode($file);

//die(var_dump($contents->Data[98][31]));

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'porchet';

$db = mysql_connect($host, $user, $pass, false, 128);
mysql_query("use $database", $db);

echo "effacement des données de staging\n"; 
mysql_query("TRUNCATE TABLE clients");
mysql_query("TRUNCATE TABLE lecons");
mysql_query("TRUNCATE TABLE paiements");

echo "importation des clients\n"; 
foreach ($contents->Data as $data)
{
	$uid = $data[0];
	$created_at = $data[1]->e;
	$updated_at = is_object($data[2]) ? $data[2]->e : $data[1]->e;
	$nom = utf8_decode(addslashes($data[3]));
	$prenom = utf8_decode(addslashes($data[4]));
	$telephone = is_array($data[7]) ? $data[7][0]->value : '';
	$email = is_array($data[10]) ? $data[10][0]->value : '';;
	$profession = utf8_decode(addslashes($data[14]));
	$date_naissance = is_object($data[15]) ? $data[15]->e : '';
	$volant = $data[18];
	$regard = $data[19];
	$accelerateur = $data[20];
	$frein = $data[21];
	$boite = $data[22];
	$embrayage = $data[23];
	$rti = $data[24];
	$priorites = $data[25];
	$approche = $data[26];
	$decision = $data[27];
	$autoroute = $data[28];
	$manoeuvres = $data[29];
	$type_examen = ($data[31] == "Examen suisse") ? 'examen suisse' : utf8_decode('course de contrôle');
	$trouve_comment = utf8_decode(addslashes($data[32]));
	$status = ($data[34] === "0") ? 'courants' : utf8_decode('réussis');
	$notes = utf8_decode(addslashes($data[37]));

	$clients_query = "INSERT IGNORE INTO clients SET 
	prenom='".$prenom."', 
	nom='".$nom."', 
	telephone='".$telephone."', 
	profession='".$profession."', 
	date_naissance='".$date_naissance."',
	email='".$email."',
	type_examen='".$type_examen."',
	notes='".$notes."',
	trouve_comment='".$trouve_comment."',
	regard='".$regard."',
	volant='".$volant."',
	accelerateur='".$accelerateur."',
	frein='".$frein."',
	boite='".$boite."',
	embrayage='".$embrayage."',
	rti='".$rti."',
	priorites='".$priorites."',
	approche='".$approche."',
	decision='".$decision."',
	autoroute='".$autoroute."',
	manoeuvres='".$manoeuvres."',
	status='".$status."',
	created_at='".$created_at."',
	updated_at='".$updated_at."'";

mysql_query($clients_query) or die(mysql_error());

$client_insert_id = mysql_insert_id();

	// $data[30] == array de leçons 
    if(is_array($data[30]))
    {
        foreach ($data[30] as $cours)
        {
            $query = "INSERT IGNORE INTO lecons SET client_id='".$client_insert_id."', uid='".$cours."';";
            mysql_query($query) or die(mysql_error());
        }
    }

    if(is_array($data[33]))
    {
    	foreach ($data[33] as $paiement)
    	{
    		$query_paiement = "INSERT IGNORE INTO paiements SET client_id='".$client_insert_id."', uid='".substr($paiement, strpos($paiement, ':')+1)."';";
            mysql_query($query_paiement) or die(mysql_error());
    	}
    }
}

$oui = array('oui', 'yes', 'y', 'o');
echo "Dois-je continuer avec les cours ? ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if(!in_array(trim($line), $oui)){
    echo "ABORTING!\n";
    exit;
}
echo "importation des cours\n";
passthru('php import_cours_json.php');

echo "Dois-je continuer avec les paiements ? ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if(!in_array(trim($line), $oui)){
    echo "ABORTING!\n";
    exit;
}
echo "importation des paiements\n";
passthru('php import_paiements_json.php');

echo "Dois-je migrer les données en prod ? ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if(!in_array(trim($line), $oui)){
    echo "ABORTING!\n";
    exit;
}
echo "effacement des données de prod\n";
mysql_query("TRUNCATE webapp.clients") or die(mysql_error());
mysql_query("TRUNCATE webapp.lecons") or die(mysql_error());
mysql_query("TRUNCATE webapp.paiements") or die(mysql_error());

echo "migration des données\n";
mysql_query("INSERT INTO webapp.clients SELECT * FROM porchet.clients") or die(mysql_error());
mysql_query("INSERT INTO webapp.lecons SELECT * FROM porchet.lecons") or die(mysql_error());
mysql_query("INSERT INTO webapp.paiements SELECT * FROM porchet.paiements") or die(mysql_error());

echo "dump de la base\n";
echo system("mysqldump --user root --password=root webapp > webapp.sql");


echo "\n"; 
echo "Terminé\n";