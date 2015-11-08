<?php
$mess = array(); $headers = array();
$mess[] = "Name: ".$_POST['fullname'];
$mess[] = "Email Address: ".$_POST['email'];
$mess[] = "Telephone Number: ".$_POST['tel'];
$mess[] = "Enquiry Type: ".$_POST['enquiry'];

/* Parses any additional form inputs and sends them along as their name & value */
unset($_POST['fullname'],$_POST['email'],$_POST['tel'],$_POST['enquiry']);

foreach($_POST as $k => $v) {
    $mess[] = "'".$k."': ".$v;
}
/********************************************************************************/

$mess[] = "\r\nGenerated on ".date("F jS, Y, g:i a")." from RDI Renewables automated booking form.";

$headers[] = "From: postmaster@rdirenewables.co.uk";
$headers[] = "Content-Type: text/plain; charset=iso-8859-1";

mail("tim@piggywig.co.uk", "RDI Renewables Contact Form", implode("\r\n",$mess), implode("\r\n",$headers));

header("Location: thankyou.php");

//echo "<br><br>Sent:<br><br>".implode("<br>",$mess);

exit();
?>