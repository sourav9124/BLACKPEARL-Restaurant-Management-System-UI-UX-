<?php

session_start();

if(isset($_SESSION["logged_in"]))
{


$data=$_SESSION["logged_in"]["fullname"];

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><h3><i>Eat Street</i></h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
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
</nav>

<?php
}
?>