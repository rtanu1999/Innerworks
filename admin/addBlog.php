<?php
include_once 'checkAdminSession.php';
include_once '../DbConnection/DbConnectionHelper.php';

$removeFilesFromFolder = false;
$result = $title = $description = $status = $uploadImgForDb = "";
if(isset($_POST['submit']))
{
    if($_POST['title'] != null && !empty($_POST['title']))
    {
        if($_POST['textarea'] != null && !empty($_POST['textarea']))
        {
            if($_POST['status'] != null)
            {
                try{
                    $title = $_POST['title'];
                    $description = $_POST['textarea'];
                    $status = $_POST['status'];
                    $publishDate = date('Y-m-d H:i:s');
                    $uploadDirectory = "../upload/";

                    $uploadImg = $_FILES['img']['name'];
                    $tmpUploadImgPath = $_FILES['img']['tmp_name'];
                    if($uploadImg != "")
                    {
                        $uploadImgForDb = time().$_FILES['img']['name'];
                        $newUploadImgPath = $uploadDirectory.time().$_FILES['img']['name'];
                        move_uploaded_file($tmpUploadImgPath, $newUploadImgPath);
                    }
                    if ($uploadImgForDb == '') {
                        $uploadImgForDb = 'logo.png';
                    }
                    if($uploadImgForDb != "")
                    {
                        $stmt = $conn->prepare("insert into blogs (title, description, img, status, publishdate) VALUES (?,?,?,?,?)");
                        $stmt->bindParam(1, $title);
                        $stmt->bindParam(2, $description);
                        $stmt->bindParam(3, $uploadImgForDb);
                        $stmt->bindParam(4, $status);
                        $stmt->bindParam(5, $publishDate);
                        $stmt->execute();

                        $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Blog added successfully .</div>";
                    }
                    else
                    {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please select Image.</div>";
                        $removeFilesFromFolder = true;
                    }

                }
                catch(PDOException $e)
                {
                    echo '{"error":{"text":'. $e->getMessage() .'}}';
                    $removeFilesFromFolder = true;
                }

                if($removeFilesFromFolder)
                {
                    //Remove All Files Here
                    unlink('../upload/'.$uploadImgForDb);
                }
            }
            else
            {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please select Status.</div>";
            }
        }
        else
        {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Blog Description.</div>";
        }
    }
    else
    {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Title.</div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inner Work - Blogs</title>

    <?php include_once 'CommonFiles.php'; ?>

    <!-- <link type="text/css" rel="stylesheet" href="./plugins/textEditor/jquery-te-1.4.0.css"> -->
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script> -->
    <!-- <script type="text/javascript" src="./plugins/textEditor/jquery-te-1.4.0.min.js" charset="utf-8"></script> -->
    <!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->


    <link rel="stylesheet" href="css/addBlogs.css">
    <link rel="stylesheet" href="css/blogs.css">
    <script type="text/javascript" src="js/blogs.js"></script>
    <script type="text/javascript" src="js/ckeditor.js"></script>

</head>
<body>
<div class="main">
    <!-- Sidebar Holder -->
    <?php include 'Header.php'; ?>

    <!-- Page Content Holder -->
    <div id="content">
        <?php include_once 'Header.php';  ?>
        <section id="banner">
            <div class="container-fluid">
                <div class="col-lg-6">
                    <h3>Add Blogs</h3>
                </div>
                <div class="col-lg-6">
                    <p class="floatRight">
                        <a href="index">Home</a>
                        <i class="fa fa-angle-double-right"></i>
                        <span>Add Blogs</span>
                    </p>
                </div>
            </div>
        </section>

        <section id="addBlogs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <a href="viewAllBlogs" class="addNewLink"> All Blogs</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h3>Add Blog</h3>
                <?php echo $result; ?>
                <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" enctype='multipart/form-data' autocomplete="off">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Image</label>
                                    <input type="file" id="userImg" name="img">
                                </div>
                                <div class="col-md-4">
                                    <div id="selectedImg"><img id="selectedPhoto" src="../upload/default.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <!-- <textarea name="textarea" class="jqte-test" ></textarea> -->
                            <textarea name="textarea" id="editor"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="0" selected>Draft</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                        <div class="col-md-10"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Submit" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>

<script>
    CKEDITOR.replace('editor', {
      height: 300,
      filebrowserUploadUrl: "upload.php"
     });
</script>

<!-- <script>
    $('.jqte-test').jqte();
    // settings of status
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script> -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#selectedPhoto').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#userImg").change(function(){
        readURL(this);
    });
</script>
</body>
</html>
