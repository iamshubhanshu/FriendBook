$(document).ready(function() {

    //hide and show sidebar on click menu icon
    $('#menuicon').click(function() {
        $('#sidenav').toggle("fast");
    });

    //show search bar on click search icon
    $('.dropdown_search').click(function() {
        $('.dropdown_search_content').toggle();
    });

    $('#maincontainer').click(function() {

    });

    //hide all content except homepage
    $('.profilecontainer').hide();

    //show message box on click chat icon and hide the chat icon 
    $('#chaticon').on({
        click: function() {
            $('#msgbox').show("fast");
            $(this).hide();
        },
        mouseenter: function() {
            $(this).css("height", "52px");
        },
        mouseleave: function() {
            $(this).css("height", "50px");
        }
    });

    //close the message box and show the chat icon 
    $('#msgboxclose').click(function() {
        $('#msgbox').hide("fast");
        $('#chaticon').show("slow");
    });

    //position the button n cover photo
    /*$('.editprofilebtn').position({
        my: "left bottom",
        at: "left+100 bottom",
        of: ".coverphoto"
    });
    $('.morebtn').position({
        my: "left bottom",
        at: "left+240 bottom",
        of: ".coverphoto"
    });*/

    /* //open sidebar on click sidebutton
     $('.sidebtn1').on('click', function() {
         $('.side-btn-content1').toggle("slide");
         $('.side-btn-content2').hide("fast");
         $('.side-btn-content3').hide("fast");
         $('.side-btn-content4').hide("fast");
         $('.side-btn-content5').hide("fast");
         $('.side-btn-content6').hide("fast");

     });
     $('.sidebtn2').on('click', function() {
         $('.side-btn-content1').hide("fast");
         $('.side-btn-content2').toggle("slide");
         $('.side-btn-content3').hide("fast");
         $('.side-btn-content4').hide("fast");
         $('.side-btn-content5').hide("fast");
         $('.side-btn-content6').hide("fast");
     });
     $('.sidebtn3').on('click', function() {
         $('.side-btn-content1').hide("fast");
         $('.side-btn-content2').hide("fast");
         //$('.messenger').toggle("slide");
         $('.side-btn-content4').hide("fast");
         $('.side-btn-content5').hide("fast");
         $('.side-btn-content6').hide("fast");
     });
     $('.sidebtn4').on('click', function() {
         $('.side-btn-content1').hide("fast");
         $('.side-btn-content2').hide("fast");
         $('.side-btn-content3').hide("fast");
         $('.side-btn-content4').toggle("slide");
         $('.side-btn-content5').hide("fast");
         $('.side-btn-content6').hide("fast");
     });
     $('.sidebtn5').on('click', function() {
         $('.side-btn-content1').hide("fast");
         $('.side-btn-content2').hide("fast");
         $('.side-btn-content3').hide("fast");
         $('.side-btn-content4').hide("fast");
         $('.side-btn-content5').toggle("slide");
         $('.side-btn-content6').hide("fast");
     });
     $('.sidebtn6').on('click', function() {
         $('.side-btn-content1').hide("fast");
         $('.side-btn-content2').hide("fast");
         $('.side-btn-content3').hide("fast");
         $('.side-btn-content4').hide("fast");
         $('.side-btn-content5').hide("fast");
         $('.side-btn-content6').toggle("slide");
     });*/

    //dispaly profile container on click sidenav profile image
    /* $('.profilecontainer').hide();
     $('#dp').on('click', function() {
         $('.profilecontainer').show();
     });*/

    //menu bar items

    //Go to home
    $('#sidebtn1').click(function() {

    });

});