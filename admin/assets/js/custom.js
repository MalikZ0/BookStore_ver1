$(document).ready(function(){
    
    $(document).on('click', '.delete_category_btn', function (e){

        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {'category_id': id, 'delete_category_btn': true},
                    success: function(response){
                        if(response == 200)
                        {
                            swal("good jod!", "Your item has been deleted!", "success");
                            $('#category_table').load(location.href + ' #category_table'); //space after ' #category_table' is important
                        
                        }
                        else if(response == 500)
                        {
                            swal("Oops!", "Something went wrong!", {
                                icon: "error",
                            });
                        }
                    }
                });
            } else {
              swal("Okay!", "Your item is safe!", "success");
            }
          });


    });

    $(document).on('click', '.delete_product_btn', function (e){

        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {'product_id': id, 'delete_product_btn': true},
                    success: function(response){
                        if(response == 200)
                        {
                            swal("good jod!", "Your item has been deleted!", "success");
                            $('#products_table').load(location.href + ' #products_table');
                        
                        }
                        else if(response == 500)
                        {
                            swal("Oops!", "Something went wrong!", {
                                icon: "error",
                            });
                        }
                    }
                });
            } else {
              swal("Okay!", "Your item is safe!", "success");
            }
          });


    })

    
})