$(document).ready(function () {
    /* handle tables */
    var table = $('#document-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/document/datatables',
        columns: [{
                data: 'code_no',
                name: 'code_no'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'categorie_name',
                name: 'categorie_name'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'id',
                name: 'id'
            }
        ],
        columnDefs: [{
                targets: 3,
                render: function (data, type, row) {
                    var status = data==='normal' ? 'primary' : 'danger';
                    var strStatus = data==='normal' ? 'ปกติ' : (data==='canceled' ? 'ยกเลิกการใช้' : 'สูญหาย');
                    var result = '<span class="badge badge-'+status+'">'+strStatus+'</span>';
                    return result;
                },
            },
            {
                targets: 4,
                orderable: false,
                render: function (data, type, row) {
                    var dataName = row['name'];
                    var btnEdit = '<a href="#" data-href="' + APP_URL + '/document/form/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> แก้ไข</a> ';
                    var btnDelete = '<a href="#" data-href="' + APP_URL + '/document/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                    return btnEdit + btnDelete;
                },
            }
        ]
    });

    /* handle validate */
    $('#ajaxModal').on('shown.bs.modal', function (e) {
        $('#saveForm').validate({
            submitHandler: function (form) {
                var id = $('input[name=id]').val();
                var url = APP_URL + '/document';
                saveForm(id, url, table);
            },
            rules: {
                name: {
                    required: true
                },
                categorie_id: {
                    required: true
                },
                code_no: {
                    required: true
                }
            },
            messages: {},
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass("error-block");
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent()); /* radio checkbox? */
                } else if (element.hasClass('select2')) {
                    error.insertAfter(element.next('span')); /* select2 */
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
    });

    /* handle delete */
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var url = $(this).data('href');
        var name = $(this).data('name');
        var callback = function () {
            deleteForm(url, table);
        }

        confirmBox('ลบข้อมูล ' + name, callback);
    });

    /* handle upload file */
    var openModal = false;
    $('#ajaxModal').on('shown.bs.modal', function (e) {
        $('body').on('change', '#file', function (e) {
            if(openModal) return false;
            openModal = true;
            e.preventDefault();
            loadingCustom();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form_data = new FormData();
            form_data.append('file', this.files[0]);
            $.ajax({
                url: APP_URL+'/document/uploadfile',
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (resp) {                    
                    $.LoadingOverlay('hide');
                    if(resp.status==='success'){
                        $('#file_name').val(resp.data);
                        $('.btn-view-file').removeClass('invisible').addClass('visible');
                        $('.btn-view-file').attr('href', APP_LINK+resp.data);
                    } else {
                        showBox(resp.message.file[0], 'error');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {                    
                    $.LoadingOverlay('hide');
                    showBox(textStatus, 'error', errorThrown);
                }
            });
        });
    });

    $('#ajaxModal').on('hidden.bs.modal', function (e) {
        openModal = false;
    });   

    /* handle tables */
    var tbview = $('#document-tbview').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/document/datatables',
        columns: [{
                data: 'code_no',
                name: 'code_no'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'categorie_name',
                name: 'categorie_name'
            },
            {
                data: 'status',
                name: 'status'
            }
        ],
        columnDefs: [
            {
                targets: 0,                
                render: function (data, type, row) {                    
                    var btnView = '<a href="#" data-href="' + APP_URL + '/document/view/' + row.id + '" data-modal-name="ajaxModal" data-id="' + row.id + '" class="btn-edit">'+data+'</a> ';                    
                    return btnView;
                },
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    var status = data==='normal' ? 'primary' : 'danger';
                    var strStatus = data==='normal' ? 'ปกติ' : (data==='canceled' ? 'ยกเลิกการใช้' : 'สูญหาย');
                    var result = '<span class="badge badge-'+status+'">'+strStatus+'</span>';
                    return result;
                },
            }
        ]
    });

});
