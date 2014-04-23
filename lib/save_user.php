<?php
$email = $_POST['email'];
$token = sha1(uniqid($email, true));



try{
	$db = new PDO('mysql:host=localhost;dbname=fastcompany', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}


$query = $db->prepare(
    "INSERT INTO pending_users (username, token, tstamp) VALUES (?, ?, ?)"
);
$query->execute(
    array(
        $email,
        $token,
        $_SERVER["REQUEST_TIME"]
    )
);


/**
 *
 *	UPDATE URL
 * 
 * 
 */
$url = "http://nathanquinn.no-ip.org/newFastCompany/download.php?token=$token";

$message = <<<ENDMSG
Go to 
$url to download directory.
ENDMSG;
 

require("PHPMailer/class.phpmailer.php");

$mail             = new PHPMailer();


$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                       // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "natethepcspecialist"; // SMTP account username
$mail->Password   = "truplaya72185";        // SMTP account password
$mail->From       = "FastCompany";

$mail->AddReplyTo("natethepcspecialist@gmail.com","First Last");

$mail->Subject    = "Download directory";
$mail->SMTPSecure = "ssl";
$mail->Body    = $message;


$address = "natethepcspecialist@gmail.com";
$mail->AddAddress($address);


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}


// mail('natethepcspecialist@gmail.com', 'yeppps', $message);
