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
            $stmt = $conn->prepare('select * from agency');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
            ?>
            <table class="tbl">
                <thead>
                <tr>
                    <th style="width:3%;">Sr. No.</th>
                    <th style="width:10%;">Company Name</th>
                    <th style="width:7%;">Website</th>
                    <th style="width:7%;">Mobile</th>
                    <th style="width:7%;">Address</th>
                    <th style="width:7%;">State</th>
                    <th style="width:7%;">City</th>
                    <th style="width:7%;">Postcode</th>
                    <th style="width:10%;">Contact Person Name</th>
                    <th style="width:15%;">Email</th>
                    <th style="width:7%;">Sector</th>
                    <th style="width:3%;">Experience</th>
                    <th style="width:5%;">Keyword</th>
                    <th style="width:5%;">Delete</th>
                    <th style="width:9%;">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $cnt = 1;
                $data = $stmt->fetchAll();
                foreach($data as $row)
                {
                    $dbStatus = $row['status'];
                    ?>
                    <tr id="<?php echo $row['userid']; ?>">
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['website']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['postcode']; ?></td>
                        <td><?php echo $row['contactperson']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sector']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo $row['keyword']; ?></td>
                        
                        
                        <td><button type="button" class="deleteBtn" onclick="return deleteagency(<?php echo $row['userid']; ?>)"><i class="fa fa-trash"></i></button></td>
                        <td id="changeStausButton-<?php echo $cnt; ?>"><button type="button" class="deleteBtn" id="statusBtn" onclick="return changefstatus(<?php echo $cnt; ?>, <?php echo $row['userid']; ?>, <?php echo $dbStatus; ?>)"><?php if($dbStatus == true){echo "PENDING";}else{echo "ACTIVE";} ?></button></td>
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
