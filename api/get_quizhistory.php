<?php
include '../config/conn.php';
include 'get_local_time.php';

$userEmail = $_POST['useremail'];
// Fetch quiz attempt data from the database
$sql = "SELECT subject_name AS category, score, attempted_at FROM quiz_attempt 
INNER JOIN user ON user.user_id = quiz_attempt.user_id 
INNER JOIN quizzes ON quiz_attempt.quiz_id = quizzes.quiz_id
WHERE user.email = '$userEmail' ORDER BY attempted_at DESC";

$result = $conn->query($sql);
$quizHistory = array();

if ($result->num_rows > 0) {
    // Fetch data and add to the leaderboard array
    while ($row = $result->fetch_assoc()) {
        $playDate = $row ['attempted_at'];
        $row['attempted_at'] = getLocalTime($playDate);
        $quizHistory[] = $row;

    }
    // Return leaderboard data as JSON
    echo json_encode($quizHistory);
} else {
    // echo json_encode({msg='No history available!!'});
    echo json_encode(['msg' => 'No history available!!']);

}



$conn->close();
?>
