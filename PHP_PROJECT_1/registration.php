 <?php
  include 'connection.php';

  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="assets/css/loginregistration.css">

 </head>
 <style>
   * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
   }

   body,
   input {
     font-family: "Poppins", sans-serif;
   }

   .rpass p a {
     text-decoration: none;
     color: #333;
     font-weight: 500;
   }

   .success {
     background-color: greenyellow;
     text-align: center;
     padding-top: 15px;
     padding-left: 10px;
     padding-right: 10px;
   }

   .register {
     text-align: center;
   }

   .title {
     font-size: 2rem;
   }
 </style>

 <body>
   <div class="logMainBox">
     <div class="mainBox">
       <div class="box">
         <form action="mail.php" method="POST" class="sign-up-form">
           <h2 class="title">Sign up Here</h2>

           <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="text" name="username" placeholder="Username" required />
           </div>
           <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="number" name="age" placeholder="Age" required />
           </div>
           <div class="input-field">
             <i class="fas fa-user"></i>
             <input type="text" name="phone_no" placeholder="Phone_no" required />
           </div>
           <div class="input-field">
             <i class="fas fa-envelope"></i>
             <input type="email" placeholder="example@mail.com" name="email" required />
           </div>



           <div class="input-field">
             <i class="fas fa-lock"></i>
             <input type="password" placeholder="Password" name="password" required />
           </div>
           <div class="input-field">
             <i class="fas fa-lock"></i>
             <input type="password" placeholder="Confirm Password" name="cpassword" required />
           </div>

           <div class="input-field">
             <div class=" gender">
               <label>Gender:</label>
               &nbsp;
               <input required type="radio" class="form-check-input" name="gender" id="male" value="male">
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input required type="radio" class="form-check-input" name="gender" id="female" value="female">
               <label for="female" class="form-input-label">Female</label>
             </div>
           </div>

           <input type="submit" name="submit" class="btn" value="Register" />


           <div class="registerbtn">
             <a href="./login.php">Login</a>
             <a href="./index.php">Home</a>

           </div>

         </form>
       </div>
     </div>
   </div>
 </body>

 </html>