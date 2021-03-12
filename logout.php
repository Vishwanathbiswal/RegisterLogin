<?php
session_start();

session_unset($_SESSION['uname']);

session_destroy();

header("location:index.php");