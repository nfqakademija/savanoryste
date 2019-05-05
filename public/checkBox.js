$('#checkboxGroup input[type=checkbox]').change(function() {
    if (this.checked) {
        $('#checkboxGroup input[type=checkbox]').not(
            $(this)).prop('checked', false);
    }
});

$(document).ready(function()
{  
    var errorMessage = $('span.form-error-message').length;
    if (errorMessage > 0){    
        $('#form-data').slideDown('fast'); 
    } else {
        $('#form-data').slideUp('fast'); 
    } 
    
    var animation = false;
    $('#checkboxGroup').change(function(){
        if(!errorMessage) {
          $('#form-data').slideToggle();
        } 
    });

    
    

});