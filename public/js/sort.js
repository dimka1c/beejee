$(document).ready(function() {
    $('#sort').on('change', function() {
        var sort = $('#sort').val();
        $.ajax({
            url      : '/main/change-sort',
            type     : 'POST',
            data     : {"sort": sort},
            dataType : 'json',
            cache    : false,
            success  : function (resp) {
                console.log(resp);
                document.location.href = "/main/index";
            }
        });
    });
});