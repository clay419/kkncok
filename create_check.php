<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('login first!'); location.replace('login.php')</script>";
}
include 'dbinfo.php';
$connect = new mysqli($servername, $user, $password, $dbname);

$title = $_POST['title'];
$des = $_POST['description'];
$username = $_SESSION['username'];
$sql = "
    INSERT INTO topic 
    (title, description, created, name) 
    VALUES (
    '$title', '$des', NOW(), '$username'
    )
";
$result = mysqli_query($connect, $sql);
echo "<script>location.replace('forum.php')</script>";

?> 

