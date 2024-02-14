<?php
include 'config/conn.php';
// Fetch leaderboard data from the database
$sql = "SELECT user.fullname, SUM(quiz_attempt.score) AS total_score
        FROM user
        INNER JOIN quiz_attempt ON user.user_id = quiz_attempt.user_id
        GROUP BY user.user_id
        ORDER BY total_score DESC";
$result = $conn->query($sql);

$leaderboard = array();

if ($result->num_rows > 0) {
    // Fetch data and add to the leaderboard array
    while ($row = $result->fetch_assoc()) {
        $leaderboard[] = $row;
    }
}

// Return leaderboard data as JSON
echo json_encode($leaderboard);

$conn->close();
?>
