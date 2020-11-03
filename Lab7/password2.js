$(document).ready(function(){
    $("#change").click(function()
    {
       $.ajax({ url: 'editpassword.php',
       type: 'POST',
       data:{
            
            "password":$("#new_pw").val(),
       },
       dataType: 'text',
            success: function(txt) {
                 alert(txt); 
                 if(txt=="password successfully changed")
                 window.location.assign("lab8.html"); 
            }
       
        });
    });
});