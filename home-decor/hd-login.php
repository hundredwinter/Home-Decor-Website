<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: exclusive.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login Form</title>
     <link rel="stylesheet" href="hd-decor.css">
   </head>
   <body>
     <div class="container">
       <?php
      if(isset($_POST["login"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "All fields must be completed before submitting";
    } else {
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "hd-database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
          if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: exclusive.php");
            die();
          }else{
            echo "Password does not match";
          }
        }else{
          echo "Email does not match";
        }
      }
    }
        ?>
        <form action="hd-login.php" method="post">
          <div class="form-group">
            <input type="email" name="email" placeholder="Enter Email:" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="Enter Password:" class="form-control">
          </div>
          <div class="form-btn">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
          </div>
        </form>
        <div><p>Not registered yet <a href="hd-registration.php">Register Here</a></p>
        </div>

     </div>

   </body>
 </html>
