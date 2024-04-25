<?php
include "../../connection.php";

if (isset($_POST["submit"])) {
   $username = mysqli_real_escape_string($con, $_POST['name']);
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
      </script>
   <?php
   } else {
      if ($password === $cpassword) {

         $insertquery1 = "INSERT INTO user (email, `password`, cpassword, token) VALUES ('$email', '$pass', '$cpass', '$token')";
         $insertquery2 = "INSERT INTO regular_user (u_email, `name`, gender, age) VALUES ('$email', '$username', '$gender', $age)";
         $insertquery3 = "INSERT INTO reg_user_phone_no (reg_email, `phone_no`) VALUES ('$email', '$phone_no')";

         $iquery1 = mysqli_query($con, $insertquery1);
         $iquery2 = mysqli_query($con, $insertquery2);
         $iquery3 = mysqli_query($con, $insertquery3);
      }
      if ($iquery1 && $iquery2 && $iquery3) {

         header("Location: ../../user-dashboard.php?msg=New record created successfully");
      }
   ?>
      <script>
         alert("Inserted UnSuccessful");
      </script>
<?php
   }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>
</head>

<body>


   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" name="name" required placeholder="eousuf_siddiquee">
               </div>
               <div class="col">
                  <label class="form-label">Age:</label>
                  <input type="number" class="form-control" name="age" required placeholder="Eousuf">
               </div>

               <div class="col">
                  <label class="form-label">Phone no:</label>
                  <input type="text" class="form-control" name="phone_no" required placeholder="Siddiquee">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" required placeholder="mail@example.com">
            </div>

            <div class="form-group mb-3">
               <label>Gender:</label>
               &nbsp;
               <input required type="radio" class="form-check-input" name="gender" id="male" value="male">
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input required type="radio" class="form-check-input" name="gender" id="female" value="female">
               <label for="female" class="form-input-label">Female</label>
            </div>

            <div class="mb-3">
               <label class="form-label">Password:</label>
               <input type="password" placeholder="Password" name="password" required />
            </div>
            <div class="mb-3">
               <label class="form-label">Confirm Password:</label>
               <input type="password" placeholder="Confirm Password" name="cpassword" required />
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="../../user-dashboard.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>