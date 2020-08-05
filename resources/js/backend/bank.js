var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    var simplebar = new Nanobar();
    simplebar.go(60);
    /* handle tables */
    var table =  $('#bank-table').DataTable({
        language: {
            url: APP_LANG
        },
        serverSide: true,
        processing: false,
        ajax: APP_URL + '/bank/datatables',
        columns: [
                {data: 'id',name: 'id'},
                {data: 'name',name: 'name'},
                {data: 'bankpic',name: 'bankpic'},
                {data: 'detail',name: 'detail'},
                {data: 'subdetail',name: 'subdetail'},
                {data: 'account',name: 'account'},
                {data: 'accountid',name: 'accountid'},
                {data: 'status',name: 'status'},
                {data: 'id',name: 'id'},
        ],

        columnDefs: [

        {
            targets: 2,
            orderable: false,
            render: function (data, type, row) {
                 var dataBnakpic = '<img src="'+APP_IMG_BANK+row['bankpic']+'" alt="" width="40">';
                return dataBnakpic;
            },
        },
        {
            targets: 7,
            orderable: false,
            render: function (data, type, row) {
                var status = row['status']==='normal' ? 'primary' : 'danger';
                var strStatus = row['status']==='normal' ? 'ปกติ' :  'ยกเลิก';
                var dataStatus = '<span class="badge badge-'+status+'">'+strStatus+'</span>';
                return dataStatus;

            },
        },
        {
            targets: 8,
            orderable: false,
            render: function (data, type, row) {
                var dataName = row['name'];
                var btnEdit = '<a href="#" data-href="' + APP_URL + '/bank/form/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> แก้ไข</a> ';
                var btnDelete = '<a href="#" data-href="' + APP_URL + '/bank/delete/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
        }
    ]
    });
    simplebar.go(100);


    $('#ajaxModal').on('shown.bs.modal', function (e) {


        $('.select2').select2();
        var id = $('input[name=id]').val();

            $('#saveForm').validate({
                submitHandler: function (form) {
                    var id = $('input[name=id]').val();
                    var url = APP_URL + '/bank';
                    saveFormBank(id, url, table);
                },
                rules: {
                    name: {
                        required: true
                    },
                    detail: {
                        required: true
                    },
                    subdetail: {
                        required: true,

                    },
                    account: {
                        required: true,

                    },
                    accountid: {
                        required: true,

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

          var inputs = document.querySelectorAll('.file-picture')

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
              el.className += ' -chose'
              label.innerText = value
            }
          }
    });


    // /* handle delete */
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var url = $(this).data('href');
        var name = $(this).data('name');
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




});
