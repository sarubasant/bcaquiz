<?php
// Include the database connection settings
include '../config/conn.php';

// Retrieve the data from the AJAX request
$questionId = $_POST['questionId'];
$questionText = $_POST['question_text'];
$is_active = $_POST['is_active'];
$option_1 = $_POST['option_1'];
$option_2 = $_POST['option_2'];
$option_3 = $_POST['option_3'];
$option_4 = $_POST['option_4'];
$correctOption = $_POST['correct_option'];

// Prepare the update query with placeholders
$query = "UPDATE questions SET
            question_text = ?,
            is_active = ?,
            option_1 = ?,
            option_2 = ?,
            option_3 = ?,
            option_4 = ?,
            correct_option = ?
          WHERE question_id = ?";

// Prepare and bind the SQL statement
$statement = $conn->prepare($query);
$statement->bind_param("sssssssi", $questionText, $is_active, $option_1, $option_2, $option_3, $option_4, $correctOption, $questionId);
$result = $statement->execute();

if ($result) {
    echo 'Question updated successfully!';
} else {
    echo "Error" . mysqli_error($conn);
}

    




// Close the statement and database connection
$statement->close();
$conn->close();



?>