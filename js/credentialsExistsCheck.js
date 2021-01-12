$('document').ready(function() {

    $('#username').on('blur', function() {
        var username = $('#username').val();

        if (username == '') return;
        
        $.ajax({
            url: 'db/check_unique_credentials.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username,
            },
            success: function(response) {
                if (response.trim() == 'taken') {
                    $('#unique-uname-span').text('Sorry... Username already exists').css('color',"red");
                } else {
                    $('#unique-uname-span').text('Username available').css('color',"green");
                }
            }
        });
    });

    $('#email').on('blur', function() {
        var email = $('#email').val();

        if (email == '') return;

        $.ajax({
            url: 'db/check_unique_credentials.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email,
            },
            success: function(response) {
                if (response.trim() == 'taken') {
                    $('#unique-email-span').text('Sorry... Email already exists').css('color',"red");
                } else {
                    $('#unique-email-span').text('Email available').css('color',"green");
                }
            }
        });
    });
});
