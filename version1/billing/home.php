<?php include '../db_connect.php' ?><!--  Orginal Author Name: Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website : www.mayurik.com -->  
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    top: 0;
}
    .bg-gradient-primary{
        background: rgb(119,172,233);
        background: linear-gradient(149deg, rgba(119,172,233,1) 5%, rgba(83,163,255,1) 10%, rgba(46,51,227,1) 41%, rgba(40,51,218,1) 61%, rgba(75,158,255,1) 93%, rgba(124,172,227,1) 98%);
    }
    .btn-primary-gradient{
        background: linear-gradient(to right, #1e85ff 0%, #00a5fa 80%, #00e2fa 100%);
    }
    .btn-danger-gradient{
        background: linear-gradient(to right, #f25858 7%, #ff7840 50%, #ff5140 105%);
    }
    main .card{
        height:calc(100%);
    }
    main .card-body{
        height:calc(100%);
        overflow: auto;
        padding: 5px;
        position: relative;
    }
    main .container-fluid, main .container-fluid>.row,main .container-fluid>.row>div{
        /*height:calc(100%);*/
    }
    #o-list{
        height: calc(87%);
        overflow: auto;
    }
    #calc{
        position: absolute;
        bottom: 1rem;
        height: calc(10%);
        width: calc(98%);
    }
    .prod-item{
        min-height: 12vh;
        cursor: pointer;
    }
    .prod-item:hover{
        opacity: .8;
    }
    .prod-item .card-body {
        display: flex;
        justify-content: center;
        align-items: center;

    }
    input[name="qty[]"]{
        width: 30px;
        text-align: center
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    #cat-list{
        /*height: calc(100%)*/
    }
    .cat-item{
        cursor: pointer;
    }
    .cat-item:hover{
        opacity: .8;
    }
