<?php
error_reporting(0);
ob_implicit_flush(true);

include_once "class.curl.php";
include_once "class.sms.php";
include_once "cprint.php";

$smsapp=new sms();
$smsapp->setGateway('way2sms');
$myno=$_POST['fromno'];
$p=$_POST['pass'];
$tonum=$_POST['tono'];
$mess=$_POST['message'];

cprint("Logging in ..\n");
$ret=$smsapp->login($myno,$p);

if (!$ret) {
   cprint("Error Logging In");
   exit(1);
}

print("Logged in Successfully\n");

print("Sending SMS ..\n");
$ret=$smsapp->send($tonum,$mess);

if (!$ret) {
   print("Error in sending message");
   exit(1);
}

print("Message sent");

?>