<?php
include_once 'checkAdminSession.php';
$result = $oldPassword = $newPassword = $repeatNewPassword = "";
if(isset($_POST['submit'])) {
    if($_POST['oldPassword'] != null && !empty($_POST['oldPassword']))
    {
        if($_POST['newPassword'] != null && !empty($_POST['newPassword']))
        {
            if($_POST['repeatNewPassword'] != null && !empty($_POST['repeatNewPassword']))
            {
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword'];
                $repeatNewPassword = $_POST['repeatNewPassword'];

                if($newPassword == $repeatNewPassword)
                {
                    $convertedPass = password_hash($newPassword, PASSWORD_DEFAULT);
                    $userRole = $_SESSION['USERROLE'];
                    $userEmail = $_SESSION['USEREMAIL'];

                    include_once '../DbConnection/DbConnectionHelper.php';
                    $stmt = $conn->prepare("select pass from users where email = ? and role = ?");
                    $stmt->bindParam(1, $userEmail);
                    $stmt->bindParam(2, $userRole);
                    $stmt->execute();
                    if($stmt->rowCount() > 0)
                    {
                        $data = $stmt->fetchAll();
                        foreach($data as $row) {
                            $dbPass = $row['pass'];
                            if(password_verify($oldPassword, $dbPass))
                            {
                                $updateUsers = $conn->prepare("update users set pass = ? where email = ? and role = ?");
                                $updateUsers->bindParam(1, $convertedPass);
                                $updateUsers->bindParam(2, $userEmail);
                                $updateUsers->bindParam(3, $userRole);
                                $updateUsers->execute();
                                $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Password Updated Successfully.</div>";
                            }
                            else
                            {
                                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Valid Old Password.</div>";
                            }
                        }
                    }
                }
                else
                {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Password Does Not Match.</div>";
                }
            }
            else
            {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Repeat New Password.</div>";
            }
        }
        else
        {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter New Password.</div>";
        }
    }
    else
    {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Old Password.</div>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Market Research And Reports</title>
    <?php include 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/security.css">
    <script src="js/menu.js"></script>
    <script type="text/javascript" src="js/security.js"></script>

</head>
<body>
<div id="main">
    <?php include 'Header.php'; ?>

    <section id="banner">
        <div class="container-fluid">
            <div class="col-md-4">
                <h3>Security</h3>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="floatRight">
                    <a href="dashboard">Home</a>
                    <i class="fa fa-angle-double-right"></i>
                    <span>Security</span>
                </p>
            </div>
        </div>
    </section>

    <section id="security">
        <div class="container">
            <div class="col-md-6">
                <div class="bxx">
                    <h3>Change Password</h3>
                    <hr/>
                    <div id="result"></div>
                    <?php echo $result; ?>
                    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                        <label for="">Old Password</label>
                        <input type="password" name="oldPassword" id="oldPassword" minlength="6" class="form-control" required>
                        <label for="">New Password</label>
                        <input type="password" name="newPassword" id="newPassword" minlength="6" class="form-control" required>
                        <label for="">Repeat Password</label>
                        <input type="password" name="repeatNewPassword" id="repeatNewPassword" minlength="6" class="form-control" onblur="return checkPassword();" required>
                        <input type="submit" name="submit" value="Update" class="form-control">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bxx">
                    <h3>Change Email Address</h3>
                    <hr/>
                    <div id="updateEmailResult">
                        <?php
                        $updateEmailResult = "";
                        if(isset($_SESSION["UPDATEEMAILRESULT"]))
                        {
                            $updateEmailResult = $_SESSION["UPDATEEMAILRESULT"];
                        }
                        unset($_SESSION['UPDATEEMAILRESULT']);
                        if(!empty($updateEmailResult))
                        {
                            echo $updateEmailResult;
                        }
                        ?>
                    </div>
                    <form action="updateAdminEmail.php" method="post" autocomplete="off">
                        <label for="currentEmail">Current Email Address</label>
                        <input type="email" name="currentEmail" class="form-control" value="<?php if(isset($_SESSION['USEREMAIL'])){echo $_SESSION['USEREMAIL'];} ?>" disabled>
                        <label for="newEmailAddress">New Email Address</label>
                        <input type="email" name="newEmailAddress" class="form-control" required>
                        <input type="submit" name="submitEmail" value="Update" class="form-control">
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>