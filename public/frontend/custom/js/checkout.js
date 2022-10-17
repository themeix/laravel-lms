$( document ).ready(function() {
    'use strict'
    $('#bank_id').change(function () {
        var bank_id = $('#bank_id').val();
        var fetchBankRoute = $('.fetchBankRoute').val();
        $.ajax({
            type: "GET",
            url: fetchBankRoute,
            data: {'bank_id': bank_id},
            datatype: "json",
            success: function (response) {
                $('#account_number').val(response.account_number);
            },
            error: function (error) {

            },
        });
    });
});

