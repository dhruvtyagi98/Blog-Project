$(document).ready(function(){
    $("#old_password").focusout(function()
    {
        var email = $("#user_email").val();
        var current_password = $(this).val();
        $.ajax(
        {
            url: "../../controllers/auth/check_password.php",
            type:'POST',
            data:{'email':email,'current_password':current_password},
            success : function(response)
            {
                if(response == false)
                {
                    $('#new_password').attr('disabled', true);
                    $("#old_password_error").show();
                }
                else
                {
                    $("#old_password_error").hide();
                    $('#new_password').attr('disabled', false);
                }
            }
        });
    });
    
    changeStatus();
    setInterval(changeStatus,2000);
});

function changeStatus() {
    $.get('../../controllers/user/user_controller.php?change_status=1');
}