<div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3">
                    <div class="card-header">
                        <h4>تعداد مشتریان بر اساس همه ی وضعیت ها به تفکیک استان</h4>
                        <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                    </div>
                    <div class="card-body px-3 py-4-5">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>

        let data = {!! json_encode($general) !!};

        let options_1 = {
            series: data['indicators'],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10,
                    borderRadiusApplication: 'end', // 'around', 'end'
                    borderRadiusWhenStacked: 'last', // 'all', 'last'
                    dataLabels: {
                        total: {
                            enabled: true,
                            style: {
                                fontSize: '13px',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            xaxis: {
                categories: data['locations'],
            },
            legend: {
                position: 'right',
                offsetY: 40
            },
            fill: {
                opacity: 1
            }
        };

        let chart2 = new ApexCharts(document.querySelector("#chart"), options_1);
        chart2.render();

    </script>

@endpush