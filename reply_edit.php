<?php
session_start();
include 'dbinfo.php';

$reply = $_POST['idx'];

$connect = new mysqli($servername, $user, $password, $dbname);
$sql = "SELECT * FROM reply WHERE idx=$reply";
$result = mysqli_query($connect, $sql);
$board = mysqli_fetch_array($result);
if ($board['name'] != $_SESSION['username']){
    echo "<script>alert('access denied');history.back();</script>";
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>EDIT REPLY</title>
</head>
<body>
  <form method="post" action="reply_edit_check.php">
    <h2>EDIT REPLY</h2>
    <div>
      <input type="text" name="reply" placeholder="reply" value='<?php echo $board['content']?>'>
    </div>
    <input type="hidden" name="idx" value="<?php echo $reply;?>">
    <button type="submit">
      EDIT REPLY
    </button>
  </form>
</body>
</html>
