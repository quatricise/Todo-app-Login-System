<?php 
  require 'header.php';
  include_once 'includes/dbh.inc.php';
?>

<main>
  <?php 
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['usersID'];
        $sqlImg = "SELECT * FROM profileimg WHERE userID='$id'";
        $resultImg = mysqli_query($conn, $sqlImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
          echo '<div>';
          if($rowImg['stat'] == 0) {
            echo '<img src="uploads/profile_' . $id . '">';
          } else {
            echo '<img src="uploads/profile_default.png">';
          }
          echo $row['usersUsername'];
          echo '</div>';
        }
      }
    }

    if(isset($_SESSION['userID'])) {
      echo '<p>You are logged in as ' . $_SESSION['userName'] . '.</p>';

      echo '<form action="upload.php" method="POST" enctype="multipart/form-data">
              <input type="file" name="image" id="image-input">

              <button type="submit" name="image-submit" id="post-button-image" title="You need to press this to upload your chosen image, i know, it"s jank...">Submit&nbspimage</button>
              <label for="image-input" title="Add a new image item..." id="add-button-image"><i class="far fa-file-image"></i></label>
            </form>';
    } 
    else {
      echo '<p>You are logged out.</p>';
    }
  ?>
</main>

<?php 
  require 'footer.php';
?>