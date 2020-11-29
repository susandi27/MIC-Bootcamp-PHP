<!--header -->
<?php
	require('header.php');
?>
<!-- header -->
	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#editMenudiv").hide();

			getAllMenu();

			function getAllMenu(){
				$.get('menulist.json',function(response){
					// console.log(typeof(response));

					// string
					//var studentObjArray = JSON.parse(response);

					// !string
					var menuObjArray = response;

					var html =''; var j = 1;

					$.each(menuObjArray, function(i,v){
						//console.log(v);
						var name = v.name;
						var price = v.price;
						var profile = v.profile;

						html += `<tr>
									<td> ${j++}. </td>
									<td> ${name} </td>
									<td> ${price} </td>
									<td> 
										<button class="btn btn-outline-primary detailBtn" data-sid="${i}" data-name="${name}" data-price="${price}" data-profile="${profile}"> Detail </button>

										<button class="btn btn-outline-warning editBtn" data-sid="${i}" data-name="${name}" data-price="${price}" data-profile="${profile}"> Edit </button>

										<button class="btn btn-outline-danger deleteBtn" data-id="${i}"> Delete </button>

									</td>

								</tr>`;

					}); //end get function

					$('tbody').html(html);

				}); //end getAllstudent function
			} //end each loop

			//detail
			$('tbody').on('click','.detailBtn',function(){
				var id = $(this).data("sid");
				var name = $(this).data("name");
				var price = $(this).data("price");
				var profile = $(this).data("profile");
				
				$("#exampleModalLabel").text(name);
				$("#detail_name").text(name);
				$("#detail_price").text(price);
				$("#detail_profile").attr('src',profile);
				$("#detailModal").modal('show');
			});
			//end detail

			//delete
			$('tbody').on('click','.deleteBtn',function(){
				var id=$(this).data('id');

				var ans=confirm("Are you sure want to delete?");

				if(ans){
					$.post('deletemenu.php',{
						sid:id
				//post end
					},function(data){
						getAllMenu();
					}) //end function data
				} //if end
			
			}) //end delete


			//edit
			$('tbody').on('click','.editBtn',function(){
				//alert('ok');
				var id = $(this).data("sid");
				var name = $(this).data("name");
				var price = $(this).data("price");
				var profile = $(this).data("profile");

				//show and hide
				$("#editMenudiv").show();
				$('#addMenudiv').hide();
				
				//to get data value
				$("#edit_id").val(id);
				$('#edit_name').val(name);
				$('#edit_price').val(price);

				$('#edit_oldphoto').val(profile);

				$('#showOldPhoto').attr('src',profile);

			}) //end edit

		/*start localstorage*/
			$('.saveBtn').click(function(){
				//var id = $(this).data("sid");
				var name = $("#sname").val();
				var price = $("#price").val();
				var profile = $("#profile").val();

				var menu={
					name:name,
					price:price,
					profile:profile,
				}

				var menulist=localStorage.getItem("menu"); // localstorage key
				var mymenuArray;
					if(menulist==null){
						mymenuArray=[]; //[{mgmg,"ygn"},{"aye aye","mdy"},]
					}
					else{
						mymenuArray=JSON.parse(menulist);
						}
					mymenuArray.push(menu);
					//console.log(mystudentArray);

					var stringMenu=JSON.stringify(mymenuArray);
					localStorage.setItem("menu",stringMenu);

			})//end btn save function 

		/*end localstorage*/
		});//ready function

	</script>
	<div class="container">
		<div class="row">
			<div class="col nav">
				<button class="btn"><a href="index.php" style="color: white;">Home</a></button>
				<button class="btn"><a href="menu.php"  style="color: white;">Menu</a></button>
			</div>
		</div>
	</div>


	<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
   			<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel"></h5>
       					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         					<span aria-hidden="true">&times;</span>
       					</button>
      			</div>
      			<div class="modal-body">
     	   			<div class="container">
     	   				<div class="row">
     	   					<div class="col-4">
     	   						<img src="" class="img-fluid" id="detail_profile">
     	   					</div>
     	   					<div class="col-8">
	     	   					<h5 id="detail_name"></h5>
	     	   					<h5 id="detail_price"></h5>
     	   					</div>
     	   				</div>
     	   			</div>
     			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       				<button type="button" class="btn btn-primary">Save changes</button>
      			</div>
    		</div>
 		</div>
	</div>


	<div class="container" id="addMenudiv">
		
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4"> Add New Menu </h1>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="addmenu.php" method="POST" enctype="multipart/form-data">
					
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label">Menu Photo </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="profile" name="profile">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="sname">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Price </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary saveBtn">
					   			SAVE
					   		</button>
					    </div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- end menu div -->

	<!-- start edit menu -->
	<div class="container" id="editMenudiv">	
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4"> Edit Existing Menu </h1>
			</div>
		</div>
		
		
		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="updatemenu.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="id" id="edit_id">
					<input type="hidden" name="oldphoto" id="edit_oldphoto"> <!-- to send old photo path -->
					
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
						    <div class="col-sm-10">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
		 		 					<li class="nav-item" >
		    							<a class="nav-link active" id="oldprofile-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="home" aria-selected="true">Old Profile</a>
		    							
		  							</li>
		 							<li class="nav-item">
		    							<a class="nav-link" id="newprofile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="profile" aria-selected="false">New Profile</a>
		  							</li>
								</ul>


						    	<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="oldprofile-tab">
										<img src="" id="showOldPhoto" class="img-fluid" width="100px" height="90px">
									</div>
								
									<div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="newprofile-tab">
										<input type="file"  id="profile" name="newphoto">
									</div>
								</div> 
						    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="edit_name" placeholder="Enter Name" name="name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Price </label>
					    <div class="col-sm-10">
					    	<input type="price" class="form-control" id="edit_price" placeholder="Enter price" name="price">
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			SAVE
					   		</button>
					    </div>
					</div>


				</form>
			</div>
		</div>
	</div>
	<!-- end edit menu -->

	<!-- start meu -->
	
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th> # </th>
				<th> Name </th>
				<th> Price </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
	<!-- end menu table -->

<!-- footer -->	
<?
	require('footer.php');
?>
<!-- footer