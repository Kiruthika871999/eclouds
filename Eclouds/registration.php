<?php
	include('database/db.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$email = $_POST['email'];
		
		if ($_POST['password'] != $_POST['pass']) {
			echo '<div class="error-message"><b>password not matching</b></div>';
		} else {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
			if ($conn->query($sql) === TRUE) {
				echo '<div class="smessage"><b>Sucessfully registered</b></div>';
			} else {
				echo '<div class="error-message"><b>'. $conn->error .'</b></div>';
			}
			$conn->close(); 
		}
	}
?>

<body>
	<div class="wrapper">
		<h2>Registration</h2>
		<form method="POST">
			<div class="input-box">
				<input type="text" name="username" placeholder="Enter your name" required>
			</div>
			<div class="input-box">
				<input type="text" name="email" placeholder="Enter your email" required>
			</div>
			<div class="input-box">
				<input type="password" name="pass" placeholder="Create password" required>
			</div>
			<div class="input-box">
				<input type="password" name="password" placeholder="Confirm password" required>
			</div>
			<div class="policy">
				<input type="checkbox">
				<h3>I accept all terms & condition</h3>
			</div>
			<div class="input-box button">
				<input type="Submit" value="Register Now">
			</div>
			<div class="text">
				<h3>Already have an account? <a href="?page=login">Login now</a></h3>
			</div>
		</form>
	</div>
</body>