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
    
    
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="./js/main.js"></script>
</head>
<body>

	<?php include_once("./templates/header.php")?></br>

	<div class="container">
		<div class="card mx-auto " style="width: 20rem;">
     <div class="card-header">Register</div>
  <div class="card-body">

    <form id="register_form" onsubmit="off" autocomplete="on">
      
      <div class="form-group">
        
        <label for="username">Full name</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
     <small id="u_error" class="form-text text-muted"></small>
      </div>

      <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email"  aria-describedby="emailHelp" placeholder="Enter email">
    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="password1">Password</label>
    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
     <small id="p1_error" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="password2">Re-enter Password</label>
    <input type="password" name="password2" class="form-control" id="password2" placeholder="Password">
     <small id="p2_error" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="usertype">Usertype</label>
    <select name="usertype" class="form-control" id="usertype">
      <option value="">choose user type</option>
      <option value="1">Admin</option>
      <option value="0">Other</option>
    </select>
     <small id="t_error" class="form-text text-muted"></small>
    
  </div>

  <button type="submit" name="user_register" class="btn btn-primary"><i class="fa fa-user">&nbsp;</i>Register</button>
  <span><a href="index1.php">Login</a></span>


    </form>
 <!--  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
  </div>

  <div class="card-footer text-muted"></div>
  
</div>

</div>

	

</body>
</html>