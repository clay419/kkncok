<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>topic <?php $_GET['id'] ?></title>
</head>
<body>
    <?php
        session_start();
        include 'dbinfo.php';
        $id = addslashes($_GET['id']);
        $connect = new mysqli($servername, $user, $password, $dbname);
        $sql = "SELECT * FROM topic WHERE id=".$id;
        $result = mysqli_query($connect, $sql);
        $board = mysqli_fetch_array($result);
        echo '<h1>'.htmlentities($board['title']).'</h1><h4>['.$board['created'].'  by '.htmlentities($board['name']).']<hr></h4><h3>'.htmlentities($board['description']).'</h3>';
        if($_SESSION['username'] == $board['name']){
            echo "<button onclick=\"location.href='delete.php?id=".$_GET['id']."'\">DELETE</button>";
            echo "<button onclick=\"location.href='edit.php?id=".$_GET['id']."'\">EDIT</button>";
        }
    ?>
    <button onclick="location.href='forum.php'">Go Back</button>

    <br><hr><br>

    <form method="post" action="reply.php?id=<?php echo $_GET['id'] ?>">
        <div>
            <textarea name="reply" placeholder="reply" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <button type="submit">reply</button>
    </form>
    <?php
    $sql = "SELECT name, content, date, idx from reply where topic=".$id;
    if ($result = mysqli_query($connect, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
            echo "<hr>";
            echo htmlentities($row[0]);
            echo "  ";
            echo htmlentities($row[2]);
            if($row[0] == $_SESSION['username']){
                echo "
                <form action='reply_edit.php' method='post'>
                    <input type='hidden' name='idx' value='$row[3]'>
                    <button type='submit'>edit</button>
                </form>
                ";
                echo "
                <form action='reply_delete.php' method='post'>
                    <input type='hidden' name='idx' value='$row[3]'>
                    <button type='submit'>delte</button>
                </form>
                ";
            }
            
            echo "<h4>".htmlentities($row[1])."</h4>";
            
        }
    }
    ?>
</body>
</html>
