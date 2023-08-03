<DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fil Upload</title>
    <!-- <link rel="stylesheet" href="css/menu.css" type="text/css"> -->
</head>
<body>
    <!-- <div id="tabs">
        <ul>
            <li><a href="http://www.free-css.com/%22%3E<span>CSS Templates</span></a></li>
            <li><a href="http://www.free-css.com/%22%3E<span>CSS Layouts</span></a></li>
        </ul>
    </div> -->
    <div>
        <div style="width:70%; float:left;">
            <h1>
                File Upload
            </h1>
        </div>
        <div style="width:30%; float:right; text-align:right;">
            <?php include 'index.php'?>
        </div>
    </div>
    <hr>
    <div>
    <table>
    <tr>
        <th>file id</th>
        <th>original file name</th>
        <th>saved file name</th>
        <th>uploader</th>
    </tr>
    <?php
    include 'dbinfo.php';

    $connect = new mysqli($servername, $user, $password, $dbname);
    $sql = "SELECT * FROM upload_file ORDER BY time DESC";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
        <td>{$row['file_id']}</td>
        <td><a href=\"download.php?file_id={$row['file_id']}\">{$row['name_orig']}</a></td>
        <td>{$row['name_save']}</td>
        <td>{$row['uploader']}</td>
        </tr>";
    }
    ?>
    </table>
    <button onclick="location.href='upload.php'">Upload file</button>
    <button onclick="location.href='forum.php'">forum</button>
    </div>
</body>
</html>
