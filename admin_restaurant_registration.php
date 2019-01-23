<?php

if(isset($_POST['submit']))
{
   include('admin_registration_function.php');
   $status=input_recieved($_POST);

   if($status===true)
   {
   	 $status=validate_sanitize_inputs($_POST);
   	 if(is_array($status))
   	 {
   	 	//database part
   	 	include('admin_registration_database.php');

   	 	  $status=signup($status);
   	 	  if($status===true)
   	 	  {
   	 	  	echo "<h3>SUCCESSFULL SIGNED UP</h3>";

   	 	  }
   	 	  else
   	 	  {
   	 	  	echo 'some error occured at database';
   	 	  }

   	 }
   	 else
   	 {
   	 	echo 'some error occured<br>';
   	 }
   }
   else
   {
   	echo "Missing  input fields<br>";
   }
}
if(isset($_POST['submit']))
{
     $fullname=$_POST['fullname'];
     $email   =$_POST['email'];
     $password=$_POST['password'];
      if($fullname=="")
      {
	   	echo 'name field is empty<br>';
      }
      if($email=="")
      {
	   	echo 'email field is empty<br>';
      }
      if($password=="")
      {
	   	echo 'password field cannot be blank<br>';
      }
}







  ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Restaurant registration system</title>

	<style type="text/css">
		.registration_box{
			text-align: center;
			width:320px;
			height: 420px;
			background:#000;
			color:#fff;
			top: 54%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			box-sizing: border-box;
		    opacity: 0.9; 



		
		}

	

		body{
			margin:0;
	        padding: 0;
	        width:300px;
	        height:600px;
	        background-image:url(images1/admin_img5.jpg);
	        background-size:cover;
	        background-position: center;
	        font-family: sans-serif;
	        

		}
		.avatar{
			padding-top: 120px;

			width: 80px;
			height: 120px;
			border-radius: 50%;
			position: absolute;
			top: -50%;
			padding-right:400px;
			margin-top:-20px;
			margin-left:-50px;

		}
		h1{
			color:#4DB6AC;

		}
		h2{
			color: #4DB6AC;

		}
        .registration_box input[type="text"],input[type="email"],input[type="password"]{
        	border:none;
        	border-bottom: 1px solid #fff;
        	background:transparent;
        	outline: none;
        	height:20px;
        	color: #fff;
        	font-size: 16px;
        }
        .registration_box input[type="submit"]{
        	border:none;
        	outline:none;
        	height:25px;
        	width: 200px;
        	background:#fb2525;
        	color:#fff;
        	font-size: 18px;
        }
	</style>


</head>
<body>
	<div>
	<div class="registration_box">
	<img src="images1/userlogo.png" class="avatar">

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h1>Admin SignUp</h1>
    <h2>Full Name</h2>
	<input type="text" name="fullname" placeholder="fullname"></br>
	<h2>Email</h2>
	<input type="email" name="email" placeholder="email"><br>
	<h2>Password</h2>
    <input type="password" name="password" placeholder="password"></br><br>
    <input type="submit" name="submit" value="register">
    </form>
    <a href="admin_login.php">Already registered?</a>
    </div>
    </div>

</body>
</html>