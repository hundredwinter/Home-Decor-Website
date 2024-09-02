<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: hd-login.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="register.css">
     <title>User Dashboard</title>
   </head>
   <body>
<div class="container">
  <h1>Welcome to Dashboard</h1>
  <a href="hd-logout.php" class="btn btn-warning">Logout</a>
</div>
   </body>
 </html>
