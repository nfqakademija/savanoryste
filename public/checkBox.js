$('#checkboxGroup input[type=checkbox]').change(function() {
    if (this.checked) {
        $('#checkboxGroup input[type=checkbox]').not(
            $(this)).prop('checked', false);
    }
});