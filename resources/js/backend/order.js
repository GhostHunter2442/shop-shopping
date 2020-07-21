var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    loadingCustom();



    /* handle tables */
    var table =  $('#order-table').DataTable({
        // dom: "Bfrtip",
        // processing: true,
        serverSide: true,
        ajax: APP_URL + '/invoice/order/datatables',
        columns: [
                {data: 'id',name: 'id'},
                {data: 'name_sent',name: 'name_sent'},
                {data: 'track_code',name: 'track_code'},
                {data: 'status_order,track_code',name: 'status_order'},

        ],

        columnDefs: [

        {
            targets:1,
            orderable: false,

            render: function (data, type, row) {
                var dataProduct = row['name_sent'];
                return dataProduct;
            },
        },
        {
            targets: 2,
            orderable: false,
            render: function (data, type, row) {
                var dataTrack = row['track_code'];
                return dataTrack;

            },
        },
        {
            targets: 3,
            orderable: false,
            render: function (data, type, row) {
                // var dataStatus = row['status_order'];

                var dataStatus = '<span class="badge badge-success">จัดส่งเเล้ว</span>&nbsp';
                var dataTrack =  '<i class="fa fa-plus"></i> <span class="badge badge-warning">เเจ้งเลขพัสดุ</span>';
                if(row['track_code'] !='-'){
                    return dataStatus;
                }
                else{
                    return dataStatus+dataTrack;
                }

            },
        },

    ]
    });
    $.LoadingOverlay('hide');


    $('#order-table').on('draw.dt', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#order-table').Tabledit({
         url: APP_URL + '/invoice/order_file/action',
         dataType:'json',
         deleteButton: false,
         saveButton: false,
         autoFocus: false,
         columns:{
          identifier : [0, 'id'],
          editable:[[2, 'track_code']]
         },
          buttons: {
        edit: {
            class: 'btn btn-outline-info btn-sm btn-edit',
            html: '<i class="fa fa-exchange"></i> &nbsp เลขพัสดุ',
            action: 'edit'
        },

    },
         restoreButton:false,
         onSuccess:function(data, textStatus, jqXHR)
         {
            table.ajax.reload();
             toastr[data.status](data.message, '', {
                    progressBar: true,
                    timeOut: 1500,
                    extendedTimeOut: 1500
                  });

         }
        });
       });


       $('body').on('click', '.btn-exporttrack', async function (event) {

        var url = $(this).data('href');
        // alert(url);

        window.location.href = url;

        var methodType ='GET';
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    await $.ajax({
          url:url,
          method:methodType,
          data: 1,
          success:function(resp)
          {


          }
         })


    });

    var inputs = document.querySelectorAll('.file-input')

    for (var i = 0, len = inputs.length; i < len; i++) {
      customInput(inputs[i])
    }

    function customInput (el) {
      const fileInput = el.querySelector('[type="file"]')
      const label = el.querySelector('[data-js-label]')

      fileInput.onchange =
      fileInput.onmouseout = function () {
        if (!fileInput.value) return

        var value = fileInput.value.replace(/^.*[\\\/]/, '')
        el.className += ' -chosen'
        label.innerText = value
      }
    }


        const progressBarFill = document.querySelector("#progressBar > .progress-bar-fill");
        const progressBarText = progressBarFill.querySelector(".progress-bar-text");

        var progressBar = document.getElementById("progressBar");
           var upload_btn = document.getElementById("uploadSubmit");
            var loading_btn = document.getElementById("loading_btn");


        $('#saveForm').on('submit', function(event){

            upload_btn.classList.add("d-none");
            loading_btn.classList.remove("d-none");
            progressBar.classList.remove("d-none");

         event.preventDefault();
         var url = APP_URL + '/invoice/order_file/import';
         var methodType ='post';
         $.ajax({
             xhr: function() {
                 var xhr = new window.XMLHttpRequest();
                 xhr.upload.addEventListener("progress", evt => {
                     // console.log(evt);
                     const percent = evt.lengthComputable ?  Math.floor((evt.loaded / evt.total) * 100)  :0;
                                 progressBarFill.style.width = percent.toFixed(0) + "%";
                                 progressBarText.textContent = percent.toFixed(0) + "%";

                                //  progressBarFill.setAttribute("style",`width: ${Math.floor(percent)}+%`);
                                //  progressBarText.innerText=`${Math.floor(percent)}% `;
                 }, false);
                 return xhr;
             },
             url:url,
             method:methodType,
             data: new FormData(this),
             contentType: false,
             cache:false,
             processData: false,
             dataType:"json",
             success:function(resp)
             {

                 if(resp.status=='success'){
                    table.ajax.reload();
                       $('#uploadStatus').html('<p style="color:#28A74B;">อัพโหลดไฟล์เรียบร้อย</p>');

                      $('#saveForm')[0].reset();

                        //  loading_btn.classList.add("d-none");
                          upload_btn.classList.remove("d-none");
                          loading_btn.classList.add("d-none");

                   }
                  else{
                     // toastr[resp.status](resp.message.select_file, '', {
                     //     progressBar: true,
                     //     timeOut: 1500,
                     //     extendedTimeOut: 1500
                     //   });
                       $('#saveForm')[0].reset();
                       $('#uploadStatus').html('<p style="color:#EA4335;">'+resp.message.select_file+'.</p>');

                       upload_btn.classList.remove("d-none");
                       loading_btn.classList.add("d-none");
                   }
             }
            //  ,
            //  error: function (jqXHR, textStatus, errorThrown) {
            //     toastr["warning"]('มีเลขพัสดุที่ลงทะเบียนเเล้ว',errorThrown, {
            //         progressBar: true,
            //         timeOut: 1500,
            //         extendedTimeOut: 1500
            //       });
            //       $('#saveForm')[0].reset();
            //       upload_btn.classList.remove("d-none");
            //       loading_btn.classList.add("d-none");

            // }
            })
       });
});

