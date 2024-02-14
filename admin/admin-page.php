<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include 'admin-engine.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Admin Panel</title>
    <link rel="stylesheet" href="../css/counter.css">
    <link rel="icon" href="../favicon/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <style>
        /* .toast-container {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
            width: 100px;
       
        } */

        .text-button {
            background-color: transparent;
            border: white;
            /* color: #000000; /*Set the desired text color */
            /* cursor: pointer;
            font-size: 16px; */
            /* Adjust the font size as needed */
        }
    </style>


    <script>
        $(document).ready(function() {
            // Hide all sections except the dashboard initially
            $(".section").hide();
            $("#dashboard-section").show();

            // Show the respective section on menu item click
            $(".nav-link").click(function() {
                $(".section").hide();
                var targetSection = $(this).data("target");
                $("#" + targetSection).show();
            });
        });
    </script>
    <script src="../js/admin.js"></script>
    <script src="../js/fetch_user.js"></script>
    <script src="../js/edit-delete.js"></script>


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">




</head>

<body>
    <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 start-0">
        <div id="toast" class="toast bg-success text-white font-weight-bold" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
            <div class="toast-body"></div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BCA Quiz Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-target="dashboard-section">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="add-question-section">Add Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="view-question-section">View All Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="users-button" href="#" data-target="users-section" onclick="fetchUsers();">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="leaderboard-section">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Logout</a> -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="logout-form">
                        <button type="submit" class="nav-link text-button" name="logout">Logout</button>
                    </form>

                </li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard -->
    <div id="dashboard-section" class="container mt-4 section">
        <h2>Dashboard</h2>

        <?php include '../api/get_dashboard.php'; ?>
        <?php include 'chart/index.php'; ?>
       
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Number of Users</h5>
                        <p class="card-text">
                        <div class="counter" data-count="<?php //echo $totalUsers; ?>">0</div>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Number of Questions</h5>
                        <p class="card-text">
                            <?php //echo $totalQuestions 
                            ?>
                        <div class="counter" data-count="<?php //echo $totalQuestions; ?>">0</div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Number of Subjects</h5>
                        <p class="card-text">
                            <?php //echo $totalSubjects 
                            ?>
                        <div class="counter" data-count="<?php //echo $totalSubjects; ?>">0</div>
                        </p>
                    </div>
                </div>
            </div>

        </div> -->
        <!-- <div class="row mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quiz Played</h5>
                        <p class="card-text">
                            <?php //echo $totalSubjects 
                            ?>
                        <div class="counter" data-count="<?php //echo $quizAttempt; ?>">0</div>

                        </p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Add Questions -->
    <div id="add-question-section" class="container mt-4 section">
        <h2>Add Questions</h2>
        <!-- <div class="alert alert-success text-center" id="success_msg"></div> -->
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="success_msg" style="display: none;"></div>
        <form id="add-question-form">
            <div class="form-group mb-1">
                <label for="selectSubject">Subject:</label>
                <select class="form-control" id="selectSubject">
                    <option value="DBMS">DBMS</option>
                    <option value="ComputerNetwork">Computer Network</option>
                    <option value="Fundamental">Fundamental</option>
                    <option value="WebTechnology">Web Technology</option>
                    <option value="Math">Mathematics</option>
                    <option value="English">English</option>
                    <option value="Microprocessor">Microprocessor</option>
                    <option value="DSA">Data Structure</option>
                    <!-- <option value="NepalHistory">Nepal History</option>
                    <option value="IQ">IQ</option>
                    <option value="Geography">Geography</option> -->
                </select>
            </div>
            <div class="form-group mb-1">
                <label for="question">Question:</label>
                <textarea class="form-control" id="questionText" rows="3" required></textarea>
            </div>
            <div class="form-group mb-1">
                <label>Is Active?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioIsActive" id="radioOption1" value="1" checked>
                    <label class="form-check-label" for="radioOption1">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioIsActive" id="radioOption2" value="0" >
                    <label class="form-check-label" for="radioOption2">No</label>
                </div>
            </div>

            <div class="form-group mb-1">
                <label for="option">Options:</label>
                <input type="text" class="form-control my-2" id="option1" placeholder="Option 1" required>
                <input type="text" class="form-control my-2" id="option2" placeholder="Option 2" required>
                <input type="text" class="form-control my-2" id="option3" placeholder="Option 3" required>
                <input type="text" class="form-control my-2" id="option4" placeholder="Option 4" required>
            </div>
            <div class="form-group mb-1">
                <label for="correct_option">Correct Option:</label>
                <select class="form-control" id="correct_option">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                </select>
            </div>
            <div class="form-group mt-1">
                <button type="button" id="add-question-btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- View Questions -->
    <div id="view-question-section" class="container mt-4 section">
        <div class="row">
            <div class="col">
                <h2>View Questions</h2>
            </div>
            <div class="col-auto p-auto">
                <label for="selectSubject">Subject:</label>
            </div>
            <div class="col col-lg-2">
                <form>
                    <div class="form-group  text-right">
                        <div class="col-auto">
                            <select class="form-control" id="selectSubjectView" onchange="fetchQuestions(this.value)">
                                <option value="DBMS">DBMS</option>
                                <option value="ComputerNetwork">Computer Network</option>
                                <option value="Fundamental">Fundamental</option>
                                <option value="WebTechnology">Web Technology</option>
                                <option value="Math">Mathematics</option>
                                <option value="English">English</option>
                                <option value="Microprocessor">Microprocessor</option>
                                <option value="DSA">Data Structure</option>
                                <!-- <option value="NepalHistory">Nepal History</option>
                                <option value="IQ">IQ</option>
                                <option value="Geography">Geography</option> -->
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="row"> -->

        <!-- </div> -->
        <div class="container" style="margin-top: 10px;">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Question</th>
                        <th>Is Active</th>
                        <th>Option_1</th>
                        <th>Option_2</th>
                        <th>Option_3</th>
                        <th>Option_4</th>
                        <th>Correct_option</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>

                <tbody id="show-questions">

                </tbody>

            </table>

        </div>
    </div>

    <!-- Users -->
    <div id="users-section" class="container mt-4 section">
        <h2>Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Join Date</th>
                </tr>
            </thead>
            <tbody id="users-body">
                <!-- <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Male</td>
                    <td>2023-02-05</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>Female</td>
                    <td>2023-02-05</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <!-- Leaderboard -->
    <div id="leaderboard-section" class="container mt-4 section">
        <h2>Leaderboard</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody id="leaderboard-body">
                <!-- <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>95</td>
                </tr> -->
            </tbody>
        </table>
    </div>


</body>

</html>