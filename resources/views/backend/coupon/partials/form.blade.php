<form id="saveForm" method="post">
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
                <label for="code">code
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="code" value="{{ $data->code }}" class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">ชื่อโปรโมชั่น
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="percen">ส่วนลด %
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="percen" value="{{ $data->percen }}" class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="discount">ลดสูงสุด
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="discount" value="{{ $data->discount }}" class="form-control">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                {{-- <label for="end_datetime">หมดโปรโมชั่น
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="end_datetime" value="{{ $data->end_datetime }}" class="form-control"> --}}
                <div class="form-group">
                    <label for="end_datetime">หมดโปรโมชั่น
                        <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                      </div>

                      <input type="text" class="form-control float-right" name="end_datetime" value="{{ $data->end_datetime->format('m/d/Y' )}}" id="end_datetime">
                    </div>
                    <!-- /.input group -->
                  </div>
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
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
</form>
{{-- @section('footerscript')

<script>

</script>
@endsection --}}

