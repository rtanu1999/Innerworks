<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs- Innerwork Portal | Blogs for Job portal | Blogs for digital Marketing | Hr services | IT services</title>
    <?php include_once 'CommonFiles.php'; ?>
    <link rel="stylesheet" href="css/blogs.css">

</head>
<body>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Blogs</h2>
            <p><a href="index">Home</a> <span>/</span> Blogs</p>
        </div>
    </div>
</section>

<section id="blogs">
    <div class="container">
        <?php
        include_once 'DbConnection/DbConnectionHelper.php';
        try{

            $status = true;
            $stmt = $conn->prepare("select id, img, publishdate, title from blogs where status = ? order by publishdate desc");
            $stmt->bindParam(1, $status);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {


                $data = $stmt->fetchAll();
                foreach($data as $row) {
                    ?>
                    <div class="col-md-3">
                        <a href="readBlog?id=<?php echo $row['id']; ?>">
                            <div class="blogBox">
                                <img src="upload/<?php echo $row['img']; ?>" alt="">
                                <p><i class="fa fa-calendar"></i> <span><?php echo $row['publishdate']; ?></span></p>
                                <h3><?php echo $row['title']; ?></h3>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Blogs available yet.</div>
                <?php
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
        ?>
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>
