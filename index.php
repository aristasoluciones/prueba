<?php

        include('config.php');
        $conId = mysql_connect($sqlHost, $sqlUser, $sqlPassword, 1);
		mysql_set_charset('utf8');
    	mysql_select_db($sqlDatabase, $this->$conId) or die("<br/>".mysql_error()."<br/>");
   
?>