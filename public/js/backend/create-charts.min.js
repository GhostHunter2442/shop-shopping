( function ( $ ) {

    var d = new Date();
    var month = new Array();
    month[0] = "มกราคม";
    month[1] = "กุมภาพันธ์";
    month[2] = "มีนาคม";
    month[3] = "เมษายน";
    month[4] = "พฤษภาคม";
    month[5] = "มิถุนายน";
    month[6] = "กรกฎาคม";
    month[7] = "สิงหาคม";
    month[8] = "กันยายน";
    month[9] = "ตุลาคม";
    month[10] = "พฤศจิกายน";
    month[11] = "ธันวาคม";
    var n_year = month[d.getMonth()];

    function intToString (value) {
        var suffixes = ["", "k", "m", "b","t"];
        var suffixNum = Math.floor((""+value).length/3);
        var shortValue = parseFloat((suffixNum != 0 ? (value / Math.pow(1000,suffixNum)) : value).toPrecision(2));
        if (shortValue % 1 != 0) {
            shortValue = shortValue.toFixed(1);
        }
        return shortValue+suffixes[suffixNum];
    }


    let myLineChartyear;
    let myLineChartmont;
    let myLineChartLastmont;

    let pieChartYear;
    let pieChartMonth;
    let pieChartLastMonth;

    let pieChartTopYear;
    let pieChartTopMonth;
    let pieChartTopLastMonth;
    $('body').on('click', '.btn-years',  function (event) {

        if (typeof myLineChartmont !== 'undefined') {
            myLineChartmont.destroy();
        }
        if (typeof myLineChartLastmont !== 'undefined') {
            myLineChartLastmont.destroy();
        }


        if (typeof pieChartMonth !== 'undefined') {
            pieChartMonth.destroy();
        }
        if (typeof pieChartLastMonth !== 'undefined') {
            pieChartLastMonth.destroy();
        }


        if (typeof pieChartTopMonth !== 'undefined') {
            pieChartTopMonth.destroy();
        }
        if (typeof pieChartTopLastMonth !== 'undefined') {
            pieChartTopLastMonth.destroy();
        }

        charts_year.init();
        charts_pieyear.init();
        charts_pietopyear.init();
         chart_talbel.tablePrice(1);

    });
    $('body').on('click', '.btn-monthly',  function (event) {



        if (typeof myLineChartyear !== 'undefined') {
            myLineChartyear.destroy();
        }
        if (typeof myLineChartLastmont !== 'undefined') {
            myLineChartLastmont.destroy();
        }


        if (typeof pieChartYear !== 'undefined') {
            pieChartYear.destroy();
        }
        if (typeof pieChartLastMonth !== 'undefined') {
            pieChartLastMonth.destroy();
        }

        if (typeof pieChartTopYear !== 'undefined') {
            pieChartTopYear.destroy();
        }
        if (typeof pieChartTopLastMonth !== 'undefined') {
            pieChartTopLastMonth.destroy();
        }


      charts_mont.init();
      charts_piemonth.init();
      charts_pietopmonth.init();
      chart_talbel.tablePrice(2);
    });
    $('body').on('click', '.btn-monthlast', function (event) {

        if (typeof myLineChartyear !== 'undefined') {
            myLineChartyear.destroy();
        }
        if (typeof myLineChartmont !== 'undefined') {
             myLineChartmont.destroy();
        }

        if (typeof pieChartYear !== 'undefined') {
            pieChartYear.destroy();
        }
        if (typeof pieChartMonth !== 'undefined') {
            pieChartMonth.destroy();
        }


        if (typeof pieChartTopYear !== 'undefined') {
            pieChartTopYear.destroy();
        }
        if (typeof pieChartTopMonth !== 'undefined') {
            pieChartTopMonth.destroy();
        }


        charts_lastmont.init();
        charts_pielastmonth.init();
        charts_pietoplastmonth.init();
        chart_talbel.tablePrice(3);
    });

    var chart_talbel={
        tablePrice: function (status) {
       
            var d = new Date();
            var n = d.getFullYear();
            if(status==1){
                document.getElementById("chow_tex_price").innerHTML= "ปี "+n;
            }else if (status==2){
                document.getElementById("chow_tex_price").innerHTML= "เดิอน "+n_year;
            }
            else{
                document.getElementById("chow_tex_price").innerHTML= "12 เดือน ย้อนหลัง";
            }

            var table = $('#charttop-table').DataTable({
                processing: false,
                serverSide: false,
                orderable: false,
                searching: false,
                paging:   false,
                ordering: false,
                info:     false,
                destroy: true,
                ajax: APP_URL + '/report/charttable/year/'+status,
                // data:{status:status},
                // ajax: "{{ route('backend.category.datatables') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    }

                ],
                columnDefs: [{
                    targets: 1,
                    orderable: false,
                    render: function (data, type, row) {
                         var dataqty = intToString(row['qty']);
                        return dataqty;
                    },
                    targets: 2,
                    orderable: false,
                    render: function (data, type, row) {
                         var dataTotal = '<span class="badge bg-warning">'+intToString(Math.ceil(row['total']))+'</span>';
                        return dataTotal;
                    },
                }]
            });
        },
    };

    var charts_pietoplastmonth = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/charttoplastmonth';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_pietoplastmonth.createCompletedJobsChart( response );



                var d = new Date();
                var n = d.getFullYear();
                document.getElementById("show_text_top").innerHTML= "12 เดือน ย้อนหลัง";
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartTopPrice").getContext('2d');
            pieChartTopLastMonth = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.topname,
					datasets: [{
                        label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.top_count_data
					}],
				},

            });
		}
    };

    var charts_pietopmonth = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/charttopmonth';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_pietopmonth.createCompletedJobsChart( response );



                var d = new Date();
                var n = d.getFullYear();
                document.getElementById("show_text_top").innerHTML= "เดือน "+n_year;
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartTopPrice").getContext('2d');
            pieChartTopMonth = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.topname,
					datasets: [{
						label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.top_count_data
					}],
				},

            });
		}
    };


    var charts_pietopyear = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/charttopyear';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_pietopyear.createCompletedJobsChart( response );



                var d = new Date();
                var n = d.getFullYear();
                document.getElementById("show_text_top").innerHTML= "ปี "+n;
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartTopPrice").getContext('2d');
            pieChartTopYear = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.topname,
					datasets: [{
						label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.top_count_data
					}],
				},

            });
		}
	};

    var charts_pielastmonth = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartpaylastmonth';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_pielastmonth.createCompletedJobsChart( response );

                document.getElementById("show_text").innerHTML= "12 เดือน ย้อนหลัง";
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartYear").getContext('2d');
            pieChartLastMonth = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.payname, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.pay_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},

            });
		}
    };

    var charts_piemonth = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartpaymonth';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_piemonth.createCompletedJobsChart( response );

                document.getElementById("show_text").innerHTML= "เดือน "+n_year;
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartYear").getContext('2d');
            pieChartMonth = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.payname, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.pay_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},

            });
		}
    };

    var charts_pieyear = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartpayyear';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_pieyear.createCompletedJobsChart( response );



                var d = new Date();
                var n = d.getFullYear();
                document.getElementById("show_text").innerHTML= "ปี "+n;
			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("pieChartYear").getContext('2d');
            pieChartYear = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.payname, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                          ],
						data: response.pay_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},

            });
		}
	};

    var charts_lastmont = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartmontover';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_lastmont.createCompletedJobsChart( response );

                    var formatter = new Intl.NumberFormat('th', {
                        style: 'currency',
                        currency: 'THB',
                    });
                    function numberWithCommas(x) {
                        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                    }



                    document.getElementById("price_sum").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year").innerHTML= "ยอดการขาย 12 เดือนย้อนหลัง";
                    document.getElementById("price_sum_text").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year_text").innerHTML= "ยอดการขาย 12 เดือนย้อนหลัง";

                    document.getElementById("order_text").innerHTML= "ยอดคำสั่งซื้อ 12 เดือนย้อนหลัง";
                    document.getElementById("order_sum").innerHTML= numberWithCommas(response.order_success)+'/'+numberWithCommas(response.total_order);

                    document.getElementById("product_text").innerHTML= "ยอดสินค้า 12 เดือนย้อนหลัง ";
                    document.getElementById("product_sum").innerHTML= numberWithCommas(response.product_now)+'/'+numberWithCommas(response.product_all);

			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart").getContext('2d');
            myLineChartLastmont = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
						lineTension: 0.3,
						backgroundColor: "rgba(77,192,181,0.5)",
						borderColor: "rgba(77,192,181,2)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(77,192,181,2)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(77,192,181,2)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: true
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								// max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
					}
				}
            });
            myLineChartLastmont.update({
                duration: 2000,
                easing: 'easeOutBounce'
              });

		}
	};

    var charts_mont = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartmont';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_mont.createCompletedJobsChart( response );

                    var formatter = new Intl.NumberFormat('th', {
                        style: 'currency',
                        currency: 'THB',
                    });
                    function numberWithCommas(x) {
                        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                    }

                    document.getElementById("price_sum").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year").innerHTML= "ยอดการขายเดือน "+n_year;
                    document.getElementById("price_sum_text").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year_text").innerHTML= "ยอดการขายเดือน "+n_year;

                    document.getElementById("order_text").innerHTML= "ยอดคำสั่งซื้อเดือน "+n_year;
                    document.getElementById("order_sum").innerHTML= numberWithCommas(response.order_success)+'/'+numberWithCommas(response.total_order);

                    document.getElementById("product_text").innerHTML= "ยอดสินค้าเดือน "+n_year;
                    document.getElementById("product_sum").innerHTML= numberWithCommas(response.product_now)+'/'+numberWithCommas(response.product_all);

			});
		},


		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart").getContext('2d');
			  myLineChartmont = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
						lineTension: 0.3,
						backgroundColor: "rgba(77,192,181,0.5)",
						borderColor: "rgba(77,192,181,2)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(77,192,181,2)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(77,192,181,2)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: true
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								// max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
					}
				}
            });
            myLineChartmont.update({
                duration: 2000,
                easing: 'easeOutBounce'
              });

		}
	};


	var charts_year = {


		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

            this.ajaxGetPostMonthlyData();
        },
		ajaxGetPostMonthlyData: function () {

            var urlPath = APP_URL + '/report/chartyear';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {

                charts_year.createCompletedJobsChart( response );

                    var formatter = new Intl.NumberFormat('th', {
                        style: 'currency',
                        currency: 'THB',
                    });
                    function numberWithCommas(x) {
                        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
                    }
                    var d = new Date();
                    var n = d.getFullYear();







                    document.getElementById("price_sum").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year").innerHTML= "ยอดการขายปี "+n;
                    document.getElementById("price_sum_text").innerHTML= formatter.format(response.price);
                    document.getElementById("sale_year_text").innerHTML= "ยอดการขายปี "+n;

                    document.getElementById("order_text").innerHTML= "ยอดคำสั่งซื้อปี "+n;
                    document.getElementById("order_sum").innerHTML= numberWithCommas(response.order_success)+'/'+numberWithCommas(response.total_order);

                    document.getElementById("product_text").innerHTML= "ยอดสินค้าปี "+n;
                    document.getElementById("product_sum").innerHTML= numberWithCommas(response.product_now)+'/'+numberWithCommas(response.product_all);

			});
		},


		createCompletedJobsChart: function ( response ) {



			var ctx = document.getElementById("myAreaChart").getContext('2d');
			  myLineChartyear = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "slaes",
						lineTension: 0.3,
						backgroundColor: "rgba(77,192,181,0.5)",
						borderColor: "rgba(77,192,181,2)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(77,192,181,2)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(77,192,181,2)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: true
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								// max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
                    },

                    hover: {
                        animationDuration: 0 // duration of animations when hovering an item
                    },
                    responsiveAnimationDuration: 0 // animation duration after a resize
				}
            });
            myLineChartyear.update({
                duration: 2000,
                easing: 'easeOutBounce'
              });

        }

	};

    charts_year.init();
    charts_pieyear.init();
    charts_pietopyear.init();
    chart_talbel.tablePrice(1);

} )( jQuery );
