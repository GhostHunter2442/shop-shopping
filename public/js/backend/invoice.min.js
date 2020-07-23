var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    loadingCustom();

    /* handle tables */
    var table =  $('#invoice-table').DataTable({
        // processing: true,
        serverSide: true,
        ajax: APP_URL + '/invoice/datatables',
        columns: [
                {data: 'id',name: 'id'},
                {data: 'iuser_named',name: 'user_name'},
                {data: 'paymentid',name: 'paymentid'},
                {data: 'bank_name',name: 'bank_name'},
                {data: 'price',name: 'price'},
                {data: 'payment_id',name: 'payment_id'},
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
                var dataPrice = row['price'];
                return dataPrice;

            },
        },
        {
            targets: 5,
            orderable: false,
            render: function (data, type, row) {
                if(data == null){
                    var dataPayID ='-';
                }
                else{
                    var dataPayID = row['payment_id'];
                }

                return dataPayID;

            },
        },
        {
            targets: 6,
            orderable: false,
            render: function (data, type, row) {

                var status = row['status_order']==='1' ? 'primary':row['status_order']==='2' ? 'warning' : 'danger';
                var strStatus = row['status_order']==='1' ? 'สั่งซื้อ' : row['status_order']==='2' ? 'จัดส่ง' :  'ยกเลิก';
                var dataStatus = '<span class="badge badge-'+status+'">'+strStatus+'</span>';

                return dataStatus;

            },
        },
        {
            targets: 7,
            orderable: false,
            render: function (data, type, row) {
                var btnEdit = '<a href="#" data-href="' + APP_URL + '/invoice/view/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-folder-open"></i> รับ Order</a> ';

                return btnEdit ;
            },
        }
    ]
    });
    $.LoadingOverlay('hide');
    /* handle validate */
       $('#ajaxModal').on('shown.bs.modal', function (e) {

        $('#saveForm').on('submit', function(event){
            var id = $('input[name=id]').val();

          event.preventDefault();
          var url = APP_URL + '/invoice';
          var methodType ='post';
          var castUrl =  url + '/' + id;
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

           $.ajax({
            url:castUrl,
            method:methodType,
            data: id,
            success:function(resp)
            {
                if(resp.status=='success'){
                  toastr[resp.status](resp.message, '', {
                      progressBar: true,
                      timeOut: 1500,
                      extendedTimeOut: 1500
                    });
                      $('#ajaxModal').modal('hide');
                      table.ajax.reload();

                }
               else{
                  toastr[resp.status](resp.message.file[0], '', {
                      progressBar: true,
                      timeOut: 1500,
                      extendedTimeOut: 1500
                    });
                }
            }
           })
        })
    });



});
