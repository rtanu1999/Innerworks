<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inner Work - Blogs</title>

    <?php include_once 'CommonFiles.php'; ?>
    <link rel="stylesheet" href="css/blogs.css">
    <script type="text/javascript" src="js/blogs.js"></script>

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
                    <h3>Blogs</h3>
                </div>
                <div class="col-lg-6">
                    <p class="floatRight">
                        <a href="index">Home</a>
                        <i class="fa fa-angle-double-right"></i>
                        <span>Blogs</span>
                    </p>
                </div>
            </div>
        </section>

        <section id="blogs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <a href="addBlog" class="addNewLink"><i class="fa fa-plus"></i> Add Blog</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div id="allNewsData">
                    <?php
                    //add news here but only bublished
                    include_once '../DbConnection/DbConnectionHelper.php';
                    try{
                        $stmt = $conn->prepare("select * from blogs");
                        $stmt->execute();
                        if($stmt->rowCount() > 0)
                        {
                            ?>
                            <table>
                                <thead>
                                <tr>
                                    <th style="width:6%;">Sr. No.</th>
                                    <th style="width:10%;">Image</th>
                                    <th style="width:13%;">Title</th>
                                    <th style="width:43%;">Blog</th>
                                    <th style="width:7%;">Date</th>
                                    <th style="width:7%;">Status</th>
                                    <th style="width:7%;">Edit</th>
                                    <th style="width:7%;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $cnt = 1;
                                $data = $stmt->fetchAll();
                                foreach($data as $row)
                                {
                                    ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <td><?php echo $cnt; ?></td>
                                        <td><img src="../upload/<?php echo $row['img']; ?>" alt=""></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['publishdate']; ?></td>
                                        <td>
                                            <div id="statusBtns-<?php echo $row['id']; ?>">
                                                <?php
                                                if($row['status'])
                                                {
                                                    ?>
                                                    <button type="button" class="publishBtn" onclick="return draftBlogs(<?php echo $row['id']; ?>)">Draft</button>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <button type="button" class="publishBtn" onclick="return publishBlogs(<?php echo $row['id']; ?>)">Publish</button>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td><button type="button" class="editBtn" onclick="return editBlogs(<?php echo $row['id']; ?>)">Edit</button></td>
                                        <td><button type="button" class="deleteBtn" onclick="return deleteBlogs(<?php echo $row['id']; ?>)">Delete</button></td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        else
                        {
                            echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no news available yet.</div>";
                        }
                    }
                    catch(PDOException $e)
                    {
                        echo '{"error":{"text":'. $e->getMessage() .'}}';
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>
</div>
</body>
</html>
