<?php
// Include the database connection settings
include 'config/conn.php';

// Get the subject from the POST data
$subject = $_POST['subject'];
$username = $_POST['username'];

// Prepare and execute the SQL query to fetch questions
if($subject == "Random"){
  $query = "SELECT * FROM questions WHERE is_active = '1' AND quiz_id BETWEEN 6 AND 9 ORDER BY RAND() LIMIT 5";
  $statement = $conn->prepare($query);
}else{
$query = "SELECT * FROM questions WHERE quiz_id = (SELECT quiz_id FROM quizzes WHERE subject_name = ?) AND is_active = '1' ORDER BY RAND() LIMIT 5";
$statement = $conn->prepare($query);
$statement->bind_param("s", $subject);
}


$statement->execute();
$result = $statement->get_result();

// Check if any questions were found
if ($result->num_rows > 0) {
  $output = '';
  $questionNumber = 1;

  // Loop through each question and generate the HTML
  while ($row = $result->fetch_assoc()) {
    $question_id = $row['question_id'];
    $question = $row['question_text'];
    $option1 = $row['option_1'];
    $option2 = $row['option_2'];
    $option3 = $row['option_3'];
    $option4 = $row['option_4'];

    $output .= '
      <div class="mb-4">
        <h4>Question ' . $questionNumber . '</h4>
        <p>' . $question . '</p>
        <div class="shuffle-options">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer' . $question_id . '" id="option' . $questionNumber . '_1" value="1">
            <label class="form-check-label" for="option' . $questionNumber . '_1">' . $option1 . '</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer' . $question_id . '" id="option' . $questionNumber . '_2" value="2">
            <label class="form-check-label" for="option' . $questionNumber . '_2">' . $option2 . '</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer' . $question_id . '" id="option' . $questionNumber . '_3" value="3">
            <label class="form-check-label" for="option' . $questionNumber . '_3">' . $option3 . '</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer' . $question_id . '" id="option' . $questionNumber . '_4" value="4">
            <label class="form-check-label" for="option' . $questionNumber . '_4">' . $option4 . '</label>
          </div>
        </div>
      </div>
    ';

    $questionNumber++;
  }

  echo '
    <form id="quiz-form">' . $output . '
    <input type="hidden" name="username" value="'.$username.'">  
    <input type="hidden" name="subject" value="' . $subject . '">
    </form>
    <script>
    shuffleOptions();
    function shuffleOptions() {
      $(".shuffle-options").each(function() {
        var $container = $(this);
        var $options = $container.find(".form-check");
        var $shuffledOptions = $options.toArray().sort(function() {
          return Math.random() - 0.5;
        });
        $container.empty().append($shuffledOptions);
      });
    }
    </script>
  ';
} else {
  echo '<p style="text-align:center;margin-top: 5px;">We are currently updating this category with new questions. In the meantime, please feel free to explore and enjoy the other available categories.</p>';
  echo '<script>clearInterval(timer);hideSubmitButton();</script>';
}

// Close the statement and connection
$statement->close();
$conn->close();
?>
