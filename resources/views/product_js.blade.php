<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>

<script>
    $(document).ready(function() {
       $(document).on('click','.add_product',function(e){
        e.preventDefault();
        let name=$('#name').val();
        let price=$('#price').val();
       // console.log(name+price);

        $.ajax({
           url:"{{ route('add.product') }}",
           method:'post',
           data:{name:name,price:price},
           success:function(res){
              if(res.status=="success"){
                 $('#addModal').modal('hide');
                 $("#addProduct")[0].reset();
                 $(".table").load(location.href+" .table");
              }
           },error:function(err){
              let error=err.responseJSON;
              $.each(error.errors,function(index,value){
                 $('.errMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
              })
           }
        })
       })

 //show product value

        $(document).on('click','.update_product_from',function(){
        let id=$(this).data('id');
        let name=$(this).data('name');
        let price=$(this).data('price');
        $("#up_id").val(id);
        $("#up_name").val(name);
        $("#up_price").val(price);
    });
 // update product data
    $(document).on('click','.update_product',function(e){
        e.preventDefault();
        let up_id=$("#up_id").val();
        let up_name=$('#up_name').val();
        let up_price=$('#up_price').val();
       // console.log(name+price);

        $.ajax({
           url:"{{ route('update.product') }}",
           method:'post',
           data:{up_id:up_id,up_name:up_name,up_price:up_price},
           success:function(res){
              if(res.status=="success"){
                 $('#updateModal').modal('hide');
                 $("#updateProduct")[0].reset();
                 $(".table").load(location.href+" .table");
              }
           },error:function(err){
              let error=err.responseJSON;
              $.each(error.errors,function(index,value){
                 $('.errMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
              })
           }
        })
       })

       // delete product data
    $(document).on('click','.delete_product',function(e){
        e.preventDefault();
        let product_id=$(this).data('id');
       // console.log(name+price);
       if(confirm("Are you sure you want to delete this product?")){
        //alert(product_id);
          $.ajax({
             url:"{{ route('delete.product') }}",
             method:'post',
             data:{product_id:product_id},
             success:function(res){
                if(res.status=="success"){
                   $(".table").load(location.href+" .table");
                }
             },
          })
        }

       })
});




</script>

