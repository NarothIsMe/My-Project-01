$(document).ready(function(){
    // Fetch data when document is ready
    fetch();
    
    // Show add modal on button click
    $('#addnew').click(function(){
        $('#add').modal('show');
    });

    // Add new member
    $('#addForm').submit(function(e){
        e.preventDefault();
        var addform = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'add.php',
            data: addform,
            dataType: 'json',
            success: function(response){
                $('#add').modal('hide');
                if(response.error){
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                }
                else{
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                    fetch();
                }
            }
        });
    });

    // Edit member
    $(document).on('click', '.edit', function(){
        var id = $(this).data('id');
        getDetails(id);
        $('#edit').modal('show');
    });

    // Submit edit form
    $('#editForm').submit(function(e){
        e.preventDefault();
        var editform = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'edit.php',
            data: editform,
            dataType: 'json',
            success: function(response){
                if(response.error){
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                }
                else{
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                    fetch();
                }
                $('#edit').modal('hide');
            }
        });
    });

    // Delete member
    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        getDetails(id);
        $('#delete').modal('show');
    });

    // Confirm and delete member
    $('.id').click(function(){
        var id = $(this).val();
        $.ajax({
            method: 'POST', 
            url: 'delete.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(response.error){
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                }
                else{
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                    fetch();
                }
                $('#delete').modal('hide');
            }
        });
    });

    // Hide alert message
    $(document).on('click', '.close', function(){
        $('#alert').hide();
    });
});

// Fetch members data
function fetch(){
    $.ajax({
        method: 'POST',
        url: 'fetch.php',
        success: function(response){
            $('#tbody').html(response);
        }
    });
}

// Get details of a member
function getDetails(id){
    $.ajax({
        method: 'POST',
        url: 'fetch_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
            if(response.error){
                $('#edit').modal('hide');
                $('#delete').modal('hide');
                $('#alert').show();
                $('#alert_message').html(response.message);
            }
            else{
                $('.id').val(response.data.id);
                $('.firstname').val(response.data.firstname);
                $('.lastname').val(response.data.lastname);
                $('.address').val(response.data.address);
                $('.fullname').html(response.data.firstname + ' ' + response.data.lastname);
            }
        }
    });
}
