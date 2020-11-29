<!--header -->
<?php
	require('header.php');
?>
<!-- header -->

	<!-- menu js -->
	<script type="text/javascript">
		$(document).ready(function(){
			getAllMenu();

			function getAllMenu(){
				$.get('menulist.json',function(response){

					// string
					//var studentObjArray = JSON.parse(response);

					// !string
					var menuObjArray = response;

					var html =''; 

					$.each(menuObjArray, function(i,v){
						var name = v.name;
						var price = v.price;
						var profile = v.profile;

						//card
						html +=`<div class="col-lg-2 p-2">
									<img src="${profile}" class="card-img-top img-fluid">
									<div class="card-body text-center">
										<div class="card-body">
		       								<h6 class="card-title" class="name">${name}</h6>
		       								<h6 class="card-title" class="price">${price}</h6>
		     							</div>
										<button class="btn btn-outline-danger addtocart" data-id="${i}" data-name="${name}" data-price="${price}" data-profile="${profile}">Add to Cart</button>
									</div>
								</div>`

					}); //end get function

					$('.loop').html(html);

				}); //end getallMenu function
			} //end each loop
			
		showdata();

		//add to the localstorage
		$(".loop").on("click",".addtocart",function(){
			//alert("ok");
			var id=$(this).data('id');
			var name=$(this).data('name');
			var price=$(this).data('price');
			var profile=$(this).data('profile');
			
			var item={
				id:id,
				name:name,
				price:price,
				profile:profile,
				qty:1,
			}

			var itemlist=localStorage.getItem("item");

			var itemArray;
			if(itemlist==null){
				itemArray=[];
			}else{
				itemArray=JSON.parse(itemlist);
			}

			var status=false;
			itemArray.forEach( function(v, i) {
				if(id==v.id){
					v.qty++
					status=true;
				}
				// statements
		});//end  add to card function

			if(status==false){
				itemArray.push(item);
			}
			
			//console.log(itemArray);
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item", itemstring);
			showdata();
		})


		//showdata
		function showdata(){
			var itemlist=localStorage.getItem("item");
			if(itemlist){
				var itemArray=JSON.parse(itemlist);
				console.log(itemArray);
				var html="";
				var j=1;
				var total=0;
				var subtotal;
				itemArray.forEach( function(v, i) {
					// statements
					subtotal=v.qty*v.price;
					total+=subtotal;
					html+=`<tr>
					<td>${j++}</td>
					<td>${v.name}</td>
					<td><img src="${v.profile}" width="100" height="100"></td>
					<td><button class="btnincrease" data-id="${i}">+</button>${v.qty}<button class="btndecrease" data-id="${i}">-</button></td>
					<td>${v.price}</td>
					<td>${subtotal}</td>
					</tr>`
				});
				html+=`<tr><td colspan="5">all total</td><td>${total}</td><tr>`
				$("tbody").html(html);
			}
		}//end show data function
		
		$("tbody").on('click','.btnincrease',function(){
			//alert("ok");
			var id=$(this).data('id');

			var itemlist=localStorage.getItem("item");
			if(itemlist){
				var itemArray=JSON.parse(itemlist);

				itemArray.forEach( function(v, i) {

					if(i==id){
						//alert("ok");
						v.qty++;
					}
					// statements
				});
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			//cartnoti();
			//checkout();
			}
		})


		$("tbody").on('click','.btndecrease',function(){
			//alert("ok");
			var id=$(this).data('id');

			var itemlist=localStorage.getItem("item");
			if(itemlist){
				var itemArray=JSON.parse(itemlist);

				itemArray.forEach( function(v, i) {

					if(i==id){
						//alert("ok");
						v.qty--;
						if(v.qty==0){
							itemArray.splice(id, 1);
						}
					}
					// statements
				});
			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("item",itemstring);
			showdata();
			}
		})
	});//end ready function
	</script>


	<!-- card -->

	<div class="container">
		<div class="row">
				<div class="col nav">
					<button class="btn"><a href="index.php" style="color: white;">Home</a></button>
					<button class="btn"><a href="menu.php"  style="color: white;">Menu</a></button>
				</div>
			</div>
		<div class="row loop">
			
		</div>
	</div>
	
	<!-- table -->
	<div class="container">	
		<div class="col-lg-12 p-2">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th> No </th>
						<th> Name</th>
						<th> Item </th>
						<th> Qty </th>
						<th> Price </th>
						<th> Total </th> 
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	<!-- end table -->
			

<!-- footer -->	
<?
	require('footer.php');
?>
<!-- footer