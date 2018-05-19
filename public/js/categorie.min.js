$(document).ready(function(){
    $('#categorie-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL + '/categorie/datatables',        
        columns: [
            {data: 'name', name: 'name'},
            {data: 'id', name: 'id'}
        ],
        columnDefs: [
            { 
                targets: 1,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
					var dataName = row['name'];
					var btnEdit = '<a href="' + APP_URL + '/main_form/' + row['id'] + '" role="button" class="btn btn-outline-dark btn-sm btn-edit" data-toggle="modal" data-target="#ajaxLargeModal"><i class="fa fa-edit"></i> แก้ไข</a> ';
					var btnDelete = '<a href="#" data-href="' + APP_URL + 'api/products/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
					return btnEdit + btnDelete;
				},
            }
          ]
    });
});