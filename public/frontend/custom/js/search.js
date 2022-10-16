$(document).ready(function () {
    $(document).on('keyup', '.in-autocomplete', function (event) {
        $('.autocomplete-items').remove();
        var txtBox = $(this);
        var searchTerm = $(this).val();
        if(searchTerm != ''){
            /*var attribute = $(this).attr('id');
            if(searchField == "" || domain == ""){
                return false;
            }*/
            $.ajax({
                url: root + "/AutoCompleteSearch/searchAction",
                method:"POST",
                data:{
                    searchTerm:searchTerm
                },
                success:function(response){
                    $("<div/>", {
                        html: response,
                        class:'autocomplete-items'
                    }).insertAfter(txtBox);
                }
            })
        }
    });

});
