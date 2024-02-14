<?php
// Include the database connection settings
include '../config/conn.php';

// Retrieve the data from the AJAX request
$questionId = $_POST['question_id'];

// Prepare the update query with placeholders
$query = "DELETE FROM questions 
          WHERE question_id = ?";

// Prepare and bind the SQL statement
$statement = $conn->prepare($query);
$statement->bind_param("i", $questionId);
$result = $statement->execute();

if ($result) {
    echo 'Question deleted successfully!';
} else {
    echo "Error" . mysqli_error($conn);
}

    




// Close the statement and database connection
$statement->close();
$conn->close();



?>