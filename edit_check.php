<?php
session_start();
include 'dbinfo.php';

$connect = new mysqli($servername, $user, $password, $dbname);
$title = $_POST['title'];
$desc = $_POST['description'];
$id = $_POST['id'];
$sql1 = "SELECT name FROM topic WHERE id=$id";
$result1 = mysqli_query($connect, $sql1);
$board1 = mysqli_fetch_array($result1);

if ($board1['name'] != $_SESSION['username']){
    echo "<script>alert('error, try again');location.replace('topic.php?id={$id}')</script>";
}
else{
    $sql2 = "UPDATE topic SET title='$title', description='$desc' WHERE id=$id and name='{$_SESSION['username']}'";
    $result2 = mysqli_query($connect, $sql2);
    echo "<script>alert('Done!');location.replace('topic.php?id={$_POST['id']}')</script>";
}
?>
