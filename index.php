<?php

include_once('config.php');
require_once("S3.php");
require_once("fileManagement.class.php");
$key_space = "BT7JUGZNR2QX4YHSYCGL";
$secret_space ="oqo0F9a+hFZdFmpGwFFJrKVm5qEg0EEXpajHawEOd1I";
$space_name = "hbkruzpehost";
$host ="nyc3.digitaloceanspaces.com";

$space =  new FileManagement($key_space,$secret_space,false,$space_name);
$file = $space->getObject($space_name, 'huerin/sp.php');
echo $file;
$message = '';
/*if(!empty($_FILES['uploaded_file'])) {
    if (!class_exists('S3')) require_once 'S3.php';
    // AWS access info
    if (!defined('awsAccessKey')) define('awsAccessKey', $key_space);
    if (!defined('awsSecretKey')) define('awsSecretKey', $secret_space);
    $space =  new FileManagement($key_space,$secret_space,true);
    if($space->uploadFile($_FILES['uploaded_file'],$space_name,'huerin/sp','public-rw')){
        $message ="Archivo subido correctamente";
    }else
        $message ="Error al subir correctamente";

}*/
?>