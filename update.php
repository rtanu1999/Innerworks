<?php
$serverName = "localhost";
$userName = "innerwor_innerwork";
$password = "0703#InnerW@";
try{
    $conn = new PDO("mysql:host=$serverName;dbname=innerwor_innerwork", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Something Went Wrong With Database Please Refresh page & Try Again";
}

include_once "loginpage.php";



if(isset($_POST['updt_submit']))
{
    $val=$_POST["type"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    if($val=="Agency"){
            if(!empty($_POST[image])){
        $sql="UPDATE agency SET contactperson=:cp,email=:em,companyname=:cn,website=:web,address=:add,city=:city,state=:coun,postcode= :code ,comment=:com,image=:im WHERE email=:em";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':cp' => $_POST[username],
            ':cn' => $_POST[companyname],
            ':web' => $_POST[website],
            ':add' => $_POST[address],
            ':city' => $_POST[city],
            ':coun' => $_POST[country],
            ':code' => $_POST[postcode],
            ':com' => $_POST[comment],
            ':em' => $_POST[email],
            ':im'=>$_POST[image]


        ));
        $count = $stmt->rowCount();
        resetvalues("Agency");
        echo "Updated Successfully!!!!";
        header('location:profile.php');
    }else{
         $sql="UPDATE agency SET contactperson=:cp,email=:em,companyname=:cn,website=:web,address=:add,city=:city,state=:coun,postcode= :code ,comment=:com WHERE email=:em";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':cp' => $_POST[username],
            ':cn' => $_POST[companyname],
            ':web' => $_POST[website],
            ':add' => $_POST[address],
            ':city' => $_POST[city],
            ':coun' => $_POST[country],
            ':code' => $_POST[postcode],
            ':com' => $_POST[comment],
            ':em' => $_POST[email]


        ));
        $count = $stmt->rowCount();
        resetvalues("Agency");
        echo "Updated Successfully!!!!";
        header('location:profile.php');
    }
    }
    if($val=="Freelancer"){
         if(!empty($_POST[image])){
         $sql="UPDATE freelancer SET contactperson=:cp,email=:em,companyname=:cn,website=:web,address=:add,city=:city,state=:coun,postcode= :code ,comment=:com,image=:im WHERE email=:em";
         $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':cp' => $_POST[username],
            ':cn' => $_POST[companyname],
            ':web' => $_POST[website],
            ':add' => $_POST[address],
            ':city' => $_POST[city],
            ':coun' => $_POST[country],
            ':code' => $_POST[postcode],
            ':com' => $_POST[comment],
            ':em' => $_POST[email],
            ':im'=>$_POST[image]
        ));
        $count = $stmt->rowCount();
        resetvalues("Freelancer");
        echo "Updated Successfully!!!!";
        header('location:profile.php');


    }
    else{
        $sql="UPDATE freelancer SET contactperson=:cp,email=:em,companyname=:cn,website=:web,address=:add,city=:city,state=:coun,postcode= :code ,comment=:com WHERE email=:em";
         $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':cp' => $_POST[username],
            ':cn' => $_POST[companyname],
            ':web' => $_POST[website],
            ':add' => $_POST[address],
            ':city' => $_POST[city],
            ':coun' => $_POST[country],
            ':code' => $_POST[postcode],
            ':com' => $_POST[comment],
            ':em' => $_POST[email]
        ));
        $count = $stmt->rowCount();
        resetvalues("Freelancer");
        echo "Updated Successfully!!!!";
        header('location:profile.php');
    }
}
}


function resetvalues($value){
    global $conn;
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    if($value=="Agency"){

        $sql="SELECT * FROM agency where email =:em and password =:pw";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
        ':em' => $email,
        ':pw' => $pass));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        create_session($row,$value);


    }
    else{
        $sql="SELECT * FROM freelancer where email =:em and password =:pw";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
        ':em' => $email,
        ':pw' => $pass));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        create_session($row,$value);
    }
}



?>
