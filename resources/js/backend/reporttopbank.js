var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});
$(document).ready(function () {
    loadingCustom();
    $('.select2').select2();
    /* handle tables */
    var table =  $('#topbank-table').DataTable({
        serverSide: true,
        ajax: APP_URL + '/reportdetail/datatables',
        columns: [
                {data: 'detail',name: 'detail'},
                {data: 'total',name: 'total'},
             ]

    });
    $.LoadingOverlay('hide');

    $('body').on('click', '.btn-search', function (e) {

        var e_month = document.getElementById("selectmonth");
        var month = e_month.options[e_month.selectedIndex].value;

        var e_year = document.getElementById("selectyear");
        var year = e_year.options[e_year.selectedIndex].value;



      console.log(month+year);

    });





});
