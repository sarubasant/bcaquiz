
// Fetch users data using AJAX
function fetchUsers() {

    $.ajax({
        url: '../api/fetch_users.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            // console.log('fetchUsers function called');
            // var leaderboardData=JSON.parse(JSON.stringify( response ));
            var userData = response;
            // console.log(userData);


            // Populate user table body
            for (var i = 0; i < userData.length; i++) {
                var sn = i + 1;
                var fullName = userData[i].fullname;
                var email = userData[i].email;
                var gender = userData[i].gender;
                var joinDate = userData[i].created_at

                var row = '<tr>';
                row += '<td>' + sn + '</td>';
                row += '<td>' + fullName + '</td>';
                row += '<td>' + email + '</td>';
                row += '<td>' + gender + '</td>';
                row += '<td>' + joinDate + '</td>';
                row += '</tr>';

                $('#users-body').append(row);
            }
        //    console.log(row);
            
        },
        error: function (jqXHR, exception) {
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
            // $('#users-body').html(msg);
            $('#users-body').append('<tr><td colspan="5">' + msg + '</td></tr>');
        }
    });

    document.querySelector('#users-button').removeAttribute('onclick');
}