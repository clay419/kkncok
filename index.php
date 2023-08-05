<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>title</title>
</head>
<body>
	<h1>
		<?php
		session_start();
		if(!isset($_SESSION['username'])) {
			echo "Login please!";
		}else{
			$user = $_SESSION['username'];
			echo "Hi, $user";
		}
		?>
	</h1>
	<?php
		if(!isset($_SESSION['username'])) {
			echo "<button type=\"button\" onclick=\"location.href='login.php'\"> login </button>";
			echo "<button type=\"button\" onclick=\"location.href='register.php'\"> sign up </button>";
		}else{
			echo "<button type=\"button\" onclick=\"location.href='logout.php'\"> logout </button>";
		}
		?>
	<!-- <button type="button" onclick="location.href='forum.php'"> GO TO FORUM </button>	 -->
</body>

</html>

