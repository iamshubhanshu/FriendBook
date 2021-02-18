$(document).ready(function() {


    $('[id="crtnewacnt"]').click(function() {
        $('[id="signupform"]').show();
        $('[id="loginform"]').hide();
    });


    //login authentication (json parameter get multiple value from php in an array)
    $('#loginbtn').click(function(e) {
        e.preventDefault();

        $.post('login/login.php', {
                email: $('#cemail').val(),
                password: $('#cpass').val(),
            },
            function(data) {
                if (data.success == 1) {
                    alert('Welcome' + ' ' + data.uname);
                    window.location.href = "home/home.php";
                } else alert(data);
            }, 'json');
    });

    //signup data
    $('#signupbtn').click(function(e) {
        e.preventDefault();
        var userdata = {
            firstname: $('#fname').val(),
            lastname: $('#lname').val(),
            email: $('#email').val(),
            mobile: $('#mobile').val(),
            password: $('#password').val(),
            gender: $('.gender').val(),
            dob: $('#dob').val()
        }

        $.post('login/signup.php', {
                fname: userdata.firstname,
                lname: userdata.lastname,
                email: userdata.email,
                mobile: userdata.mobile,
                password: userdata.password,
                gender: userdata.gender,
                dob: userdata.dob
            },
            function(data) {
                if (data == 1) {
                    alert('signup successful!');
                } else {
                    alert(data);
                }
            });
    });

    $('[id="gotologin"]').click(function() {
        $('[id="signupform"]').hide();
        $('[id="loginform"]').show();
    });

    //$('.add_new_account').hide();
    $('#add_account').click(function() {
        $('.add_new_account').show();
        $('#crtnewacnt').hide();
        $('[id="loginform"]').show();
        $('[id="signupform"]').hide();
    });

    //add new account
    $('.clickable_user').load("add_account.php", function(responseTxt, statusTxt, xhr) {
        if (statusTxt == "error")
            alert("Error" + xhr.status + ":" + xhr.statusTxt);
    });

    //open login on click user image
    $('#open_account_on_click').hide();
});
//using jquery to check email if already exist
/*$(document).ready(function() {
    $('#submit').click(function() {
        var emailval = $('#email').val();
        $.post('include/checkmil.php', { 'email': emailval },
            function(data) {
                if (data == 0) {
                    alert('email already exists');
                    $('#email').after('<div class = "error" > Email already exists </div>');
                    return false;
                } else $('#form2').submit();
            });
    });
});*/


//change attribute(id) dynamically
$("#cemail").attr("id", "cemail1");
$("#cpass").attr("id", "cpass1");
$("#loginbtn").attr("id", "loginbtn1");

$('#loginbtn1').click(function(e) {
    e.preventDefault();

    $.post('login/login.php', {
            email: $('#cemail1').val(),
            password: $('#cpass1').val(),
        },
        function(data) {
            if (data.success == 1) {
                alert('Welcome' + ' ' + data.uname);
                window.location.href = "home/home.php";
            } else alert(data);
        }, 'json');
});