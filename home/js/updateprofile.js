$(document).ready(function() {

    //show and hide more button content
    $('.dropdown').click(function() {
        $('.dropdown-menu').toggle();
    });


    /*  $(document).on('change', '#file', function() {
          var property = document.getElementById('file').files[0];
           var image_name = property.name;
           var image_extension = image_name.split('.').pop().toLowerCase();

           if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
               alert('invalid-image');
           }
           var image_size = property.size;
           if (image_size > 2000000) {
               alert("image size is too big");
           } else {
               var form_data = new FormData();
               form_data.append("file", property);**/

    //preview the image before uploading
    const inputfile = document.getElementById('file');
    const imagecontainer = document.getElementById('demoprofile');
    const showimage = imagecontainer.querySelector('#img');
    const profilepic_container = document.getElementById('profilepic');
    const profilepic = profilepic_container.querySelector('#profile_img');

    inputfile.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            showimage.style.display = "block";

            reader.addEventListener("load", function() {
                console.log(this);
                showimage.setAttribute("src", this.result);
                profilepic.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });


    //preview the cover image before uploading
    const inputCfile = document.getElementById('cover-file');
    const imageCcontainer = document.getElementById('democover');
    const showCimage = imageCcontainer.querySelector('#cover-img');
    const coverpic_container = document.getElementById('coverphoto');
    const coverpic = coverpic_container.querySelector('#cover_img');

    inputCfile.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            showCimage.style.display = "block";

            reader.addEventListener("load", function() {
                console.log(this);
                showCimage.setAttribute("src", this.result);
                coverpic.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });

    //});

    /* $('#upload-profile-image').click(function(e) {
        e.preventDefault();

        var property = document.getElementById('file').files[0];
        var form_data = new FormData();
        form_data.append("file", property);

        $.ajax({
            url: "../php/imageupload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            /* beforeSend: function() {
                 $('#demoprofile').html("<label class='text-success'>Image uploading...</label>");
             },
            success: function(data) {
                alert('data');
            }
        });
    });
    /*    $('#preview').on('click', function(e) {
            e.preventDefault();

            var img = new FormData();
            var files = $("#file")[0].files[0];
            img.append('file', files);

            $.post('../php/previewimage.php', { img },
                function(data) {
                    if (data != 0) {
                        $('#img').attr("src", data)
                        $('#demoprofile img').show();
                    } else alert('sorry');
                });
        });


    //preview profile image before uploading
    $('#preview').on('click', function(e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: '../php/previewimage.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $("#img").attr("src", response);
                    $("#demoprofile img").show(); // Display image element
                } else {
                    alert('file not uploaded');
                }
            },
        });
    });

    /*  //upload profile image
    $('#profile-image').on('submit', function(e) {
        e.preventDefault();
        $ajax({
            url: "previewimage.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#demoprofile').html(data);
            },
            error: function() {}
        });
    });
*/
    //close upload profilephoto modal
    $('#close-upload-modal1').click(function() {
        $('.upload-profile').hide("fast");
    });

    //show profile upload modal
    $('#edit-profile-pic').click(function() {
        $('.upload-profile').show("fast");
    });

    //close upload coverphoto modal
    $('#close-upload-modal2').click(function() {
        $('.upload-cover').hide("fast");
    });

    //show cover upload modal
    $('#edit-cover-photo').click(function() {
        $('.upload-cover').show("fast");
    });
});