</style>
<?php 
if(isset($_GET['id'])):
$order = $conn->query("SELECT * FROM orders where id = {$_GET['id']}");
foreach($order->fetch_array() as $k => $v){
    $$k= $v;
}
$items = $conn->query("SELECT o.*,p.name FROM order_items o inner join products p on p.id = o.product_id where o.order_id = $id ");
endif;
?>
<div class="container-fluid o-field">
	<div class="row mt-3 ml-3 mr-3">
      
        <div class="col-lg-8  p-field">
            <div class="card ">
                <div class="card-header text-dark">
                    <b>Products</b>
                </div>
                <div class="card-body row" id='prod-list'>
                    <div class="col-md-12">
                      <!--    <b>Category</b> -->
                        <div class=" row justify-content-start align-items-center" id="cat-list">
                            <div class="mx-3 cat-item" data-id = 'all'>    
                                <button class="btn btn-primary"><b class="text-white">All</b></button>
                            </div>
                            <?php 
                            $qry = $conn->query("SELECT * FROM categories order by name asc");
                            while($row=$qry->fetch_assoc()):
                            ?>
                            <div class="mx-3 cat-item"  data-id = '<?php echo $row['id'] ?>'>
                                <button class="btn btn-primary"><?php echo ucwords($row['name']) ?></button>
                            </div>
                            <?php endwhile; ?>
                        </div>
                   
                        <hr>
                        <div class="row">
                            <?php
                            $prod = $conn->query("SELECT * FROM products where status = 1 order by name asc");
                            while($row=$prod->fetch_assoc()):
                            ?>
                            <div class="col-md-2 mb-2">
                                <div class="prod-item text-center " data-json = '<?php echo json_encode($row) ?>' data-category-id="<?php echo $row['category_id'] ?>">
                                    <img src="../assets/uploads/element-banner2-right.jpg" class="rounded" width="100%">
                                        <span> 
                                            <?php echo $row['name'] ?>
                                        </span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    </div>   
                </div>
            <div class="card-footer">
                <div class="row justify-content-center">
                    <div class="btn btn btn-sm col-sm-3 btn-primary mr-2" type="button" id="pay">Pay</div>
                    <div class="btn btn btn-sm col-sm-3 btn-primary" type="button" id="save_order">Pay later</div>
                </div>
            </div>
            </div>      			
        </div>
          <div class="col-lg-4">
           <div class="card">
                <div class="card-header text-dark">
                    <b>Order List</b>
                <span class="float:right"><a class="btn btn-primary btn-sm col-sm-3 float-right" href="../index.php" id="">
                    <i class="fa fa-home"></i> Home 
                </a></span>
                </div>
               <div class="card-body">
            <form action="" id="manage-order">
                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                <div class="bg-white" id='o-list'>
                            <div class="d-flex w-100 bg-white mb-1">
                                <label for="" class="text-dark"><b>Order No.</b></label>
                                <input type="number" class="form-control-sm" name="order_number" value="<?php echo isset($order_number) ? $order_number : '' ?>" required>
                            </div>
                   <table class="table bg-light mb-5" >
                        <colgroup>
                            <col width="20%">
                            <col width="40%">
                            <col width="40%">
                            <col width="5%">
                        </colgroup>
                       <thead>
                           <tr>
                               <th>QTY</th>
                               <th>Order</th>
                               <th>Amount</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php 
                                if(isset($items)):
                           while($row=$items->fetch_assoc()):
                           ?>
                           <tr>
                               <td>
                                   <div class="d-flex align-items-center justify-content-center">
                                        <span class=   " btn-minus"><b> </b></span>
                                        <input type="number" name="qty[]" id="" value="<?php echo $row['qty'] ?>">
                                        <span class="btn-plus"><b></b></span>
                                   </div>
                                </td>
                                <td>
                                    <input type="hidden" name="item_id[]" id="" value="<?php echo $row['id'] ?>">
                                    <input type="hidden" name="product_id[]" id="" value="<?php echo $row['product_id'] ?>"><?php echo ucwords($row['name']) ?>
                                    <small class="psmall"> (<?php echo number_format($row['price'],2) ?>)</small>
                                </td>
                                <td class="text-right">
                                    <input type="hidden" name="price[]" id="" value="<?php echo $row['price'] ?>">
                                    <input type="hidden" name="amount[]" id="" value="<?php echo $row['amount'] ?>">
                                    <span class="amount"><?php echo number_format($row['amount'],2) ?></span>
                                </td>
                                <td>
                                    <span class=" btn-rem"><b><i class="fa fa-trash-alt"></i></b></span>
                                </td>
                           </tr>
                           <script>
                               $(document).ready(function(){
                                 qty_func()
                                    calc()
                                    cat_func();
                               })
                           </script>
                       <?php endwhile; ?>
                       <?php endif; ?>
                       </tbody>
                   </table>
                </div>
                   <div class="d-block bg-white" id="calc">
                       <table class="" width="100%">
                           <tbody>
                                <tr>
                                   <td><b><h6>Total</h6></b></td>
                                   <td class="text-right">
                                       <input type="hidden" name="total_amount" value="0">
                                       <input type="hidden" name="total_tendered" value="0">
                                       <span class=""><h6><b id="total_amount">0.00</b></h6></span>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
            </form>
               </div>
           </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pay_modal" role='dialog'>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><b>Pay</b></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="form-group">
                <label for="">Amount Payable</label>
                <input type="number" class="form-control text-right" id="apayable" readonly="" value="">
            </div>
            <div class="form-group">
                <label for="">Amount Tendered</label>
                <input type="text" class="form-control text-right" id="tendered" value="" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Change</label>
                <input type="text" class="form-control text-right" id="change" value="0.00" readonly="">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm"  form="manage-order">Pay</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
