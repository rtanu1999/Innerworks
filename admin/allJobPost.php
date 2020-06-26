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
            $stmt = $conn->prepare('select * from jobpost');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
            ?>
            <table class="tbl">
                <thead>
                <tr>
                    <th style="width:2%;">Sr. No.</th>
                    <th style="width:10%;">Job Title</th>
                    <th style="width:7%;">Company</th>
                    <th style="width:7%;">Type</th>
                    <th style="width:10%;">Email</th>
                    <th style="width:7%;">Job Type</th>
                    <th style="width:6%;">Location</th>
                    <th style="width:6%;">Min Salary</th>
                    <th style="width:6%;">Max Salary</th>
                    <th style="width:7%;">Contact Person Name</th>
                    <th style="width:7%;">Contact Person Number</th>
                    <th style="width:11%;">Job description</th>
                    <th style="width:6%;">Experience</th>
                    <th style="width:5%;">Education Required</th>
                    <th style="width:4%;">Delete</th>
                    <th style="width:7%;">Status</th>
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
                    <tr id="<?php echo $row['id']; ?>">
                        <td><?php echo $cnt; ?></td>
                        <td><a href="details?id=<?php echo $row['id']; ?>"><button style = "width:115%"><?php echo $row['jobTitle']; ?></button></a></td>
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['jobType']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['minSalary']; ?></td>
                        <td><?php echo $row['maxSalary']; ?></td>
                        <td><?php echo $row['cpname']; ?></td>
                        <td><?php echo $row['cpnum']; ?></td>
                        <td><?php echo $row['j_desc']; ?></td>
                        <td><?php echo $row['exp']; ?></td>
                        <td><?php echo $row['education']; ?></td>
                        
                        
                        <td><button type="button" class="deleteBtn" style = "width:115%" onclick="return deleteJobpost(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i></button></td>
                        <td id="changeStausButton-<?php echo $cnt; ?>"><button type="button" class="deleteBtn" style = "width:115%" id="statusBtn" onclick="return changeStatus(<?php echo $cnt; ?>, <?php echo $row['id']; ?>, <?php echo $dbStatus; ?>)"><?php if($dbStatus == true){echo "PENDING";}else{echo "ACTIVE";} ?></button></td>
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
