$(document).ready(function() {


    //toggle friend-suggestion
    $('#frnd-sgtn-expand_less').show();
    $('#frnd-sgtn-expand_more').hide();
    $('#frnd-sgtn-expand_less').click(function() {
        $('.frndsuggestion').hide("fast");
        $('#frnd-sgtn-expand_more').show();
        $(this).hide();
    });
    $('#frnd-sgtn-expand_more').click(function() {
        $('.frndsuggestion').show("fast");
        $('#frnd-sgtn-expand_less').show();
        $(this).hide();

    });



});