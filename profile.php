<?php
    include ('connection.php');
    $sql = "select * from course_registration where cid=1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $uName = ucfirst($row["username"]);
            echo "<h1 style='color: tomato'>Dear , <span style='color: green;'>$uName</span></h1>";
            echo "Below are your details that you filled in the form : "; echo "<br><br>";
            echo "Enrollment Id : " .$row["cid"]; echo "<br>";
            echo "First Name : " .$row["firstname"];echo "<br>";
            echo "Last Name : " .$row["lastname"];echo "<br>";
            echo "Username : " .$row["username"];echo "<br>";
            echo "Email Id : " .$row["emailid"];echo "<br>";
            echo "Password : " .$row["pswd"];echo "<br>";
            echo "Mobile Number : " .$row["mobilenumber"];echo "<br>";
            echo "Course Opted : " .$row["course"];echo "<br>";
            echo "Gender : " .$row["gender"];echo "<br>";
            echo "Image : " .$row["img"];echo "<br>";
        }
    } else{
        echo "<h3 style='color:red;padding-left:100px;'>Error in showing the table</h3>" .$conn->error;
    }
?>

