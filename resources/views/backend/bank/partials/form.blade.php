<form id="saveForm" method="post" enctype="multipart/form-data" >

    @csrf
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
                <label for="name">ชื่อธนาคาร
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="detail">รายละเอียด
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="detail" value="{{ $data->detail }}" class="form-control">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="subdetail">สาขา
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="subdetail" value="{{ $data->subdetail }}" class="form-control">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="account">บัญชีธนาคาร
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="account" value="{{ $data->account }}" class="form-control">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="accountid">เลขบัญชี
                    <span class="text-danger"></span>
                </label>
                <input type="text" name="accountid" value="{{ $data->accountid }}" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="picture">รูปภาพ</label>
                <input type="file" name="picture" id="picture" class="form-control-file">
                <br>
                <a  target="_blank" role="button" class="btn btn-view-file btn-sm
                    @if(empty($data->bankpic)) invisible @else visible @endif">  @if(!empty($data->bankpic))
                  <img  id="previewHolder"  src="{{ asset('storage/images/bank/'.$data->bankpic) }} " width="70"> @endif
                 </a>
                <img id="previewHolder" width="70">
            </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4 col-sm-12">
            <label for="status">สถานะ</label>
            <select name="status" class="form-control select2">
                <option value="normal" @if($data->status=='normal') selected @endif>ปกติ</option>
                <option value="canceled"  @if($data->status=='canceled') selected @endif>ยกเลิก</option>

            </select>
        </div>
    </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary upload-image">บันทึก</button>
    </div>
</form>





