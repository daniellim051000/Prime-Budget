<?php
include("conn.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. 
require 'C:\xampp\composer\vendor\autoload.php'; */

/* If you installed PHPMailer without Composer do this instead: */

require 'C:\wamp64\www\Prime Budget\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'C:\wamp64\www\Prime Budget\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\wamp64\www\Prime Budget\PHPMailer-master\PHPMailer-master\src\SMTP.php';

/* Create a new PHPMailer object. Passing True to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

function generateRandomString($length = 6) {

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
	$charactersLength = strlen($characters);
	
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	
		$randomString .= $characters[rand(0, $charactersLength - 1)];
		
	}
	
return $randomString;
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$currentemail = $_POST['email'];
$delete = "DELETE FROM verification where email = '$currentemail';";
mysqli_query($con,$delete);
$checkemail = "SELECT email FROM user where email = '$currentemail';";

if (!mysqli_query($con,$checkemail))
{
die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$checkemail);
$row = mysqli_num_rows($result);

if ($row == 0)
{
echo '<script>alert("Invalid email. Please try again!");
window.location.href = "enteremail.php";
</script>';

}
elseif ($row == 1) 
{
$verificationcode = generateRandomString();
$insert = "INSERT INTO verification (email,code) VALUES ('$currentemail','$verificationcode');" ;
mysqli_query($con,$insert);
$content = "Your verification code is: ". $verificationcode ;
try {

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'primebudget2019@gmail.com';   // SMTP username
$mail->Password = 'Apu12345';           // SMTP password
$mail->SMTPSecure = 'TLS';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

   /* Set the mail sender. */
   $mail->setFrom('primebudget2019@gmail.com', 'Prime Budget');

   /* Add a recipient. */
   $mail->addAddress($currentemail, 'receipient');

   /* Set the subject. */
   $mail->Subject = 'Verification code';

   /* Set the mail message body. */
   $mail->Body = $content;

   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}
session_start();
$_SESSION['changing'] = $currentemail;

header("location:entercode.php");
}
}

?>