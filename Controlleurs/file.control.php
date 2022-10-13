<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		require 'vendor/PHPMailer/src/Exception.php';
		require 'vendor/PHPMailer/src/PHPMailer.php';
		require 'vendor/PHPMailer/src/SMTP.php';
		

    function from_mail()
    {
    	
			require_once('Models/file.class.php');
			require_once('Models/user.class.php');
			/*require 'email_inbox/lib/class.imap.php'; 

			$email = new Imap();
			$connect = $email->connect(
			'{imap.gmail.com:993/ssl}INBOX', //host
			'alainmusha27@gmail.com', //username
			'17091992@povic'//password
			);

			 include Imap.Class
			include_once('email_inbox/lib/class.imap.php');

			$email = new Imap();
			$connection = $email->connect(
			'{imap.gmail.com:993/ssl}INBOX', //host
			'alainmusha27@gmail.com', //username
			'17091992@povic' //password
		//	'{/notls}INBOX', //host
			////'hello@bachors.com', //username
			//'xxxxxxx' //password
			);
			//var_dump($connection);die();

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
			}*/

		$getFile= new File();
		$user = new Users();
		$groupUser = $user->getgroupUser();		
		//$list= $getFile->getAllTrash();
	    include('Vues/File/from_mail.php');
    }
    function Sendmail()
    {
    	require_once('Models/file.class.php');
    	require_once('Models/user.class.php');
		$getFile= new File();
		$user = new Users();
		$groupUser = $user->getgroupUser();		
		//$list= $getFile->getAllTrash();
	    include('Vues/File/sendmail.php');
    }
     function fileScan()
    {
    	require_once('Models/file.class.php');
    	require_once('Models/user.class.php');
		$getFile= new File();
		$user = new Users();
		$groupUser = $user->getgroupUser();		
		//$list= $getFile->getAllTrash();
	    include('Vues/File/scanDoc.php');
    }
    		 
    function sendMailToClient($sujet,$message,$sendGroup,/*$sendForAll,*/$file,$fileName)
	{

	
	   require_once('Models/user.class.php');
	   require_once('Models/historique.class.php');
	   require_once("Models/connexion.php");
       //require_once 'config/_config_mail.php';
     	$user = new Users();
		$mail = new PHPMailer(true); 

			/*if ($sendForAll) 
			{
				foreach ($user->recupererMailDe_userActif() as $value) 
				{
					$mail->addAddress($value->adress_mail);
				}
			}
			else*/
				if ($sendGroup) 
			{
				foreach ($user->recupererMailDeuserParGroup($sendGroup) as $value) 
				{
					//foreach(preg_split("#[,]+#", $value->mail) as $value2)
					//{
						$mail->addAddress($value->adress_mail);
					//}
				}
			}
			
    $subject = $sujet;
    $message = $message;

   
    //Load composer's autoloader

                               
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;  
        $mail->Username = 'alainmusha27@gmail.com';     
        $mail->Password = 'ijmukzktpbtivnln';                 
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email 
        $mail->setFrom('alainmusha27@gmail.com');
        
        //Recipients
        $mail->addAddress($value->adress_mail);              
        $mail->addReplyTo('alainmusha27@gmail.com');
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AddAttachment($file,$fileName);

        $mail->send();
		header("location:sendMail");
       $_SESSION['result'] = 'Message has been sent';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	header("location:sendMail");
	
}