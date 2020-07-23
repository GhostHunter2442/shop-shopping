<form id="saveForm" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <input type="hidden" name="id" value="{{ $invoice->id }}">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold w-25">รหัสสินค้า</td>
                <td>{{ $invoice->id }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold w-25">ผู้สั่งซื้อ</td>
                <td>{{ $user->name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold w-25">รายการสินค้า</td>

                <td>
                    @php($count=1)
                    @foreach ($products as $p)
                    {{$count}}. {{ str_limit($p->name,30)}} <span style="float: right; color:blue;font-weight:bold"> {{$p->qty}} รายการ</span>  <br>
                    @php($count++)
                    @endforeach
                </td>

            </tr>
            <tr>
                <td class="font-weight-bold w-25">ชำระเงิน</td>
                <td>{{ $invoice->statuspay }}</td>
            </tr>
            @if(!@empty($invoice->bank_id))
            <tr>
                <td class="font-weight-bold w-25">ธนาคาร</td>
                <td>   <img src="{{ asset('storage/images/bank/'.$bank->bankpic)}}" alt="" width="20"> {{$bank->name }} <br>
                 สาขา : {{$bank->subdetail }}<br>
                 ชื่อบัญชี : {{$bank->account }}<br>
                 เลขบัญชี : {{$bank->accountid }}
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold w-25">สลิป</td>
                <td>

                    {{-- <img src="{{ asset('storage/images/slipbank/'.$invoice->paypic)}}" alt="" width="50"> --}}

                    <div><img id="myView" style="display:none;"  src="{{ asset('storage/images/slipbank/'.$invoice->paypic)}}" alt="IceShake" width="250">
                    </div>
                    <div>
                    <a id="show-image">เเสดงหลังฐาน </a>
                    </div>


                </td>
            </tr>
            @endif
            @if(!@empty($invoice->payment_id))

            <tr>
                <td class="font-weight-bold w-25">payment ID</td>
                <td>{{$invoice->payment_id}}</td>
            </tr>
            @endif
            <tr>
                <td class="font-weight-bold w-25">ยอดชำระ</td>
                <td>{{number_format($invoice->price,2)}} บาท</td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
       <button type="submit" class="btn btn-primary ">รับ Order</button>
    </div>
</form>
<style>
    a{cursor:pointer;}
</style>
