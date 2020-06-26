<?php
include_once '../checkAdminSession.php';
include "../../DbConnection/DbConnectionHelper.php";
$result = $id = "";
if(isset($_GET['id']))
{
    try{
        $id = $_GET['id'];
        $stmt = $conn->prepare("delete from jobpost where id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $result = "111";
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

echo $result;
