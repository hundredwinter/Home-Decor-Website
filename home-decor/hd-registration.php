<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: exclusive.php");
  exit();
}

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "hd_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

$errors = array();

       if (isset($_POST["submit"])) {
         $fullName = $_POST["fullname"];
         $email = $_POST["email"];
         $password = $_POST["password"];
         $passwordRepeat = $_POST["repeat_password"];

         $passwordHash = password_hash($password, PASSWORD_DEFAULT);



         if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
           $errors[] = "All fields are required";
         } else {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors[] = "Email is not valid";
         }
         if (strlen($password)<8) {
           $errors[] = "Password must be at least 8 characters long";
         }
         if ($password!==$passwordRepeat) {
           $errors[] = "Password doesn't match";
         }

         if(count($errors) === 0) {
         $sql = "SELECT * FROM users WHERE email = ?";
         $stmt = mysqli_prepare($conn, $sql);
         mysqli_stmt_bind_param($stmt, "s", $email);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         $rowCount = mysqli_num_rows($result);
         if ($rowCount>0) {
           $errors[] = "Email already exists!";
         } else {
           $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
           $stmt = mysqli_prepare($conn, $sql);
           if ($stmt) {
             mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
             if (mysqli_stmt_execute($stmt)) {
               echo "<div class= 'alert-success'>You are registered successfully.</div>";
             } else {
               $errors[] = "Registration failed, please try again.";
             }
           } else {
             $errors[] = "Something went wrong with the query.";
           }
         }
       }
     }
         if (count($errors)>0) {
           foreach ($errors as $error) {
             echo "<div class= 'alert'>$error</div>";
           }
         }
       }
        ?>

         <!DOCTYPE html>
         <html lang="en" dir="ltr">
           <head>
             <meta charset="utf-8">
             <title>Registration Form</title>
             <link rel="stylesheet" href="hd-decor.css">
             <script src="https://kit.fontawesome.com/6b22b1e5f6.js" crossorigin="anonymous"></script>
           </head>
           <body>

             <div class="container">

        <div class="form-box">
        <h1>Sign Up</h1>
        <div class="input-group">
        <form action="hd-registration.php" method="post">

        <div class="form-group">
          <i class="fa-solid fa-user"></i>
          <input type="text" class="form-control" name="fullname" placeholder="Full Name: ">
        </div>

        <div class="form-group">
          <i class="fa-solid fa-envelope"></i>
          <input type="text" class="form-control" name="email" placeholder="Email: ">
        </div>

        <div class="form-group">
          <i class="fa-solid fa-lock"></i>
          <input type="password" class="form-control" name="password" placeholder="Password: ">
        </div>

        <div class="form-group">
          <i class="fa-solid fa-lock"></i>
          <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password: ">
        </div>

        <div class="btn-field">
          <input type="submit" class="register-btn" name="submit" value="Register">
        </div>

    </form>
  </div>
          </div>
    <div>
      <div class="move">
        <p>Already Registered? <a href="hd-login.php">Login Here</a></p>
      </div>
    </div>
  </div>
   </body>
 </html>
