// $(document).ready(function () {
//     // alert ('index loaded');
//      $('#contentContainer').show();
//      $('#quizHistory').hide();
//      $('#myProfile').hide();
// });


function showQuizHistory(value) {
    $('#contentContainer').hide();
    $('#myProfile').hide();
    $('#quiz-History').empty();
  
    var useremail = $(value).data('userid');
    // console.log(useremail);
    $.ajax({
        url: 'api/get_quizhistory.php',
        type: 'post',
        dataType: 'json',
        data: {
            useremail: useremail
        },
        success: function (response) {
            // console.log("success");
            // console.log(response);

            var quizHistoryData = response;
            // Populate quiz history table
            if (quizHistoryData.msg) {
                // alert('inside if block');
                row += '<tr><td colspan=4>' + quizHistoryData.msg + '</td></tr>';
                $('#quiz-History').append(row);
            } else {
                for (var i = 0; i < quizHistoryData.length; i++) {
                    var sn = i + 1;
                    var category = quizHistoryData[i].category;
                    var score = quizHistoryData[i].score;
                    var date = quizHistoryData[i].attempted_at;

                    var row = '<tr>';
                    row += '<td>' + sn + '</td>';
                    row += '<td>' + category + '</td>';
                    row += '<td>' + score + '</td>';
                    row += '<td>' + date + '</td>';
                    row += '</tr>';

                    $('#quiz-History').append(row);
                }
            }
        }
    });

    $('#quizHistory').show();
}

function showMyProfile(value) {
    $('#contentContainer').hide();
    $('#quizHistory').hide();
    var useremail = $(value).data('userid');
    // console.log(useremail);
    $.ajax({
        url: 'api/get_user.php',
        type: 'post',
        dataType: 'json',
        data: {
            useremail: useremail
        },
        success: function (response) {
            // console.log("success");
            // console.log(response);

            var userData = response;
            // console.log(typeof(userData.fullname));
            $('#userId').html(userData.user_id);
            $('#spanFullName').html(userData.fullname);
            $('#spanGender').html(userData.gender);
            $('#joinDate').html(userData.created_at);
            $('#totalScore').html(userData.total_score);


        }
    });
    $('#myProfile').show();
}



