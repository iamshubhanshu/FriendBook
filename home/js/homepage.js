$(document).ready(function() {

    //open post modal on click text area
    $('.textarea').on({
        click: function() {
            $('.create_post').css({ "height": "60%" });
            $('.create_post').css("box-shadow", "0px 8px 16px 0px rgba(0,0,0,0.5)");
            $('.create_post').css("border", "none");
            $('.cp_header').css("height", "10%");
            $('#close_cp').css("display", "block");
            $('.cp_textarea').css("height", "50%");
            $('.cp_footer').css("height", "40%");
            $('.post_btn').css({ "display": "block", "margin": "2%", "margin-top": "6%" });
            $(document).on('click', function(e) {
                if ($(e.target).closest(".create_post").length === 0) {
                    //$("#CONTAINER").hide();
                    $('.create_post').css({ "height": "30%" });
                    $('.create_post').css("box-shadow", "none");
                    $('.create_post').css("border", "1px solid #111");
                    $('.cp_header').css("height", "15%");
                    $('#close_cp').css("display", "none");
                    $('.cp_textarea').css("height", "45%");
                    $('.cp_footer').css("height", "40%");
                    $('.post_btn').css("display", "none");
                }
            });
        }
    });

    //create post modal go back to normal position on close
    $('#close_cp').click(function() {

        $('.create_post').css({ "height": "30%" });
        $('.create_post').css("box-shadow", "none");
        $('.create_post').css("border", "1px solid #111");
        $('.cp_header').css("height", "15%");
        $('#close_cp').css("display", "none");
        $('.cp_textarea').css("height", "45%");
        $('.cp_footer').css("height", "40%");
        $('.post_btn').css("display", "none");
    });



    /* //toggle friend-suggestion
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

     });*/
});