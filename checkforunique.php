<?php
require_once "DbConnection/DbConnectionHelper.php";
if(isset($_POST["unique"])){
    $email=$_POST['email'];
    $sql="SELECT * FROM agency where email =:em";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':em' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $no=$stmt->rowCount();
    
    if($no==0){
        $sql="SELECT * FROM freelancer where email =:em";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':em' => $email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $no=$stmt->rowCount();  
        if($no>0){
            echo "0";
            
        }else{
            echo "1";
        }
    }
    else{
        echo "0";
    }
}
    
    
?>