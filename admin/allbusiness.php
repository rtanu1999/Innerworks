<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InnerWork|Admin</title>
    <?php include 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/jobseeker.css">
    <script src="js/menu.js"></script>
    <script type="text/javascript" src="js/jobseeker.js"></script>
    <script>
    function deletebusiness(e)
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
            xhttp.open("POST", "ajax/deletebusiness.php?id="+e, true);
            xhttp.send();
        }
    }
    </script>

</head>
<body>
<div id="main">
<?php include 'Header.php'; ?>

    <section id="enquiries">
        <div class="container-fluid">
            <div id="enquiryDataResult"></div>
            <?php
            include_once '../DbConnection/DbConnectionHelper.php';
            $stmt = $conn->prepare('select * from bussiness');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl">
                    <thead>
                    <tr>
                        <th style="width:3%;">Sr. No.</th>
                        <th style="width:10%;">Name</th>
                        <th style="width:5%;">Source</th>
                        <th style="width:10%;">Company Name</th>
                        <th style="width:10%;">Designation</th>
                        <th style="width:13%;">Email</th>
                        <th style="width:10%;">Mobile Number</th>
                        <th style="width:5%;">Industry</th>
                        <th style="width:5%;">Location</th>
                        <th style="width:7%;">Looking for</th>
                        <th style="width:20%;">Message</th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['companyName']; ?></td>
                            <td><?php echo $row['Designation']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobno']; ?></td>
                            <td><?php echo $row['Industry']; ?></td>
                            <td><?php echo $row['Location']; ?></td>
                            <td><?php echo $row['lookingService']; ?></td>
                           <td><?php echo $row['msg']; ?></td>
                        <td><button type="button" class="deleteBtn" onclick="return deletebusiness(<?php echo $row['id']; ?>)">Delete</button></td>


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
