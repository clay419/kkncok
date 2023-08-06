<?php
function getparam($or){
    $kw = '';
    $op = '';
    $ob = '';
    if(isset($_GET['keyword'])){
        $kw = $_GET['keyword'];
    }
    if(isset($_GET['option'])){
        $op = $_GET['option'];
    }
    if(isset($_GET['orderby'])){
        if($_GET['orderby'] == $or.'desc'){
            $ob = $or.'asc';
        }
        else{
            $ob = $or.'desc';
        }
    }
    echo "keyword={$kw}&option={$op}&orderby={$ob}";
}
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forum</title>
</head>
<body>
    <div>
        <div style="width:70%; float:left;">
            <h1>
                Forum
            </h1>
        </div>
        <div style="width:30%; float:right; text-align:right;">
            <?php include 'index.php'?>
        </div>
    </div>
    <div>
    <form method="get" action="forum.php">
        <input type="text" name="keyword" placeholder="search">
        <select name="option">
            <option value="title">Title</option>
            <option value="content">Content</option>
            <option value="name">Name</option>
        </select>
        <input type="hidden" name='orderby'>
        <button type="submit">search</button>
    </form>
    </div>
    <div>
    <hr>
    <table>
    <thead>
        <tr>
            <th><a href='forum.php?<?php getparam('id');?>'>id</a></th>
            <th><a href='forum.php?<?php getparam('title');?>'>title</a></th>
            <th><a href='forum.php?<?php getparam('name');?>'>name</a></th>
            <th><a href='forum.php?<?php getparam('date');?>'>date</a></th>
        </tr>
    </thead>
    <tbody>
    <?php
        include 'dbinfo.php';
    
        $connect = new mysqli($servername, $user, $password, $dbname);
        $sql = "SELECT * FROM topic";
        if(isset($_GET['keyword']) && isset($_GET['option'])){
            switch($_GET['option']){
                case 'title':
                    $opt = 'title';
                    break;
                case 'content':
                    $opt = 'description';
                    break;
                case 'name':
                    $opt = 'name';
                    break;
                default:
                    $opt = NULL;
                    break;
            }
            if($opt != NULL){
                $keyword = addslashes($_GET['keyword']);
                $sql .= " WHERE {$opt} like '%{$keyword}%'";
            }
        }
        switch($_GET['orderby']){
            case 'iddesc':
                $sql .= ' ORDER BY id desc';
                break;
            case 'titledesc':
                $sql .= ' ORDER BY title desc';
                break;
            case 'namedesc':
                $sql .= ' ORDER BY name desc';
                break;
            case 'datedesc':
                $sql .= ' ORDER BY created desc';
                break;
            case 'idasc':
                $sql .= ' ORDER BY id asc';
                break;
            case 'titleasc':
                $sql .= ' ORDER BY title asc';
                break;
            case 'nameasc':
                $sql .= ' ORDER BY name asc';
                break;
            case 'dateasc':
                $sql .= ' ORDER BY created asc';
                break;
        }
        
        
        $result = mysqli_query($connect, $sql);
        while($board = mysqli_fetch_array($result)){ 
            echo "<tr><td>".$board['id']."</td><td><a href='topic.php?id=".$board['id']."'>".$board['title']."</a></td><td>".$board['name']."</td><td>".$board['created']."</td></tr>";
        }
    ?>
    </tbody>
    </table>
    <button onclick="location.href='create.php'">Create</button>
    <button onclick="location.href='file_list.php'">File_list</button>

</div>
</body>
</html>
