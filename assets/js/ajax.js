/**
 * Created by PUSKOM on 7/3/2017.
 */

function ajaxFunction(form) {
    var l = Ladda.create(form.querySelector('.btn-ladda-spinner')).start();
    var data = $(form).serialize();
    var validator = $(form).validate();
    $.jGrowl.defaults.closer = false;
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: data,
        dataType: 'json',
        success: function(result) {
            l.stop();
            if(result.error){
                $.jGrowl(result.msg_body, {
                    header: result.msg_header,
                    theme: 'alert-styled-left bg-danger',
                    afterOpen: function() {
                        validator.showErrors(result.form_error);
                    }
                });
            }else{
                $.jGrowl(result.msg_body, {
                    header: result.msg_header,
                    theme: 'alert-styled-left bg-success',
                    afterOpen: function() {
                        if(result.redirect){
                            setTimeout(function(){
                                window.location.href = result.redirect_url;
                            }, 1500);
                        }
                    }
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            l.stop();
            console.log(textStatus, errorThrown);
        }
    });

}