<?php
include "../../connection.php";
$email = $_GET["email"];
$email = mysqli_real_escape_string($con, $email);
$sql = "DELETE FROM `user` WHERE email = '$email'";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: ../../user-dashboard.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($con);
}
