/* init select2, datepicker */
$('.modal').on('shown.bs.modal', function(e){
    // $('.select2').select2({
    //     theme: 'bootstrap4'
    // });

    // $('.datepicker').datepicker({
    //     format: 'dd/mm/yyyy',
    //     autoclose: true,
    //     todayHighlight: true
    // });
});
  //Timepicker


/* handle active menu */
var url = window.location;
var suburl = url.href.replace(/\/(creat(\S+)|edit(\S+))/g,'');

/* for sidebar menu entirely but not cover treeview */
$('li.submenu a').filter(function () {
    return this.href == suburl;
}).addClass('active subdrop');

/* valid alpha */
jQuery.validator.addMethod('alphanumeric', function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, 'ระบุเฉพาะตัวอักษร a-z, 0-9 และ _ เท่านั้น');

/* handle modal form */
$('body').on('click', '.btn-create', function (e) {
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
});
$('body').on('click', '.btn-edit', function (e) {
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
});

$('#ajaxModal').on('hidden.bs.modal', function () {
    $('.modal-content').empty();
    $(this).removeData('bs.modal');
});

$('#ajaxModal').on('shown.bs.modal', function (e) {
    $.LoadingOverlay('hide');
});

$('body').on('click', '.btn-edit', function () {
    loadingCustom();
    $.LoadingOverlay('hide');
});

$('body').on('click', '.btn-create', function () {
    loadingCustom();
    $.LoadingOverlay('hide');


});




var loadingCustom = function () {
    $.LoadingOverlay('show', {
        size : 20,
        image: '',
        fontawesome: 'fa fa-spinner fa-spin',
        background: 'rgba(0, 0, 0, 0.6)',
        fontawesomeColor: '#ffffff'
    });
}

var modalShow = function (e, link, modalName) {
    e.preventDefault();
    $.get(link, function (data) {
        $('#' + modalName).find('.modal-content').html(data);
        $('#' + modalName).modal('show');
    });
}

var showBox = function (title, type, text = '') {
    swal({
        position: 'top-right',
        type: type,
        title: title,
        html: text,
        showConfirmButton: false,
        timer: 1500
    })
}

var confirmBox = function (text, callback = '') {
    Swal.fire({
        title: 'ยืนยันการทำรายการ?',
        text: text,
        // icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        allowOutsideClick: false
    }).then(function (result) {
        if (result.value) {
            callback();
        }
    }).catch(swal.noop);
};

var saveForm = function (id, url, table) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = $('#saveForm').serialize();
    var methodType = 'post';
    var castUrl = (id) ? url + '/' + id : url+'/insert';
    $.ajax({
        url: castUrl,
        type: methodType,
        data: formData,
        success: function (resp) {
            // alert('6666');
            toastr[resp.status](resp.message, '', {
                progressBar: true,
                timeOut: 1500,
                extendedTimeOut: 1500
              });
            $('#ajaxModal').modal('hide');
            table.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            toastr["error"](textStatus,errorThrown, {
                progressBar: true,
                timeOut: 1500,
                extendedTimeOut: 1500
              });

        }
    });
}
var saveFormProduct = function (id, url, table) {
    var form = $('#saveForm')[0];
    var formData = new FormData(form);

//File data
var file_data = $('input[name="picture"]')[0].files;
for (var i = 0; i < file_data.length; i++) {
    formData.append("picture", file_data[i]);
}
   var methodType ='post';
    var castUrl = (id) ? url + '/' + id : url+'/insert';

     $.ajax({
      url:castUrl,
      type: methodType,
      processData: false,
      contentType: false,
      data: formData,
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
     });
}

var saveFormBank = function (id, url, table) {
    var form = $('#saveForm')[0];
    var formData = new FormData(form);

//File data
var file_data = $('input[name="picture"]')[0].files;
for (var i = 0; i < file_data.length; i++) {
    formData.append("picture", file_data[i]);
}
   var methodType ='post';
    var castUrl = (id) ? url + '/' + id : url+'/insert';

     $.ajax({
      url:castUrl,
      type: methodType,
      processData: false,
      contentType: false,
      data: formData,
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
     });
}


var deleteForm = function(url, table) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function () {
        $.ajax({
            url: url,
            type: 'post',
            success: function (resp) {
                toastr[resp.status](resp.message, '', {
                    progressBar: true,
                    timeOut: 1500,
                    extendedTimeOut: 1500
                  });

                table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                      // showBox(textStatus, 'error', errorThrown);
                      toastr["error"]('รายการสินค้าถูกใช้งาน',errorThrown, {
                        progressBar: true,
                        timeOut: 1500,
                        extendedTimeOut: 1500
                      });

            }
        });
    }, 100);
}
