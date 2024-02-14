$(document).ready(function () {
    // Edit button click handler
    $(document).on('click', '.edit-btn', function () {
        // console.log(this);
        var row = $(this).closest('tr');
        var editableFields = row.find('.editable');

        //get the question id from delete button
        // var aa = row.find('.delete-btn');
        // var question_id = aa.data('question-id');
        // console.log("question id:"+question_id);

        // Check if the row is already in edit mode
        if (row.hasClass('edit-mode')) {
            return; // Exit if already in edit mode
        }

        // Add edit mode class to the row
        row.addClass('edit-mode');

        // Replace edit/delete buttons with save/cancel buttons
        row.find('.edit-btn').replaceWith('<button class="btn btn-primary save-btn">Save</button>');
        row.find('.delete-btn').replaceWith('<button class="btn btn-secondary cancel-btn">Cancel</button>');

        // Loop through each editable field in the row
        editableFields.each(function () {
            // console.log(this);
            var field = $(this).data('field');
            var content = $(this).text();

            if (field === 'question_text') {
                $(this).html('<textarea class="edit-input" data-field="' + field + '">' + content + '</textarea>');
            } else if (field === 'is_active') {
                var selectOptions = ['0', '1'];

                var selectElement = '<select class="edit-input" data-field="' + field + '">';

                for (var i = 0; i < selectOptions.length; i++) {
                    var option = selectOptions[i];
                    var selected = (option === content) ? 'selected' : '';

                    selectElement += '<option value="' + option + '" ' + selected + '>' + option + '</option>';
                }

                selectElement += '</select>';

                $(this).html(selectElement);
            } else if (field === 'correct_option') {
                var selectOptions = ['1', '2', '3', '4'];

                var selectElement = '<select class="edit-input" data-field="' + field + '">';

                for (var i = 0; i < selectOptions.length; i++) {
                    var option = selectOptions[i];
                    var selected = (option === content) ? 'selected' : '';

                    selectElement += '<option value="' + option + '" ' + selected + '>' + option + '</option>';
                }

                selectElement += '</select>';

                $(this).html(selectElement);
            } else {
                $(this).html('<input type="text" class="edit-input" data-field="' + field + '" value="' + content + '"></input>');

            }
        });
    });

    // Save button click handler
    $(document).on('click', '.save-btn', function () {

        var row = $(this).closest('tr');
        var editableFields = row.find('.editable');

        var questionId = row.data('question-id'); // Retrieve the question_id from the data attribute

        var data = {}; // Object to store the updated values
        
        // Loop through each editable field in the row
        editableFields.each(function () {
            var field = $(this).data('field');
            var content = '';

            if (field === 'question_text') {
                content = $(this).find('textarea').val();
            } else if (field === 'is_active' || field === 'correct_option') {
                content = $(this).find('select').val();
            } else {
                content = $(this).find('input').val();
            }

            // Replace the input field with the updated content
            $(this).html(content);

            // Perform further actions like updating the database with the new content
            // You can send an AJAX request to a server-side script to handle the database update

            // Store the updated value in the data object
            data[field] = content;

        });

        // console.log(data);

        // Add the questionId to the data object
        data.questionId = questionId;

        // Remove the edit mode class from the row
        row.removeClass('edit-mode');

        // Send an AJAX request to update the database
        $.ajax({
            url: '../api/update.php',
            method: 'POST',
            data: data,
            success: function (response) {
                // alert(response);
                showToast(response);
            },
            error: function (xhr, status, error) {
                // Handle the error response
                // You can display an error message or perform any other actions
                alert('Error updating data:', error);
            }
        });


        // Replace edit/delete buttons with save/cancel buttons
        showEditDeleteButtons(row,questionId);
    });

    // Cancel button click handler
    $(document).on('click', '.cancel-btn', function () {
        var row = $(this).closest('tr');
        var editableFields = row.find('.editable');

        var questionId = row.data('question-id');
        // Loop through each editable field in the row
        editableFields.each(function () {
            var field = $(this).data('field');
            // console.log(field);
            var content = '';

            if (field === 'question_text') {
                content = $(this).find('textarea').val();
            } else if (field === 'is_active' || field === 'correct_option') {
                content = $(this).find('select').val();
            } else {
                content = $(this).find('input').val();
            }
            // Replace the input field with the original content
            $(this).html(content);
        });

        // Remove the edit mode class from the row
        row.removeClass('edit-mode');

        // Replace edit/delete buttons with save/cancel buttons
        showEditDeleteButtons(row,questionId);
    });

    // Delete button click handler
   
    $(document).on('click', '.delete-btn', function() {
        var questionId = $(this).data('question-id');
        // alert('delete clicked');
        // refreshQuestionList();
        // Send an AJAX request to delete_question.php with the question ID
        $.ajax({
            url: '../api/delete_question.php',
            type: 'POST',
            data: { question_id: questionId },
            success: function(response) {
                // Handle the success response, e.g., show a success message or refresh the question list
                // alert(response);
                refreshQuestionList();
                
            },
            error: function(xhr, status, error) {
                // Handle the error response
               
            }
        });
    });

    function refreshQuestionList() {
        // Send an AJAX request to fetch_questions.php to retrieve the updated question list
        var subject = $('#selectSubjectView option:selected').val();
        // console.log(subject);
      
        $.ajax({
            url: '../api/fetch_questions.php',
            type: 'POST',
            data: { subject:  subject},
            success: function(response) {
                // Update the question list section with the new data
                $('#show-questions').html(response);
                msg = 'Question Deleted Successfully! Data Refreshed!!';
                showToast(msg);
                
            },
            error: function(xhr, status, error) {
                // Handle the error response
            }
        });
    }

    function showToast(msg) {
        var toast = document.getElementById('toast');
        var toastBody = toast.querySelector('.toast-body');
  
        toastBody.textContent = msg;
        $(toast).toast('show');
    }


    function showEditDeleteButtons(row,questionId) {
        row.find('.save-btn').replaceWith('<i class="bi bi-pencil-fill edit-btn mr-2" style="cursor:pointer;"></i>');
        row.find('.cancel-btn').replaceWith('<i class="bi bi-trash-fill delete-btn" style="cursor:pointer;" data-question-id="'+questionId+'"></i>');
    }

});