<?php
        ini_set("display_errors", 1); 
 
        include_once('config.php');
        $conId = mysql_connect($sqlHost, $sqlUser, $sqlPw, 1);
		mysql_set_charset('utf8');
    	mysql_select_db($sqlDb, $this->$conId) or die("<br/>".mysql_error()."<br/>");
   
?>