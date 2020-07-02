<?php
        include_once 'DbConnection/DbConnectionHelper.php';
		?>
<!doctype html>
<html lang="en">
    <?php include_once 'Header.php'; ?>
<head>
  <style>
  label {

    font-weight: normal !important;
}
@media only screen and (max-width: 521px){
#le {display: none !important;}
#mi{display:block;}
.internships-tabs{width:inherit;}
.btn{width:50%;}
.col-12{width:143%;}
}
</style>
    <meta charset="UTF-8">
    <title>Openings</title>
    <?php include "CommonFiles.php"?>
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link rel="stylesheet" href="css/openings.css">
	 <link href="css/stylesearch.css" rel="stylesheet">
	 <link href="css/opening.css"  rel="stylesheet">
	 <link href="css/common.css"  rel="stylesheet">
   <link href="css/demo.css"  rel="stylesheet">

	<!-- <link href="css/style1.css"  rel="stylesheet">-->
</head>
<body>


<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Openings</h2>
            <p><a href="index">Home</a> <span>/</span> Openings</p>
        </div>
    </div>
</section>


<section id="opening">
     <div class="row" style="padding: 10px 40px;">

             <input type="search" id="searchtitle" class="searchboox" placeholder="Search Jobs|Internships.." style="width:70%;"/>



   </div>
        <div class="row" style="padding: 40px;">
  <div class="column" id = "le" style = "flex: 25%;max-width: 25%;padding: 0 4px;font-weight:normal;">

     	<div id="filtersection" style="display:block;padding: 10px 20px 20px 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin: 20px 0px;
    font-weight:normal !important;">
     	    <h3>Search by</h3><hr>
     	    <div class="list-group">
					<h5 style="font-weight:bold;">Type</h5>
					<div class = "col-12"style="padding-left: 0;padding-right: 0;">
                    <?php

                    $query1 = "SELECT DISTINCT(type) FROM jobpost where type IS NOT NULL";
                    $statement = $conn->prepare($query1);
                    $statement->execute();
                    $result1 = $statement->fetchAll();
                    foreach($result1 as $row1)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector type" value="<?php echo $row1['type']; ?>" > <?php echo $row1['type']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                </div>
                </div>
	<div class="list-group">
					<h5 style="font-weight:bold;">Location</h5>
                    <div class = "col-12"style="padding-left: 0;padding-right: 0;">
					<?php

                    $query = "SELECT DISTINCT location FROM jobpost where location IS NOT NULL";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector loc" value="<?php echo $row['location']; ?>"  > <?php echo $row['location']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h5 style="font-weight:bold;">Experience</h5>
						<div class = "col-12"style="padding-left: 0;padding-right: 0;">
					<?php
                   $query2 = "SELECT DISTINCT(exp) FROM jobpost WHERE exp IS NOT NULL";
                    $statement = $conn->prepare($query2);
                    $statement->execute();
                    $result2 = $statement->fetchAll();
                    foreach($result2 as $row2)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector exp" value="<?php echo $row2['exp']; ?>"  > <?php echo $row2['exp']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                </div>
                <p id="clearfilter" style="font-weight:bold; color:red;cursor: pointer;"></p>
  </div>
  </div>

  <div class="column" id='mi'style = "flex: 50%;max-width:100%;padding: 0 4px;overflow-y: scroll;overflow-x: hidden;max-height: 940px;padding-top:1.5%;">
    <div class="list-group" style="display:block;box-sizing:border-box;">
					 <div class="filter_data">



		</div>
    </div>

  </div>

<div class="column ri" style = "flex: 25%;max-width: 25%;padding: 0 4px;">


  </div>





    </div>
</section>

<?php include_once 'Footer.php'; ?>
<style>
#loading
{
	text-align:center;
	background: url('loader.gif') no-repeat center;
	height: 150px;
}
.searchboox
 {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 1px;
  font-size: 16px;
  background-color: white;
  background-image: url('img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
  height:41px;
}

.searchboox:focus
{
  width: 80%;
}

</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');

        var action = 'fetch_data';
        var sectitle = $('#searchtitle').val();
       // var maximum_price = $('#hidden_maximum_price').val();
        var loc = get_filter('loc');
        var type = get_filter('type');
        var exp = get_filter('exp');
        $.ajax({
            url:"getjobpostajax.php",
            method:"POST",
            data:{action:action, sectitle:sectitle, loc:loc, type:type, exp:exp},
            success:function(data){

                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
            $('#clearfilter').html('Clear Filter');
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
$('#searchtitle').keyup(function(){
        filter_data();
    });
$('#filtersectionbtn').click(function() {
    $('#filtersection').toggle();
});
$('#clearfilter').click(function() {
    $(".type").prop("checked", false);
	$(".loc").prop("checked", false);
	$(".exp").prop("checked", false);
	 $('#clearfilter').html('');
	 $('#searchtitle').val('');

	filter_data();
});
});
</script>
</body>
</html>
