// JavaScript source code
$(document).ready(function () {

    $(".borders").click(function () {
        $("tr").each(function() {
            $("td").css("borderRadius","20px");
        })
    })

    $(".colors").click(function () {
        $("tr").each(function () {
            $("td").css("backgroundColor", "blue");
        })
    })


    $(".add").click(function () {
        var str = '<td style="border:1px;border-color:black; border-style:solid; margin:0px; width:100px; height:100px"></td>';
        $("tr").append(str);

    })


})