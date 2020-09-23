function sendContactForm() {
    var a = $("#contactForm");
    $(a).submit(function(e) {
        e.preventDefault();
        var l = $(a).serialize();
        $.ajax({
            type: "POST",
            url: $(a).attr("action"),
            data: l
        }).done(function(a) {
            alert("Email sent! Thank you for your input"), $("#name").val(""), $("#email").val(""), $("#message").val("")
        }).fail(function(a) {
            alert("Sorry, try again. An error has occurred during the procedure!"), $("#name").val(""), $("#email").val(""), $("#message").val("")
        })
		grecaptcha.reset();
    })
}