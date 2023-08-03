<?php
$file_id = $_GET['file_id'];

include 'dbinfo.php';

$connect = new mysqli($servername, $user, $password, $dbname);
$sql = "SELECT file_id, name_orig, name_save FROM upload_file WHERE file_id = $file_id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$name_orig = $row['name_orig'];
$name_save = $row['name_save'];
$fileDir = "file";
$fullPath = $fileDir."/".$name_save;
$length = filesize($fullPath);

if(file_exists($fullPath)){
    header("Content-Type:application/octet-stream");
    header("Content-Disposition:attachment;filename=$name_orig");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:".$length);
    header("Cache-Control:cache,must-revalidate");
    header("Pragma:no-cache");
    header("Expires:0");
    if(is_file($fullPath)){
        $fp = fopen($fullPath,"r");
        while(!feof($fp)){
          $buf = fread($fp,8096);
          $read = strlen($buf);
          print($buf);
          flush();
        }
        fclose($fp);
    }
  } else{
    echo "<script>alert('존재하지 않는 파일입니다.')</script>";
  }
?>
<script>
    location.href='file_list.php';
</script>
