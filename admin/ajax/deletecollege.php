<?php
include_once '../checkAdminSession.php';
include "../../DbConnection/DbConnectionHelper.php";
$result = $id = "";
if(isset($_GET['college_info_id']))
{
    try{
        $id = $_GET['college_info_id'];
        $stmt = $conn->prepare("delete from collegeportal where college_info_id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $result = "111";
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

echo $result;
