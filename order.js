$(document).ready(function()
{
	var DOMAIN="http://localhost/inv_project/public_html";
    
    addNewRow();

	$("#add").click(function()
	{
		addNewRow();
	})


	function addNewRow()
	{
		$.ajax({

			url:DOMAIN+"/includes/process.php",

			method :"POST",

			data:{getNewOrderItem:1},
			success:function(data)
			{
				$("#invoice-item").append(data);
				var n=0;
				$(".number").each(function(){
					$(this).html(++n);
				})

			}
		})
	}

	$("#remove").click(function(){
		$("#invoice-item").children("tr:last").remove();
		calculate(0,0);
		//alert(0);

	})

	$("#invoice-item").delegate(".pid","change",function(){

		var pid=$(this).val();
		var tr=$(this).parent().parent();
		$.ajax({
			url :DOMAIN+"/includes/process.php",

			method :"POST",
			dataType :"json",
			data :{getPriceAndQty:1,id:pid},
			success :function(data)
			{
				tr.find(".tqty").val(data["product_stock"]);
				tr.find(".pro_name").val(data["product_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["product_price"]);
				tr.find(".amt").html(tr.find(".qty").val() * tr.find(".price").val());
				calculate(0,0);
			}

		})
	})

	$("#invoice-item").delegate(".qty","keyup",function(){
		var qty=$(this);
		var tr=$(this).parent().parent();
		if(isNaN(qty.val()))
		{
			alert("Please Enter A Valid Quantity");
			qty.val(1);
		}
		else
		{
			if((qty.val()-0) > (tr.find(".tqty").val()-0))
			{
				alert("Sorry! This Much Of Quantity Is not Available");
				qty.val(1);
			}
		    else{
		    	tr.find(".amt").html(qty.val() * tr.find(".price").val());
		    	calculate(0,0);
		    }

		}
	})

	function calculate(dis,paid)
	{

		var sub_total=0;
		var gst=0;
		var net_total=0;
		var discount=dis;
		var paid_amt=paid;
		var due=0;

		$(".amt").each(function(){
			sub_total=sub_total + ($(this).html() * 1);

		})
		gst=0.18 * sub_total;
		net_total=gst+sub_total;
		net_total=net_total- discount;
		due=net_total-paid_amt;

		$("#gst").val(gst);
		


		$("#sub_total").val(sub_total);
		$("#net_total").val(net_total);
		$("#discount").val(discount);
		$("#paid").val(paid_amt);
		$("#due").val(due);

		
		


		// $("#sub_total")
		// $("#gst")
		// $("#discount")
		// $("#net_total")
		// $("#paid")
		// $("#due")
	}
	$("#discount").keyup(function(){
			var discount =$(this).val();
			
			calculate(discount,0);

		})
	$("#paid").keyup(function(){
			var paid=$(this).val();
			var discount=$("#discount").val();
			calculate(discount,paid);

		})


	//Order Accepting

	$("#order_form").click(function(){
		var invoice=$("#get_order_data").serialize();

		if($("#cust_name").val()=== "")
		{
			alert("Please Enter Customer Name");
		}
		else if($("#paid").val()==="")
		{
			alert("Please Enter Paid Amount");

		}
		else
		{
			$.ajax({

			url : DOMAIN+"/includes/process.php",

			method :"POST",
			data :$("#get_order_data").serialize(),

			success :function(data)
			{
			
              
                  if (data <0)
                   {
                   	alert(data);
                   }
                	
                	else
                	{
                		if(confirm("Do you want to print invoice ?"))
                	{
                     

                	      $("#get_order_data").trigger("reset");

                		  window.location.href=DOMAIN+"/includes/invoice_bill.php?invoice_no="+data+"&"
                		  +invoice;
              	       

              	     
                     }
 

                	}
                	
              
			
				

				
			}
		})

		}

		
	});

});
