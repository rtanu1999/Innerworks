<?php
include_once '../checkAdminSession.php';
include "../../DbConnection/DbConnectionHelper.php";
$result = $userid = "";
if(isset($_GET['userid']))
{
    try{
        $userid = $_GET['userid'];
        $stmt = $conn->prepare("delete from freelancer where userid = ?");
        $stmt->bindParam(1, $userid);
        $stmt->execute();

        $result = "111";
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

echo $result;
?>