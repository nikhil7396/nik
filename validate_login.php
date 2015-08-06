<?php
session_start();
// Grab User submitted information
$email = $_REQUEST["username"];
$pass = $_REQUEST["password"];

// Connect to the database
$link = mysql_connect('localhost','root','','email_service'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
else
{
//echo 'Connection OK'; 
}
//print_r($link);
// Select the database to use
//mysqli_select_db("my_dbname",$link);(, users_pass)
$query="select * from email_service.users where users_email='".$email."' and users_pass='".$pass."'";
//$query="insert into email_service.users values('','xsdgvs','srascgyh')";
$result = mysql_query($query);
$numrows=mysql_num_rows($result);
//echo $query;
//echo $numrows; exit;
//$row = mysql_fetch_array($result);
if($numrows > 0)
{
$_SESSION['login_user']= $email;  // Initializing Session with value of PHP Variable

header('Location:mail_form.php');
}
else
{?>
<script>
alert('Wrong Usrname Or Password');
</script>
<?php
header('Location:index.php');
}

//if($row["users_email"]==$email && $row["users_pass"]==$pass)
    //echo"You are a validated user.";
//else
    //echo"Sorry, your credentials are not valid, Please try again.";
?>