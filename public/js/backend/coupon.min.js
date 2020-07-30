var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [day, month, year].join('/');
}

$(document).ready(function () {
    var simplebar = new Nanobar();
    simplebar.go(60);
    /* handle tables */
    var table = $('#coupon-table').DataTable({
        language: {
            url: APP_LANG
        },
        serverSide: true,
        processing: false,
        ajax: APP_URL + '/coupon/datatables',
        columns: [{
                data: 'code',
                name: 'code'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'percen',
                name: 'percen'
            },
            {
                data: 'discount',
                name: 'discount'
            },
            {
                data: 'end_datetime',
                name: 'end_datetime'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'id',
                name: 'id'
            },

        ],
        columnDefs: [
            {
                targets: 4,
                orderable: false,
                render: function (data, type, row) {
                    var end_datetime =formatDate(row['end_datetime']) ;
                    // var end_datetime =row['end_datetime'];

                    return end_datetime;

                },
             },
            {
                targets: 5,
                orderable: false,
                render: function (data, type, row) {
                    var status = row['status']==='normal' ? 'primary' : 'danger';
                    var strStatus = row['status']==='normal' ? 'ปกติ' :  'ยกเลิก';
                    var dataStatus = '<span class="badge badge-'+status+'">'+strStatus+'</span>';
                    return dataStatus;

                },
             },
            {
            targets: 6,
            orderable: false,
            render: function (data, type, row) {
                var dataName = row['name'];
                var btnEdit = '<a href="#" data-href="' + APP_URL + '/coupon/form/' + data + '" data-modal-name="ajaxModal" role="button" data-id="' + data + '" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> แก้ไข</a> ';
                var btnDelete = '<a href="#" data-href="' + APP_URL + '/coupon/' + data + '" data-id="' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
                return btnEdit + btnDelete;
            },
         }
    ]
    });
    simplebar.go(100);
    /* handle validate */
    $('#ajaxModal').on('shown.bs.modal', function (e) {

        $('.duallistbox').bootstrapDualListbox();
        $('#end_datetime').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'MM/DD/YYYY '
              }
        });
        $('#saveForm').validate({
            submitHandler: function (form) {
                var id = $('input[name=id]').val();
                var url = APP_URL + '/coupon';

                saveForm(id, url, table);
            },
            rules: {
                name: {
                    required: true
                },
                percen: {
                    required: true
                },
                discount: {
                    required: true
                },
                code: {
                    required: true
                },
                end_datetime: {
                    required: true
                }
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
        var callback = function(){
            deleteForm(url, table);
        }

        confirmBox('ลบข้อมูล ' + name, callback);
    });
});
