<?php
        ini_set("display_errors", 1); 
 echo php_info();
        include_once('config.php');
        $conId = mysqli($sqlHost, $sqlUser, $sqlPw, 1);
		mysql_set_charset('utf8');
    	mysql_select_db($sqlDb, $this->$conId) or die("<br/>".mysql_error()."<br/>");
   
?>