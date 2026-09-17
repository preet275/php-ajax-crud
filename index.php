<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD</title>
  
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>PHP & Ajax CRUD</h1>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
       <div id="validation-modal">
    <div class="modal-box">

        <button id="close-modal">&times;</button>

        <h3>Validation Error</h3>

        <p id="validation-message"></p>

        <button id="ok-modal">OK</button>

    </div>
</div>
        <form id="addForm">
          First Name : <input type="text" id="fname">
          Last Name : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%" id="edit-form-data">
       
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>

<script>
  $(document).ready(function(){

  

    function loadData(page_no = 1){

        $.ajax({
            url: "ajax-load.php",
            type: "POST",
                 data: {
            page_no: page_no
        },
            success: function(response){
                $('#table-data').html(response);
            }
        });

    }

    loadData();

$('#save-button').on('click', function (event) {
    event.preventDefault();

    let first_name = $('#fname').val();
    let last_name = $('#lname').val();

        if(first_name == ""){

        $('#validation-message').text("Please Enter First Name");
        $('#validation-modal').fadeIn();

        return;
    }

        if(last_name == ""){

        $('#validation-message').text("Please Enter Last Name");
        $('#validation-modal').fadeIn();

        return;
    }

    $.ajax({
        url: "ajax-insert.php",
        type: "POST",
        data: {
            fname: first_name,
            lname: last_name
        },
        success: function (response) {

            if (response == 1) {
                $('#addForm').trigger('reset');
                loadData();

                $('#success-message')
                    .text("Data inserted Successfully")
                    .show()
                    .fadeOut(3000);
            } else {
                $('#error-message')
                    .text("Data NOT inserted")
                    .show()
                    .fadeOut(3000);
            }
        }
    });
});

$('#close-modal, #ok-modal').on('click', function(){

    $('#validation-modal').fadeOut();

});

$(document).on("click", ".delete-btn", function(){

    if(confirm("Are you sure?")){

        let id = $(this).data("id");    
        $.ajax({
            url: "ajax-delete.php",
            type: "POST",
            data: {id: id},
            success: function(data){

                if(data == 1){
                      loadData(); 
                        $('#success-message')
                    .text("Data Deleted Successfully")
                    .show()
                    .fadeOut(3000);
                }else{
                        $('#error-message')
                    .text("Data NOT Deleted")
                    .show()
                    .fadeOut(3000);
                }

            }
        });

    }

});

$(document).on("click", ".edit-btn", function(){

    $("#modal").show();

    let id = $(this).data("eid");
    $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {id: id},

        success: function(data){
            $("#edit-form-data").html(data);

        }
    });

});

$(document).on("click", "#close-btn", function(){
    $("#modal").hide();
});

$(document).on("click", "#edit-submit", function(){

    let id = $("#edit-id").val();
    let first_name = $("#edit-fname").val();
    let last_name = $("#edit-lname").val();
    $.ajax({
        url: "ajax-update-form.php",
        type: "POST",
        data: {
            id: id,
            fname: first_name,
            lname: last_name
        },

        success: function(data){

            if(data == 1){
               
                $("#modal").hide();
                  $("#search").val("");

                loadData();
                
                $("#success-message")
                    .text("Data Updated Successfully")
                    .show()
                    .fadeOut(3000);

            }else{
          
                $("#error-message")
                    .text("Data NOT Updated")
                    .show()
                    .fadeOut(3000);
                    
            }
        }
    });

});

function searchData(page_no = 1){

    let search_value = $("#search").val();

    $.ajax({
        url: "ajax-live-search.php",
        type: "POST",
        data: {
            search: search_value,
            page_no: page_no
        },
        success: function(data){
            $("#table-data").html(data);
        }
    });

}

$("#search").on("keyup", function(){
 
  searchData(1);

});
$(document).on("click", ".page-btn", function(){

    let page_no = $(this).data("page");
    let search_value = $("#search").val();

    if(search_value != ""){
        searchData(page_no);
    }else{
        loadData(page_no);
    }

});

  });
</script>
</body>





</html>
