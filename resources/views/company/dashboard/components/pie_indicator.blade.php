<script>
    let data = {!! json_encode($graphs) !!};
    const color = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'];

    var total_options = {
        series: data['graph'],
        chart: {
            height: 900,
            type: 'donut',
        },
        labels: data['categories'],
        responsive: [{
            options: {
                chart: {
                    width: 50,
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var total = new ApexCharts(document.querySelector("#indicator-total"), total_options);

    total.render();

    for (let i = 0; i < data['graph'].length; i++) {

        let result = {
            'graph': [data['graph'][i]],
        };

        var options = {
            series: result['graph'],
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '70%',
                    }
                },
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        value: {
                            formatter: function(val) {
                                return val+ ' فرد'
                            }
                        },
                    },
                },
            },
            labels: [data['categories'][i]],

            colors: [color[i]],
        };

        var chartId = `indicator${i}`;

        var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);

        chart.render();

    }
</script>
