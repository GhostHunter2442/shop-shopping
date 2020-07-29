var app = new Vue({
    el: '#app',
    data: {
        data: {}
    }
});

( function ( $ ) {
    var simplebar = new Nanobar();
    simplebar.go(100);

    var month = new Array();
    month['ม.ค.'] = "01";
    month['ก.พ.'] = "02";
    month['มี.ค.'] = "03";
    month['เม.ย.'] = "04";
    month['พ.ค.'] = "05";
    month['มิ.ย.'] = "06";
    month['ก.ค.'] = "07";
    month['ส.ค.'] = "08";
    month['ก.ย.'] = "09";
    month['ต.ค.'] = "10";
    month['พ.ย.'] = "11";
    month['ธ.ค.'] = "12";
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }


    $('body').on('click', '.btn-search', function (e) {

        var e_month = document.getElementById("selectmonth");
        var month_e = e_month.options[e_month.selectedIndex].value;

        var new_month = month[month_e];

        var e_year = document.getElementById("selectyear");
        var year_e = e_year.options[e_year.selectedIndex].value;

        dataTable.tableTopbank(new_month,year_e);




    });


    var dataTable={
        tableTopbank: function (month,year) {
            var table =  $('#topbank-table').DataTable({
                language: {
                    url: APP_LANG
                },
                serverSide: true,
                destroy: true,
                processing: false,
                ajax: APP_URL + '/reportdetail/datatables/'+year+'/'+month,
                columns: [
                        {data: 'detail',name: 'detail'},
                        {data: 'total',name: 'total'},
                     ],
                     columnDefs: [

                        {
                            targets: 1,
                            orderable: false,
                            render: function (data, type, row) {
                                 var dataTatol =  numberWithCommas(row['total']);
                                return dataTatol;
                            },
                        },
                    ]

            });
        },
    };

    $('.select2').select2();
    dataTable.tableTopbank(0,0);
   

} )( jQuery );
