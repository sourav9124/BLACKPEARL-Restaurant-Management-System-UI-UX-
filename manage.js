$(document).ready(function()
{
	var DOMAIN="http://localhost/inv_project/public_html";

	//Manage categories
      manageCategory(1);
	function manageCategory(pn)
	{
		$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {manageCategory:1,pageno:pn},
				success : function(data)
				{
					
                    $("#get_category").html(data);
                    
				}
 
		})
	}

	$("body").delegate(".page-link","click",function(){

		var pn=$(this).attr("pn");
		
		manageCategory(pn);
	})

	$("body").delegate(".del_cat","click",function(){
        var did=$(this).attr("did");

        //alert(did);


        if(confirm("Are you sure ? You want to delete!"))
        {

 
		
        	$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data)
				{
				



					
                  if(data=="DEPENDENT_CATEGORY")
                  {
                  	alert("Sorry !This Category is dependent on other sub categories");
                  }
                  else if(data=="CATEGORY_DELETED")
                  {
                  	alert("Category Deleted Successfully..!");
                  	manageCategory(1);

                  }
                  else if(data=="DELETED")
                  {
                  	alert("Deleted Successfully");
                  }
                   else
                   	{
                   		alert(data);

                   	}

				}
 
		})

		
         }
        else
        {
        	

          
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
				var choose="<option value='Choose Category'></option>";
				
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

	//update category 

	$("body").delegate(".edit_cat","click",function(){

		var eid=$(this).attr("eid");


		$.ajax({

			url:DOMAIN+"/includes/process.php",
			method:"POST",
			dataType:"json",
			data:{updateCategory:1,id:eid},
			success:function(data)
			{
				//alert(data);
				//alert(data["category_name"]); 
			
                console.log(data);
                $("#cid").val(data["cid"]);
               $("#update_category").val(data["category_name"]);
                $("#parent_cat").val(data["parent_cat"]);
                  //alert(data["category_name"]);

                 $("#update_category_modal").modal('show');


			}
		})
	})


	$("#update_category_form").on("submit",function(){

		if($("update_category").val()=="")
			{
				$("update_category").addClass("border-danger");
				$("#cat_error").html("<span class='text-danger'>Please Enter Category name</span>");
			}
			else
			{
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method :"POST",
					data :$("#update_category_form").serialize(),
					success :function(data)
					{
						// if(data=="CATEGORY_ADDED")
						// {
						// 	$("#category_name").removeClass("border-danger");
				  //          $("#cat_error").html("<span class='text-success'>New Category added successfully</span>");
      //                      $("#category_name").val("");
      //                      fetch_category();
						// }
						// else
						// {
						// 	alert(data);
						// }

						alert(data);
						window.location.href="";

					} 
				})


			}
	})
    


	//  BRANDS  
      manageBrand(1);
	function manageBrand(pn)
	{
		$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {manageBrand:1,pageno:pn},
				success : function(data)
				{
					
                    $("#get_brand").html(data);
                    
				}
  
		})
	}



	$("body").delegate(".page-link","click",function(){

		var pn=$(this).attr("pn");
		
		manageBrand(pn);
	})

	//delete brand

		$("body").delegate(".del_brand","click",function(){
        var did=$(this).attr("did");

        //alert(did);


        if(confirm("Are you sure ? You want to delete!"))
        {

 
		
        	$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {deleteBrand:1,id:did},
				success : function(data)
				{
				



					
                  if(data=="DELETED")
                  {
                  	alert("Brand is deleted !!");

                  	manageBrand(1); 
                  }
                  
                   else
                   	{
                   		alert(data);

                   	}

				}
 
		})

		
         }
      
	})



			//update brand

	$("body").delegate(".edit_brand","click",function(){

		var eid=$(this).attr("eid");


		$.ajax({

			url:DOMAIN+"/includes/process.php",
			method:"POST",
			dataType:"json",
			data:{updateBrand:1,id:eid},
			success:function(data)
			{
				//alert(data);
				//alert(data["brand_name"]); 
			
               // console.log(data);
                $("#bid").val(data["bid"]);
               $("#update_brand").val(data["brand_name"]);
                
                  //alert(data["category_name"]);

                 //$("#update_brand").modal('show');


			}
		})
	})

	//update brand


	$("#update_brand_form").on("submit",function(){

		if($("update_brand").val()=="")
			{
				$("update_brand").addClass("border-danger");
				$("#brand_error").html("<span class='text-danger'>Please Enter Brand name</span>");
			}
			else
			{
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method :"POST",
					data :$("#update_brand_form").serialize(),
					success :function(data)
					{
						// if(data=="CATEGORY_ADDED")
						// {
						// 	$("#category_name").removeClass("border-danger");
				  //          $("#cat_error").html("<span class='text-success'>New Category added successfully</span>");
      //                      $("#category_name").val("");
      //                      fetch_category();
						// }
						// else
						// {
						// 	alert(data);
						// }

						alert(data);
						window.location.href="";

					} 
				})


			}
	})




	//  products  
      manageProduct(1);
	function manageProduct(pn)
	{
		$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {manageProduct:1,pageno:pn},
				success : function(data)
				{
					
                    $("#get_product").html(data);
                    
				}
  
		})
	}



	$("body").delegate(".page-link","click",function(){

		var pn=$(this).attr("pn");
		
		manageProduct(pn);
	})




	//delete PRODUCT

		$("body").delegate(".del_product","click",function(){
        var did=$(this).attr("did");

        //alert(did);


        if(confirm("Are you sure ? You want to delete!"))
        {

 
		
        	$.ajax({

			url : DOMAIN+"/includes/process.php",

			method : "POST",
				data : {deleteProduct:1,id:did},
				success : function(data)
				{
				



					
                  if(data=="DELETED")
                  {
                  	alert("Product is deleted !!");

                  	manageProduct(1); 
                  }
                  
                   else
                   	{
                   		alert(data);

                   	}

				}
 
		})

		
         }
      
	})


			//update PRODUCT

	$("body").delegate(".edit_product","click",function(){

		var eid=$(this).attr("eid");


		$.ajax({

			url:DOMAIN+"/includes/process.php",
			method:"POST",
			dataType:"json",
			data:{updateProduct:1,id:eid},
			success:function(data)
			{
				//alert(data);
				//alert(data["brand_name"]); 
			
               // console.log(data);
                $("#pid").val(data["pid"]);
               $("#update_product").val(data["product_name"]);
               $("#select_cat").val(data["cid"]);
               $("#select_brand").val(data["bid"]);
               $("#product_price").val(data["product_price"]);
               $("#product_qty").val(data["product_stock"]);
                
                  //alert(data["category_name"]);

                 //$("#update_brand").modal('show');


			}
		})
	})

//UPDATE Product

	$("#update_product_form").on("submit",function(){

       $.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#update_product_form").serialize(),
				success : function(data)
				{
					if(data == "Updated")
					{
						alert("Product Updated Successfully !!");
						window.location.href="";

					}
					else
					{
						alert(data);
					}
					
				}
			})



	})

	







})