var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

$(document).ready(function () {

    var simplebar = new Nanobar();
    simplebar.go(60);
    /* handle tables */
    var table =  $('#preorder-table').DataTable({
        language: {
            url: APP_LANG
        },
        serverSide: true,
        processing: false,
        ajax: APP_URL + '/invoice/preorder/datatables',
        order: [
            [0, 'desc'] //เรียงขอมูลล่าสุดขึ้นก่อน
        ],
        columns: [
                {data: 'id',name: 'id'},
                {data: 'iuser_named',name: 'user_name'},
                {data: 'paymentid',name: 'paymentid'},
                {data: 'bank_name',name: 'bank_name'},
                {data: 'price',name: 'price'},
                {data: 'status_order',name: 'status_order'},
                {data: 'id',name: 'id'},
        ],


        columnDefs: [

        {
            targets:1,
            orderable: false,

            render: function (data, type, row) {
                var dataProduct = row['user_name'];
                return dataProduct;
            },
        },
        {
            targets: 2,
            orderable: false,

            render: function (data, type, row) {
                var dataPaystatus = row['paymentid']==='1' ? 'ผ่านธนาคาร' : row['paymentid']==='2' ? 'เก็บเงินปลายทาง' :  'ผ่านบัตรเครดิต';

                return dataPaystatus;
            },
        },
        {
            targets: 3,
            orderable: false,
            render: function (data, type, row) {
                if(data ===''){

                    if(row['paymentid']==='2'){
                        var dataBank='<img   src="'+APP_IMG_BANK+'cod.png" alt="" width="50">' ;
                    }
                    else{
                        var dataBank='<img   src="'+APP_IMG_BANK+'craditcart.png" alt="" width="50">' ;
                    }
                 }
                 else{
                    var dataBank='<img   src="'+APP_IMG_BANK+row.bank_name+'" alt="" width="40">' ;
                 }
                return dataBank;
            },
        },

        {
            targets: 4,
            orderable: false,
            render: function (data, type, row) {
                var dataPrice = numberWithCommas(row['price']);
                return dataPrice;

            },
        },
        {
            targets: 5,
            orderable: false,
            render: function (data, type, row) {
                // var dataStatus = row['status_order'];
                var status = 'info';
                var strStatus = 'เตรียมจัดส่ง';
                var dataStatus = '<span class="badge badge-'+status+'">'+strStatus+'</span>';

                return dataStatus;

            },
        },
        {
            targets: 6,
            orderable: false,
            render: function (data, type, row) {
                //  var dataId = row['id'];
                var btnExport = '<a href="#" data-href="' + APP_URL + '/invoice/order_file/getexport/' + data + '" role="button" data-id="' + data + '" class="btn btn-outline-success btn-sm btn-export"><i class="fa fa-paper-plane-o"></i> จัดส่ง</a> ';
                return btnExport ;
            },
        }
    ]
    });
    simplebar.go(100);
     $('body').on('click', '.btn-exportall', async function (e) {
        var url = $(this).data('href');

        window.location.href = APP_URL+url;
        var url_all=APP_URL+url+'/all';
        var methodType ='GET';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


    await $.ajax({
          url:APP_URL+url,
          method:methodType,
          data: 1,
          success:function(resp)
          {
              if(resp!=''){
                var id=1;
              }

        Swal.fire({
            title: 'ต้องการจัดส่งสิ้นค้าทั้งหมด?',
            showCancelButton: true,
            confirmButtonColor: '#62cfc1',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',

            }).then((result) => {
            if (result.value) {
                $.ajax({
                url:url_all,
                method:"POST",
                data: {
                    id: id,
                  },
                success:function(resp)
                {
                    table.ajax.reload();

                }
               })
            }else {
                table.ajax.reload();
            }
            })

          }
         })



    });

    $('body').on('click', '.btn-export', function (e) {

        var url = $(this).data('href');
        var id = $(this).data('id');
        window.location.href = url;
        // alert(url);
        var methodType ='GET';
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

         $.ajax({
          url:url,
          method:methodType,
          data: id,
          success:function(resp)
          {
            table.ajax.reload();

            //   if(resp.status=='success'){
            //     toastr[resp.status](resp.message, '', {
            //         progressBar: true,
            //         timeOut: 1500,
            //         extendedTimeOut: 1500
            //       });
            //         $('#ajaxModal').modal('hide');
            //         table.ajax.reload();

            //   }
            //  else{
            //     toastr[resp.status](resp.message, '', {
            //         progressBar: true,
            //         timeOut: 1500,
            //         extendedTimeOut: 1500
            //       });
            //   }
          }
         })

    });





});
