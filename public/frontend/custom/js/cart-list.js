(function ($) {
    "use strict";
    $('.apply-coupon-code').on('click', function (){
        var cart_id = $(this).data('id');
        var coupon_code = $(".coupon-code-"+cart_id).val();
        var route = $(this).data('route');

        $.ajax({
            type: "POST",
            url: route,
            data: {'id': cart_id, 'coupon_code': coupon_code, '_token': $('meta[name="csrf-token"]').attr('content')},
            datatype: "json",
            success: function (response) {
                SweetAlert.options.positionClass = 'toast-top-right';
                if (response.status === 402) {
                    SweetAlert.error(response.msg)
                }
                if (response.status === 401 || response.status === 404 || response.status === 409){
                    SweetAlert.error(response.msg)
                } else if(response.status === 200) {
                    $('.price-'+cart_id).text(response.price);
                    $('.total').text(response.total);
                    $('.platform-charge').text(response.platform_charge);
                    $('.grand-total').text(response.grand_total);
                    SweetAlert.success(response.msg)
                }
            },
            error: function (error) {
                SweetAlert.options.positionClass = 'toast-top-right';
                if (error.status === 401){
                    SweetAlert.error("You need to login first!")
                }
                if (error.status === 403){
                    SweetAlert.error("You don't have permission to add course or product!")
                }

            },
        });
    })
})(jQuery);
