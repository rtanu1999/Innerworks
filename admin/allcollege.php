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
            $stmt = $conn->prepare('select * from collegeportal');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl">
                    <thead>
                    <tr>
                        <th style="width:7%;">Sr. No.</th>
                        <th style="width:10%;">College Name</th>
                        <th style="width:12%;">University</th>
                        <th style="width:7%;">City</th>
                        <th style="width:15%;">Email</th>
                        <th style="width:10%;">Looking for</th>
                        <th style="width:10%;">Website</th>
                        <th style="width:5%;">Department</th>
                        <th style="width:5%;">No of Students</th>
                        <th style="width:7%;">About College</th>

                        <th style="width:10%;">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;
                    $data = $stmt->fetchAll();
                    foreach($data as $row)
                    {

                        ?>

                        <tr id="<?php echo $row['college_info_id']; ?>">
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['collegename']; ?></td>
                            <td><?php echo $row['university']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['looking']; ?></td>
                            <td><?php echo $row['website']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['numofstudent']; ?></td>
                            <td><?php echo $row['aboutcollege']; ?></td>

                          <td><button type="button" class="deleteBtn" onclick="return deletecollege(<?php echo $row['college_info_id']; ?>)">Delete</button></td>


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




</div>
</body>
</html>
