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
    var table =  $('#product-table').DataTable({
        language: {
            url: APP_LANG
        },
        serverSide: true,
        processing: false,
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
                var dataPrice = numberWithCommas(row['price']);
                return dataPrice;
            },
        },
        {
            targets: 3,
            orderable: false,
            render: function (data, type, row) {
                 if(row['stock']==0){
                    var dataStock = row['stock']+'<div class="progress progress-xs"><div class="progress-bar bg-danger" style="width: 55%"></div></div>';
                 }else if(row['stock']==1){
                    var dataStock = row['stock']+'<div class="progress progress-xs"><div class="progress-bar bg-warning" style="width: 55%"></div></div>';
                 }else{
                    var dataStock = row['stock'];
                 }

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
                var btnDelete = '<a href="#" data-href="' + APP_URL + '/product/delete/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
        }
    ]
    });
    simplebar.go(100);


    $('#ajaxModal').on('shown.bs.modal', function (e) {
        var myElement = $('#detail');

        myElement.summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']]
              ],
            height: 50,
            minHeight: 100,
            codemirror: {
              theme: 'paper'
            }
     });

        $('.select2').select2();
        var id = $('input[name=id]').val();
           //   event.preventDefault();

            $('#saveForm').validate({
                submitHandler: function (form) {
                    var id = $('input[name=id]').val();
                    var url = APP_URL + '/product';
                    saveFormProduct(id, url, table);
                },
                 ignore: ":hidden, [contenteditable='true']:not([detail])",
                  rules: {
                    name: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    stock: {
                        required: true,
                        digits:true

                    },
                    weight: {
                        number: true

                    },
                    discount: {
                        digits:true

                    },
                    slug:{
                       required: true,
                        remote: {
                            url: APP_URL + '/product/check_slug',
                            type: 'get',
                            data: {
                                slug: function () {
                                    return $('input[name=slug]').val();
                                },
                                id: $('input[name=id]').val()
                            }
                        }

                    }
                },

                messages: {
                    slug: {
                        remote: 'slug "{0}" ถูกใช้แล้ว กรุณาระบุค่าใหม่'
                    },
                },
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


      function readURL(input,id) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
                 if(id==0){
                    $('#previewHolder').attr('src', e.target.result);
                 }
                 else if(id==1){
                    $('#previewHolder_one').attr('src', e.target.result);
                 }
                 else if(id==2){
                    $('#previewHolder_two').attr('src', e.target.result);
                 }
                 else{
                    $('#previewHolder_three').attr('src', e.target.result);
                 }
          }

          reader.readAsDataURL(input.files[0]);
        }
    }
      var openModal = false;
     $('#ajaxModal').on('shown.bs.modal', function (e) {

        $('body').on('change', '#picture', function (e) {
            readURL(this,0);

        });
        $('body').on('change', '#picture_detail_one', function (e) {
            readURL(this,1);

        });
        $('body').on('change', '#picture_detail_two', function (e) {
            readURL(this,2);

        });
        $('body').on('change', '#picture_detail_three', function (e) {
            readURL(this,3);

        });
    });

    $('#ajaxModal').on('hidden.bs.modal', function (e) {
        openModal = false;
    });



});
