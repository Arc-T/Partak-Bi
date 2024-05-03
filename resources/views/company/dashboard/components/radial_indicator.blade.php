<script>
    let data = {!! $graph !!};
    console.log(data);
    var options = {
        series: data['graph'],
        chart: {
            height: 700,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                }
            }
        },
        labels: data['categories'],
    };

    var chart = new ApexCharts(document.querySelector("#indicator"), options);
    chart.render();
</script>
