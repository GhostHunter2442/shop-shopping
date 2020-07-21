<form id="saveForm" method="post" enctype="multipart/form-data" >

    @csrf
 
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">ชื่อสินค้า
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="category_id">ประเภท
                    <span class="text-danger">*</span>
                </label>
                <select name="category_id" class="select2 form-control" >
                    @if(empty($data->id))
                    <option value="">เลือกประเภทสินค้า</option>
                    @endif @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id==$data->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary upload-image">บันทึก</button>
    </div>
</form>





