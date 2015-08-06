 <?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$subject=$_REQUEST['subject'];
$description=$_REQUEST['description'];

/*---------------------------------------------------------------------------------------------*/	
# Include the Autoloader (see "Libraries" for install instructions)
/*require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-da5fbd5441cde507e8de9328252828bf');
$domain = "sandbox52077d02aa964553896103659085e8f8.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox52077d02aa964553896103659085e8f8.mailgun.org>',
                        'to'      => 'nikhil <online@nikhilkulkarni.info>',
                        'subject' => 'Hello nikhil',
                        'text'    => 'Congratulations nikhil, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
*/	
/*---------------------------------------------------------------------------------------------*/	

//echo "Message has been sent";
//if(!$mail->Send())		
//{
/*-------------------------------------------Sendgrid--------------------------------------------*/
$url = 'https://api.sendgrid.com/';
$user = 'USER';
$pass = 'password';

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => $to,
    'subject'   => $subject,
    'html'      => $description,
    'text'      => $description,
    'from'      =>  $from,
  );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
if($response == '{"message":"success"}')
{
echo "Your Mail Sended Successfully via SendGrid<br>";
}
if($response != '{"message":"success"}')
{
/*--------------------------------PHP MAiler-----------------------------------------*/  
require("PHPMailer-master/PHPMailerAutoload.php");
//echo "hi";


$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host = "localhost";  // specify main and backup server
$mail->Port = 25;
$mail->Username = $Username;  // SMTP username
$mail->Password = $pass; // SMTP password

$mail->From = $from;
$mail->FromName = $from;
$mail->AddAddress("$from", "$to");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "$subject";
$mail->Body    = "$description";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
echo "<br> Your Mail Sended Successfully From PHP MAILER";
}
?><style type="text/css">
<!--
body {
	background-color: #999999;
}
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: medium;
	color: #FFFFFF;
}
.style2 {color: #FFFF00}
-->
</style>
<?php
$date = date('Y-m-d H:i:s');
$link = mysql_connect('localhost','email_service',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
else
{
//echo 'Connection OK'; 
}
$query="insert into nikhilkulkarni.emails values('','".$to."','".$subject."','".$description."','".$date."')";
$result = mysql_query($query);
?>
<a href="mail_form.php" class="style1">Sendmail Again</a>
<br>
<a href="index.html" class="style2">Exit</a>
