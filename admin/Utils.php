<?php

class Utils
{
  public function getTotalcollegeCnt($conn)
  {
      try{
          $stmt = $conn->prepare("select count(*) from collegeportal");
          $stmt->execute();
          if($stmt->rowCount() > 0)
          {
              return $stmt->fetchColumn();
          }
      }
      catch(PDOException $e)
      {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
      }
  }
    public function getTotalJobseekerCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from jobseeker");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getTotalJobpostCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from jobpost");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getTotalBlogsCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from blogs");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getTotalinternsCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from internship");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
     public function getTotalfreelancerCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from freelancer");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
     public function getTotalagencyCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from agency");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}
