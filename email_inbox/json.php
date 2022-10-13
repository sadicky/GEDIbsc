<?php

// include Imap.Class
//include_once('lib/class.imap.php');
include_once('email_inbox/lib/class.imap.php');
$yourEmail = "alainmusha27@gmail.com";
$yourEmailPassword = "ijmukzktpbtivnln";

$mailbox = imap_open("{imap.gmail.com:993/ssl}INBOX", $yourEmail, $yourEmailPassword);
$mail = imap_search($mailbox, "ALL");
$mail_headers = imap_headerinfo($mailbox, $mail[0]);
$subject = $mail_headers->subject;
$from = $mail_headers->fromaddress;
imap_setflag_full($mailbox, $mail[0], "\\Seen \\Flagged");
imap_close($mailbox);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
if($connect){
	if(isset($_POST['inbox'])){
		// inbox array
		$inbox = $email->getMessages('html');
		echo json_encode($inbox, JSON_PRETTY_PRINT);
	}else if(!empty($_POST['uid']) && !empty($_POST['part']) && !empty($_POST['file']) && !empty($_POST['encoding'])){
		// attachments
		$inbox = $email->getFiles($_POST);
		echo json_encode($inbox, JSON_PRETTY_PRINT);
	}else {
		echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
	}
}else{
	echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
}