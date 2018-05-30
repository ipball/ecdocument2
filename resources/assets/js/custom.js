/* init select2, datepicker */
$('.modal').on('shown.bs.modal', function(e){
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
    });
});

/* handle active menu */
var url = window.location;
var suburl = url.href.replace(/\/(creat(\S+)|edit(\S+))/g,'');    

/* for sidebar menu entirely but not cover treeview */
$('li.submenu a').filter(function () {
    return this.href == suburl;
}).addClass('active subdrop');

/* valid alpha */
jQuery.validator.addMethod('alphanumeric', function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, 'ระบุเฉพาะตัวอักษร a-z, 0-9 และ _ เท่านั้น');

/* handle modal form */
$('body').on('click', '.btn-create', function (e) {
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
});
$('body').on('click', '.btn-edit', function (e) {
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
});

$('#ajaxModal').on('hidden.bs.modal', function () {
    $('.modal-content').empty();
    $(this).removeData('bs.modal');
});

$('#ajaxModal').on('shown.bs.modal', function (e) {
    $.LoadingOverlay('hide');
});

$('body').on('click', '.btn-edit', function () {
    loadingCustom();
});

$('body').on('click', '.btn-create', function () {
    loadingCustom();
});

var loadingCustom = function () {
    $.LoadingOverlay('show', {
        image: '',
        fontawesome: 'fa fa-spinner fa-spin',
        background: 'rgba(0, 0, 0, 0.6)',
        fontawesomeColor: '#ffffff'
    });
}

var modalShow = function (e, link, modalName) {
    e.preventDefault();
    $.get(link, function (data) {
        $('#' + modalName).find('.modal-content').html(data);
        $('#' + modalName).modal('show');
    });
}

var showBox = function (title, type, text = '') {
    swal({
        position: 'top-right',
        type: type,
        title: title,
        html: text,
        showConfirmButton: false,
        timer: 1500
    })
}

var confirmBox = function (text, callback = '') {
    swal({
        title: 'ยืนยันการทำรายการ?',
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        allowOutsideClick: false
    }).then(function (result) {
        if (result.value) {
            callback();
        }
    }).catch(swal.noop);
};

var saveForm = function (id, url, table) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = $('#saveForm').serialize();
    var methodType = (id) ? 'patch' : 'post';
    var castUrl = (id) ? url + '/' + id : url;
    $.ajax({
        url: castUrl,
        type: methodType,
        data: formData,
        success: function (resp) {
            showBox(resp.message, resp.status);
            $('#ajaxModal').modal('hide');
            table.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            showBox(textStatus, 'error', errorThrown);
        }
    });
}


var deleteForm = function(url, table) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function () {
        $.ajax({
            url: url,
            type: 'delete',        
            success: function (resp) {
                showBox(resp.message, resp.status);    
                table.ajax.reload();        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                showBox(textStatus, 'error', errorThrown);
            }
        });
    }, 100);  
}