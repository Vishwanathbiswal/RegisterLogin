<?php
  include ('connection.php');
    if(isset($_POST['checkbtn'])){
        $firstName = $_REQUEST['fname'];
        $lastName = $_REQUEST['lname'];
        $username = $_REQUEST['username'];
        $emailId = $_REQUEST['emailaddr'];
        $password = $_REQUEST['password'];
        $mobileNumber = $_REQUEST['mobilenumber'];
        $course = $_REQUEST['course'];
        $gender = $_REQUEST['sex'];
        //$image = $_REQUEST['image'];
        $image_name = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];	

        if (move_uploaded_file($image_temp, "files/" . $image_name)) {
            $sql = "INSERT INTO course_registration (firstname, lastname, username, emailid, pswd, mobilenumber,
            course, gender, img)  VALUES ('$firstName', '$lastName', '$username', '$emailId', '$password',
                        '$mobileNumber', '$course', '$gender', ' $image_name')";
    
            if($conn->query($sql) == TRUE){
                echo "<h4 style='color: green; padding-left:300px;'>Thank you for the registration.</h4>";
                echo "<h4 style='color: blue; padding-left:300px;'>You can login now..!!</h4>";
            } else{
                echo "Error in inserting the data : <br>" .$conn->error;
            }
            $conn->close();
            
        } else {
            echo "Sorry, file could not be uploaded!";
        } 
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            background-image: url('office1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover; 
        }
        #regdiv{
            /* width: 30%; */
            /* height: 490px; */
            /* background-color: lightgray; */
            
            padding-top: 10px;
            /* padding-left: 50px; */
            margin-left: 300px;
            margin-right: 300px;
            margin-top: 0px;
            padding-bottom: 20px;
        }
        input[type=text]{
            border: 2px solid black;
            border-radius: 0.5em;
            padding-left: 10px;
            margin-left: 50px;
            width: 250px;
            height: 20px;
            / text-align: center; /
        }
        input[type=password]{
            border: 2px solid black;
            border-radius: 0.5em;
            padding-left: 10px;
            margin-left: 50px;
            width: 250px;
            height: 20px;
            / text-align: center; /
        }
        fieldset {
            background-color: #eeeeee;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
        }
     
        #gendiv{
            margin-left: 50px;
        }
        .checkbox{
            margin-left: 50px;
        }
        #birthdaydiv{
            margin-left: 50px;
        }
        #signin{
            margin-left: 100px;
        }
        .register-btn{
            /* margin-left: 125px; */
            background-color: #f4511e;
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            font-size: 16px;
            / margin: 4px 2px; /
            opacity: 0.6;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
        }
        .register-btn:hover {opacity: 1}
        #ack{
            margin-left: 5px;
            margin-right: 10px;
            font-family: inherit;
            width: auto;
            color: green;
            font-size: 11px;
        }
        .error {color: #FF0000;}
    </style>
</head>
<body>
   
    <?php
    // define variables and set to empty values
    $fnameErr = $lnameErr = $emailErr = "";
    $fname = $lname = $emailaddr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
      } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          
          $fnameErr = "Only letters and white space allowed";
        }
      }
    
      if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
      } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $lnameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["emailaddr"])) {
        $emailErr = "Email is required";
      } else {
        $emailaddr = test_input($_POST["emailaddr"]);
        // check if e-mail address is well-formed
        if (!filter_var($emailaddr, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

    }

    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    
    <div id="regdiv">
    <h1 id="heading">Course Registration Form</h1>
    <!-- <p><span class="error">* required field</span></p> -->
    <form id="regform" method="POST" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Personal Details</legend>
            <input id="fnameid" type="text" name="fname" placeholder="First Name" required>
            <span class="error">* <?php echo $fnameErr;?></span>
            <br><br>
            <input id="lnameid" type="text" name="lname" placeholder="Last Name" required>
            <span class="error">* <?php echo $lnameErr;?></span>
            <br><br>
            <input id="userid" type="text" name="username" placeholder="Username" required>
            <span class="error">* </span> <!--<?php echo $userErr;?></span>-->
            <br><br>
            <input id="emailid" type="text" name="emailaddr" placeholder="Email Address" required>
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            <input id="pswdid" type="password" name="password" placeholder="Password" required>
            <span class="error">* </span> <!--<?php echo $userErr;?></span>-->
            <br><br>
            <input id="mobid" type="text" name="mobilenumber" placeholder="Mobile Number" minlength="10" maxlength="10">
            <!-- <span class="error">* <?php echo $mobErr;?></span> -->
            <br><br>
        </fieldset><br>
        <fieldset>
            <legend>Course Details</legend>
            <div class="checkbox">
                <label for="course">Course Interested In : </label><br><br>
                PHP<input type="checkbox" name="course" value="PHP">
                JavaScript<input type="checkbox" name="course" value="JavaScript">
                Python<input type="checkbox" name="course" value="Python">
                Data Science<input type="checkbox" name="course" value="Data Science">
                Digital Marketing<input type="checkbox" name="course" value="Digital Marketing">
                SEO<input type="checkbox" name="course" value="SEO"> 
            </div><br>
        </fieldset><br>
        <fieldset>
            <legend>Other Details</legend>
            <div id="gendiv">
                Gender :
                <input class="gender" type="radio" value="Male" name="sex">Male
                <input class="gender" type="radio" value="Female" name="sex">Female
                <input class="gender" type="radio" value="Others" name="sex">Others<br><br>  
            </div>
            <div id="birthdaydiv">
                <label for="birthday">Birthday:</label><br>
                <select name="birthday" class="dob">
                    <option value="0" selected>Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="23">23</option>
                    <option value="18">18</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="22">22</option>
                    <option value="28">28</option>
                    <option value="24">24</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select name="birthmonth" class="dob">
                    <option value="0" selected>Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select name="birthyear" class="dob">
                    <option value="0" selected>Year</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                </select> 
            </div>
        </fieldset>
        <br>
        <fieldset>
            <legend>Document Upload Section</legend>
            Select Your Image: <input type="file" name="image"><br><br>
            
        </fieldset><br>
        <fieldset>
            <h4 id="ack">By clicking Register, you agree to our Terms, Data Policy and Cookie Policy. 
            You may receive SMS notifications from us and can opt out at any time</h4>
            <!-- <legend></legend> -->
            <input class="register-btn" type="submit" name="checkbtn" value="Register">
            <!-- <p id="blank" style="color: blue;"></p>
            <h4 id="signin-id">Already have an account? <a href="login.php">Sign In</a></h4> -->
        </fieldset>
        
    </form>
    </div>
    <!-- <script>
        function registration(){
            document.getElementById('blank').innerHTML = "Thank you for the registration";
        }
    </script> -->
</body>
</html>