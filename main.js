$(document).ready(function()
{
	var DOMAIN="http://localhost/inv_project/public_html";
	$("#register_form").on("submit",function()
	{   
		 var status=false;
		var name=$("#username");
		var email=$("#email");
		var pass1=$("#password1");
		var pass2=$("#password2");
		var type=$("#usertype");
		//^ symbol matches the first part and $ symbol will match the last part of the string
		//respectively.
		//var n_patt=new RegExp(/^[A-Za-z ]+$/);
		var e_patt=new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

		if(name.val()=="" || name.val().length < 6)
		{
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please enter your name and name should be more than 6 characters.</span>");
			status=false;
		}
		else{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status=true;

		}

		if(!e_patt.test(email.val()))
		{
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address.</span>");
			status=false;
		}
		else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status=true;

		}
		if(pass1.val()==""||pass1.val()<8)
		{
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Plese Enter password and it should be more than 8 digits</span>");
			status=false;
		}
		else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status=true;

		}
		if(pass2.val()==""||pass2.val()<8)
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please re-enter password</span>");
			status=false;
		}
		else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status=true;

		}

		if(type.val() == "")
		{
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please select user type</span>");
			status=false;
		}
		else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status=true;

		}
		if(pass1.val()==pass2.val() && status==true)
		{
			$.ajax({
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#register_form").serialize(),
				success:function(data){
					if(data=="EMAIL_ALREADY_EXISTS")
					{
						alert("It seems like your email is already used");
					}
					else if(data=="SOME_ERROR")
					{
						alert("something went wrong");

					}
					else
					{
						window.location.href=encodeURI(DOMAIN+"/index1.php?msg=You are  registered and now you can login");
					}
				}

			})

		}
		else
		{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password does not matched</span>");
			status=false;

		}
	})

	//to fetch category
   fetch_category();

	function fetch_category()
	{
		$.ajax({
			url: DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getCategory:1},
			success:function(data)
			{
				var root="<option value='0'>Root</option>";
				var choose="<option value=''>Choose Category</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(choose+data);
			}
		})
	}

	//to fetch brand
   fetch_brand();

	function fetch_brand()
	{
		$.ajax({
			url: DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getBrand:1},
			success:function(data)
			{
				
				var choose="<option value=''>Choose Brand</option>";
			
				$("#select_brand").html(choose+data);
			}
		})
	}

	//Add category

	$("#category_form").on("submit",function(){

		if($("#category_name").val()=="")
			{
				$("#category_name").addClass("border-danger");
				$("#cat_error").html("<span class='text-danger'>Please Enter Category name</span>");
			}
			else
			{
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method :"POST",
					data :$("#category_form").serialize(),
					success :function(data)
					{
						if(data=="CATEGORY_ADDED")
						{
							$("#category_name").removeClass("border-danger");
				           $("#cat_error").html("<span class='text-success'>New Category added successfully</span>");
                           $("#category_name").val("");
                           fetch_category();
						}
						else
						{
							alert(data);
						}

					} 
				})


			}
	})
	//Add Brand

	$("#brand_form").on("submit",function(){

		if ($("#brand_name").val()=="") {
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}
		else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#brand_form").serialize(),
				success : function(data)
				{
					if(data=="BRAND_ADDED")
					{
					$("#brand_name").removeClass("border-danger");
			      $("#brand_error").html("<span class='text-success'>New Brand Added Successfully.</span>");
			      $("#brand_name").val("");
			      fetch_brand();
                     }
                     else
                     {
                     	alert(data);
                     }
				}
			})

		}
	})

	//Add Product

	$("#product_form").on("submit",function(){

       $.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#product_form").serialize(),
				success : function(data)
				{
					if(data=="NEW_PRODUCT_ADDED")
					{
						alert(data);
						$("#product_name").val("");
						$("#select_cat").val("");
						$("#select_brand").val("");
						$("#product_qty").val("");
						$("#product_price").val("");
						
						
						

						
				
                     }
                     else
                     {
                     	console.log(data);
                     	alert(data);
                     }
				}
			})



	})

	


})