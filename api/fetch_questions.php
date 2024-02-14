<?php
// echo "fetch questions api working";
include '../config/conn.php';
$subject = $_POST['subject'];

$query = "SELECT * FROM questions WHERE quiz_id = (SELECT quiz_id FROM quizzes WHERE subject_name = '$subject')";
$result = mysqli_query($conn, $query);
// Check if any questions were found
if ($result && mysqli_num_rows($result) > 0)  {
    $output = '';
    $sn = 1;
  
    // Loop through each question and generate the HTML
    while ($row = $result->fetch_assoc()) {
      $question_id = $row['question_id'];
      $question = $row['question_text'];
      $is_active = $row['is_active'];
      $option1 = $row['option_1'];
      $option2 = $row['option_2'];
      $option3 = $row['option_3'];
      $option4 = $row['option_4'];
      $correct_option = $row['correct_option'];
  
      // $output .= '
      //   <tr>
      //       <td>'.$sn.'</td>
      //       <td>'.$question.'</td>
      //       <td>'.$is_active.'</td>
      //       <td>'.$option1.'</td>
      //       <td>'.$option2.'</td>
      //       <td>'.$option3.'</td>
      //       <td>'.$option4.'</td>
      //       <td>'.$correct_option. '</td>
      //       <td>
      //         <span>
      //           <i class="bi bi-pencil-fill edit-btn" data-question-id="'.$question_id.'"></i>
      //           <i class="bi bi-trash-fill delete-btn" data-question-id="'.$question_id.'"></i>
      //         </span>
      //       </td>
      //   </tr>
      // ';

      $output .= '
    <tr data-question-id="'.$question_id.'">
        <td>'.$sn.'</td>
        <td><span class="editable" data-field="question_text">'.$question.'</span></td>
        <td><span class="editable" data-field="is_active">'.$is_active.'</span></td>
        <td><span class="editable" data-field="option_1">'.$option1.'</span></td>
        <td><span class="editable" data-field="option_2">'.$option2.'</span></td>
        <td><span class="editable" data-field="option_3">'.$option3.'</span></td>
        <td><span class="editable" data-field="option_4">'.$option4.'</span></td>
        <td><span class="editable" data-field="correct_option">'.$correct_option.'</span></td>
        <td>
            <span id="edit-delete">
                <i class="bi bi-pencil-fill edit-btn mr-2" style="cursor:pointer;"></i>
                
                <i class="bi bi-trash-fill delete-btn" style="cursor:pointer;" data-question-id="'.$question_id.'"></i>
            </span>
        </td>
    </tr>
';

  
      $sn++;
    }
  echo $output;
    
  } else {
    echo 'No questions found for the selected subject.';
    
  }
  
  // Close the statement and connection
  
  $conn->close();
//   mysqli_close($conn);
?>