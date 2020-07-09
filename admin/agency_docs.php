<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InnerWork|Admin</title>
    <?php include 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/jobseeker.css">
    <script src="js/menu.js"></script>
    <script type="text/javascript" src="js/jobseeker.js"></script>

</head>
<body>
<div id="main">
    <?php include 'Header.php'; ?>

    <section id="enquiries">
        <div class="container-fluid">
            <div id="enquiryDataResult"></div>
            <?php
            include_once '../DbConnection/DbConnectionHelper.php';
            if(isset($_GET['id']))
{
    $id = $_GET['id'];
}



 $stmt = $conn->prepare('select * from agency where userid = ?');

 $stmt->bindParam(1, $id);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl">
                    <thead>
                    <tr>
                        <th style="width:3%;">Sr. No.</th>
                        <th style="width:6%;">Adhar</th>
                        <th style="width:6%;">Pan</th>
                        <th style="width:6%;">CV</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;
                    $data = $stmt->fetchAll();
                    foreach($data as $row)
                    {
                        $adhar_file_raw = $row['adhar'];
                        $adhar_file = str_replace(" ","%20",$adhar_file_raw); // 12-05-2020
                        $pan_file_raw = $row['pan'];
                        $pan_file = str_replace(" ","%20",$pan_file_raw); // 12-05-2020
                        $cv_file_raw = $row['cv'];
                        $cv_file = str_replace(" ","%20",$cv_file_raw); // 12-05-2020

                        ?>

                        <tr id="<?php echo $row['userid']; ?>">
                            <td><?php echo $cnt; ?></td>
                            <td>
                                <?php echo "<a href=\"https://innerworkindia.com/recruiterdocuments/aadhar/{$adhar_file}\">"; // 12-05-2020?>
                                <?php echo $row['adhar']; ?>;
                                </a>
                            </td>
                            <td>
                                <?php echo "<a href=\"https://innerworkindia.com/recruiterdocuments/PAN/{$pan_file}\">"; // 12-05-2020?>
                                <?php echo $row['pan']; ?>;
                                </a>
                            </td>
                            <td>
                                <?php echo "<a href=\"https://innerworkindia.com/recruiterdocuments/CV/{$cv_file}\">"; // 12-05-2020?>
                                <?php echo $row['cv']; ?>;
                                </a>
                            </td>


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
                                            echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";
                                        }
                                        ?>

                                    </div>
                                </section>


    <!------------------------ -- modals -- ---------------------------->


</div>
</body>
</html>
