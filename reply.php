<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>alert('login first!');location.href='login.php'</script>";
    }else{
        include 'dbinfo.php';

        $topic = $_POST['id'];
        $name = $_SESSION['username'];
        $content = $_POST['reply'];

        $connect = new mysqli($servername, $user, $password, $dbname);
        $sql = "INSERT INTO reply ( topic,name, content, date) VALUES ({$topic}, '{$name}', '{$content}', NOW())";
        $result = mysqli_query($connect, $sql);
    }
?>
<script>location.href="topic.php?id=<?php echo $topic?>";</script>
