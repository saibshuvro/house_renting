<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "house_renting_secvice";

$con = mysqli_connect($server, $user, $password, $db);

if ($con) {
?>
    <!-- <script>
        alert("Connection Successful");
    </script> -->
<?php
} else {
?>
    <!-- <script>
        alert("Connection Unsuccessful");
    </script> -->
<?php
}




?>