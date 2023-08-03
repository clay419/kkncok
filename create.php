<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>CREATE</title>
</head>
<body>
  <form method="post" action="check_create.php">
    <?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>alert('login first!'); location.replace('login.php')</script>";
    }
    ?>
    <h2>CREATE</h2>
    <div>
      <input type="text" name="title" placeholder="title">
    </div>
    <div>
      <textarea name="description" placeholder="description" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">
      CREATE
    </button>
  </form>
</body>
</html>
