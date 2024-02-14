$(document).ready(function () {

  countingNumberAnimation();
  fetchLeaderBoard();
  /*=========================================================================
      Add questions ajax jquery on a Submit button click
  ===========================================================================*/
  $("#add-question-btn").click(function (e) {
    // alert ('button clicked');
    // e.preventDefault(); // Prevent form submission
    var selectElement = document.getElementById("selectSubject");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var subject = selectedOption.value;
  
    var isActiveValue = document.querySelector('input[name="radioIsActive"]:checked').value;
    // console.log(isActiveValue);
  
    var questionText = document.getElementById("questionText").value.trim();
    var option1 = document.getElementById("option1").value.trim();
    var option2 = document.getElementById("option2").value.trim();
    var option3 = document.getElementById("option3").value.trim();
    var option4 = document.getElementById("option4").value.trim();
    
    var selectElementCorrectOption = document.getElementById("correct_option");
    var selectedOption_C = selectElementCorrectOption.options[selectElementCorrectOption.selectedIndex];
    var correct_option = selectedOption_C.value;
    
    if (questionText !== '' && option1 !== '' && option2 !== '' && option3 !== '' && option4 !== '' && isActiveValue!=='') {
      //call api 'add_question' to insert question 
      $.post("../api/add_questions.php", {
        subject: subject,
        questionText: questionText,
        is_active: isActiveValue,
        option1: option1,
        option2: option2,
        option3: option3,
        option4: option4,
        correct_option: correct_option
      },
        function (data,status) {
          document.getElementById("success_msg").style.display = "block";
          $("#success_msg").html(data);
          // console.log(status);
          document.getElementById('add-question-form').reset();

        });
  
    } else {
      document.getElementById("success_msg").style.display = "block";
      $("#success_msg").html("Fill the required fields!!");
    }
  
  
  
    /*=========================================================================
                  Dismissible alert javascript
    ===========================================================================*/
    // Get the alert element
    var alertElement = document.getElementById("success_msg");
  
    // Set the duration (in milliseconds) after which the alert should disappear
    var duration = 3000; // 3000 milliseconds = 3 seconds
  
    // Function to hide the alert after the specified duration
    setTimeout(function () {
      alertElement.style.display = "none";
    }, duration);
    /*=============== Dismissible alert javascript End =================================*/
  
  });
  
  /*=============== Add questions ajax jquery End =================================*/ 



  
  

}); //$.document.ready close


/*=========================================================================
     Fetch questions for View Question Section
  ===========================================================================*/
  
  function fetchQuestions(selectedOption) {
    // var dropdown = document.getElementById("selectSubject");
    // var selectedOption = dropdown.value;
    // console.log(selectedOption);
    var subject = selectedOption;
    $.post("../api/fetch_questions.php",
    {
      subject: subject
    },
    function(data){
        $('#show-questions').html(data);
    });

  }
  
  /*============================================================================== */

/* Function to fetch Leaderboard */
  function fetchLeaderBoard(){
    // alert ('fetch leaderboard called');
    $(document).ready(function() {
      // Fetch leaderboard data using AJAX
      $.ajax({
          url: '../fetch_leaderboard.php',
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
  }

function countingNumberAnimation(){
  /*=========================================================================
      Counting Number Animation
  ===========================================================================*/
  // Get all the counter elements
  var counters = document.querySelectorAll('.counter');

  // Iterate over each counter element
  counters.forEach(function (counter) {
    var target = parseInt(counter.getAttribute('data-count'));
    var duration = 1000; // Animation duration in milliseconds
    var interval = duration / target; // Time interval for each increment


    var currentCount = 0;
    var increment = Math.ceil(target / (duration / 50)); // Increment value per interval (adjust 50 for smoother animation)
    var intervalId = setInterval(function () {
      currentCount += increment;
      if (currentCount >= target) {
        currentCount = target;
        clearInterval(intervalId);
      }
      counter.textContent = currentCount;
    }, 150); // Update the counter based on the interval
  });

  /*================ Counting Number Animation End ========================= */
}


