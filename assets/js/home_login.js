
$(document).ready(function() {
        
         $("#btnLogin").click(function() {
            $("#login").fadeOut("fast", function() {
                $("#register").fadeIn("5000");
            });
            $('#error_box').hide();
        });

        $("#btnRegister").click(function() {
            $("#register").fadeOut("fast", function() {
                $("#login").fadeIn("5000");
            });
            $('#error_box').hide();
        });

        if($('#error_box').text().trim() == ""){
            $('#error_box').hide();
        }else
            $('#error_box').show();

    
    
});




