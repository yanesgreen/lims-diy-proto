require('flatpickr');
require('flatpickr/dist/l10n/id');

$(document).ready(function () {
    "use strict"; // Start of use strict

    // check browser in mobile or desktop
    if (window.innerWidth <= 800 && window.innerHeight <= 850) {
        $('.sidebar').addClass('toggled');
    }

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        }
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

    $('#btn-back').click(function () {
        parent.history.back();
        return false;
    });

    //------------------------------
    // create new entry <master data>
    //------------------------------
    $(document).on('click', '.modal-show', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const title = $(this).attr('title');
        const url = $(this).attr('href');
        $('#modal-save').addClass('btn-simpan');
        $('#modal-save').text('Simpan');
        $('#modal-save').css({"background-color": "#0b4953", "border": "none"});
        $('#modal-title').text(title);
        $('#modal-header').css("background-color", "#0b4953");

        // ajax to call form
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'html',
            error: function (jqXHR, textStatus, error) {
                $('#modal-body').text('Error: Form tidak dapat ditampilkan.' + error);
            },
            success: function (data) {
                $('#modal-body').html(data);
            },
            complete: function () {
                $('#modalAdd').modal('show');
                $('#modalAdd').on('shown.bs.modal', function () {
                    $(this).find('input:text:visible:first').focus();
                });
            }
        });

        // ajax to store form data
        $('.btn-simpan').one('click', function () {
            const form = $('#form-create');
            const store_url = form.attr('action');
            const method = form.attr('method');

            form.find('.text-danger').text('');

            $.ajax({
                url: store_url,
                method: method,
                data: form.serialize(),
                error: function (xhr) {
                    const response = xhr.responseJSON;
                    if ($.isEmptyObject(response) === false) {
                        $.each(response.errors, function (key, val) {
                            $('#helper-' + key).text(val);
                        })
                    }
                    setTimeout(() => $('#modalAdd').modal('hide'), 500);
                },
                success: function (response) {
                    $('#modalAdd').modal('hide');
                    $('#requestTable').DataTable().ajax.reload();
                    $('#message').text(response.message);
                    setTimeout(() => $('#modalSukses').modal('show'), 500);
                }
            });
            return false;
        });

        return false;
    });

    //--------------------------
    // edit entry <master data>
    //---------------------------
    $('body').on('click', '.btn-edit', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const title = $(this).attr('title');
        const edit_url = $(this).attr('href');

        $('#modal-save').addClass('btn-ubah');
        $('#modal-save').text('Simpan');
        $('#modal-save').css("background-color", "#141E30");
        $('#modal-title').text(title);
        $('#modal-header').css("background-color", "#141E30");

        // ajax to call form
        $.ajax({
            url: edit_url,
            method: 'GET',
            dataType: 'html',
            error: function (jqXHR, textStatus, error) {
                $('#modal-body').text('Error: Form tidak dapat ditampilkan.' + error);
            },
            success: function (data) {
                $('#modal-body').html(data);
            },
            complete: function () {
                $('#modalAdd').modal('show');
            }
        });

        // ajax to update form data
        $('.btn-ubah').one('click', function () {
            event.preventDefault();
            event.stopImmediatePropagation();

            const form = $('#form-create');
            const update_url = form.attr('action');
            const method = form.attr('method');

            form.find('.text-danger').text('');

            $.ajax({
                url: update_url,
                method: method,
                data: form.serialize(),
                error: function (xhr) {
                    const response = xhr.responseJSON;
                    if ($.isEmptyObject(response) === false) {
                        $.each(response.errors, function (key, val) {
                            $('#helper-' + key).text(val);
                        })
                    }
                    setTimeout(() => $('#modalAdd').modal('hide'), 500);
                },
                success: function (response) {
                    $('#modalAdd').modal('hide');
                    $('#requestTable').DataTable().ajax.reload();
                    $('#message').text(response.message);
                    setTimeout(() => $('#modalSukses').modal('show'), 500);
                }
            });
            return false;
        });
        return false;
    });


    //----------------------------
    // delete entry <master data>
    //----------------------------
    $('body').on('click', '.btn-delete', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const title = $(this).attr('title');
        const edit_url = $(this).attr('href');

        $('#modal-save').addClass('btn-hapus');
        $('#modal-save').css({"background-color": "crimson"});
        $('#modal-save').text('Ya, hapus');
        $('#modal-title').text(title);
        $('#modal-header').css("background-color", "crimson");

        // ajax to call form
        $.ajax({
            url: edit_url,
            method: 'GET',
            dataType: 'html',
            error: function (jqXHR, textStatus, error) {
                $('#modal-body').text('Error: Form tidak dapat ditampilkan.' + error);
            },
            success: function (data) {
                $('#modal-body').html(data);
            },
            complete: function () {
                $('#modalAdd').modal('show');
            }
        });

        // ajax to update form data
        $('.btn-hapus').one('click', function () {
            event.preventDefault();
            event.stopImmediatePropagation();

            const form = $('#form-create');
            const update_url = form.attr('action');
            const method = form.attr('method');

            form.find('.text-danger').text('');

            $.ajax({
                url: update_url,
                method: method,
                data: form.serialize(),
                error: function (xhr) {
                    const response = xhr.responseJSON;
                    if ($.isEmptyObject(response) === false) {
                        $.each(response.errors, function (key, val) {
                            $('#helper-' + key).text(val);
                        })
                    }
                    setTimeout(() => $('#modalAdd').modal('hide'), 500);
                },
                success: function (response) {
                    $('#modalAdd').modal('hide');
                    $('#requestTable').DataTable().ajax.reload();
                    $('#message').text(response.message);
                    setTimeout(() => $('#modalSukses').modal('show'), 500);
                }
            });
            return false;
        });
        return false;
    });

    //-----------------
    // update password
    //-----------------
    $('#btn-updatePassword').on('click', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#formUpdatePassword');
        const update_url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: update_url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loader-password').css('display', 'inherit');
            },
            error: function (xhr) {
                form.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                form.find('.text-danger').text('');
                $('#message').text(response.message);
                $('#modalSukses').modal('show');
                $('#password').val('');
                $('#password_lama').val('');
                $('#password_confirmation').val('');
            },
            complete: function () {
                $('#loader-password').css('display', 'none');
            }
        });
        return false;
    });

    //------------------------------------
    // simpan penyidik, permintaan, asal
    //------------------------------------
    $('#form-simpan-takah-1').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-simpan-takah-1')[0];
        const data = new FormData(form);
        const formSimpanTakah = $('#form-simpan-takah-1');
        const insert_url = formSimpanTakah.attr('action');
        const method = formSimpanTakah.attr('method');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                $('#modal-simpan-takah-icon').hide();
                $('#modal-simpan-takah-icon-failed').hide();
                formSimpanTakah.find('[type="submit"]').attr('disabled', true).text('Tunggu')
            },
            success: function (response) {
                formSimpanTakah.find('.text-danger').text('');
                formSimpanTakah.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
                formSimpanTakah.find(':checkbox, :radio').prop('checked', false);
                $("#signature").jSignature('reset');
                $('#modal-simpan-takah').modal('show');
                $('#modal-simpan-takah-icon').show();
                $('#modal-simpan-takah-title').text(response.title);
                $('#modal-simpan-takah-text').text(response.text);
                $('#id_penyidik').val(response.penyidik_id);
                $('#asaltakah_id').val(response.asaltakah_id);
                $('#detailpermintaan_id').val(response.detailpermintaan_id);
                $('#penyidik_id').val(response.penyidik_id);
                $('#collapseTwo').collapse('show');
                $(window).scrollTop(0);
            },
            error: function (xhr) {
                $('#modal-simpan-takah').modal('show');
                $('#modal-simpan-takah-icon-failed').show();
                $('#modal-simpan-takah-title').text('Data Gagal Disimpan');
                $('#modal-simpan-takah-text').text('Periksa kembali isian form anda.');
                formSimpanTakah.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            complete: function () {
                formSimpanTakah.find('[type="submit"]').attr('disabled', false).text('Simpan')
            }
        });
    });

    //-----------------------------------------
    // simpan jenis kasus, barang bukti, mindik
    //-----------------------------------------
    $('#form-simpan-takah-2').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-simpan-takah-2')[0];
        const data = new FormData(form);
        const formSimpanTakah = $('#form-simpan-takah-2');
        const insert_url = formSimpanTakah.attr('action');
        const method = formSimpanTakah.attr('method');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                $('#modal-simpan-takah-icon').hide()
                $('#modal-simpan-takah-icon-failed').hide()
                formSimpanTakah.find('[type="submit"]').attr('disabled', true).text('Tunggu')
            },
            success: function (response) {
                formSimpanTakah.find('.text-danger').text('');
                formSimpanTakah.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
                formSimpanTakah.find(':checkbox, :radio').prop('checked', false);
                $("#signature").jSignature('reset');
                $('#modal-simpan-takah').modal('show');
                $('#modal-simpan-takah-icon').show();
                $('#modal-simpan-takah-title').text(response.title);
                $('#modal-simpan-takah-text').text(response.text);
                $('#jeniskasus_id').val(response.jeniskasus_id);
                $('#barangbukti_id').val(response.barangbukti);
                $('#foto_barangbukti').val(response.foto_barangbukti);
                $('#suspect1').val(response.suspect1);
                $('#suspect2').val(response.suspect2);
                $('#suspect3').val(response.suspect3);
                $('#witness1').val(response.witness1);
                $('#witness2').val(response.witness2);
                $('#witness3').val(response.witness3);
                $('#mindik_id').val(response.mindik_id);
                $('#mt1').val(response.mindiktambahan1);
                $('#mt2').val(response.mindiktambahan2);
                $('#mt3').val(response.mindiktambahan3);
                $('#dibuka_oleh_v2').val(response.dibuka_oleh);
                $('#collapseThree').collapse('show');
                $(window).scrollTop(0);
            },
            error: function (xhr) {
                $('#modal-simpan-takah').modal('show');
                $('#modal-simpan-takah-icon-failed').show();
                $('#modal-simpan-takah-title').text('Data Gagal Disimpan');
                $('#modal-simpan-takah-text').text('Periksa kembali isian form anda.');
                formSimpanTakah.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            complete: function () {
                formSimpanTakah.find('[type="submit"]').attr('disabled', false).text('Simpan')
            }
        });
    });

    //---------------
    // simpan takah
    //--------------
    $('#form-simpan-takah-3').submit(function (event) {
        event.preventDefault();

        const form = $('#form-simpan-takah-3')
        const url = form.attr('action')
        const method = form.attr('method')

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                form.find('[type="submit"]').attr('disabled', true).text('Tunggu')
                $('#modal-simpan-takah-sukses-icon').hide();
                $('#modal-simpan-takah-sukses-icon-failed').hide();
                $('#modal-simpan-takah-sukses-btn-failed').hide();
                $('#modal-simpan-takah-sukses-btn-sukses').hide();
            },
            error: function (xhr) {
                $('#modal-simpan-takah-sukses').modal('show');
                $('#modal-simpan-takah-sukses-icon-failed').show();
                $('#modal-simpan-takah-sukses-title').text('Data Gagal Disimpan');
                $('#modal-simpan-takah-sukses-text').text('Periksa kembali isian form anda.');
                $('#modal-simpan-takah-sukses-btn-failed').show();
                form.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                form.find('.text-danger').text('');
                $('#modal-simpan-takah-sukses').modal('show');
                $('#modal-simpan-takah-sukses-icon').show();
                $('#modal-simpan-takah-sukses-title').text(response.title);
                $('#modal-simpan-takah-sukses-text').text(response.text);
                $('#modal-simpan-takah-sukses-btn-sukses').show();
                $('#modal-simpan-takah-sukses-btn-sukses').attr('href', response.url_cetakan_penerimaan)
            },
            complete: function () {
                form.find('[type="submit"]').attr('disabled', false).text('Simpan')
            }
        });
        return false;
    });

    //--------------------------
    // serahkan takah ke kaurmin
    //---------------------------
    $('#form-serahkan-ke-kaurmin').submit(function (event) {
        event.preventDefault();

        const form = $('#form-serahkan-ke-kaurmin');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loader-serahkan-ke-kaurmin').css('display', 'inherit')
                form.find('[type="submit"]').attr('disabled', true).text('Tunggu')
            },
            error: function (xhr) {
            },
            success: function (response) {
                $('#modal-serahkan-ke-kaurmin').modal('show');
            },
            complete: function () {
                $('#loader-serahkan-ke-kaurmin').css('display', 'none')
                form.find('[type="submit"]').attr('disabled', true).text('Takah Behasil Dikirim')
            }
        });
        return false;
    });

    //----------------------------------------------
    // tambah keterangan takah, kasus menonjol, tkp
    //----------------------------------------------
    $('#form-tambah-keterangan-takah').submit(function (event) {
        event.preventDefault();

        const form = $('#form-tambah-keterangan-takah');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loader-tambah-keterangan-takah').css('display', 'inherit');
                form.find('.text-danger').text('');
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                $('#modal-tambah-keterangan-takah').modal('show');
                $('#modal-tambah-keterangan-takah-title').text(response.title);
            },
            complete: function () {
                $('#loader-tambah-keterangan-takah').css('display', 'none');
            }
        });
        return false;
    });

    //-------------------
    // tambah pemeriksa
    //-------------------
    $('#form-tambah-pemeriksa').submit(function (event) {
        event.preventDefault();

        const form = $('#form-tambah-pemeriksa');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                form.find('.text-danger').text('');
                $('#loader-tambah-pemeriksa').css('display', 'inherit');
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                $('#modal-tambah-pemeriksa').modal('show');
                $('#modal-tambah-pemeriksa-title').text(response.title);
            },
            complete: function () {
                $('#loader-tambah-pemeriksa').css('display', 'none');
            }
        });
        return false;
    });

    //-------------------
    // simpan bap
    //-------------------
    $('#form-simpan-bap').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-simpan-bap')[0];
        const data = new FormData(form);
        const formSimpanBap = $('#form-simpan-bap');
        const insert_url = formSimpanBap.attr('action');
        const method = formSimpanBap.attr('method');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                $('#loader-simpan-bap').css('display', 'inherit');
            },
            success: function (response) {
                $('#modal-simpan-bap').modal('show');
                $('#modal-simpan-bap-title').text(response.title);
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                console.log(response);
            },
            complete: function () {
                $('#loader-simpan-bap').css('display', 'none');
            }
        });
    });

    //-------------------
    // tambah dokumen
    //-------------------
    $('#form-tambah-dokumen-diserahkan').submit(function (event) {
        event.preventDefault();

        const form = $('#form-tambah-dokumen-diserahkan');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loader-tambah-dokumen-diserahkan').css('display', 'inherit');
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
            },
            success: function (response) {
                $('#modal-tambah-dokumen-diserahkan').modal('show');
                $('#modal-tambah-dokumen-diserahkan-title').text(response.title);
            },
            complete: function () {
                $('#loader-tambah-dokumen-diserahkan').css('display', 'none');
            }
        });
        return false;
    });

    //------------------------------------
    // simpan penyidikpenerima
    //------------------------------------
    $('#form-simpan-penyidik-penerima').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-simpan-penyidik-penerima')[0];
        const data = new FormData(form);
        const formPenyidikPenerima = $('#form-simpan-penyidik-penerima');
        const insert_url = formPenyidikPenerima.attr('action');
        const method = formPenyidikPenerima.attr('method');
        const loader = $('#loader-simpan-penyidik-penerima');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                loader.css('display', 'inherit');
                $('#modal-simpan-penyidik-penerima-icon').hide();
                $('#modal-simpan-penyidik-penerima-icon-failed').hide();
            },
            success: function (response) {
                formPenyidikPenerima.find('.text-danger').text('');
                formPenyidikPenerima.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
                formPenyidikPenerima.find(':checkbox, :radio').prop('checked', false);
                $("#signature").jSignature('reset');
                $('#modal-simpan-penyidik-penerima').modal('show');
                $('#modal-simpan-penyidik-penerima-icon').show();
                $('#modal-simpan-penyidik-penerima-title').text(response.title);
                $('#modal-simpan-penyidik-penerima-text').text(response.text);
                $('#id_penyidik').val(response.penyidik_id);
                $('#asaltakah_id').val(response.asaltakah_id);
                $('#detailpermintaan_id').val(response.detailpermintaan_id);
                $('#penyidik_id').val(response.penyidik_id);
                $('#form-simpan-penyidik-penerima-container').hide();
                $('#form-feedback-container').show();
            },
            error: function (xhr) {
                $('#modal-simpan-penyidik-penerima').modal('show');
                $('#modal-simpan-penyidik-penerima-icon-failed').show();
                $('#modal-simpan-penyidik-penerima-title').text('Data Gagal Disimpan');
                $('#modal-simpan-penyidik-penerima-text').text('Periksa kembali isian form anda.');
                formPenyidikPenerima.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            complete: function () {
                loader.css('display', 'none');
            }
        });
    });

    //------------------------------------
    // simpan feedback
    //------------------------------------
    $('#form-simpan-feedback').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-simpan-feedback')[0];
        const data = new FormData(form);
        const formPenyidikPenerima = $('#form-simpan-feedback');
        const insert_url = formPenyidikPenerima.attr('action');
        const method = formPenyidikPenerima.attr('method');
        const loader = $('#loader-simpan-feedback');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                loader.css('display', 'inherit');
                $('#modal-simpan-feedback-icon').hide();
                $('#modal-simpan-feedback-icon-failed').hide();
            },
            success: function (response) {
                $('#modal-simpan-feedback').modal('show');
                $('#modal-simpan-feedback-title').text(response.title);
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
            },
            complete: function () {
                loader.css('display', 'none');
            }
        });
    });

    //-----------------------------------------------
    // update penyidik, detailpermintaan, asal takah
    //-----------------------------------------------
    $('#form-update-penyidik-detailpermintaan-asaltakah').submit(function (event) {
        event.preventDefault();

        const form = $('#form-update-penyidik-detailpermintaan-asaltakah');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                form.find('.text-danger').text('');
                $('#loader-update-penyidik-detailpermintaan-asaltakah').css('display', 'inherit');
                $('#modal-update-penyidik-detailpermintaan-asaltakah-icon').hide();
                $('#modal-update-penyidik-detailpermintaan-asaltakah-icon-failed').hide();
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                $('#modal-update-penyidik-detailpermintaan-asaltakah').modal('show');
                $('#modal-update-penyidik-detailpermintaan-asaltakah-icon-failed').show();
                $('#modal-update-penyidik-detailpermintaan-asaltakah-title').text('Data Gagal Di Update');
                $('#modal-update-penyidik-detailpermintaan-asaltakah-text').text('Periksa Kembali Isian Form Anda');
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                $('#modal-update-penyidik-detailpermintaan-asaltakah').modal('show');
                $('#modal-update-penyidik-detailpermintaan-asaltakah-icon').show();
                $('#modal-update-penyidik-detailpermintaan-asaltakah-title').text(response.title);
                $('#modal-update-penyidik-detailpermintaan-asaltakah-text').text(response.text);
            },
            complete: function () {
                $('#loader-update-penyidik-detailpermintaan-asaltakah').css('display', 'none');
            }
        });
        return false;
    });

    //------------------------------------
    // update penyidik, detailpermintaan, asal takah
    //------------------------------------
    $('#form-update-jeniskasus-barangbukti-mindik').submit(function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#form-update-jeniskasus-barangbukti-mindik')[0];
        const data = new FormData(form);
        const formBB = $('#form-update-jeniskasus-barangbukti-mindik');
        const insert_url = formBB.attr('action');
        const method = formBB.attr('method');
        const loader = $('#loader-update-jeniskasus-barangbukti-mindik');

        $.ajax({
            type: method,
            enctype: 'multipart/form-data',
            url: insert_url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
                formBB.find('.text-danger').text('');
                $('#loader-update-jeniskasus-barangbukti-mindik').css('display', 'inherit');
                $('#modal-update-jeniskasus-barangbukti-mindik-icon').hide();
                $('#modal-update-jeniskasus-barangbukti-mindik-icon-failed').hide();
            },
            success: function (response) {
                $('#modal-update-jeniskasus-barangbukti-mindik').modal('show');
                $('#modal-update-jeniskasus-barangbukti-mindik-icon').show();
                $('#modal-update-jeniskasus-barangbukti-mindik-title').text(response.title);
                $('#modal-update-jeniskasus-barangbukti-mindik-text').text(response.text);
                $('#foto_bb_detail_container').hide();
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                $('#modal-update-jeniskasus-barangbukti-mindik').modal('show');
                $('#modal-update-jeniskasus-barangbukti-mindik-icon-failed').show();
                $('#modal-update-jeniskasus-barangbukti-mindik-title').text('Data Gagal Di Update');
                $('#modal-update-jeniskasus-barangbukti-mindik-text').text('Periksa Kembali Isian Form Anda');
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            complete: function () {
                $('#loader-update-jeniskasus-barangbukti-mindik').css('display', 'none');
            }
        });
    });

    //----------------------------------------------
    // update kasus menonjol, tkp
    //----------------------------------------------
    $('#form-update-keterangan-takah').submit(function (event) {
        event.preventDefault();

        const form = $('#form-update-keterangan-takah');
        const url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loader-update-keterangan-takah').css('display', 'inherit');
                form.find('.text-danger').text('');
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                $('#modal-update-keterangan-takah').modal('show');
                $('#modal-update-keterangan-takah-title').text(response.title);
                $('#modal-update-keterangan-takah-text').text(response.text);
            },
            complete: function () {
                $('#loader-update-keterangan-takah').css('display', 'none');
            }
        });
        return false;
    });

    //-----------------------
    // takah - beri izin edit
    //-----------------------
    $('#formBeriIzinEditTakah').on('submit', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        const form = $('#formBeriIzinEditTakah');
        const update_url = form.attr('action');
        const method = form.attr('method');

        $.ajax({
            url: update_url,
            method: method,
            data: form.serialize(),
            beforeSend: function () {
                $('#loaderBeriIzinEditTakah').css('display', 'inherit');
            },
            error: function (xhr) {
                form.find('.text-danger').text('');
                const response = xhr.responseJSON;
                if ($.isEmptyObject(response) === false) {
                    $.each(response.errors, function (key, val) {
                        $('#helper-' + key).text(val);
                    })
                }
            },
            success: function (response) {
                form.find('.text-danger').text('');
                $('#message').text(response.message);
                $('#modalSukses').modal('show');
                $('#identitas').val('');
            },
            complete: function () {
                $('#loaderBeriIzinEditTakah').css('display', 'none');
            }
        });
        return false;
    });

});


