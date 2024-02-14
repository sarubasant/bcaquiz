<?php
include '../config/conn.php';
include 'get_local_time.php';

$userEmail = $_POST['useremail'];
// Fetch users data from the database
$sql = "SELECT `user`.`user_id`,user.fullname, user.gender,user.created_at, sum(`quiz_attempt`.`score`) AS `total_score`

        FROM `user` INNER JOIN `quiz_attempt` ON `quiz_attempt`.`user_id` = `user`.`user_id`

        WHERE user.email = '$userEmail' LIMIT 1";


// $sql = "SELECT * FROM user where email = '$userEmail' limit 1";
$result = $conn->query($sql);

// $user = array();

if ($result) {
    
    // Fetch data
    $user = $result->fetch_assoc();
    if($user['total_score']==''){
        $user['total_score']="N/A";
    }

    $joinDate = $user['created_at'];
    // echo $joinDate;
    $user['created_at'] = getLocalTime($joinDate);

    // Return users data as JSON
    echo json_encode($user);
} else {
    echo "No user found!!";
}


$conn->close();

?>
