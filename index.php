<?php require "header.php"; ?>
<main>
  <div class="main-div">
    <?php
      if (isset($_SESSION['userId']) && isset($_SESSION['userName'])) {
        echo "<p> You'r Logged In </p>";
      }else {
        echo "<p> You'r Not User </p>";
      }
    ?>


  </div>
</main>
<?php require "footer.php"; ?>
