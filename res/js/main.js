/**
 * Main functions JS
 *
 * @author      Elvis D'Andrea
 * @email       elvis@gravi.com.br
 */

$(document).on('click','a[href]', function(a){

    if ( $(this).attr('href').indexOf('#') === 0 ) { return; }

    a.preventDefault();
    Html.Post($(this).attr('href'),'',function(r){
        eval(r);
        return false;
    });
});

$(document).on('submit','form[action]', function(a){

    a.preventDefault();

    if ($(this).attr('action') != undefined) {

        //var form = $(this).serialize();

        data = [];

        $(this).find('input[type="hidden"][name],input[type][name],select[name],textarea[name]').each(function(e){
            data.push($(this).attr('name')+'='+encodeURIComponent($(this).val()));
        });
        $(this).find('input[type="password"]').each(function(e){
            data.push($(this).attr('name')+'='+md5($(this).val()));
        });

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: data.join('&'),
            async: true,
            success: function(a){
                eval(a);
                return false;
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }

    return false;

});

function quickLink(action) {
    Html.Post(action,'',function(r){
        eval(r);
        return false;
    });
}