<?php
include ("config.php");
$login=0;
$invalid=0;
$user=0;
if(isset($_POST["submit"])){
    $home="home.html";
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $sql="SELECT * FROM tb_user WHERE username ='$usernameemail' OR email='$usernameemail'";
    $result = mysqli_query($conn, $sql);
    if($result){
      $num=mysqli_num_rows($result);
        if($num> 0){
          while($row = mysqli_fetch_array($result)){
            if(password_verify($password, $row["password"])){
                $login=1;
                session_start();
                $_SESSION['usernameemail'] = $usernameemail;
                header("Location: $home");
              }
              else{
                $invalid=1;
              }
            }
          }
          else{
            $user=1;
          }
        }
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style-reglog.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .reg{
    color: #243946;
    padding: 10px;
    text-align: center;
  }
  .reg a{
    color: #243946;
    text-decoration:underline;
  }
</style>

</head>
<body>
  <?php
    if($invalid){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Invalid Password!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  ?>
    <?php
    if($user){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>User not Registered! </strong> Please register first!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  ?>
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
  <form class="" action="login.php" method="post" autocomplete="off">
  <div class="login">
    <label>
      <div class="fa fa-phone"></div>
      <input class="username" type="text" autocomplete="on" id="usernameemail" name="usernameemail" placeholder="username or email"/>
    </label>
    <label>
      <div class="fa fa-commenting"></div>
      <input class="password" type="password" autocomplete="off" id="password" name="password" placeholder="password"/>
      <button class="password-button">show</button>
    </label>
    <button class="login-button" type="submit" name="submit">Login</button>
    <div class="reg">
      <h6>Not a user? <a href="index.php">Register Here</a></h6>
    </div>
  </div>
</form>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js'></script><script  src="script.js"></script>

</body>
</html>

