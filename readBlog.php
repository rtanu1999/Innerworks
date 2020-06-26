<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$id = "";
$staus = true;
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    header( "Location: blog" );
}
include_once 'DbConnection/DbConnectionHelper.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inner Work</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/careerHouse.css">
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

<section id="readBlog">
    <div class="container">
        <div class="col-md-8">
            <?php
            $stmt = $conn->prepare('select * from blogs where id = ? and status = ?');
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $staus);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                $data = $stmt->fetchAll();
                foreach($data as $row)
                {
                    ?>
                    <div class="readBx">
                        <img src="upload/<?php echo $row['img']; ?>" alt="" style="width: 350px;height: auto;">
                        <h2><?php echo $row['title']; ?></h2>
                        <?php $row['description'] = str_replace('../upload', 'upload', $row['description']); ?>
                        <?php if (strpos($row['description'], 'youtube')) { ?>
                            <?php $row['description'] = str_replace('<p>', '', $row['description']); ?>
                            <?php $row['description'] = str_replace('</p>', '', $row['description']); ?>
                            <iframe width="560" height="315" src=<?php echo '"' .$row['description'] .'"'; ?>frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        <?php } else { ?>
                        <div class="descriptionPara"><?php echo $row['description']; ?></div>
                        <?php } ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="col-md-4">
            <div class="relatedBlogs">
                <h3>Latest Post</h3>
                <?php
                $stmtLatest = $conn->prepare('select * from blogs where id != ? and status = ? limit 6');
                $stmtLatest->bindParam(1, $id);
                $stmtLatest->bindParam(2, $staus);
                $stmtLatest->execute();
                if($stmtLatest->rowCount() > 0){
                    $data = $stmtLatest->fetchAll();
                    foreach($data as $ro)
                    {
                        ?>
                        <a href="readBlog?id=<?php echo $ro['id']; ?>">
                            <div class="row recent">
                                <div class="col-md-4 col-xs-4">
                                    <img src="upload/<?php echo $ro['img']; ?>" alt="">
                                </div>
                                <div class="col-md-8 col-xs-8">
                                    <h4><?php echo $ro['title']; ?></h4>
                                    <p><?php echo $ro['publishdate']; ?></p>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    echo "nothing";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>