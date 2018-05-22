@verbatim
<div class="modal fade custom-modal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="saveForm">
                <input type="hidden" v-model="data.id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ data.name | setTitle }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">ชื่อเอกสาร
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" v-model="data.name" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endverbatim
