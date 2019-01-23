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
function signup($arg)
{
	$connection=connect_db();
	$sql='INSERT INTO `user_data`(`fullname`,`email`,`password`)VALUES(?,?,?)';

	$stmt=mysqli_prepare($connection,$sql);

	if($stmt)
	{
		mysqli_stmt_bind_param($stmt,'sss',$arg["fullname"],$arg["email"],$arg["password"]);

		$status=mysqli_execute($stmt);

		if($status)
		{
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}

		mysqli_stmt_close($stmt);
			mysqli_close($connection);
			echo 'email already exist';

	}
}








?>