<?php
switch($_SERVER['HTTP_HOST'])
{
	//Local
	case 'localhost':
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/prueba';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/prueba';
			$sqlUser = 'root'; 
			$sqlPw = ''; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'huerin';
		break;
	
	//Produccion
	default:
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
			$rutaDocumento =  'https://hbkruzpehost.nyc3.digitaloceanspaces.com/huerin/';
			$sqlUser = 'root';
			$sqlPw = 'Pharadox2018#';
			$sqlHost = 'localhost';
			$sqlDb = 'huerin';
		break;
}

/** RUTAS GENERALES **/
define('DOC_ROOT', $docRoot);
define('WEB_ROOT', $webRoot);
?>