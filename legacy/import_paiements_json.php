<?php
$file = file_get_contents('./paiements.json');
$contents = json_decode($file);

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'porchet';

$db = mysql_connect($host, $user, $pass, false, 128);
mysql_query("use $database", $db);

foreach ($contents->Data as $data)
{
    if (is_object($data[2]))
    {
        $data[2] = $data[2]->e;
    } else
    {
        $data[2] = $data[1]->e;
    }

    $query = "UPDATE paiements SET created_at='".$data[1]->e."', date='".$data[1]->e."', updated_at='".$data[2]."', montant='".utf8_decode(addslashes($data[3].' '.$data[4]))."', commentaire='".utf8_decode(addslashes($data[3]))."' WHERE uid='".substr($data[0], strpos($data[0], ':')+1)."'";
    mysql_query($query);

}
