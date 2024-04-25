<?php


session_start();



include 'connection.php';

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $age = mysqli_real_escape_string($con, $_POST['age']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


  
  $token = bin2hex(random_bytes(15));


  $emailquery = " SELECT * FROM user WHERE email = '$email'";
  $query = mysqli_query($con, $emailquery);


  $emailcount = mysqli_num_rows($query);

  if ($emailcount > 0) {
?>
    <script>
      alert("Email Already Exists!");
      header('location:registration.php');
    </script>
  <?php
  } else {
    if ($password === $cpassword) {

      //$insertquery = "INSERT into registration (id, username, first_name, last_name,  email, gender, `password`, cpassword, token, `status`) values ('', '$username',  '$first_name', '$last_name', '$email', '$gender', '$pass', '$cpass', '$token', 'active');";
      //'$email', '$gender', '$pass', '$cpass', '$token', 'active');";
      //$insertquery = "INSERT INTO user (email, `password`, cpassword, token) VALUES ('$email', '$pass', '$cpass', '$token');
      //INSERT INTO regular_user (u_email, `name`, gender, age) VALUES ('$email', '$username', '$gender', 18);";

      //$iquery = mysqli_query($con, $insertquery);
      $insertquery1 = "INSERT INTO user (email, `password`, cpassword, token) VALUES ('$email', '$pass', '$cpass', '$token')";
      $insertquery2 = "INSERT INTO regular_user (u_email, `name`, gender, age) VALUES ('$email', '$username', '$gender', $age)";
      $insertquery3 = "INSERT INTO reg_user_phone_no (reg_email, `phone_no`) VALUES ('$email', '$phone_no')";

      $iquery1 = mysqli_query($con, $insertquery1);
      $iquery2 = mysqli_query($con, $insertquery2);
      $iquery3 = mysqli_query($con, $insertquery3);
    }
    if ($iquery1 && $iquery2 && $iquery3) {

      header('location:login.php');
    }
  ?>
    <script>
      alert("Inserted UnSuccessful");
    </script>
  <?php
  }

  ?>
  <script>
    alert("Password are not matching");
  </script>
<?php
}

// require 'mailer/src/Exception.php';
// require 'mailer/src/PHPMailer1.php';
// require 'mailer/src/SMTP.php';
// require 'vendor/autoload.php';




// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);


// try {
//   //Server settings
//   $mail->IsSMTP();
//   $mail->SMTPDebug = 0; //Enable verbose debug output
//   $mail->isSMTP();
//   $mail->Host = "ehfazsiddiquee@gmail.com";
//   $mail->SMTPAuth = true;
//   $mail->Username = "ehfazsiddiquee@gmail.com";
//   $mail->Password = "dtuihxpgtrqmyryv"; //SMTP password
//   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
//   $mail->Port = 465; //TCP port to connect to; use 465 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//   //Recipients
//   $mail->setFrom('ehfazsiddiquee@gmail.com', 'Eousuf');
//   $mail->addAddress($email, $username); //Add a recipient
//   $mail->addAddress('ellen@example.com'); //Name is optional
//   $mail->addReplyTo('ehfazsiddiquee@gmail.com', 'Eousuf');
//   $mail->addCC('cc@example.com');
//   $mail->addBCC('bcc@example.com');

//   // //Attachments
//   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//   $mail->isHTML(true); //Set email format to HTML
//   $mail->Subject = 'Account Activation';
//   $mail->Body = "Hi, $username. Click here to activate your account http://localhost/Ashankshah%20May%202023/activate.php?token=$token";
//   $mail->AltBody = "Hi, $username. Click here to activate your account http://localhost/Ashankshah%20May%202023/activate.php?token=$token ";
//   // $mail->Body = "Hi, Click here to activate your password https://websitewrl/activate.php?token=$token";
//   // $mail->AltBody = "Hi, Click here to activate your password https://websiteurl/activate.php?token=$token ";

//   $mail->send();
//   echo 'Message has been sent';
// } catch (Exception $e) {
//   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


// 
?>