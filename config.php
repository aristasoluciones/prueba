<?php
switch($_SERVER['HTTP_HOST'])
{
	//Local
	case 'localhost':
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/prueba';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/prueba';
            $key_space = "2W2GYHQTDWVOKY2UBHNO";
            $secret_space ="HLkBfil7oF8ZtiId+RDG13POhhXZgWKOrzyvEcI/AXg";
            $space_name = "hbkruzpehost";
            $region ="nyc3";
			$sqlUser = 'root'; 
			$sqlPw = ''; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'huerin';
		break;
	
	//Produccion
	default:
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/';
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
			$key_space = "";
			$secret_space ="";
			$space_name = "hbkruzpehost";
			$region ="nyc3";
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