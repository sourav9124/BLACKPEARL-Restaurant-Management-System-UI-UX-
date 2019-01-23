<?php
session_start();

if(isset($_POST['submit']))
{
   include('admin_login_function.php');
   $status=input_recieved($_POST);

   if($status===true)
   {
   	 $status=validate_sanitize_inputs($_POST);
   	 if(is_array($status))
   	 {
   	 	//database part
   	 	include('admin_login_database.php');

   	 	  $status=authenticate($status);
   	 	  if(is_array($status))
   	 	  {
   	 	  	$_SESSION["logged_in"]=$status;
          header("Location: ../online/add.php");

   	 	  }
   	 	  else
   	 	  {
   	 	  
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
    
     $email   =$_POST['email'];
     $password=$_POST['password'];
    
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
	<title>Admin login system</title>

	<style type="text/css">
		.login_box{
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
      font-size: 30px;


		}
		h2{
			color: #4DB6AC;
      padding-top: 10px;

		}
        .login_box input[type="email"],input[type="password"]{
        	border:none;
        	border-bottom: 1px solid #fff;
        	background:transparent;
        	outline: none;
        	height:50px;
        	color: #fff;
        	font-size: 16px;
        }
        .login_box input[type="submit"]{
        	border:none;
        	outline:none;
        	height:40px;
        	width: 200px;
        	background:#fb2525;
        	color:#fff;
        	font-size: 18px;
        }
        
	</style>


</head>
<body>
	<div>
	<div class="login_box">
	<img src="images1/userlogo.png" class="avatar">

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h1>Admin Log In</h1>
    
	<h2>Email</h2>
	<input type="email" name="email" placeholder="email"><br>
	<h2>Password</h2>
    <input type="password" name="password" placeholder="password"></br><br>
    <input type="submit" name="submit" value="Login">
    
    </form>
    <span>
    <a href="admin_restaurant_registration.php">Register here</a>

    </span>
    </div>
    </div>

</body>
</html>