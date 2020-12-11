$(document).ready(function(){
	//alert('ok');
	$('.searchBtn').on('click',function(){
		var startDate = $('#startDate').val();
		var endDate = $('#endDate').val();

		// ajax
		$.ajax({
			type:'POST',
			url:'order_search.php',
			data:{
				start:startDate,
				end:endDate
			},
			success:function(response){
				// order_search ကနေ search လုပ်လို့ရတဲ့ result ကို 
				// $.each နဲ့ loop ပတ်မှာ
				var searchResults = JSON.parse(response);
				var ordersearchresultDiv = '';

				ordersearchresultDiv += `<h3 class="tile-title"> 
				${startDate} - ${endDate} Order List </h3>
						<div class="table-responsive">
                            <table class="table table-hover table-bordered 
                            searchdisplay">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th> Date </th>
                                      <th> Voucherno </th>
                                      <th> Total </th>
                                      <th> Status </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                var a=1;
				$.each(searchResults,function(i,v){
					if (v) {
						var id = v.id;
						var voucherno = v.voucherno;
						var total = v.total;
						var status = v.status;
						var date = v.orderdate;

						if(status == "Order"){
							var actionBtn = `<a href="invoice.php" class="btn btn-outline-info"> 
                                                <i class="icofont-info"></i>
                                            </a>
                                            <a href="orderstatus_change.php?id=${id}&status=0" class="btn btn-outline-success"> 
                                                <i class="icofont-ui-check"></i>
                                            </a>
                                            <a href="orderstatus_change.php?id=${id}&status=1" class="btn btn-outline-danger"> 
                                                <i class="icofont-close"></i>
                                            </a>`;
						}else{
							var actionBtn =`<a href="invoice.php" class="btn btn-outline-info"> 
                                                <i class="icofont-info"></i>
                                            </a>`;
						}
						
						
						$('#todayorderlistDiv div.tile-body').hide();

						ordersearchresultDiv +=`<tr>
													<td> ${a++} </td>
													<td> ${voucherno} </td>
													<td> ${date} </td>
													<td> ${total} </td>
													<td> ${status} </td>
													<td> ${actionBtn} </td>
												</tr>`;
					}
				});
				
				ordersearchresultDiv += `</tbody>
										</thead>
										</table>
										</div>`;						

				$('#todayorderlistDiv').html(ordersearchresultDiv);
			}
		})

	}); //searchBtn function end

	//dashboard
	//old data
	/*var dataOld = {
      	labels: ["Jan", "Feb", "Mar", "Apr", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);*/


    //start linechart
     //ajax
     $.ajax({
     	type: "POST",
     	url: "getEarning.php",
     	success:function(response){
     		console.log(response);
     		var earningResult = JSON.parse(response);

     		var data = {
		      	labels: ["Jan", "Feb", "Mar", "Apr", "May","Jun","July","Aug", "Sep","Oct",'Nov',"Dec"],
		      	datasets: [
		      		{
		      			label: "My First dataset",
		      			fillColor: "rgba(220,220,220,0.2)",
		      			strokeColor: "rgba(220,220,220,1)",
		      			pointColor: "rgba(220,220,220,1)",
		      			pointStrokeColor: "#fff",
		      			pointHighlightFill: "#fff",
		      			pointHighlightStroke: "rgba(220,220,220,1)",
		      			data: [earningResult[0],earningResult[1],earningResult[2],earningResult[3],
		      					earningResult[4],earningResult[5],earningResult[6],earningResult[7],
		      					earningResult[8],earningResult[9],earningResult[10],earningResult[11] ]
		      		}
		      	]
		      };

		    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      		var lineChart = new Chart(ctxl).Line(data);
     	}
     })//ajax end

   
     /* var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]*/

});//ready runction end