<?php
// ob_start();
session_start();
if (isset($_SESSION['admin'])) {
  header("Location: admin-page.php");
  exit();
}
// $error='';
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
    // header("Location: index.php");
    // header("Location: index.php?error=" . urlencode($error));
    // exit();
    //  echo '<script>alert("Invalid email or password!");</script>';
  }

  // Close the statement and connection
  $statement->close();
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BCA Quiz - Where Learning Meets Adventure</title>
  <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background: url("login.jpg");
      background-size: cover;
      background-repeat: repeat;
      background-position: center;
      background-blend-mode: color;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 150px;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 50px;
      border-radius: 10px;
      /* box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3); */
      box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 50%);
    }

    .login-container h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .input-group .fa {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #007bff;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-primary .loadingbtn {
      position: relative;
    }

    .btn-primary.loadingbtn .spinner {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="login-container">
          <h1>BCA Quiz</h1>
          <form action="" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Your User ID *" autofocus data-val="true" data-val-required="The Username field is required." id="Username" name="username" value="">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Your Password *" autocomplete="off" data-val="true" data-val-required="The Password field is required." id="Password" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">

                <button type="submit" class="btn btn-primary btn-block loadingbtn" name="login" value="login">
                  <!-- <i class="spinner fa fa-spinner fa-spin"></i> -->
                  <span class="loading-text">Sign In</span>
                </button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center">
            <span class="col-12">
              <?php if (isset($error)) {
                echo '<div class="mt-3 alert alert-danger text-center">' . $error . '</div>';
              }
              ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>

</html>