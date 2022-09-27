$(function () {
    'use strict';
    var picker = $('.picker');

    // Picker
    if (picker.length) {
        picker.flatpickr({
            allowInput: true,
            onReady: function (selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                    $(instance.mobileInput).attr('step', null);
                }
            }
        });
    }
});




(function (window, document, $) {
    'use strict';

    var select = $('.select2');

    // Basic Select2 select
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $this.parent()
        });
    });
})(window, document, jQuery);









(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#coupon_type').on('change', function () {
            var type = this.value;

            if (type == 1) {
                $('#instructor_id_div').removeClass('d-block');
                $('#course_id_div').removeClass('d-block');

                $('#instructor_id_div').addClass('d-none');
                $('#course_id_div').addClass('d-none');

                $('#instructor_ids').removeAttr('required');
                $('#course_ids').removeAttr('required');
            }
            if (type == 2) {
                $('#instructor_id_div').removeClass('d-none');
                $('#instructor_id_div').addClass('d-block');
                $('#course_id_div').removeClass('d-block');
                $('#course_id_div').addClass('d-none');


                $('#instructor_ids').select2({
                    placeholder: '---Select  Instructors---'
                });

                $('#instructor_ids').attr('required', true)
                $('#course_ids').removeAttr('required');
            }

            if (type == 3) {
                $('#course_id_div').removeClass('d-none');
                $('#course_id_div').addClass('d-block');
                $('#instructor_id_div').removeClass('d-block');
                $('#instructor_id_div').addClass('d-none');

                $('#course_ids').select2({
                    placeholder: '---Select  Courses---'
                });

                $('#course_ids').attr('required', true)
                $('#instructor_ids').removeAttr('required');
            }
        })
    });

})(jQuery)
