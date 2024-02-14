<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Quiz</title>


  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
  <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">

</head>

<body>
  <?php

  if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
    //echo $subject;
  }
  include 'navbar.php';

  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // User is logged in
    $username = $_SESSION['username'];
    // echo $username;
  ?>

    <div class="container">
      <h1 class="text-center mt-5"><?php echo $subject ?> Quiz</h1>

      <div class="col-12 text-center">
        <h2>Time Left: <span id="timer">60</span> seconds</h2>
      </div>

      <div class="row justify-content-center align-items-center">
        <div id="quiz-questions" class="col-lg-6"></div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-6 text-center">
          <button class="btn btn-primary" id="submit-btn">Submit Quiz</button>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        
        startTimer();
        // Load the questions from the server
        $.post("get_questions.php", {
            subject: "<?php echo $subject ?>",
            username: "<?php echo $username ?>"
          },
          function(data, status) {
            $("#quiz-questions").html(data);
          });

        // Handle form submission
        $("#submit-btn").click(function(e) {
          //document.getElementById("submit-btn").style.display = "none";
          e.preventDefault();
          submitQuiz();
        });

      });

      // Function to start the timer
      var timeLeft = 60; // Total time in seconds
      var timer;

      function startTimer() {
        timer = setInterval(function() {
          timeLeft--;
          document.getElementById("timer").textContent = timeLeft;

          if (timeLeft <= 0) {
            clearInterval(timer);
            //document.getElementById("submit-btn").style.display = "none";
            submitQuiz();
          }
        }, 1000);
      }



      // Function to submit the quiz
      function submitQuiz() {
        hideSubmitButton();
        clearInterval(timer);
        var quizForm = $("#quiz-form");
        console.log(quizForm.serialize());
        $.post("submit_quiz.php", quizForm.serialize(), function(data) {
          $("#quiz-questions").html(data);
        });
      }

      //function to hide submit button when quiz is over or clicked submit button
      function hideSubmitButton() {
        document.getElementById("submit-btn").style.display = "none";
      }
    
    </script>
  <?php
  } else {
    $error = "Please Login First To Play Quiz!!";
    // Display the message as an alert
    echo '<div class="alert alert-danger text-center" >' . $error . '</div>';
   
    //paila nai header send vayeko vaner manena yesle
    // header("Location: index.php?error=" . urlencode($error));
    // exit();
  }
  ?>

</body>

</html>
