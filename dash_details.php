<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InnerWork|Admin</title>
    <?php include 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/jobseeker.css">
    <style>
    table.tbl {
        width: 100%;
    }
    table{
      border: 2px;
        background-color: transparent;
        border-spacing: 0;
        border-collapse: collapse;
        display: table;

        box-sizing: border-box;
    border:1px solid lightgrey;

    }
    table,th,td{border:1px solid lightgrey;}
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }
    table.tbl tr th {
        font-family: GraphikRegular;
        border: 1px solid #d3d3d3;
        background: #f9b805;
        color: #fff;
        text-align: center;
        padding: .5%;
        font-size: 13px;
    }

    </style>

</head>
<body>
<div id="main">


    <section id="enquiries">
        <div class="container-fluid">
            <div id="enquiryDataResult"></div>
            <?php
            include_once 'DbConnection/DbConnectionHelper.php';
            if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

        $stmt = $conn->prepare("select type from jobpost where id='$id'");

        $stmt->execute();
        if($stmt->rowCount() > 0)
        {


        $data = $stmt->fetchAll();
        foreach($data as $row) {

			$type= $row['type'];

		}

        }

if($type=="Job"){
 $stmt = $conn->prepare('select * from jobseeker where jobpost_id = ?');

 $stmt->bindParam(1, $id);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl">
                    <thead>
                    <tr>
                        <th style="width:3%;">Sr. No.</th>
                        <th style="width:10%;">Name</th>
                        <th style="width:10%;">Gender</th>
                        <th style="width:8%;">City</th>
                        <th style="width:8%;">Education</th>
                        <th style="width:15%;">Email</th>
                        <th style="width:10%;">Mobile Number</th>
                        <th style="width:10%;">Skills</th>
                        <th style="width:10%;">Interest</th>
                        <th style="width:4%;">Exp</th>
                        <th style="width:6%;">File</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;
                    $data = $stmt->fetchAll();
                    foreach($data as $row)
                    {
                        $Resume_file_raw = $row['file'];
                        $Resume_file = str_replace(" ","%20",$Resume_file_raw); // 12-05-2020
                        ?>

                        <tr id="<?php echo $row['id']; ?>">
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['education']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobileNum']; ?></td>
                            <td><?php echo $row['skill']; ?></td>
                            <td><?php echo $row['interest']; ?></td>
                            <td><?php echo $row['exp']; ?></td>
                            <td>
                                <?php echo "<a href=\"https://innerworkindia.com/Resume/{$Resume_file}\">"; // 12-05-2020?>
                                <?php echo $row['file']; ?>;
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
            else{
                echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";

            }
}
            else
            { if($type=="Internship"){
                 $stmt = $conn->prepare('select * from internship where jobpost_id = ?');

 $stmt->bindParam(1, $id);
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl">
                    <thead>
                    <tr>
                        <th style="width:3%;">Sr. No.</th>
                        <th style="width:10%;">Name</th>
                        <th style="width:10%;">Gender</th>
                        <th style="width:8%;">City</th>
                        <th style="width:8%;">Education</th>
                        <th style="width:15%;">Email</th>
                        <th style="width:10%;">Mobile Number</th>
                        <th style="width:10%;">Skills</th>
                        <th style="width:10%;">Interest</th>
                        <th style="width:4%;">Exp</th>
                        <th style="width:6%;">File</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;
                    $data = $stmt->fetchAll();
                    foreach($data as $row)
                    {
                        $Resume_file_raw = $row['file'];
                        $Resume_file = str_replace(" ","%20",$Resume_file_raw); // 12-05-2020
                        ?>

                        <tr id="<?php echo $row['id']; ?>">
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['education']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobno']; ?></td>
                            <td><?php echo $row['skill']; ?></td>
                            <td><?php echo $row['interest']; ?></td>
                            <td><?php echo $row['exp']; ?></td>
                            <td>
                                <?php echo "<a href=\"https://innerworkindia.com/Resume/{$Resume_file}\">"; // 12-05-2020?>
                                <?php echo $row['fnamee']; ?>;
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
            else{
                echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";
                echo $type;
            }
            }else{
                echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";
                echo $type;
            }

            }
            ?>

        </div>
    </section>

    <!------------------------ -- modals -- ---------------------------->


</div>
</body>
</html>
