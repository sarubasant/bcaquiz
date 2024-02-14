<?php
// Include the database connection settings
include 'config/conn.php';

// Get the submitted answers from the POST data
$answers = $_POST;

// Initialize the score
$score = 0;
$sn = 0;
$tabulate = '';
// Loop through the submitted answers and calculate the score
foreach ($answers as $key => $value) {
  $sn++;
  if ($key != "subject") {
    $questionNumber = substr($key, 6);
    $answer = $value;

    // Retrieve the correct answer from the database
    $query = "SELECT * FROM questions WHERE question_id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("s", $questionNumber);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $correctOption = $row['correct_option'];
      $correctAnswer = $row['option_'.$correctOption.''];
      $tabulate .= ' 
      <tr>
          <td>'.$sn.'</td>
          <td>'.$row['question_text'].'</td>
          <td>'.$correctAnswer.'</td>';
          
          if ($answer == $correctOption) {
            $score++;
            $tabulate .= '<td>&#10004;</td>';
        } else {
            $tabulate .= '<td>&#10008;</td>';
        }
        
        $tabulate .= '
            </tr>';
      
      // Check if the submitted answer is correct
      // if ($answer == $correctOption) {
      //   $score++;
      // }
    }
  }
}

// Get the user ID and quiz ID
// Replace with your user ID and quiz ID retrieval logic
// Perform query
$subject = $_POST['subject'];
$username = $_POST['username'];

//check if the subject is random then set quiz_id=0 otherwise according to subject code
if($subject=="Random"){
  $quizId = 0;
}elseif ($result = mysqli_query($conn, "SELECT quiz_id FROM quizzes where subject_name= '$subject' Limit 1")) {
$rows = $result->fetch_assoc();
$quizId =  $rows['quiz_id'];
}

//fetch the user_id from username
if ($result = mysqli_query($conn, "SELECT user_id FROM user where email= '$username' Limit 1")) {
  $rows = $result->fetch_assoc();
  $userId =  $rows['user_id'];
}

// Insert the attempt record into the database
$query = "INSERT INTO quiz_attempt (user_id, quiz_id, score, attempted_at) VALUES (?, ?, ?, NOW())";
$statement = $conn->prepare($query);
$statement->bind_param("iii", $userId, $quizId, $score);
$statement->execute();

// Generate the result message
$resultMessage = "Your score: " . $score . " out of 5.";

echo '
  <div class="text-center">
    <h3>Quiz Result</h3>
    <p>' . $resultMessage . '</p>
    <div class="container">
        <h3>Summary</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
            ' . $tabulate . '
            </tbody>
            </table>
    </div>
  </div>
';

// Close the statement and connection
$statement->close();
$conn->close();
?>
