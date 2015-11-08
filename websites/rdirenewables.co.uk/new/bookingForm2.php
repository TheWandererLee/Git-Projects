<?php
$mess = array(); $headers = array();
$mess[] = "First Name: ".$_POST['fname'];
$mess[] = "Last Name: ".$_POST['lname'];
$mess[] = "Email Address: ".$_POST['email'];
$mess[] = "Telephone Number: ".$_POST['tel'];
$mess[] = "Postal Code: ".$_POST['pcode'];
$mess[] = "User Type: ".$_POST['utype'];

unset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['tel'],$_POST['pcode'],$_POST['utype']);

foreach($_POST as $k => $v) {
    $mess[] = "'".$k."': ".$v;
}

$mess[] = "\r\nGenerated on ".date("F jS, Y, g:i a")." from RDI Renewables automated booking form.";

$headers[] = "From: postmaster@rdirenewables.co.uk";
$headers[] = "Content-Type: text/plain; charset=iso-8859-1";

mail("tim@piggywig.co.uk", "RDI Renewables Assessment Booking", implode("\r\n",$mess), implode("\r\n",$headers));
//mail("webmaster@13willows.com", "RDI Renewables Assessment Booking", implode("\r\n",$mess), implode("\r\n",$headers));

header("Location: thankyou.html");

//echo "<br><br>Sent:<br><br>".implode("<br>",$mess);

exit();
?>