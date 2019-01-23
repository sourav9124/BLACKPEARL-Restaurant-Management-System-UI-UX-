<?php

session_start();

if(isset($_SESSION["logged_in"]))
{


$data=$_SESSION["logged_in"]["fullname"];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <script type="text/javascript" src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><h3><i>Eat Street</i></h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./online/add.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link active" href="./online/admin_session_out.php"><i class="fa fa-user">&nbsp;</i>Log Out</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" value=""><i class="fa fa-user">&nbsp;</i><?php echo "Admin ".$data; ?></a>
      </li> 
    </ul>
  </div>
</nav><br>

	

	<div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="card mx-auto" style="width: 20rem;">
    				<img class="card-img-top mx-auto" style="width: 60%" 
    				src="./images/user.png" alt="card-img-cap">
    				    
    				<div class="card-body">
    					<p class="card-title">profile info</p>
    					<p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo $data;?></p>
    					<p class="card-text"><i class="fa fa-user">&nbsp;</i>admin</p>
    					<p class="card-text"><i class="fa fa-lock">&nbsp;</i><?php  echo "Last Login :".date("d-m-Y")?></p>
    					<a href="./developer/developer_page.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>view profile</a>


    					
    				</div>
    				
    			</div>
    		</div>
    		<div class="col-md-8">
    			<div class="jumbotron" style="width:100%; height: 100%;">
    				<h1>Welcome admin</h1>
    				<div class="row">
    					<div class="col-sm-6">
    						<iframe src="http://free.timeanddate.com/clock/i6j44wg1/n1648/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

    					
    					</div>
    					<div class="col-sm-6">
    						<div class="card">
                              <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">Here you can make invoices and new orders.</p>
                                <a href="new_order.php" class="btn btn-primary">New Orders</a>
                              </div>
                           </div>
    						
    					</div>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    </div>
    <p></p>
    <p></p>


  <div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="card">
                      <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                                <p class="card-text">Here you can manage your categories
                                and add new parent and sub-categories</p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#category">Add</a>
                                <a href="manage_categories.php" class="btn btn-primary">Manage</a>
                     </div>
                </div>
    		</div>
    		<div class="col-md-4">
    			<div class="card">
                      <div class="card-body" >
                            <h5 class="card-title">Brands</h5>
                                <p class="card-text">Here you can manage your brands
                                and add brands</p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brand">Add</a>
                                <a href="manage_brand.php" class="btn btn-primary">Manage</a>
                     </div>
                </div>
    			
    		</div>
    		<div class="col-md-4">
    			<div class="card">
                      <div class="card-body">
                            <h5 class="card-title">Products</h5>
                                <p class="card-text">Here you can manage your products
                                and add products</p>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#product">Add</a>
                                <a href="manage_product.php" class="btn btn-primary">Manage</a>
                     </div>
                </div>
    			
    		</div>
    		 <!-- category -->
    <?php
    include_once("./templates/category.php");

    ?>

    <!-- brand -->
     <?php
    include_once("./templates/brand.php");

    ?>

    <!-- product -->
     <?php
    include_once("./templates/product.php");

    ?>

    	</div>
    	
  <!--   </div>
    category -->
    <?php
    include_once("./templates/category.php");

    ?>

    <!-- brand -->
     <?php
    include_once("./templates/brand.php");

    ?>

    <!-- product -->
     <?php
    include_once("./templates/product.php");

    ?>
 

	

</body>
</html>

<?php

}

?>






