<?php
$result = $emailId = $password = "";
if(isset($_POST['submit'])) {
    if($_POST['emailId'] != null && !empty($_POST['emailId']))
    {
        if($_POST['password'] != null && !empty($_POST['password']))
        {
            try{
                include "DbConnection/DbConnectionHelper.php";

                $emailId = trim($_POST['emailId']);
                $password = trim($_POST['password']);
                $userRole = "ADMIN";
                $stmt = $conn->prepare("select pass from users where email = ? and role = ?");
                $stmt->bindParam(1, $emailId);
                $stmt->bindParam(2, $userRole);
                $stmt->execute();
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetchAll();
                    foreach($data as $row) {
                        $dbPass = $row['pass'];

                        if(password_verify($password, $dbPass))
                        {
                            session_start();

                            //unset sessions
                            unset($_SESSION['USERROLE']);
                            unset($_SESSION['USEREMAIL']);

                            $_SESSION['USERROLE'] = $userRole;
                            $_SESSION['USEREMAIL'] = $emailId;

                            header("Location: admin/dashboard");
                        }
                        else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Valid Password.</div>";
                        }
                    }
                }
                else
                {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Valid Email Address.</div>";
                }
            }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }
        else
        {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Password.</div>";
        }
    }
    else
    {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Email Address.</div>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Inner Work</title>

    <?php include_once 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/login.css">

</head>
<body>

<section id="login">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <img src="img/openBook.png" alt="">
            <h2>Hey, good to see you again!</h2>
            <p>Log in to get going.</p>
            <div class="loginBx">
                <div id="loginResult"><?php echo $result; ?></div>
                <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                    <label for="emailId">Email Id</label>
                    <input type="email" name="emailId" class="form-control" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" minlength="6" class="form-control" required>
                    <input type="submit" name="submit" value="Sign In" class="form-control">
                </form>
            </div>
            <div class="row links">
                <div class="col-md-12">
                    <a href="index" class="textCenter">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>

</body>
</html>