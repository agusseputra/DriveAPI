/**
 * Created by PUSKOM on 7/3/2017.
 */
function ajaxFunction(form) {
    $('.ll').removeClass('hide');
    if ($(form).data('confirm') == '1') {
        swal({
                title: "PERHATIAN !",
                text: "Yakin data akan disimpan !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Ya, Simpan!",
                cancelButtonText: "Tidak, Batalkan!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    ajaxFunction_submit(form);
                } else {
                    $('.ll').addClass('hide');
                }
            });
    } else {
        ajaxFunction_submit(form);
    }
}

function ajaxFunction_submit(form) {
    $('.err_msg').html('');
    var l = Ladda.create(form.querySelector('.btn-ladda-spinner')).start();
    var data = new FormData($(form)[0]);
    var validator = $(form).validate();
    $.jGrowl.defaults.closer = false;
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(result) {
            l.stop();
            if (result.error) {
                $.jGrowl(result.msg_body, {
                    header: result.msg_header,
                    theme: 'alert-styled-left bg-danger',
                    afterOpen: function() {
                        validator.showErrors(result.form_error);
                    }
                });
                if (result.err_filed) {
                    jQuery.each(result.err_filed, function(i, val) {
                        $("." + i).html(val);
                        //$("."+i).closest(".col-md-12").find('.c_h').html('<span class="text-warning">Harapan <i class="icon-cross2 "></i></span>');
                        //$("."+i).closest(".col-md-12").find('.c_k').html('<span class="text-warning">Kenyataan <i class="icon-cross2"></i></span>');
                        console.log(i);
                    });
                }
            } else {
                $.jGrowl(result.msg_body, {
                    header: result.msg_header,
                    theme: 'alert-styled-left bg-success',
                    afterOpen: function() {
                        if (result.popup) {
                            swal({
                                    title: "PERHATIAN !",
                                    text: result.msg_body,
                                    type: "info"
                                },
                                function(isConfirm) {
                                    if (result.redirect_url) {
                                        setTimeout(function() {
                                            window.location.href = result.redirect_url;
                                            //alert(result.redirect_url);
                                        }, 600);
                                    }
                                    if (result.redirect_ajax) {
                                        load_url(result.div, result.redirect_ajax);
                                        $('.close').click();
                                        $('.modal-backdrop').remove();
                                    }

                                });
                        } else {
                            if (result.redirect_url) {
                                setTimeout(function() {
                                    window.location.href = result.redirect_url;
                                    //alert(result.redirect_url);
                                }, 1500);
                            }
                            if (result.redirect_ajax) {
                                load_url(result.div, result.redirect_ajax, result.f);
                                $('.close').click();
                                $('.modal-backdrop').remove();
                            }
                            if (result.modal) {
                                $('.close').click();
                                //$('.modal').modal('toggle');
                            }
                            if (result.print) {
                                window.open(result.print, 'window name', 'window settings');
                            }
                            if (result.tampil) {
                                $(result.div).html(result.tampil);
                            }

                        }
                        $('.ll').addClass('hide');

                    }
                });

            }
            $('.ll').addClass('hide');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            l.stop();
            console.log(textStatus, errorThrown);
            $('.ll').addClass('hide');
        }
    });
}

function ajaxFunction2(form) {
    var l = Ladda.create(form.querySelector('.btn-ladda-spinner')).start();
    var data = new FormData($(form)[0]);
    var validator = $(form).validate();
    $.jGrowl.defaults.closer = false;
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: data,
        //dataType: 'json',
        contentType: false,
        processData: false,
        success: function(result) {
            $('.tampil').html(result);
            $('.ib').click();
            l.stop();
            $('.cl').click();

        },
        error: function(jqXHR, textStatus, errorThrown) {
            l.stop();
            console.log(textStatus, errorThrown);
        }
    });
}

function ajax_confirm(header, msg, type) {
    swal({
        title: header,
        text: msg,
        type: type,
        showCancelButton: false,
        confirmButtonColor: "#EF5350",
        confirmButtonText: "OK"
    });
}

function del(url, id) {
    swal({
            title: "Anda Yakin?",
            text: "Data  akan terhapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { id: id },
                    success: function(response) {
                        if (response == '00') {
                            $('tbody tr#' + id).remove();
                        } else {
                            swal({
                                title: "Batal",
                                text: "Data tidak terhapus",
                                confirmButtonColor: "#2196F3",
                                type: "error"
                            });
                        }
                    }
                });
            } else {}
        });
}

function del_redirect(url, id) {
    swal({
            title: "Anda Yakin?",
            text: "Data  akan terhapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { id: id },
                    dataType: 'json',
                    success: function(result) {
                        if (result.error) {
                            swal({
                                title: result.msg_header,
                                text: result.msg_body,
                                confirmButtonColor: "#2196F3",
                                type: "error"
                            });
                        } else {
                            load_url(result.div, result.redirect_ajax, result.f);
                        }
                    }
                });
            } else {}
        });
}

function load_url(div, url, f) {
    $(div).html("Mohon Menunggu...");
    $('.ll').removeClass('hide');
    $.ajax({
        url: url,
        success: function(response) {
            $(div).html(response);
            history.replaceState({ pg: 1 }, "pg home", "?f=" + f);
            $('.ll').addClass('hide');
            $('.mf').removeClass('active');
            $('.' + f).addClass('active');

        }
    });
}

var downloadFile = function(filename, content) {
    var blob = new Blob([content]);
    var evt = document.createEvent("HTMLEvents");
    evt.initEvent("click");
    $("<a>", {
        download: filename,
        href: webkitURL.createObjectURL(blob)
    }).get(0).dispatchEvent(evt);
};