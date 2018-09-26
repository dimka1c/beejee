$(document).ready(function() {
    var imgFile;
    var img_scr;
    $("#id-preview").on('click', function(){
        var data = {};
        var formData = new FormData($('#form-task')[0]);
        data['name'] = $('#id-user-name').val();
        data['email'] = $('#id-user-email').val();
        data['content'] = editor.getData();
        if (imgFile != undefined) {
            var img_data = new FormData();
            img_data.append( 'upfile', imgFile[0] );
            img_data.append('img_file_upload', 1);
            $.ajax({
                url         : '/main/save-image',
                type        : 'POST', // важно!
                data        : img_data,
                cache       : false,
                dataType    : 'html',
                processData : false,
                contentType : false,
                async       : false,
                success     : function( respond, status, jqXHR ){
                },
                error: function( jqXHR, status, errorThrown ){
                    console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
                }
            });
        }
        $.ajax({
            url      : '/main/preview',
            type     : 'POST',
            data     : data,
            dataType : 'html',
            cache    : false,
            success  : function (resp) {
                $('#resp-preview').html(resp);
                $('#myModal').modal('show');
            }
        });
    });

    $('input[type=file]').on('change', function(){
        imgFile = this.files;
    });
});