<?php
// Include the database connection settings
include '../config/conn.php';

// Get the subject from the POST data
$subject = $_POST['subject'];
$questionText = $_POST['questionText'];
$is_active = $_POST['is_active'];
$option_1 = $_POST['option1'];
$option_2 = $_POST['option2'];
$option_3 = $_POST['option3'];
$option_4 = $_POST['option4'];
$correct_option = $_POST["correct_option"];

//find the quiz id from subject
$query = "SELECT quiz_id FROM quizzes WHERE subject_name = '$subject' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $quizId = $row['quiz_id'];
            // Use the quiz_id as needed
        }
    } else {
        echo "Quiz ID not found: " . mysqli_error($conn);
    }

    
}

/*==============Insert Query=====================*/
// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO questions (quiz_id, question_text, is_active, option_1, option_2, option_3, option_4, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssi", $quizId, $questionText, $is_active, $option_1, $option_2, $option_3, $option_4, $correct_option);


// Execute the statement
if ($stmt->execute()) {
    echo "Question inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();



?>