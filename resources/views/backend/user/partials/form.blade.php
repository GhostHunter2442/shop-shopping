<form id="saveForm" method="post" autocomplete="off">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label for="username">Username
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="email" value="{{ $data->email }}" class="form-control" autocomplete="off">
        </div>

       <div class="form-row">
           @if (!empty($data->id))
           <div class="form-group col-md-4 col-sm-12">
            <label for="password">รหัสผ่านเดิม
                <span class="text-danger">*</span>
            </label>
            <input type="password" id="password_old" name="password_old" value="" class="form-control" autocomplete="off">
        </div>
           @endif

            <div class="form-group col-md-4 col-sm-12">
                <label for="password">รหัสผ่าน
                    <span class="text-danger">*</span>
                </label>
                <input type="password" id="password" name="password" value="" class="form-control" autocomplete="off">
            </div>
            <div class="form-grup col-md-4 col-sm-12">
                <label for="re_password">รหัสผ่านอีกครั้ง
                    <span class="text-danger">*</span>
                </label>
                <input type="password" name="re_password" value="" class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-grup col-md-6 col-sm-12">
                <label for="name">ชื่อ
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" autocomplete="off">
            </div>
            <div class="form-grup col-md-6 col-sm-12">
                <label for="userrole">ประเภท
                    <span class="text-danger">*</span>
                </label>
                <select name="userrole" class="form-control">
                    @if(empty($data->id))
                    <option value="">เลือกประเภท</option>
                    @endif
                    @foreach($rolename as $rolename)
                    <option value="{{ $rolename->id}}" @if($rolename->id==$data->userrole) selected @endif>{{ $rolename->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>


      <br>


            <div class="form-group">
            <label for="userrole">เข้าถึงข้อมูล   <span class="text-danger">(กำหนดสิทธิ)</span></label>
        <div class="row">

            <div class="col-sm-4">


                <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox"   name="readToppic[]"  id="readSales" value="1" {{in_array(1,$permissions)? 'checked': ''}}>
                  <label for="readSales" class="custom-control-label">ซื้อสินค้า</label>
                </div>
            {{-- {{var_dump($permissions)}} --}}
            {{-- {{var_dump(in_array(1,$permissions))}} --}}

            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="readToppic[]" id="readCategory" value="2" {{in_array(2,$permissions)? 'checked': ''}}>
                <label for="readCategory" class="custom-control-label">ประเภทสินค้า</label>
            </div>


            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox"  name="readToppic[]"  id="readProduct" value="3" {{in_array(3,$permissions)? 'checked': ''}}>
                <label for="readProduct" class="custom-control-label">สินค้า</label>
                </div>
            </div>
            </div>

            <div class="col-sm-4">
                <!-- checkbox -->
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="readToppic[]" id="read_AcceptOrder"  value="4" {{in_array(4,$permissions)? 'checked': ''}}>
                    <label for="read_AcceptOrder" class="custom-control-label">รับ Order</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"   name="readToppic[]" id="readPreSent" value="5"  {{in_array(5,$permissions)? 'checked': ''}}>
                    <label for="readPreSent" class="custom-control-label">เตรียมจัดส่ง</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="readToppic[]" id="readSent"  value="6" {{in_array(6,$permissions)? 'checked': ''}}>
                      <label for="readSent" class="custom-control-label">รายการจัดส่ง</label>
                    </div>
                </div>
              </div>
              <div class="col-sm-4">
                <!-- checkbox -->
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="readToppic[]"  id="readReport" value="7" {{in_array(7,$permissions)? 'checked': ''}}>
                    <label for="readReport" class="custom-control-label">Dashboard รายงาน</label>
                  </div>

                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="readToppic[]"  id="readCoupon" value="8" {{in_array(8,$permissions)? 'checked': ''}}>
                      <label for="readCoupon" class="custom-control-label">คูปองส่วนลด</label>
                    </div>
                  </div>
              </div>
        </div>
          </div>

  </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
</form>
