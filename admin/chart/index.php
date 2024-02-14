


   
    <!-- Include Google Charts library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Include your custom scripts -->
    <script type="text/javascript" src="chart/assets/js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="chart/assets/css/style.css">


<!-- Your dashboard content goes here -->
<?php
// Sample data

$data = array(
    array('Category', 'Value'),
    array('Users', (int)$totalUsers),
    array('Subjects',(int)$totalSubjects),
    array('Questions', $totalQuestions),
    array('Quiz Played', (int)$quizAttempt)
);
// Output the data as JSON
echo '<script>';
echo 'var chartData = ' . json_encode($data) . ';';
echo '</script>';


?>

<div id="columnchart"></div>




