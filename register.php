<!DOCTYPE html>
<head>
<title>User Registration</title>
<style>
body{background-image:url("download.jpg");
    background-repeat: no-repeat;  
  background-position: 0% 0%;
  background-size: 1700px 1000px;
}
/*Styling the central divison*/
.centerpart{
    background-color:white;
    border-color:black;
    border:2px;
    width: 600px;
	height: 400px;
	position: absolute;
	top:0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
    padding:10px;
    border-radius:25px;
    padding-bottom:20px
}
/*Styling the input field*/
input[type=text] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
}
input[type=email] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
}
input[type=number] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
}
input[type=password] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
}
::placeholder {
  color: black;

  font-size: 15px;
}


/*Styling the submit button*/
button {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; 
  transition-duration: 0.4s;
  cursor: pointer;
}
button {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

button:hover {
  background-color: #555555;
  color: white;
}
</style>
</head>
<body>

<div class="centerpart" align="center">
<form method="post">
        <table>
            <tr align="center" >
                <td>
                    
                    <input type="text" name="fname"  placeholder="First Name" required><br>
                </td>
                
                <td>
                        <input type="text" name="lname" placeholder="Last Name" required><br>
                    </td>
                    </tr>
        </table>
        <input type="email" name="email" placeholder="abc@xyz.com" required><br>
        <input type="number" name="num" placeholder="0000000000" required><br>
         <input type="password" name="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
         <input type="password" name="cpass" placeholder="Re-enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
    
        <button type="submit" name="submit">submit</button><br>
</form>

</div>

<?php
session_start();
if(isset($_POST['submit'])){
    $rndno=rand(100000, 999999);


    require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$email=$_POST['email'];
$name=$_POST['fname'];
$lname=$_POST['lname'];
$num=$_POST['num'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];


$mail->SMTPSecure = 'tls';

      
$mail-> isSMTP(); 
$mail-> Host = 'smtp.gmail.com';
$mail->SMTPDebug   = 0;
$mail-> SMTPAuth = true;
$mail->Username   = 'anshul070300@gmail.com';                    
$mail->Password   = 'anshulkhattar';
$mail-> Port= 587;

    $mail->setFrom('anshul070300@gmail.com', 'anshul');
$mail->addAddress($email);
$mail->Subject  = 'OTP';
$mail->Body     = 'Your One Time Password to complete the registration process is : '.$rndno;
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    $_SESSION['name']=$name;
    $_SESSION['lname']=$lname;
    $_SESSION['email']=$email;
    $_SESSION['phone']=$num;
    $_SESSION['pass']=$pass;
    $_SESSION['rpass']=$cpass;
    $_SESSION['otp']=$rndno;
    header( "Location: otp.php" ); 
}
}
?>
</body>
</html>