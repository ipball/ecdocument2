var app = new Vue({
    el: '#app',
    data: {        
        data: {}
    },
    filters : {
        setTitle(value){
            if(!value) return 'หมวดหมู่สินค้า';
            return value;
        }
    },
    methods: {
        
    },
    mounted(){
        $('#formModal').on('shown.bs.modal', function (e) {
            $.LoadingOverlay('show');
            var id = $(e.relatedTarget).data('id');
            axios.get(APP_URL+'/categorie/'+ id).then(response => (app.data = response.data));
            $.LoadingOverlay('hide');
        });

        $('#formModal').on('hide.bs.modal', function (e) {
            app.data = {};
        });
    }
});
$(document).ready(function () {
    $('#categorie-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/categorie/datatables',
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'id',
                name: 'id'
            }
        ],
        columnDefs: [{
            targets: 1,
            orderable: false,
            render: function (data, type, row) {
                var dataName = row['name'];
                var btnEdit = '<a href="#" role="button" data-id="'+data+'" class="btn btn-outline-dark btn-sm btn-edit" data-toggle="modal" data-target="#formModal"><i class="fa fa-edit"></i> แก้ไข</a> ';
                var btnDelete = '<a href="#" data-href="' + APP_URL + 'api/products/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
        }]
    });
});
