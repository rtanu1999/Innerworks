<?php
include "DbConnection/DbConnectionHelper.php";

//get the q parameter from URL
 $q=$_GET["q"];
$val=$_GET["val"];

	
   $stmt = $conn->prepare("select * from tbl_skills where skill_name like '%".$q."%' order by skill_name asc limit 5");
     //   $stmt->bindParam(1, $searchText);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {


        $data = $stmt->fetchAll();
		 $search_arr = array();
		 if($val==1){
             
                foreach($data as $row) {

                $name = $row['skill_name'];
                 //$search_arr[] = array($name);
                 ?>
                 <p onclick='fill("<?php echo $name; ?>")'><a> 
           <!-- Assigning searched result in "Search box" in "search.php" file. -->
               <?php echo $name; ?>
           </a></p>

            <?php    }
         }
        if($val==2){
            
                    foreach($data as $row) {
       
        $name = $row['skill_name'];
		 //$search_arr[] = array($name);
		 ?>
		 <p onclick='fillinterst("<?php echo $name; ?>")'><a> 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $name; ?>
   </a></p>
		
    <?php    }
        }

        }
	  //echo json_encode($search_arr);
?>