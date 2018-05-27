<form id="saveForm" method="post" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">ชื่อเอกสาร
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="categorie_id">หมวดหมู่
                    <span class="text-danger">*</span>
                </label>
                <select name="categorie_id" class="select2 form-control">
                    @if(empty($data->id))
                    <option value="">เลือกหมวดหมู่เอกสาร</option>
                    @endif @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if($categorie->id==$data->categorie_id) selected @endif>{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="code_no">รหัสเอกสาร
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="code_no" value="{{ $data->code_no }}" class="form-control">
            </div>
            <div class="form-grup col-md-4 col-sm-12">
                <label for="reference">แหล่งอ้างอิง</label>
                <input type="text" name="reference" value="{{ $data->reference }}" class="form-control">
            </div>
            <div class="form-grup col-md-4 col-sm-12">
                <label for="store">สถานที่จัดเก็บ</label>
                <input type="text" name="store" value="{{ $data->store }}" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="description">รายละเอียด</label>
                <textarea class="form-control" rows="3" name="description">{{ $data->description }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="file_name">ไฟล์เอกสาร</label>
                <input type="file" name="file_name" class="form-control-file">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="doc_date">วันที่เอกสาร</label>
                <input type="text" name="doc_date" value="{{ $data->doc_date->format('d/m/Y') }}" class="form-control datepicker">
            </div>
            @if(!empty($data->id))
            <div class="form-group col-md-4 col-sm-12">
                <label for="status">สถานะ</label>
                <select name="status" class="form-control">
                    <option value="normal" @if($data->status=='normal') selected @endif>ปกติ</option>
                    <option value="canceled"  @if($data->status=='canceled') selected @endif>ยกเลิกการใช้</option>
                    <option value="lost"  @if($data->status=='lost') selected @endif>สูญหาย</option>
                </select>
            </div>
            @endif
        </div>        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
</form>
