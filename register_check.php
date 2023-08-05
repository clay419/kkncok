<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
    <?php
    session_start();
    include 'dbinfo.php';

    $connect = new mysqli($servername, $user, $password, $dbname);
    $username = $_POST['name'];
    $userid = $_POST['id'];
    $userpw = $_POST['pw'];
    $sql1 = "SELECT * FROM userdata WHERE id='$userid' or name='$username'";
    $result1 = mysqli_query($connect, $sql1);
    if($row = mysqli_fetch_row($result1)){
        echo "<script>alert(\"userid or username is already exist!\")</script>";
        echo "<script>location.replace('register.php');</script>";
        exit;
    }
    $sql = "INSERT INTO userdata (id, pw, name) VALUES ('$userid', '$userpw', '$username')";
    $result = mysqli_query($connect, $sql);
    if($result) {
        echo "<script>location.replace('login.php');</script>";
    }
    else{
        echo "<script>alert(\"error, try again\")</script>";
        echo "<script>location.replace('register.php');</script>";
    }
   ?>
</body>
