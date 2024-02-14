<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">
    <title>BCA Quiz - Where Learning Meets Adventure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/index.js"></script>
   
   <style>
        html,body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
        }
        .fa{
            color: green;
        }
        #myProfile, #quizHistory{
            display: none;
        }
    </style>
</head>

<body>

    <?php include "navbar.php"  ?>
    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        // Display the message as an alert
        echo '<div class="alert alert-success text-center" >' . $message . '</div>';
    } elseif (isset($_GET['error'])) {
        $error = $_GET['error'];
        // Display the message as an alert
        echo '<div class="alert alert-danger text-center" >' . $error . '</div>';
    }
    ?>

    <div id="myProfile" class="wrapper">
        <h2>My Profile</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <div class="row">
                    <div class="col">
                        <p><strong>User ID:</strong> <span id="userId">123456</span></p>
                        <p><strong>Full Name:</strong> <span id="spanFullName"></span></p>
                        <p><strong>Gender:</strong> <span id="spanGender"></span></p>
                        <p><strong>Join Date:</strong> <span id="joinDate">2023-01-01</span></p>
                        <p><strong>Total Score:</strong> <span id="totalScore">500</span></p>
                    </div>
                    <!-- <div class="col-md-6">
                       
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <section id="quizHistory" class="wrapper">
        <h2>Quiz History</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Quiz Subject</th>
                    <th scope="col">Score</th>
                    <th scope="col">Played Date</th>
                </tr>
            </thead>
            <tbody id="quiz-History">
                <!-- Dummy data -->
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mathematics</td>
                    <td>90%</td>
                    <td>2023-02-15</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Science</td>
                    <td>80%</td>
                    <td>2023-03-22</td>
                </tr> -->
                <!-- Add more rows for quiz history entries -->
            </tbody>
        </table>
</section>
    <div id="contentContainer">
        <?php include "hero.php"  ?>
        <?php include "about.php"  ?>
        <?php include "body.php" ?>
        <?php include "contact.php" ?>
    </div>



    <?php include "footer.php" ?>

</body>

</html>