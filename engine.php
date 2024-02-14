<?php

session_start(); // Start the session
include 'config/conn.php'; // Database connection settings

//echo var_dump($_POST);

if (isset($_POST['signup'])) {
    // echo "signup clicked<br>";
  	Register();
}
if (isset($_POST['login'])) {
    // echo "login clicked<br>";
  	Login();
}

if (isset($_POST['logout'])) {
    // echo "logout clicked<br>";
    Logout();
}
if (isset($_POST['changePassword'])) {
    // echo "change password clicked<br>";
    changePassword();
}

// Check if the form is submitted
function Register(){
    global $conn; // Use the global connection variable
    // Retrieve form data
   
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO user (fullName,email, password,  gender) VALUES (?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("ssss", $fullName, $email, $password, $gender);
    $result = $statement->execute();

    // Check if the record is successfully inserted
    if ($result) {
        $_SESSION['username'] = $email;
         // Set the success message
        $message= "Registration successful! You're All Set to Enjoy the <b>Quiz!</b> Get Ready for an Exciting Journey!";
    } else {
        $message= "Error!! " . $conn->error;
    }

    // Close the statement and connection
    $statement->close();
    $conn->close();
    // $_SESSION['username'] = $email;
    // echo '<script>alert("Congratulations! Registration successful and Logged in. Enjoy!!");</script>';
    // echo '<script>window.location.href = "index.php";</script>';

// Redirect back to the index page with the message
header("Location: index.php?message=" . urlencode($message));
exit();
    // exit;
}


function Login(){
    global $conn; // Use the global connection variable
    // echo "login function invoked";
     // Retrieve form data
     $email = $_POST['email'];
     $password = $_POST['password'];
 
     // Query to check if the user exists in the database
     $query = "SELECT * FROM user WHERE email = ? AND password = ?";
     $statement = $conn->prepare($query);
     $statement->bind_param("ss", $email, $password);
     $statement->execute();
     $result = $statement->get_result();
 
     // Check if the user exists
     if ($result->num_rows === 1) {
        // Login successful, show welcome message and UI changes
        $_SESSION['username'] = $email;
        // echo '<script>alert("Login successful!");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        exit;
     } else {
         // Login failed, show error message
         $error= "Invalid email or password!";
         header("Location: index.php?error=" . urlencode($error));
        exit();
        //  echo '<script>alert("Invalid email or password!");</script>';
     }
 
     // Close the statement and connection
     $statement->close();
     $conn->close();
}

function Logout()
{
    session_destroy();
    echo '<script>window.location.href = "index.php";</script>';
    exit;
}

function changePassword(){
    // echo "change password function called<br>";
    global $conn; // Use the global connection variable
    // Retrieve form data

    // User input
    $user_email = $_SESSION['username']; // Replace with the actual user ID
    $old_password = $_POST['password'];
    $new_password1 = $_POST['npassword'];
    $new_password2 = $_POST['cpassword'];

    try {
        // Step 1: Verify the old password
        $stmt = $conn->prepare("SELECT password FROM user WHERE email = ?");
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        echo $hashedPassword;

        if ($hashedPassword == $old_password) {
            // Step 2: Check if the new passwords match
            if ($new_password1 === $new_password2) {
                // Step 3: Update the password with the hashed version
                // $hashedNewPassword = password_hash($new_password1, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
                $stmt->bind_param('ss', $new_password1, $user_email);
                $stmt->execute();
                $message = "Password updated successfully.";
            } else {
                $message = "New passwords do not match. Password not updated.";
            }
        } else {
            $message = "Invalid old password. Password not updated.";
        }

        // echo $message;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }


    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the index page with the message
    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>
