$(document).ready(function() {

    $('.profile_friend_suggestion').load("friend_suggestion.php", function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "error")
            alert("Error" + xhr.status + ":" + xhr.statusTxt);
    });


    //change toggle id attribute
    $('#frnd-sgtn-expand_less').attr("id", "less");
    $('#frnd-sgtn-expand_more').attr("id", "more");
    //toggle friend-suggestion
    $('#less').show();
    $('#more').hide();
    $('#less').click(function() {
        $('.frndsuggestion').hide("fast");
        $('#more').show();
        $(this).hide();
    });
    $('#more').click(function() {
        $('.frndsuggestion').show("fast");
        $('#less').show();
        $(this).hide();

    });
    /*$('.close').show();
    $('.close').click(function() {
        $('.frndsuggestion').hide();
    });*/

});