<?php
include("config.php");
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $name = $_POST["name"];
  $username = $_POST["username"];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  } else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO tb_user VALUES('','$name', '$username', '$email', '$hash')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
      header('location:login.php');
    } else {
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registration form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="style-reglog.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="center">
    <div class="ear ear--left"></div>
    <div class="ear ear--right"></div>
    <div class="face">
      <div class="eyes">
        <div class="eye eye--left">
          <div class="glow"></div>
        </div>
        <div class="eye eye--right">
          <div class="glow"></div>
        </div>
      </div>
      <div class="nose">
        <svg width="38.161" height="22.03">
          <path d="M2.017 10.987Q-.563 7.513.157 4.754C.877 1.994 2.976.135 6.164.093 16.4-.04 22.293-.022 32.048.093c3.501.042 5.48 2.081 6.02 4.661q.54 2.579-2.051 6.233-8.612 10.979-16.664 11.043-8.053.063-17.336-11.043z" fill="#243946"></path>
        </svg>
        <div class="glow"></div>
      </div>
      <div class="mouth">
        <svg class="smile" viewBox="-2 -2 84 23" width="84" height="23">
          <path d="M0 0c3.76 9.279 9.69 18.98 26.712 19.238 17.022.258 10.72.258 28 0S75.959 9.182 79.987.161" fill="none" stroke-width="3" stroke-linecap="square" stroke-miterlimit="3"></path>
        </svg>
        <div class="mouth-hole"></div>
        <div class="tongue breath">
          <div class="tongue-top"></div>
          <div class="line"></div>
          <div class="median"></div>
        </div>
      </div>
    </div>
    <div class="hands">
      <div class="hand hand--left">
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
      </div>
      <div class="hand hand--right">
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
      </div>
    </div>
    <form class="" action="reg.php" method="post" autocomplete="off">
      <div class="login">
        <label>
          <div class="fa fa-phone"></div>
          <input class="email" type="email" autocomplete="on" name="email" id="email" required value="" placeholder="email" />
        </label>


        <label>
          <div class="fa fa-commenting"></div>
          <input class="password" type="password" autocomplete="off" name="password" id="password" placeholder="password" />
          <button class="password-button">show</button>
        </label>
        <label>


          <div class="fa fa-commenting"></div>
          <input class="password" type="password" autocomplete="off" name="confirmpassword" id="confirmpassword" placeholder="confirm password" />
          <button class="password-button">show</button>
        </label>
        <label>
          <div class="fa fa-commenting"></div>
          <input class="text" type="text" autocomplete="off" name="name" id="name" placeholder="name" />

        </label>
        <label>
          <div class="fa fa-commenting"></div>
          <input class="text" type="text" autocomplete="off" name="username" id="username" placeholder="username" />

        </label>
        <button class="login-button" type="submit" name="submit">Register</button>
    </form>

  </div>
  <div class="social-buttons">
    <div class="social">
      <div class="fa fa-wechat"></div>
    </div>
    <div class="social">
      <div class="fa fa-weibo"></div>
    </div>
    <div class="social">
      <div class="fa fa-paw"></div>
    </div>
  </div>
  <div class="footer">Random text</div>
  </div><!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js'></script>
  <script src="script.js"></script>
</body>

</html>