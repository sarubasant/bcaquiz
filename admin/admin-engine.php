<?php
// include '../config/conn.php';


if (isset($_POST['logout'])) {
    //destroy session
    session_destroy();
    // unset($_SESSION['user_id']);
    header("Location: index.php");
    exit();
}

?>