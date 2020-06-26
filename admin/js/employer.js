
function deleteEnquiry(e)
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
                    document.getElementById("enquiryDataResult").innerHTML = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Successfully deleted one Enquiry.</div>";
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteEnquiry.php?id="+e, true);
        xhttp.send();
    }
}

function getReportDetails(e)
{
    if(e != null && e != "")
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                document.getElementById("resportDetailsResult").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "ajax/getReportDetails.php?id="+e, true);
        xhttp.send();
    }
}