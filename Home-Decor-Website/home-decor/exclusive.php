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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <title>User Dashboard</title>
   </head>
   <body>
<div class="container">
  <h1>Welcome to Dashboard</h1>
  <a href="hd-logout.php" class="btn btn-warning">Logout</a>
</div>
   </body>
 </html>
