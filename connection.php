<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testdb";

    // creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // checking connection
    if($conn) {
        // echo "Connection successful..!!";
        echo "";
    }
    else {
        echo "<h4 style='color: red';>connection failed</h4>";
    }

?>

