<?php
// database connection
include '../config/conn.php';

// Count total users
$queryUsers = "SELECT COUNT(*) as total_users FROM user";
$resultUsers = mysqli_query($conn, $queryUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];

// Count total questions
$queryQuestions = "SELECT COUNT(*) as total_questions FROM questions";
$resultQuestions = mysqli_query($conn, $queryQuestions);
$rowQuestions = mysqli_fetch_assoc($resultQuestions);
$totalQuestions = $rowQuestions['total_questions'];

// Count total subjects
$querySubjects = "SELECT COUNT(*) as total_subjects FROM quizzes";
$resultSubjects = mysqli_query($conn, $querySubjects);
$rowSubjects = mysqli_fetch_assoc($resultSubjects);
$totalSubjects = $rowSubjects['total_subjects'];

// Count quiz attempts
$queryAttempt = "SELECT COUNT(*) as quiz_attempt FROM quiz_attempt";
$resultAttempt = mysqli_query($conn, $queryAttempt);
$rowAttempt = mysqli_fetch_assoc($resultAttempt);
$quizAttempt = $rowAttempt['quiz_attempt'];

// Output the counts
// echo "Total Users: " . $totalUsers . "<br>";
// echo "Total Questions: " . $totalQuestions . "<br>";
// echo "Total Subjects: " . $totalSubjects . "<br>";



?>