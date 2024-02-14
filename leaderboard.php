<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Leaderboard</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">

</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container" style="margin-top: 10px;">
        <h2>Quiz Leaderboard</h2>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody id="leaderboard-body">
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function() {
            // Fetch leaderboard data using AJAX
            $.ajax({
                url: 'fetch_leaderboard.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    // var leaderboardData=JSON.parse(JSON.stringify( response ));
                    var leaderboardData = response;
                    // console.log(response);


                    // Populate leaderboard table
                    for (var i = 0; i < leaderboardData.length; i++) {
                        var rank = i + 1;
                        var name = leaderboardData[i].fullname;
                        var score = leaderboardData[i].total_score;

                        var row = '<tr>';
                        row += '<td>' + rank + '</td>';
                        row += '<td>' + name + '</td>';
                        row += '<td>' + score + '</td>';
                        row += '</tr>';

                        $('#leaderboard-body').append(row);
                    }
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#leaderboard-body').html(msg);
                }
            });
        });
    </script>
</body>

</html>