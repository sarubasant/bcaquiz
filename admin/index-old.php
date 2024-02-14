<?php
// ob_start();
session_start();
if (isset($_SESSION['admin'])) {
	header("Location: admin-page.php");
	exit();
}

//Authentication Process
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	include '../config/conn.php';

	$query = "SELECT * FROM admin WHERE email = ? AND password = ?";
	$statement = $conn->prepare($query);
	$statement->bind_param("ss", $username, $password);
	$statement->execute();
	$result = $statement->get_result();

	// Check if the user exists
	if ($result->num_rows === 1) {
		// Login successful, show welcome message and UI changes
		$_SESSION['admin'] = $username;
		//    echo '<script>alert("Login successful!");</script>';
		// echo '<script>window.location.href = "admin-page.php";</script>';
		// exit;
		header("Location: admin-page.php");
		exit();
	} else {
		// Login failed, show error message
		$error = "Invalid email or password!";
		header("Location: index.php?error=" . urlencode($error));
		exit();
		//  echo '<script>alert("Invalid email or password!");</script>';
	}

	// Close the statement and connection
	$statement->close();
	$conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
	<title>Admin Login</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Bootstrap JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




	<style>
		.container {
			/* margin-top: 50px;
			margin-bottom: 50px; */
			margin: 50px auto;
			/* background-color: rgba(255, 255, 255, 0.9); */
			border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
	  
	  padding: 20px;
		}
		
	</style>
</head>

<body>
	<div class="container">

		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-md-6 col-sm-8 col-10">
				<h2>Admin Login</h2>
				<form action="" method="post">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" name="username">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<button type="submit" name="login" class="btn btn-primary ">Login</button>
				</form>
			</div>

		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-md-6 col-sm-8 col-10">
				<?php if (isset($_GET['error'])) {
					$message = $_GET['error'];
					// Display the message as an alert
					echo '<div class="my-3 alert alert-success text-center" >' . $message . '</div>';
				}
				?>
			</div>
		</div>


	</div>
</body>

</html>

<?php

// ob_end_flush();
?>