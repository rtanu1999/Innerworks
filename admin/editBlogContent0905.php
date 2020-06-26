<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
include_once 'checkAdminSession.php';
include_once '../DbConnection/DbConnectionHelper.php';

$urlId = "";

if(isset($_SESSION["BLOGEDITID"]))
{
    $urlId = $_SESSION["BLOGEDITID"];
}
else
{
    header( "Location: viewAllBlogs" );
}

$result = $title = $description = $status = $uploadImgForDb = $TargetPath = "";
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
                    $blogId = $_SESSION["BLOGEDITID"];
//                    $publishDate = date('Y-m-d H:i:s');
                    $uploadDirectory = "../upload/";

                    $UploadedFileName = $_FILES['img']['name'];
                    if ($UploadedFileName != '') {
                        $upload_directory = "../upload/"; //This is the folder which you created just now
                        $TargetPath = time() . $UploadedFileName;
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $upload_directory . $TargetPath)) {
                            if(!empty($_POST['oldImgPath']))
                            {
                                unlink('../upload/'.$_POST['oldImgPath'].'');
                            }
                        } else {
                            $TargetPath = $_POST['oldImgPath'];
                        }
                    }
                    else
                    {
                        $TargetPath = $_POST['oldImgPath'];
                    }

                    $stmt = $conn->prepare("update blogs set title = ?, description = ?, img = ?, status = ? where id = ?");
                    $stmt->bindParam(1, $title);
                    $stmt->bindParam(2, $description);
                    $stmt->bindParam(3, $TargetPath);
                    $stmt->bindParam(4, $status);
                    $stmt->bindParam(5, $blogId);
                    $stmt->execute();

                    $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Blog Update successfully .</div>";
                }
                catch(PDOException $e)
                {
                    echo '{"error":{"text":'. $e->getMessage() .'}}';
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
    <title>Caddix - Blogs</title>

    <?php include_once 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/addBlogs.css">

    <link type="text/css" rel="stylesheet" href="./plugins/textEditor/jquery-te-1.4.0.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="./plugins/textEditor/jquery-te-1.4.0.min.js" charset="utf-8"></script>

</head>
<body>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include_once 'Header.php'; ?>

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
                <h3>Edit Blogs</h3>
                <?php
                include_once '../DbConnection/DbConnectionHelper.php';
                try{
                    $stmt = $conn->prepare("select * from blogs WHERE id = ?");
                    $stmt->bindParam(1, $urlId);
                    $stmt->execute();
                    if($stmt->rowCount() > 0)
                    {
                        $data = $stmt->fetchAll();
                        foreach($data as $row)
                        {
                            ?>
                            <div id="editFormResult"><?php echo $result; ?></div>
                            <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" enctype='multipart/form-data' autocomplete="off">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="">Image</label>
                                                <input type="file" id="userImg" name="img" >
                                                <input type="hidden" name="oldImgPath" value="<?php echo $row['img']; ?>">
                                                <input type="hidden" name="newsId" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <div id="selectedImg"><img id="selectedPhoto" src="../upload/<?php echo $row['img']; ?>" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="textarea" class="jqte-test" ><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <?php
                                            if($row['status'])
                                            {
                                                ?>
                                                <option value="1" selected>Publish</option>
                                                <option value="0">Draft</option>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="0" selected>Draft</option>
                                                <option value="1">Publish</option>
                                                <?php
                                            }
                                            ?>
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
                            <?php
                        }
                    }
                }
                catch(PDOException $e)
                {
                    echo '{"error":{"text":'. $e->getMessage() .'}}';
                }
                ?>
            </div>
        </section>

    </div>
</div>

<script>
    $('.jqte-test').jqte();

    // settings of status
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script>

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
