<?php 
define('C_HOST','atheist.db.3680573.hostedresource.com'); 
define('C_USER','atheist'); 
define('C_PASS','Clever1!'); 
define('C_BASE','atheist'); 

mysql_connect(C_HOST, C_USER, C_PASS) 
or die("ERROR: Cannot Connect To Database."); 

mysql_select_db(C_BASE) 
or die("ERROR: Cannot connect to Database."); 
?>