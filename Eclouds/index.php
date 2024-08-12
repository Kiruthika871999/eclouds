
<?php 
	//including header
	include 'header.php';

	if (isset($_GET['page'])) {
	$page = $_GET['page'];

	switch ($page) {
		case 'home':
			include 'home.php';
			break;
		case 'about':
			include 'about.php';
			break;
		case 'signup':
			include 'registration.php';
			break;	
		case 'login':
			include 'login.php';
			break;		
		default:
			include 'home.php';
	}
	} else {
	include 'home.php';
	}
	//including footer		
	include 'footer.php'; 
?>