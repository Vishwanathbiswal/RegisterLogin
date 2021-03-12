<?php
session_start();

include("connect.php");

if(isset($_POST["submit"])){

$enteredUserName = $_POST['username'];
$enteredUserPassword = $_POST['password'];   

$actualUserNameAndPassword = "select * from register where email='$enteredUserName' and password='$enteredUserPassword'";

// $actualUserpassword = "select password from register where id=6";



$result = mysqli_query($conn,$actualUserNameAndPassword );          ;
//echo $result->num_rows;exit;
if($result->num_rows > 0){
while($row = mysqli_fetch_array($result)){

  $_SESSION['uname']= $row['username'];
  $_SESSION['id']= $row['id'];

  header("location:dashboard.php");


}
} else{
echo "Invalid user!";
}

}

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
fieldset {
background-color: lightblue;
}

legend {
background-color: grey;
color: white;
padding: 5px 10px;
}
#login-div{
margin: 40px 450px 0px;
}
</style>
</head>
<body>
<div id="formdiv" class="input-group">
<h1>Log In</h1>
<form action="" method="post" >
<br><input type="text" name="username" placeholder="username" /><br>
<br><input type="password" name="password" placeholder="Password" /><br>
<br><input name="submit" type="submit" value="Login" />
</form>

</div>
</body>
</html>