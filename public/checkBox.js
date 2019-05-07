$('#checkboxGroup input[type=checkbox]').change(function() {
    if (this.checked) {
        $('#checkboxGroup input[type=checkbox]').not(
            $(this)).prop('checked', false);
    }
});

$(document).ready(function()
{  
    var errorMessage = $('span.form-error-message').length;
    var count = 0;
    if (errorMessage > 0){    
        $('#form-data').slideDown('fast'); 
    }
    
    
    $('#checkboxGroup').change(function(){
        
        // var idSelector = function() { return this.id; };
        // var checkboxChecked = $(":checkbox:checked").map(idSelector).get() ;
        // var checkboxNotChecked = $(":checkbox:not(:checked)").map(idSelector).get() ;
        
        if(count == 0) {
          $('#form-data').slideToggle();
          document.getElementById("form-data").style.display = "block";
          count = 1;
        }
    });

    
    

});