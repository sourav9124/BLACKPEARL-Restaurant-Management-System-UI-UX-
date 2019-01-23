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
    
    <script type="text/javascript" src="./js/manage.js"></script>
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
        <a class="nav-link" href="dashboard.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
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
        
     <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="get_product">
        <!--   <tr>
            <td>1</td>
            <td>Electronics</td>
            <td>Root</td>
            <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                <a href="#" class="btn btn-info   btn-sm">Edit</a>
            </td>
          </tr> -->
          
        </tbody>
      </table>
    </div>

    <?php

      include_once("./templates/update_products.php");

    ?>


	


	

</body>
</html>

<?php

}

?>



