<?php
session_start();
include 'dbinfo.php';

$reply = $_POST['idx'];
echo $_POST['idx'];

$connect = new mysqli($servername, $user, $password, $dbname);
$sql = "DELETE FROM reply WHERE name='{$_SESSION['username']}' and idx=$reply";
$result = mysqli_query($connect, $sql);
?>
<script>history.back();</script>
