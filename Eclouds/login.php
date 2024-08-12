<?php
	include('database/db.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if (password_verify($password, $row['password'])) {
				echo'<script>
					alert("successfully loggedin");
					location.href="?page=about";
				</script>';
			} else {
				echo '<div class="error-message"><b>Invalid credentials</b></div>';
			}
		} else {
			echo "No user found with that username.";
		}
		$conn->close();
	}
?>

<body>
	<div class="wrapper">
		<h2>Login</h2>
		<form method="POST">
		    <div class="input-box">
				<input type="text" name="username" placeholder="Enter your name" required>
			</div>
			<div class="input-box">
				<input type="password" name="password" placeholder="Confirm password" required>
			</div>
			<div class="input-box button">
				<input type="Submit" value="Login">
			</div>
		</form>
	</div>
</body>