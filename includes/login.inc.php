<?php

if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];
  if( empty($mailuid) || empty($password) ) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE usersUsername=? OR usersEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
     
      if($row = mysqli_fetch_assoc($result)) {
        $passwordCheck = password_verify($password, $row['usersPassword']);
        if ($passwordCheck == false) {
          header("Location: ../index.php?error=incorrectpassword");
          exit();
        } else if ($passwordCheck == true) {
          session_start();
          $_SESSION['userID'] = $row['usersID'];
          $_SESSION['userName'] = $row['usersUsername'];
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=usernametaken&mail=" . $email);
        exit();
      }
    }
  }
}
else {
  header('Location: ../index.php?unauthorizedaccess');
  exit();
}