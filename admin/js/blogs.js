


function deleteBlogs(e)
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
        xhttp.open("POST", "ajax/deleteBlog.php?id="+e, true);
        xhttp.send();
    }
}

function editBlogs(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                if(xhttp.responseText == "111")
                {
                    document.location = "editBlogContent.php";
                }
            }
        };
        xhttp.open("POST", "ajax/editBlog.php?id="+e, true);
        xhttp.send();

    }
}

