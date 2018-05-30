var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    /* handle tables */
    var table = $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/user/datatables',
        columns: [{
                data: 'username',
                name: 'username'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'department',
                name: 'department'
            },
            {
                data: 'user_type',
                name: 'user_type'
            },
            {
                data: 'id',
                name: 'id'
            }
        ],
        columnDefs: [{
            targets: 5,
            orderable: false,
            render: function (data, type, row) {
                var dataName = row['username'];
                var btnEdit = '<a href="#" data-href="' + APP_URL + '/user/form/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> แก้ไข</a> ';
                var btnDelete = '<a href="#" data-href="' + APP_URL + '/user/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
        }]
    });

    /* handle validate */
    $('#ajaxModal').on('shown.bs.modal', function (e) {
        $('#saveForm').validate({
            submitHandler: function (form) {
                var id = $('input[name=id]').val();                
                var url = APP_URL + '/user';
                saveForm(id, url, table);
            },
            rules: {
                username: {
                    required: true,
                    alphanumeric: true,
                    minlength: 6,
                    maxlength: 16,
                    remote: {
						url: APP_URL + '/user/username_check',
						type: 'get',
						data: {
							username: function () {
								return $('input[name=username]').val();
							},
							id: $('input[name=id]').val()
						}
					}
                },
                password: {
                    required: function(){
                        return ($('input[name=id]').val() == '') ? true : false
                    },
                    alphanumeric: true,
                    minlength: 6,
                    maxlength: 16
                },
                re_password: {
                    equalTo: '#password'
                },
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                user_type:{
                    required: true
                }
            },
            messages: {
                username: {
                    remote: 'Username ชื่อ "{0}" ถูกใช้แล้ว กรุณาระบุค่าใหม่'
                }
            },
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
        var callback = function(){
            deleteForm(url, table);
        }

        confirmBox('ลบข้อมูล ' + name, callback);
    });
});
