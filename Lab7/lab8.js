$(document).ready(function()
{


     $("#bt_signup").click(function()
      {
          $.ajax({ url: 'signup.php',
               type: 'POST',
               data:{
                    "username":$("#text_un").val(),
                    "password":$("#text_pw").val(),
                    "birthday":$("#text_bd").val()
               },
               dataType: 'text',
                    success: function(txt) {
                         alert(txt); 
                    }
               
                });
     });
});
