<?php
require_once "DbConnection/DbConnectionHelper.php";
session_start();


if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

    $sql="SELECT * FROM agency where email =:em and password =:pw";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':em' => $email,
        ':pw' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $no=$stmt->rowCount();
    if($no>0){
        echo "login success";
        create_session($row,"a");
        header('location:dashboard.php');
    }

    if(($row != True)){

        $email=$_POST['email'];
        $password=$_POST['password'];

    $sql="SELECT * FROM freelancer where email =:em and password =:pw";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':em' => $email,
        ':pw' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $no=$stmt->rowCount();
        if($no>0){
            echo "login success";
            create_session($row,"f");
            header('location:dashboard.php');
        }
        else{

          echo 'alert("invalid");';
            header('location:recruiterlogin.php');
        }
    }


 }
function create_session($row,$type){

        $_SESSION['companyname']=$row["companyname"];
        $_SESSION['website']=$row["website"];
        $_SESSION['mobile']=$row["mobile"];
        $_SESSION['address']=$row["address"];
        $_SESSION['state']=$row["state"];
        $_SESSION['city']=$row["city"];
        $_SESSION['postcode']=$row["postcode"];
        $_SESSION['contactperson']=$row["contactperson"];
        $_SESSION['email']=$row["email"];
        $_SESSION['password']=$row["password"];
        $_SESSION['noofstaffs']=$row["noofstaffs"];
        $_SESSION['noofplacements']=$row["noofplacements"];
        $_SESSION['image']=$row["image"];
        $_SESSION['comment']=$row["comment"];
        $_SESSION['postcode']=$row["postcode"];
        $_SESSION['pass']=$row["password"];
        $_SESSION['type']=$type;
}

?>
