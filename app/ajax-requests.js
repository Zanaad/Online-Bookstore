
$(document).ready(function() {
    $('.question').click(function() {
        $(this).next('.answer').slideToggle();
    });

   
    $.ajax({
        url: 'lexo.php',
        method: 'GET',
        success: function(response) {
            console.log(response);
           
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
          
        }
    });
   

    $.ajax({
        url: 'lexo_update_db.php',
        method: 'POST',
        data: { key: value },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
           
        }
    });
});
