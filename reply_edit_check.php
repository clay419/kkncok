<?php
session_start();
include 'dbinfo.php';

$connect = new mysqli($servername, $user, $password, $dbname);
$idx = $_POST['idx'];
$reply = $_POST['reply'];
$sql1 = "SELECT name, topic FROM reply WHERE idx=$idx";
$result1 = mysqli_query($connect, $sql1);
$board1 = mysqli_fetch_array($result1);

if ($board1['name'] != $_SESSION['username']){
    echo "<script>alert('error, try again');location.replace('topic.php?id={$id}')</script>";
}
else{
    $sql2 = "UPDATE reply SET content='$reply' WHERE idx=$idx and name='{$_SESSION['username']}'";
    $result2 = mysqli_query($connect, $sql2);
    echo "<script>alert('Done!');location.replace('topic.php?id={$board1['topic']}')</script>";
}
?> 

