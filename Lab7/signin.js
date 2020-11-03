$(document).ready(function()
{


     $("#bt_signin").click(function()
      {
          $.ajax({ url: 'signin.php',
               type: 'POST',
               data:{
                    "username":$("#text_un").val(),
                    "password":$("#text_pw").val(),
               },
               dataType: 'text',
                    success: function(txt) {
                         if(txt=="successfully logged in")
                         {
                              alert(txt);
                              window.location.assign("password.html"); 
                         }
                         
                         else if(txt=="you are an admin")
                         {
                              alert(txt); 
                              window.location.assign("admin.html");

                         }
                         else if(txt=="wrong password or username")
                         alert(txt); 
                    }
               
                });
     });
});
