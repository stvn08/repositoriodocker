<?php
//Isset About Submit Button
if (isset($_POST['login-submit'])) {
  //Include The DataBase Connection With require
    require 'dbh.inc.php';
  //Capture The Data
  $mailus     = $_POST['userin'];
  $passwordus = $_POST['pwd'];
  //Validate Empty Valius And Another Checks
  if (empty($mailus) || empty($passwordus)){
    header("Location: ../index.php?error=emptyfields");
    exit();
  }else {
      $sql = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../index.php");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt,"ss",$mailus,$mailus);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
          $pwdCheck = password_verify($passwordus,$row['password']);
          if ($pwdCheck == false || $pwdCheck !== true){
            header("Location:../index.php?error=wrongup");
            exit();
          }
          elseif ($pwdCheck == true){
            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userName'] = $row['username'];
            header("Location:../index.php?login=success");
            exit();
            }
          else{
            header("Location:../index.php?error=wrongup");
            exit();
          }

        }else{
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
  }
}else{
  //Kik Out The Script Kid
  header("Location:../index.php");
  exit();
}
