<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/loginregistration.css">

  <title>Sign in & Sign up Form</title>
</head>


<body>


  <!-- Login PHP -->

  <?php

  include 'connection.php';



  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " SELECT * from user where email = '$email'";
    $query2 = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query2);

    if ($email_count) {
      $email_pass = mysqli_fetch_assoc($query2);

      $db_pass = $email_pass['password'];

      // $_SESSION['username'] = $email_pass['username']; //We can use that session anywhere

      $pass_decode = password_verify($password, $db_pass);

      if ($pass_decode) {
  ?>
        <script>
          alert("Login Successful");
        </script>
      <?php
        //$_SESSION['username'] = $email_pass['username']; // Set username session
        //$_SESSION['user_id'] = $email_pass['id']; // Set user ID session
        header('location: index.php'); // location: Put your user-dashboard.php file of the main website where user will redirect after login.
      } else {
      ?>
        <script>
          alert("Login Unsuccessful");
        </script>
      <?php
      }
    } else {
      ?>
      <script>
        alert("Invalid Email");
      </script>
  <?php
    }
  }
  ?>


  <!-- BODY -->
  <div class="logMainBox">
    <div class="mainBox">
      <div class="box">

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="sign-in-form">
          <h2 class="title">Welcome Back :)</h2>
          <p>To keep connected with us please login with your personal <br> information by email address and password
          </p>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email" required><br>
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required><br>
          </div>

          <input type="submit" name="login" value="Login" class="btn solid" />

          <div class="registerbtn">
            <a href="./registration.php">Register</a>

          </div>

        </form>

</body>

</html>