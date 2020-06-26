function checkPassword()
{
    var pass1 = document.getElementById("newPassword").value;
    var pass2 = document.getElementById("repeatNewPassword").value;

    if(pass1 == pass2)
    {
        document.getElementById("result").innerHTML = "";
    }
    else
    {
        document.getElementById("result").innerHTML = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Password Does Not Match.</div>";
        document.getElementById("repeatNewPassword").focus();
    }
}