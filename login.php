<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
</head>
<body>
  <form method="post" action="check_login.php">
    <h2>Login</h2>
    <div>
      <input type="text" name="id" placeholder="ID">
    </div>
    <div>
      <input type="password" name="pw" placeholder="Password">
    </div>
    <button type="submit" class="btn" onclick="button()">
      LOGIN
    </button>
    <div>
      <a href="register.php">sign up</a>
    </div>
  </form>
</body>
</html>

<?php
  session_start();
  if(isset($_SESSION['username'])){
    echo "<script>alert('already logged in!');history.back();</script>";
  }
?>
