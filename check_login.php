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

   //login.php에서 입력받은 id, password
   $userid = $_POST['id'];
   $userpw = $_POST['pw'];

   $sql = "SELECT * FROM userdata WHERE id = '$userid' AND pw = '$userpw'";
   $result = mysqli_query($connect, $sql);
   if($row = mysqli_fetch_array($result)){
      if($row['pw'] == $userpw){
         $_SESSION['username'] = $row['name'];
         echo "<script>location.replace('forum.php');</script>";
      }
      "<script>alert('login fail : check your id or password');</script>";
   }
   echo "<script>alert('login fail : check your id or password');</script>";
   echo "<script>location.replace('forum.php');</script>";
   ?>
</body>
