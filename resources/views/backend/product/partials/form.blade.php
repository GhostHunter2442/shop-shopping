{{-- <form id="saveForm" method="post" enctype="multipart/form-data" >
    @csrf --}}
    {!! Form::open(['novalidate','id' => 'saveForm','method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
    {{-- <form id="saveForm" method="POST" id="needs" novalidate enctype="multipart/form-data">
        {{csrf_field()}} --}}

    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-8">
                <label for="name">ชื่อสินค้า
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-8">
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
            <div class="form-group col-md-5 col-sm-8">
                <label for="slug">slug
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="slug" value="{{ $data->slug }}" class="form-control">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3 col-sm-6">
                <label for="stock">จำนวน
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="stock" value="{{ $data->stock }}" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label for="weight">น้ำหนัก kg
                    <span class="text-danger"></span>
                </label>
                <input type="text" name="weight" value="{{ $data->weight }}" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label for="price">ราคา
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="price" value="{{ $data->price }}" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label for="discount">ส่วนลด %
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="discount" value="{{ $data->discount }}" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="textarea">รายละเอียดสินค้า</label>
                <div class="mb-2">
                  <textarea class="textarea" id="detail"  name="detail" style="display:none;" >

                  {{ $data->detail }}
                </textarea>
                </div>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="picture">รูปภาพหลัก</label>
                <input type="file" name="picture" id="picture" class="form-control-file">
                <br>
                <a  target="_blank" role="button" class="btn btn-view-file btn-sm
                    @if(empty($data->picture)) invisible @else visible @endif">  @if(!empty($data->picture))
                  <img  id="previewHolder"  src="{{ asset('storage/images/resize/'.$data->picture) }} " width="70"> @endif
                 </a>
                {{-- <input type="hidden" name="picture" value="{{ $data->picture }}" id="picture"> --}}
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





