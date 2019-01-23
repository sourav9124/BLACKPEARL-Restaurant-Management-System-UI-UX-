<?php
function connect_db()
{
	$hostname='localhost';
	$username='root';
	$password='';
	$db_name ='project_inv';

	$connection=mysqli_connect($hostname,$username,$password,$db_name);
	if(mysqli_connect_errno())
	{
		die(mysqli_connect_error());

	}
	return $connection;

}
function authenticate($arg)
{
	$connection=connect_db();
	$email=$arg['email'];
	$password=$arg['password'];
	$sql='SELECT * FROM `admin` WHERE `email`=? ';

	$stmt=mysqli_prepare($connection,$sql);

	if($stmt)
	{
		mysqli_stmt_bind_param($stmt,'s',$arg["email"]);
		mysqli_stmt_bind_result($stmt,$db_id,$db_fullname,$db_email,$db_password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		if($email!=$db_email)
		{
			echo"<script>alert('user do not exist');</script>";
			//header("Location: restaurant_registration.php");
		}
		

		if(!empty($db_id))
		{
			if(password_verify($password,$db_password))
			{
				return array('id' =>$db_id,'fullname'=>$db_fullname );
			}
			else
			{
				echo "invalid email or password";
			}
		}


	   

		

	}
	return true;
}








?>