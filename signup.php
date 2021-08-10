<?php 
  require 'header.php';
?>

<main>
<h1>Sign up:</h1>
  <?php 
    if (isset($_GET['error'])) {
      if ($_GET['error'] == 'emptyfields') {
        echo "<p>Please fill in all details.</p>";
      } 
      else if( $_GET['error'] == 'invalidmailuid') {
        echo "<p>Invalid email or username.</p>";
      }
      else if( $_GET['error'] == 'invalidmail') {
        echo "<p>Invalid email.</p>";
      }
      else if( $_GET['error'] == 'invaliduid') {
        echo "<p>That is not a cool username, please choose different.</p>";
      }
      else if( $_GET['error'] == 'passwordcheck') {
        echo "<p>Your passwords do not match (check if you have CAPS LOCK on).</p>";
      }
      else if( $_GET['error'] == 'usernametaken') {
        echo "<p>This username is too cool, that's why someone already took it.</p>";
      }
    }
  ?>
  <form action="includes/signup.inc.php" method="post">
    <?php 
        if(isset($_GET['uid'])) {
          echo '<input type="text" name="uid" placeholder="Username" value=' . $_GET['uid'] . '>';
        } else {
          echo '<input type="text" name="uid" placeholder="Username">';
        }
        if(isset($_GET['mail'])) {
          echo '<input type="text" name="mail" placeholder="Username" value=' . $_GET['mail'] . '>';
        } else {
          echo '<input type="text" name="mail" placeholder="Email">';
        }

    ?>
    <!-- <input type="text" name='uid' placeholder='Username'> -->
    <!-- <input type="text" name='mail' placeholder='Email'> -->
    <input type="password" name='pwd' placeholder='Password'>
    <input type="password" name='pwd-repeat' placeholder='Password...again'>
    <button type='submit' name='signup-submit'>Sign up</button>
  </form> 
  <?php
    if(isset($_GET['signup'])) {
      if ($_GET['signup'] == 'success') {
        echo '<p>You have been successfully signed up.</p>';
      }
    }
  ?>
</main>

<?php 
  require 'footer.php';
?>