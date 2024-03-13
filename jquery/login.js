$(document).ready(function(){
    $('#username, #password').on('keyup', function(event) {
        if (event.key === 'Enter') {
            $('#login_btn').click();
        }
    });

    $("#login_btn").click(function(){
        var $username = $("#username").val();
        var $password = $("#password").val();

        $('.error').hide();

        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: {
                uname: $username,
                pass: $password
            },
            success: function(respond){
                if( respond=="1"){
                    $('#loading').show();
                    setTimeout(function() {
                        $('#loading').hide();
                        window.location.href = '/dannielle_motors/admin/dashboard';
                    }, 3000);
                    
                }else{
                    $('#loading').show();
                    setTimeout(function() {
                        $('#loading').hide();
                        $('.error').show();
                    }, 3000); // Show loading for 3 seconds before hiding
                }

            }
        });
    });
});
