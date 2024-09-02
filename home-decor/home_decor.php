<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Home Decor</title>
    <link rel="stylesheet" href="home_decor.css">
  </head>

  <body>
    <?php
$hi = 1;
?>

    <div class="banner">

      <div class="navbar">

        <img src="savage.png" class="logo">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Bedroom</a></li>
          <li><a href="#">Dining</a></li>
          <li><a href="#">Kitchen</a></li>
          <li><a href="#">Backyard</a></li>
        </ul>

      </div>

      <div class="content">
        <h1>DESIGN YOUR HOUSE</h1>
        <p>Craft your dream home: unlock your creativity in designing spaces that <br> reflect your style, passion, purpose, and personal touch</p>

        <div>
            <button type="submit" class="fill-button" onclick="navigateTo('http://localhost:8080/github-proj/Home-Decor-Website/home-decor/hd-registration.php')">GET STARTED</button>
            <button type="submit" class="fill-button" onclick="navigateTo('hd-contact.php')">CONTACT</button>
        </div>

        </div>

      </div>

      <script>
              function navigateTo(url) {
                  window.location.href = url;
              }
          </script>

  </body>
</html>
