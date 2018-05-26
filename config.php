<?php
switch($_SERVER['HTTP_HOST'])
{
	//Local
	case 'localhost':
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/siv';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/siv';
			$sqlUser = 'root'; 
			$sqlPw = ''; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'huerin';
		break;
	
	//Produccion
	default:
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
			$rutaDocumento =  'http://'.$_SERVER['HTTP_HOST'].'/';
			$rutaPortada =   'http://'.$_SERVER['HTTP_HOST'].'/';
			$sqlUser = 'root';
			$sqlPw = 'Pharadox2018*';
			$sqlHost = 'amazonhbrkuzpe.cufineydp5dx.us-west-2.rds.amazonaws.com'; 
			$sqlDb = 'huerin';
		break;
}

/** RUTAS GENERALES **/
define('DOC_ROOT', $docRoot);
define('WEB_ROOT', $webRoot);