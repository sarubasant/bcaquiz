<?php
include '../config/conn.php';
include 'get_local_time.php';

// Fetch users data from the database
$sql = "SELECT fullname, email, gender, created_at FROM user";
$result = $conn->query($sql);

$user = array();

if ($result->num_rows > 0) {
    // Fetch data and add to the leaderboard array
    while ($row = $result->fetch_assoc()) {
        $joinDate = $row ['created_at'];
        $row['created_at'] = getLocalTime($joinDate);
        $user[] = $row;
    }

    
    // Return users data as JSON
    echo json_encode($user);
} else {
    echo "No user found!!";
}


$conn->close();

?>
