<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav>
      <ul class='navlinks'>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Text</a></li>
        <li><a href="#">Text</a></li>
        <li><a href="#">Text</a></li>
      </ul>
      <div>
        <?php
          if(isset($_SESSION['userID'])) {
            echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Log out</button>
          </form>';
          } else {
            echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Email address or username...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="login-submit">Log in</button>
          </form>
          <a href="signup.php">Sign up</a>';
          }
        ?>
        
        <!-- <form action="includes/login.inc.php" method="post">
          <input type="text" name="mailuid" placeholder="Email address or username...">
          <input type="password" name="pwd" placeholder="Password...">
          <button type="submit" name="login-submit">Log in</button>
        </form> -->
        <!-- <a href="signup.php">Sign up</a> -->

        <!-- <form action="includes/logout.inc.php" method="post">
          <button type='submit' name='logout-submit'>Log out</button>
        </form> -->
      </div>
    </nav>
  </header>
