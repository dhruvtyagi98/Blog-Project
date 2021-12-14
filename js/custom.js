$(document).ready(function(){
    $("#old_password").focusout(function()
    {
        var id = $("#user_id").val();
        var current_password = $(this).val();
        $.ajax(
        {
            url:"includes/check_password.php",
            type:'POST',
            data:{'id':id,'current_password':current_password},
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
});