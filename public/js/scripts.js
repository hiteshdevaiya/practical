/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

$( document ).ready(function() {

    $('.quantity').on('input', function() {
        var product_id = $(this).closest('tr').attr('data-product-id');
        const quantity = $(this).val();
        updateQty(quantity, product_id);
    });

    $(".update-cart").on("click", function() {
        var quantity = $(this).closest('tr').find('.quantity').val();
        var product_id = $(this).closest('tr').attr('data-product-id');
        updateQty(quantity, product_id);
    });
});

function updateQty(quantity, product_id){
    $.ajax( {
        url:$("#update_route").val(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method:'POST',
        data: {
            quantity,
            product_id
        },
        success: function( data ) {
            if( data.success ) {
                window.location.reload(true);
            }
        },
        fail: function() {
            alert('Fail');
        }
    });
}
