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
    
    <script type="text/javascript" src="./js/order.js"></script>
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
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                  <div class="card-header">
                    <h4>New Orders</h4>
                  </div>
                  <div class="card-body">

                    <form id="get_order_data" onsubmit="return false">
                        
                        <div class="form-group row">
                            <label class="col-sm-3" align="right">Order Date</label>
                            <div class="col-sm-6">
                                <input type="text" readonly id="order_date" name="order_date" class="form-control form-control-sm" 
                                  value="<?php  echo date("Y-m-d")?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3" align="right">Customer Name*</label>
                            <div class="col-sm-6">
                                <input type="text" id="cust_name" name="cust_name"  class="form-control form-control-sm"
                                  placeholder="Enter Customer Name" required>
                            </div>
                        </div>

                        <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                            
                            <div class="card-body">
                                <h4>Make a order list</h4>

                                <table align="center" style="width: 800px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align:center;">Item Name</th>
                                            <th style="text-align:center;">Total Quantity</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Price</th>
                                            <th>Total</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody id="invoice-item">
<!-- 
                                        <tr>
                                            
                                            <td><b id="number">1</td>
                                            <td>
                                                <select name="pid[]" class="form-control form-control-sm" required>
                                                    <option>Washing Machine</option>
                                                </select>
                                            </td>
                                            <td><input type="text" readonly name="tqty[]" class="form-control form-control-sm"></td>
                                            <td><input type="text" name="qty[]" class="form-control form-control-sm" required></td>
                                            <td><input type="text" name="price[]" class="form-control form-control-sm" readonly></td>
                                            <td>Rs.1540</td>
                                        </tr>
                                             -->

                                        </tbody>
                                    

                                </table><!-- Table Ends Here -->

                                <center style="padding: 10px;">
                                    <button id="add" style="width: 150px;" class="btn btn-success">Add</button>
                                    <button id="remove" style="width: 150px;" class="btn btn-danger">Remove</button>
                                </center>
                            </div><!-- card Body Ends here -->
                        </div><!-- order list card ends here -->

                        <p></p>

                        <div class="form-group row">
                            <label for="sub_total" class="col-sm-3 col-form-label" align="right">
                               Sub Total 
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="sub_total" class="form-control form-control-sm" id="sub_total" required readonly>
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gst" class="col-sm-3 col-form-label" align="right">
                               GST (18 %) 
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="gst" class="form-control form-control-sm" id="gst" required readonly>
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label" align="right">
                               Discount
                            </label>
                            <div class="col-sm-6">
                                <input type="text"  name="discount" class="form-control form-control-sm" id="discount"  required>
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="net_total" class="col-sm-3 col-form-label" align="right">
                               Net Total
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="net_total" class="form-control form-control-sm" id="net_total" required readonly>
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="paid" class="col-sm-3 col-form-label" align="right">
                               Paid
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="paid" class="form-control form-control-sm" id="paid" required >
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="due" class="col-sm-3 col-form-label" align="right">
                               Due
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="due" class="form-control form-control-sm" id="due" required readonly>
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="payment_type" class="col-sm-3 col-form-label" align="right">
                              Payment Method
                            </label>
                            <div class="col-sm-6">
                               <select name="payment_type" class="form-control form-control-sm" id="payment_type" required > 
                                   
                                   <option>Cash</option>
                                   <option>Card</option>
                                   <option>Draft</option>
                                   <option>Cheque</option>
                               </select>
                                
                            </div>
                        </div>

                        <center>
                            <input type="submit" id="order_form" style="width: 150px;"class="btn btn-info" value="Order">
                            <input type="submit" id="print_invoice" style="width: 150px;" class="btn btn-success d-none" value="Print Invoice">
                        </center>
                    </form>
                    
                  </div>
                </div>
                
            </div>    
         </div> 
     </div>

	

</body>
</html>

<?php
}
?>



