<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('login first!'); location.replace('login.php')</script>";
} else {
    include 'dbinfo.php';

    $connect = new mysqli($servername, $user, $password, $dbname);

    if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {
        $file = $_FILES['upfile'];
        $error = false;
        $upload_directory = 'file/';
        $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
        $allowed_extensions = explode(',', $ext_str);
        
        $max_file_size = 5242880;
        $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
        
        // 확장자 체크
        if(!in_array($ext, $allowed_extensions)) {
            echo "<script>alert('업로드할 수 없는 확장자 입니다.')</script>";
            $error = true;
        }

        
        // 파일 크기 체크
        if($file['size'] >= $max_file_size) {
            echo "<script>alert('5MB 까지만 업로드 가능합니다.')</script>";
            $error = true;
        }
        if($error == false){
            $path = md5(microtime()) . '.' . $ext;
            if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
                $sql = "INSERT INTO upload_file (name_orig, name_save, uploader, time) VALUES('{$file['name']}','$path','{$_SESSION['username']}',now())";
                $result = mysqli_query($connect, $sql);
                echo "<script>alert('upload success');location.href='file_list.php';</script>";
            }else{
                echo "<script>alert('upload error');location.href='upload.php';</script>";
            }
        }
    } else {
        echo "<script>alert('upload error');location.href='upload.php';</script>";
    }
}
?>
