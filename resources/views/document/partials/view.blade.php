<form id="saveForm" method="post" autocomplete="off" enctype="multipart/form-data">    
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold w-25">รหัสเอกสาร</td>
                <td>{{ $data->code_no }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">ชื่อเอกสาร</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">หมวดหมู่</td>
                <td>{{ $data->categorie->name }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">อ้างอิง</td>
                <td>{{ $data->reference }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">สถานที่จัดเก็บ</td>
                <td>{{ $data->store }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">ไฟล์เอกสาร</td>
                <td>
                    @if(!empty($data->file_name))
                    <a href="{{ Storage::url($data->file_name) }}" target="_blank" role="button" class="btn btn-view-file btn-sm btn-outline-warning">ดูไฟล์เอกสาร</a>                    
                    @else
                    <span class="text-danger">ยังไม่มีไฟล์</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">วันที่เอกสาร</td>
                <td>{{ $data->doc_date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">สถานะ</td>
                <td>
                    <span class="badge @if($data->status=='normal') badge-primary @else badge-danger @endif">{{ $data->status_name }}</span>                    
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">รายละเอียด</td>
                <td>{{ nl2br($data->description) }}</td>
            </tr>            
            <tr>
                <td class="font-weight-bold">ผู้สร้าง</td>
                <td>{{ $data->user->name }}</td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>        
    </div>
</form>
