<?php
session_start();
include 'dbinfo.php';

$topic = $_GET['id'];

$connect = new mysqli($servername, $user, $password, $dbname);
$sql = "SELECT * FROM topic WHERE id={$topic}";
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
  <title>EDIT</title>
</head>
<body>
  <form method="post" action="edit_check.php">
    <h2>EDIT</h2>
    <div>
      <input type="text" name="title" placeholder="title" value='<?php echo $board['title']?>'>
    </div>
    <div>
      <textarea name="description" placeholder="description" cols="30" rows="10"><?php echo $board['description']?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <button type="submit">
      EDIT
    </button>
  </form>
</body>
</html>
