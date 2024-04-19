<?php require "header.php" ?>
  <main>
    <section class="note">
      <div class="primary">
        <?php
          if (isset($_GET['error'])){
          if($_GET['error'] == "emptyfields"){
            echo "<span>"."Fill Your inputs"."</span>";
          }elseif($_GET['error'] == "ivalidusernameormail"){
            echo "<span>"."Fill Your inputs"."</span>";
          }elseif ($_GET['error'] == "ivalidmail") {
            echo "<span>"."Your mail is not valid"."</span>";
          }elseif ($_GET['error'] == "passwordchedkid") {
            echo "<span>"."The Password Is Not Matched"."</span>";
          }elseif ($_GET['error'] == "usertaken") {
            echo "<span>"."This UserName Is Taken"."</span>";
          }elseif ($_GET['error'] == "serror") {
            header("Location:index.php");
            exit();
          }
        }elseif (isset($_GET['signup']) && $_GET['signup'] == "success"){
        echo "<span class='success'>"."You'r successfully Signup "."</span>";
      }
      ?>
      </div>
      </section>
    <scetion class="section-default">
        <form id="formone" onsubmit="return crousa();" name="signform" class="signup-form" action="includes/signup.inc.php" method="post" >
          <input type="text" name="unm" placeholder="Username" minlength="6" maxlength="20" required />
          <span id="errorUser"></span>
          <br/>
          <input type="email" name="mail" placeholder="E-mail" minlength="15" maxlength="42" required/>
          <span id="errorEmail"></span>
          <br/>
          <input type="password" name="pwdr" placeholder="Password" minlength="12" maxlength="22" required/>
          <span id="errorPass"></span>
          <br/>
          <input type="password" name="pwdrc" placeholder="Confirm Password" minlength="12" maxlength="22" required/>
          <span id="errorPassC"></span>
          <br/>
          <button type="submit" name="signupsubmit">SignUp</button>
          <p id="submitError"></p>
        </form>
    </scetion>
  </main>
<?php require "footer.php" ?>
