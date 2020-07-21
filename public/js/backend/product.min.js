var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    loadingCustom();

    /* handle tables */
    var table =  $('#product-table').DataTable({
        // processing: true,
        serverSide: true,
        ajax: APP_URL + '/product/datatables',
        columns: [
                {data: 'id',name: 'id'},
                {data: 'name',name: 'name'},
                {data: 'price',name: 'price'},
                {data: 'stock',name: 'stock'},
                {data: 'picture',name: 'picture'},
                {data: 'status',name: 'status'},
                {data: 'category_name',name: 'category_name'},
                {data: 'id',name: 'id'},
        ],

        columnDefs: [

        {
            targets:1,
            orderable: false,

            render: function (data, type, row) {
                var dataName = row['name'];
                return dataName;
            },
        },
        {
            targets: 2,
            orderable: false,

            render: function (data, type, row) {
                var dataPrice = row['price'];
                return dataPrice;
            },
        },
        {
            targets: 3,
            orderable: false,
            render: function (data, type, row) {
                var dataStock = row['stock'];
                return dataStock;
            },
        },
        {
            targets: 4,
            orderable: false,
            render: function (data, type, row) {
                 var dataPicture = '<img src="'+APP_IMG+row['picture']+'" alt="" width="60">';

                return dataPicture;
            },
        },
        {
            targets: 5,
            orderable: false,
            render: function (data, type, row) {
                var dataCat_name = row['category_name'];
                return dataCat_name;

            },
        },
        {
            targets: 6,
            orderable: false,
            render: function (data, type, row) {
                // var dataStatus = row['status'];

                var status = row['status']==='normal' ? 'primary' : 'danger';
                var strStatus = row['status']==='normal' ? 'ปกติ' :  'ยกเลิก';
                var dataStatus = '<span class="badge badge-'+status+'">'+strStatus+'</span>';

                return dataStatus;

            },
        },
        {
            targets: 7,
            orderable: false,
            render: function (data, type, row) {
                var dataName = row['name'];
                var btnEdit = '<a href="#" data-href="' + APP_URL + '/product/form/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> แก้ไข</a> ';
                var btnDelete = '<a href="#" data-href="' + APP_URL + '/product/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
        }
    ]
    });
    $.LoadingOverlay('hide');
    /* handle validate */
    $('#ajaxModal').on('shown.bs.modal', function (e) {

        $('#textarea').summernote();
        $('.select2').select2();
        var id = $('input[name=id]').val();
        $('#saveForm').on('submit', function(event){



          event.preventDefault();

            var url = APP_URL + '/product';
            var methodType ='post';
            var castUrl = (id) ? url + '/' + id :url;
            // alert(castUrl);
             $.ajax({
              url:castUrl,
              method:methodType,
              data: new FormData(this),
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
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
                    toastr[resp.status](resp.message, '', {
                        progressBar: true,
                        timeOut: 1500,
                        extendedTimeOut: 1500
                      });
                  }
              }
             })

        }).validate({
                     rules: {
                name: {
                    required: true
                },
                category_id: {
                    required: true
                },
                price: {
                    required: true,
                    // digits:true
                },
                stock: {
                    required: true,
                    // digits:true
                },

            },
            messages: {},
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass("error-block");
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent()); /* radio checkbox? */
                    } else if (element.hasClass('select2')) {
                        error.insertAfter(element.next('span')); /* select2 */
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
                    $(element).addClass('is-invalid').removeClass('is-valid');

                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
                    $(element).addClass('is-valid').removeClass('is-invalid');
                }
        });



    });

    /* handle delete */
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var url = $(this).data('href');
        var name = $(this).data('name');
        //   alert(name);
        var callback = function(){
            deleteForm(url, table);
        }

        confirmBox('ลบข้อมูล ' + name, callback);
      });


      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#previewHolder').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
    }
      var openModal = false;
     $('#ajaxModal').on('shown.bs.modal', function (e) {

        $('body').on('change', '#picture', function (e) {
            readURL(this);



      });
    });

    $('#ajaxModal').on('hidden.bs.modal', function (e) {
        openModal = false;
    });


    //   var openModal = false;
    //   $('#ajaxModal').on('shown.bs.modal', function (e) {
    //       $('body').on('change', '#file', function (e) {
    //           if(openModal) return false;
    //           openModal = true;
    //           e.preventDefault();
    //           loadingCustom();
    //           $.ajaxSetup({
    //               headers: {
    //                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //               }
    //           });

    //         //   var fileInput = document.getElementById('file');
    //         //   var file = fileInput.files[0];
    //         //   var formData = new FormData();
    //         //   formData.append('file', file);

    //           var form_data = new FormData();
    //           form_data.append('file', this.files[0]);
    //           $.ajax({
    //               url: APP_URL+'/product/uploadfile',
    //               data: form_data,
    //               type: 'POST',
    //               contentType: false,
    //               processData: false,
    //               success: function (resp) {
    //                   $.LoadingOverlay('hide');
    //                   if(resp.status==='success'){
    //                       alert(resp.data);
    //                       $('#picture').val(resp.data);
    //                     //   $('.btn-view-file').removeClass('invisible').addClass('visible');
    //                     //   $('.btn-view-file').attr('href', APP_LINK+resp.data);
    //                   } else {
    //                     //   showBox(resp.message.file[0], 'error');
    //                       toastr["warning"](resp.message.file[0],'warning', {
    //                         progressBar: true,
    //                         timeOut: 1500,
    //                         extendedTimeOut: 1500
    //                       });
    //                   }
    //               },
    //               error: function (xhr, textStatus, errorThrown) {
    //                   $.LoadingOverlay('hide');
    //                 //   showBox(textStatus, 'error', errorThrown);
    //                 toastr["error"](textStatus,errorThrown, {
    //                     progressBar: true,
    //                     timeOut: 1500,
    //                     extendedTimeOut: 1500
    //                   });

    //               }
    //           });
    //       });
    //   });

    //   $('#ajaxModal').on('hidden.bs.modal', function (e) {
    //     openModal = false;
    // });


});
