// JavaScript source code
$(document).ready(function () {
    $("#disappear").click(function () {
        $("ul").children().hide();
    });


    $("#test1").click(function () {
        $("ul").each(function () {
            $(".test").hide();
        })

    })

    $("#blue").click(function () {
        $("ul").each(function () {
            if ($("li").css("background-color","white")) {
                $("li").css("background-color", "blue");
            }
            else if ($("li").css("background-color", "blue")){
                $("li").css("background-color", "white");
            }
        })

    })

    $("#new").click(function () {
        var str = $("#newword").val();
        $("#blueword").each(function () {
            $(this).text(str);
        })
    })
    
});