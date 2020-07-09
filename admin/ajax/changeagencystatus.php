<?php
include_once '../checkAdminSession.php';
include "../../DbConnection/DbConnectionHelper.php";
$result = $userid = $status = $dbStatus = $cnt = "";
if(isset($_GET['userid']))
{
    if(isset($_GET['status']))
    {
        if(isset($_GET['cnt']))
        {
            try{
                $userid = $_GET['userid'];
                $status = $_GET['status'];
                $cnt = $_GET['cnt'];

                
                if($status)
                {
                    $dbStatus = 0;
                }
                else if($status == false)

                {
                    $dbStatus = 1;
                }
                $stmt = $conn->prepare("update agency set status = ? where userid = ?");
                $stmt->bindParam(1, $dbStatus);
                $stmt->bindParam(2, $userid);
                $stmt->execute();

                if($dbStatus == true)
                {
                    $text = "PENDING";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changefstatus('.$cnt.', '.$userid.', '.$dbStatus.')" >'.$text.'</button>';
                }
                else if($dbStatus == false)
                {
                    $text = "ACTIVE";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changefstatus('.$cnt.', '.$userid.', '.$dbStatus.')" >'.$text.'</button>';
                }
        }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }
    }
}

echo $result;
