$(document).ready(function(){
    /* start local storage*/
    showdata();
    cartnoti();
    //checkout();
        $(".addtocartBtn").click(function(){
            //alert('ok');
            var id=$(this).data('id');
            var codeno=$(this).data('codeno'); 
            var photo=$(this).data('photo');
            var name=$(this).data('name');
            var price=$(this).data('price');
            var discount=$(this).data('discount');
            
            var item={
                id:id,
                codeno:codeno,
                name:name,
                price:price,
                discount,discount,
                photo:photo,
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
            });

            if(status==false){
                itemArray.push(item);
            }
            
            //console.log(itemArray);
            var itemstring=JSON.stringify(itemArray);
            localStorage.setItem("item", itemstring);
            showdata();
            cartnoti();
            //checkout();
        }) //end  add to card function


        //showdata
        function showdata(){
            //alert('ok');
            var itemlist=localStorage.getItem("item");
            if(itemlist){
                var itemArray=JSON.parse(itemlist);
                //console.log(itemArray);
                var html="";
                var total=0;
                var subtotal=0;
                itemArray.forEach( function(v, i) {
                    // statements
                    //if have discount
                    if(v.discount !=''){
                        subtotal=v.qty*v.discount;
                        total+=subtotal;
                        html+=`<tr>
                            <td><button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
                                <i class="icofont-close-line"></i></button></td>
                            <td><img src="${v.photo}" width="100" height="100"></td>
                            <td><p>${v.name}</p><p>${v.codeno}</p> </td>
                            <td><button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
                                <i class="icofont-plus"></i></button></td>
                            <td>${v.qty}</td>
                            <td><button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
                                <i class="icofont-minus"></i></button></td>
                            <td><p class="font-weight-lighter"><del>${v.price}</del> Ks </p>
                                <p class="text-danger">${v.discount} Ks</p></td>
                            <td>${subtotal} Ks</td>
                            </tr>`
                    }
                    //no have discount
                    else{
                        subtotal=v.qty*v.price;
                        total+=subtotal;
                        html+=`<tr>
                            <td><button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
                                <i class="icofont-close-line"></i></button></td>
                            <td><img src="${v.photo}" width="100" height="100"></td>
                            <td><p>${v.name}</p><p>${v.codeno}</p> </td>
                            <td><button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
                                <i class="icofont-plus"></i></button></td>
                            <td>${v.qty}</td>
                            <td><button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
                                <i class="icofont-minus"></i></button></td>
                            <td><p class="text-danger">${v.price} Ks </p></td>
                            <td>${subtotal} Ks</td>
                            </tr>`
                    }
                });
                html+=`<tr><td colspan="8"><h3 class="text-right"> Total : ${total} Ks</h3></td><tr>`
                $("#shoppingcart_table").html(html);
                /*$('#totalAmount').text($total);*/
            }
            else{
                html+=`<div class="col-12"><h5 class="text-center">There are no items in this cart</h5>
                        </div>
                        <div class="col-12 mt-5 ">
                        <a href="index.php" class="btn btn-secondary mainfullbtncolor px-3" > 
                        <i class="icofont-shopping-cart"></i>Continue Shopping </a></div>`
                $(".table").hide();
                $(".shoppingcart_div").hide();
                $(".noneshoppingcart_div").html(html);
            }
        }//end show data function


        $("#shoppingcart_table").on('click','.plus_btn',function(){
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
            cartnoti();
            //checkout();
            }
        })


        $("#shoppingcart_table").on('click','.minus_btn',function(){
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
            cartnoti();
            //checkout();
            }
        }) //end minus btn function

        //start no function
        function cartnoti(){
            //alert('ok');
            var itemlist=localStorage.getItem("item");
            var total=0;
            var noti= 0 ;
            if(itemlist){
                var itemArray=JSON.parse(itemlist);
                itemArray.forEach( function(v,i) {
                    //console.log(v);
                    var unitprice = v.price;
                    var discount = v.discount;
                    var qty = v.qty;
                    if (discount){
                        var price = discount;
                    }
                    else{
                        var price = unitprice;
                    }
                    var subtotal = price *qty;

                    noti +=qty++;
                    total +=subtotal ++;
                })
                
                $('.cartNoti').html(noti);
                $('.cartTotal').html(total+ " Ks");     
            }
            else{
                $('.cartNoti').html(0);
                $('.cartTotal').html(0+ " Ks");   
            }
        }

        //end noti function

       /* function checkout(){
            $(".checkoutbtn").click(function(){
                localStorage.clear();
                showdata();
                cartnoti();
            });
        }
        checkout();*/


        //checkout function
        $('.checkoutBtn').on('click',function(){
            var cart=localStorage.getItem("item");
            var note = $('#notes').val();
            var total = 0;

            var cartArray = JSON.parse(cart);
            $.each(cartArray, function(i,v){
                var unitprice = v.price;

                var discount = v.discount;
                var qty = v.qty;
                if (discount){
                    var price = discount;
                }
                else{
                    var price = unitprice;
                }
                var subtotal = price *qty;

                total +=subtotal ++;
                console.log(unitprice);

                //ajax
                $.post('storeorder.php',{
                    carts:cartArray,
                    note:note,
                    total:total
                },function(response){
                    localStorage.clear();
                    location.href="ordersuccess.php";
                });
            }); //each end

            
        })
            //end checkout function
       

    }) //end ready function