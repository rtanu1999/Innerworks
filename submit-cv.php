<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit CV | Vision Services | Pune</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/submitcv.css">
</head>
<body>
<?php include_once 'Header.php'; ?>
<section id="strip">
    <div class="container">
        <p><a href="index">Home</a> / Submit CV</p>
    </div>
    <div class="container">
        <div class="banner">
            <h2>Submit CV</h2>
        </div>
    </div>
</section>

<section id="submitcv">
    <div class="container frmBx">
        <div class="col-md-4">
            <h2>Personal Information</h2>
        </div>
        <div class="col-md-8">
            <form action="#" method="post">
                <label for="">Name *</label>
                <input type="text" name="name" class="form-control" required>
                <label for="">Phone(mobile) *</label>
                <input type="text" name="phone" class="form-control" required>
                <label for="">Email *</label>
                <input type="email" name="email" class="form-control" required>
                <label class="btn btn-default">
                    Upload Resume / CV (pdf)
                    <input type="file" hidden>
                </label>
                <br/><br/>
                <input type="submit" name="submit" value="Submit" class="form-control">
            </form>
        </div>
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>
