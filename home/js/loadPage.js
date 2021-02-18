$(document).ready(function() {

    //load icon for all ajax

    //call profile page on click sidenav profile button
    $('#dp').click(function() {
        $('.homepage').hide();
        $('.profilecontainer').show();
        $('#profile_loader').show();
        $('.profilecontainer').load("profile.php", function(responseTxt, statusTxt, xhr) {
            $('#profile_loader').hide();
            if (statusTxt == "error")
                alert("Error" + xhr.status + ":" + xhr.statusTxt);
        });

    });

    //load friendsuggestion on homepage
    //$('.home_friend_suggestion').html("")
    $('.home_friend_suggestion').load("friend_suggestion.php", function(responseTxt, statusTxt, xhr) {
        $('#home_frnd_load').hide();
        if (statusTxt == "error")
            alert("Error" + xhr.status + ":" + xhr.statusTxt);
    });

    //load message block on mobile
    $('#menu-messenger').click(function() {
        $('.menu_msg').toggle("fast");
        $('#m_msgloader').show();
        $('.call_msg_mob').load("message.php", function(responseTxt, statusTxt, xhr) {
            $('#m_msgloader').hide();
            if (statusTxt == "error")
                alert("Error" + xhr.status + ":" + xhr.statusTxt);
        });
    });

    //load message block on desktop
    $('.sidebtn3').click(function() {
        $('.messenger').toggle("fast");
        $('#d_msgloader').show();
        $('.call_msg_dsktp').load("message.php", function(responseTxt, statusTxt, xhr) {
            $('#d_msgloader').hide();
            if (statusTxt == "error")
                alert("Error" + xhr.status + ":" + xhr.statusTxt);
        });
    });
});