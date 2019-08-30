<?php

//start a session
if (!session_start()) {
    echo "<br>error<br>";
}

$u_email = $_POST["email"];
$u_password = $_POST["password"];
$u_password = md5($u_password);

require_once 'Qconnect.php';

$sql_userid = "SELECT user_id FROM quora.users where email='$u_email' AND password='$u_password'";
$result_userid = $conn->query($sql_userid);
$value = mysqli_fetch_object($result_userid);
if ($value !== NULL) {
    $_SESSION["u_id"] = $value->user_id;
//echo $_SESSION["u_id"];
} else {
    echo "invalid credentials<br>";
    echo "Redirecting to home page NOW .. .. ..<br>";
    header("refresh:1;url=home.php");
    exit();
}

$conn->close();
/*
  while ($obj = mysqli_fetch_object($result)) {
  printf ("%s (%s)\n", $obj->Name, $obj->CountryCode);
  }
 */

header('Location: menu.php');


//$_SESSION["u_id"] = $value["user_id"];
//echo $_SESSION["u_id"];
//$row = mysqli_fetch_assoc($user_id);
//$row = mysql_fetch_row($user_id);
//echo $row["user_id"];
//$_SESSION["email"]=$_POST["email"];
//$_SESSION["password"]=$_POST["password"];
//echo $_SESSION["email"];
//echo $_SESSION["password"];
//$user_id = 1;
//$_SESSION["u_id"] = $user_id;
?>
