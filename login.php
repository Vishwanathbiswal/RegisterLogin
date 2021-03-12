<?php
    include ('connection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        fieldset {
            background-color: #eeeeee;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
        }
        #login-div{
            margin: 40px 450px 0px;
        }
        .p{
            cursor:pointer;
            
        }
    </style>
</head>
<body>  
    <div id="login-div">
        <form id="login_form" action="#" method="POST">
            <fieldset>
                <legend>Login Details</legend>
                <div id="username-div">
                    <label for="uname_label">Username</label>
                    <input class="uname_class" type="text" name="login-username"><br><br>
                </div>
                <div id="password-div">
                    <label for="password_label">Password</label>
                    <input class="password_class" type="password" name="login-password"><br><br>
                </div>
                <div id="click-div">
                    <input id="login-id" class="save_btn" type="submit" name="login-btn" value="Log In" 
                    onclick="loginAcknowledgement()">
                </div> 
            </fieldset> 
        </form>
        <!-- <p contenteditable="true" id="login-message"></p> -->
        <!-- <p class="p" id="redirect-login-page" onclick="location.href='user_profile.php'"></p> -->
    </div>
    <script>
        function loginAcknowledgement(){
            document.getElementById('login-message').innerHTML = "Congratulations..!! " + "Your credentials match with our database.";
            document.getElementById('redirect-login-page').innerHTML = "Click here to view your entered details";
        }   
    </script>
</body>
</html>

<?php
    if(isset($_POST['login-btn'])){
        $actualUserNameAndPassword = "select username, pswd from course_registration where cid=1";
        $enteredUserName = $_POST['login-username'];
        $enteredUserPswd = $_POST['login-password'];

        $result = $conn->query($actualUserNameAndPassword );

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['username'] == $enteredUserName && $row['pswd'] == $enteredUserPswd){
                    echo "<h4 style='color: green; padding-left:500px;'>You have entered the correct credentials..!!</h4>";
                    echo "<a href='profile.php' style='padding-left:490px;'>Click Here </a> to see the details of your entered texts.";
                } else {
                    echo "<h4 style='color: red; padding-left:500px;'>Credentials did not match. Please try again..!!<h 4>";
                }
            }
        } else{
            echo "<h3>Error in showing the table</h3>" .$conn->error;
        }
       
    }

?>