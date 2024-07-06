$(document).ready(function (){
    
    // increment quantity
    // $('.increment-btn').click(function (e){
    $(document).on('click','.increment-btn',function (e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }

    });

    // decrement quantity
    // $('.decrement-btn').click(function (e){
    $(document).on('click','.decrement-btn',function (e){

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }

    }); 

   
    // add to cart 
    // $('.addToCart_btn').click(function (e){
    $(document).on('click','.addToCart_btn',function (e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var p_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "../functions/handleCart.php",
            data: {
                "p_id": p_id,
                "p_qty": qty,
                "scope": "add"
            },
            success: function(response){

                if(response == 201)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product is added', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 'existing')
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Product alredy in cart', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 401)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Login to continue', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 500)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Something went wrong', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
            }
        });
    });

     // update quatity in cart
    $(document).on('click','.updateQty',function (){

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var p_id = $(this).closest('.product_data').find('.prodId').val();
        
        $.ajax({
            method: "POST",
            url: "../functions/handleCart.php",
            data: {
                "p_id": p_id,
                "p_qty": qty,
                "scope": "update"
            },
            success: function(response){

                if(response == 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product is Updated', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 'Something went wrong')
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Database payload error', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 500)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Database updating error', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
            }
        });
    });

    // delete items in cart
    $(document).on('click','.deleteItem', function (){
        var cart_id = $(this).val();
        
        $.ajax({
            method: "POST",
            url: "../functions/handleCart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function(response){

                if(response == 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product is Deleted', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                    $('#viewCart').load(location.href + ' #viewCart');
                }
                else if(response == 'Something went wrong')
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Database payload error', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
                else if(response == 500)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Database updating error', // Echo the session message
                        position: 'top', // Customize notification position
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 3000 // Auto-close after 3 seconds
                    });
                }
            }
        });
    });
});