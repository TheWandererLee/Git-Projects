<?php
session_start();

/** Show Session Values **/
foreach($_SESSION as $key => $val)
{
   echo $key . " : " . $val . "<br>";
}

?>