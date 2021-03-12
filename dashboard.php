<?php
session_start();

if(!isset($_SESSION['uname']))
 {
header("location:index.php");

 }

?>


<table width="100%" border="1">

<tr><td><a href="dashboard.php">Home</a></td><td><a href="logout.php">Logout</a></td>
<td>welcome <?php echo $_SESSION['uname'];?></td></tr>


<tr><td colspan="3"><center>welcome home</center></td></tr>


</table>