function publishNews(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    document.getElementById("statusBtns-"+e).innerHTML = "";
                    document.getElementById("statusBtns-"+e).innerHTML = '<button type="button" class="publishBtn" onclick="return draftNews('+e+')">Draft</button>';
                }
            }
        };
        xhttp.open("POST", "ajax/publishNews.php?id="+e, true);
        xhttp.send();
    }
}

function draftNews(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    document.getElementById("statusBtns-"+e).innerHTML = "";
                    document.getElementById("statusBtns-"+e).innerHTML = '<button type="button" class="publishBtn" onclick="return publishNews('+e+')">Publish</button>';
                }
            }
        };
        xhttp.open("POST", "ajax/draftNews.php?id="+e, true);
        xhttp.send();
    }
}

function deleteNews(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    $("#"+e).remove();
                }
            }
        };
        xhttp.open("POST", "ajax/deleteNews.php?id="+e, true);
        xhttp.send();
    }
}

function editNews(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                //xhttp.responseText
                if(xhttp.responseText == "111")
                {
                    document.location = "editNews.php";
                }
            }
        };
        xhttp.open("POST", "ajax/editNews.php?id="+e, true);
        xhttp.send();

    }
}

