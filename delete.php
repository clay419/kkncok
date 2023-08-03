<?php
session_start();
include 'dbinfo.php';

$connect = new mysqli($servername, $user, $password, $dbname);
$sql = "DELETE FROM topic WHERE name='{$_SESSION['username']}' and id={$_GET['id']}";
$result = mysqli_query($connect, $sql);

echo "<script>location.replace('forum.php');</script>";
?>
