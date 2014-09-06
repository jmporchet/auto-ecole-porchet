<?php
$file = file_get_contents('/var/www/cours.json');
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

    if (is_object($data[5]))
    {
        $data[5] = $data[5]->e;
    } else
    {
        $data[5] = '1';
    }

    $query = "UPDATE lecons SET created_at='".$data[1]->e."', date='".$data[1]->e."', updated_at='".$data[2]."', contenu='".utf8_decode(addslashes($data[3]))."', prochaine_fois='".utf8_decode(addslashes($data[4]))."', heures=".$data[5]." WHERE uid='".$data[0]."'";
    mysql_query($query);

}
