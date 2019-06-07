 <?php
session_start();
if(isset($_POST['save']))
{
$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(strcmp($rno,$urno))
{
    $name=$_SESSION['name'];
    $lname=$_SESSION['lname'];
    $email=$_SESSION['email'];
    $num=$_SESSION['phone'];
    $pass=$_SESSION['pass'];
    $cpass=$_SESSION['rpass'];
    header("Location: final.php");

//Adding user to database
$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql1 = "INSERT INTO user
    VALUES ('$name','$lname','$email',$num,'$pass','$cpass')";
    
    $conn->exec($sql1);
    header("Location: final.php");
    }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


}
else{
echo "<p>Invalid OTP</p>";
}
}
?>
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
    width: 400px;
	height: 200px;
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
input[type=password] {
  width: 60%;

  padding: 12px 20px;
  margin: 30px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
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
::placeholder {
  color: black;

  font-size: 15px;
}
</style>
</head>
<body>

<div class="centerpart" align="center">
<form method="post">
        <input type="password" name="otpvalue" placeholder="Enter OTP" required><br><br>
    
    <button type="submit" name="save">SUBMIT</button><br>
</form>

</div>
</body>
</html>