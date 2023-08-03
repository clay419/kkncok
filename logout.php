<?php
session_start();
session_destroy();
?>
<script>
alert('logout!');
location.replace('forum.php');
</script>
