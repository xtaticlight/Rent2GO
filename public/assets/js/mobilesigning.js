$(document).ready(function () {
    $('#signingup').click(function () {
        $('#loginform1').hide();
        $('#loginform2').hide();
        $('#loginform3').hide();
        $('#loginform4').hide();
        $('#signupform1').show();
        $('#signupform2').show();
        $('#signupform3').show();
        $('#signupform4').show();
    });
    $('#signingin').click(function () {
        $('#loginform1').show();
        $('#loginform2').show();
        $('#loginform3').show();
        $('#loginform4').show();
        $('#signupform1').hide();
        $('#signupform2').hide();
        $('#signupform3').hide();
        $('#signupform4').hide();
    });
});