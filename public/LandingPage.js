$('.counter').countTo();

$("#button-volunteer").click(function() {
    document.getElementById("event-list").style.display = "block";
    $('html, body').animate({
        scrollTop: $("#event-list").offset().top
    }, 2000);
});

$("#button-organisation").click(function() {
    document.getElementById("volunteer-list").style.display = "block";
    $('html, body').animate({
        scrollTop: $("#volunteer-list").offset().top
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