<script>
    var total;
    cat_func();
   $('#prod-list .prod-item').click(function(){
        var data = $(this).attr('data-json')
            data = JSON.parse(data)
        if($('#o-list tr[data-id="'+data.id+'"]').length > 0){
            var tr = $('#o-list tr[data-id="'+data.id+'"]')
            var qty = tr.find('[name="qty[]"]').val();
                qty = parseInt(qty) + 1;
                qty = tr.find('[name="qty[]"]').val(qty).trigger('change')
                calc()
            return false;
        }
        var tr = $('<tr class="o-item"></tr>')
        tr.attr('data-id',data.id)
        tr.append('<td><div class="d-flex align-items-center"><span class="btn-minus"><b></i></b></span><input type="number" name="qty[]" id="" value="1"><span class=" btn-plus"><b></b></span></div></td>') 


        tr.append('<td><input type="hidden" name="item_id[]" id="" value=""><input type="hidden" name="product_id[]" id="" value="'+data.id+'">'+data.name+' <small class="psmall">('+(parseFloat(data.price).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))+')</small></td>') 


        tr.append('<td class="text-right"><input type="hidden" name="price[]" id="" value="'+data.price+'"><input type="hidden" name="amount[]" id="" value="'+data.price+'"><span class="amount">'+(parseFloat(data.price).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))+'</span></td>') 

        
        tr.append('<td><span class="btn-rem"><b><i class="fa fa-trash-alt text"></i></b></span></td>')
        $('#o-list tbody').append(tr)
        qty_func()
        calc()
        cat_func();
   })
    function qty_func(){
         $('#o-list .btn-minus').click(function(){
            var qty = $(this).siblings('input').val()
                qty = qty > 1 ? parseInt(qty) - 1 : 1;
                $(this).siblings('input').val(qty).trigger('change')
                calc()
         })
         $('#o-list .btn-plus').click(function(){
            var qty = $(this).siblings('input').val()
                qty = parseInt(qty) + 1;
                $(this).siblings('input').val(qty).trigger('change')
                calc()
         })
         $('#o-list .btn-rem').click(function(){
            $(this).closest('tr').remove()
            calc()
         })
         
    }
    function calc(){
         $('[name="qty[]"]').each(function(){
            $(this).change(function(){
                var tr = $(this).closest('tr');
                var qty = $(this).val();
                var price = tr.find('[name="price[]"]').val()
                var amount = parseFloat(qty) * parseFloat(price);
                    tr.find('[name="amount[]"]').val(amount)
                    tr.find('.amount').text(parseFloat(amount).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                
            })
         })
         var total = 0;
         $('[name="amount[]"]').each(function(){
            total = parseFloat(total) + parseFloat($(this).val()) 
         })
            console.log(total)
        $('[name="total_amount"]').val(total)
        $('#total_amount').text(parseFloat(total).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
    }
   function cat_func(){
    $('.cat-item').click(function(){
            var id = $(this).attr('data-id')
            console.log(id)
            if(id == 'all'){
                $('.prod-item').parent().toggle(true)
            }else{
                $('.prod-item').each(function(){
                    if($(this).attr('data-category-id') == id){
                        $(this).parent().toggle(true)
                    }else{
                        $(this).parent().toggle(false)
                    }
                })
            }
    })
   }
   $('#save_order').click(function(){
    $('#tendered').val('').trigger('change')
    $('[name="total_tendered"]').val('')
    $('#manage-order').submit()
   })
   $("#pay").click(function(){
    start_load()
    var amount = $('[name="total_amount"]').val()
    if($('#o-list tbody tr').length <= 0){
        alert_toast("Please add atleast 1 product first.",'danger')
        end_load()
        return false;
    }
    $('#apayable').val(parseFloat(amount).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
    $('#pay_modal').modal('show')
    setTimeout(function(){
        $('#tendered').val('').trigger('change')
        $('#tendered').focus()
        end_load()
    },500)
    
   })
   $('#tendered').keyup('input',function(e){
        if(e.which == 13){
            $('#manage-order').submit();
            return false;
        }
        var tend = $(this).val()
            tend =tend.replace(/,/g,'') 
        $('[name="total_tendered"]').val(tend)
        if(tend == '')
            $(this).val('')
        else
            $(this).val((parseFloat(tend).toLocaleString("en-US")))
        tend = tend > 0 ? tend : 0;
        var amount=$('[name="total_amount"]').val()
        var change = parseFloat(tend) - parseFloat(amount)
        $('#change').val(parseFloat(change).toLocaleString("en-US",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
   })
   
    $('#tendered').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
    $('#manage-order').submit(function(e){
        e.preventDefault();
        start_load()
        $.ajax({
            url:'../ajax.php?action=save_order',
            method:'POST',
            data:$(this).serialize(),
            success:function(resp){
                if(resp > 0){
                    if($('[name="total_tendered"]').val() > 0){
                        alert_toast("Data successfully saved.",'success')
                        setTimeout(function(){
                            var nw = window.open('../receipt.php?id='+resp,"_blank","width=900,height=600")
                            setTimeout(function(){
                                nw.print()
                                setTimeout(function(){
                                    nw.close()
                                    location.reload()
                                },500)
                            },500)
                        },500)
                    }else{
                        alert_toast("Data successfully saved.",'success')
                        setTimeout(function(){
                            location.reload()
                        },500)
                    }
                }
            }
        })
    })
</script>