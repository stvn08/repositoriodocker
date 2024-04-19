<?php
if (isset($_POST['signupsubmit'])) {
    //Connect To DB
    require 'dbh.inc.php';
    //Record Input Data
    $username   = $_POST['unm'];
    $email      = $_POST['mail'];
    $password   = $_POST['pwdr'];
    $cpassword  = $_POST['pwdrc'];

    //Validate
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)){
      header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/",$username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=ivalidusernameormail");
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=ivalidmail&username=".$username);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      header("Location: ../signup.php?error=ivalidusername&mail=".$email);
      exit();
    }
    else if ($password !== $cpassword){
      header("Location: ../signup.php?error=passwordchedkid=".$username."&mail=".$email);
      exit();
    }
    else {
        //The DB Statement
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn) ;
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header("Location: ../signup.php?error=serror");
          exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
              header("Location: ../signup.php?error=usertaken&mail=".$mail);
              exit();
            }
            else{
              $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../signup.php?error=serror");
                exit();
              }
              else{
                $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();

              }
            }
        }
    }
    //Close The Connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
  header("Location:../signup.php");
  exit;
}
