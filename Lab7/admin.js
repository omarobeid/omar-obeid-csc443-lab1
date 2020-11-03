$(document).ready(function()
{


     $("#bt_search").click(function()
      {
          $.ajax({ url: 'search.php',
               type: 'POST',
               data:{
                    "username":$("#text_un").val(),
               },
               dataType: 'json',
                    success: function(txt) {
                         $("#toadd").html("");
                         for(i=0;i<txt.users.length;i++)
                         {
                              $("#toadd").append("<tr><td>"+txt.users[i]["username"]+"</td><td>"+txt.users[i]["birthday"]+"</td></tr>");
                         }
                          
                    }
               
                });

     });
});
