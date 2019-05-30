$('.counter').countTo();

$("#button-volunteer, #button-organisation").click(function() {
    $('html, body').animate({
        scrollTop: $(".landing-register").offset().top
    }, 2000);
});

$('#role-organisation, #role-volunteer').click(function() {
    var checkDiv = $(this);
    if (checkDiv.attr("id") == "role-organisation") {
        $("#box").text("Organizacija");
    } else {
        $("#box").text("Savanoris");
    }
});

$('#checkboxGroup input[type=checkbox]').change(function() {
    if (this.checked) {
        $('#checkboxGroup input[type=checkbox]').not(
            $(this)).prop('checked', false);
    }
});