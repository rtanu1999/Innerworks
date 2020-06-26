
function deleteNewsletter(e)
{
    if(e != null && e != "")
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                if(xhttp.responseText == "111")
                {
                    document.getElementById("newsletterDataResult").innerHTML = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Successfully deleted one email address.</div>";
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteNewslettter.php?id="+e, true);
        xhttp.send();
    }
}