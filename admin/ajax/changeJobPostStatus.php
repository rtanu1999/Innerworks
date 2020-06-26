<?php
include_once '../checkAdminSession.php';
include "../../DbConnection/DbConnectionHelper.php";
$result = $id = $status = $dbStatus = $cnt = "";
if(isset($_GET['id']))
{
    if(isset($_GET['status']))
    {
        if(isset($_GET['cnt']))
        {
            try{
                $id = $_GET['id'];
                $status = $_GET['status'];
                $cnt = $_GET['cnt'];

                if($status)
                {
                    $dbStatus = 0;
                }
                else if($status == false)
                {
                    $dbStatus = true;
                }
                $stmt = $conn->prepare("update jobpost set status = ? where id = ?");
                $stmt->bindParam(1, $dbStatus);
                $stmt->bindParam(2, $id);
                $stmt->execute();

                if($dbStatus == true)
                {
                    $text = "PENDING";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changeStatus('.$cnt.', '.$id.', '.$dbStatus.')" >'.$text.'</button>';
                }
                else if($dbStatus == false)
                {
                    $text = "ACTIVE";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changeStatus('.$cnt.', '.$id.', '.$dbStatus.')" >'.$text.'</button>';
                }
        }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }
    }
}

echo $result;
