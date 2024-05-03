<script>
    let data = {!! json_encode($graphs) !!};
    const color = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'];


    var total_options = {

        series: data['graph'],
        chart: {
            locales: [{
                "name": "fa",
                "options": {
                    "months": [
                        "فروردین",
                        "اردیبهشت",
                        "خرداد",
                        "تیر",
                        "مرداد",
                        "شهریور",
                        "مهر",
                        "آبان",
                        "آذر",
                        "دی",
                        "بهمن",
                        "اسفند"
                    ],
                    "shortMonths": [
                        "فرو",
                        "ارد",
                        "خرد",
                        "تیر",
                        "مرد",
                        "شهر",
                        "مهر",
                        "آبا",
                        "آذر",
                        "دی",
                        "بهمـ",
                        "اسفـ"
                    ],
                    "days": [
                        "یکشنبه",
                        "دوشنبه",
                        "سه شنبه",
                        "چهارشنبه",
                        "پنجشنبه",
                        "جمعه",
                        "شنبه"
                    ],
                    "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                    "toolbar": {
                        "exportToSVG": "دانلود SVG",
                        "exportToPNG": "دانلود PNG",
                        "exportToCSV": "دانلود CSV",
                        "menu": "منو",
                        "selection": "انتخاب",
                        "selectionZoom": "بزرگنمایی انتخابی",
                        "zoomIn": "بزرگنمایی",
                        "zoomOut": "کوچکنمایی",
                        "pan": "پیمایش",
                        "reset": "بازنشانی بزرگنمایی"
                    }
                }
            }],
            defaultLocale: "fa",
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
                dataLabels: {
                    total: {
                        enabled: false,
                    }
                }
            },
        },
        xaxis: {
            labels: {
                format: 'd MMM',
            },
            type: 'datetime',
            categories: data['categories'],
        },
        legend: {
            position: 'right',
            offsetY: 40
        },
        fill: {
            opacity: 1
        },
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
                locales: [{
                    "name": "fa",
                    "options": {
                        "months": [
                            "فروردین",
                            "اردیبهشت",
                            "خرداد",
                            "تیر",
                            "مرداد",
                            "شهریور",
                            "مهر",
                            "آبان",
                            "آذر",
                            "دی",
                            "بهمن",
                            "اسفند"
                        ],
                        "shortMonths": [
                            "فرو",
                            "ارد",
                            "خرد",
                            "تیر",
                            "مرد",
                            "شهر",
                            "مهر",
                            "آبا",
                            "آذر",
                            "دی",
                            "بهمـ",
                            "اسفـ"
                        ],
                        "days": [
                            "یکشنبه",
                            "دوشنبه",
                            "سه شنبه",
                            "چهارشنبه",
                            "پنجشنبه",
                            "جمعه",
                            "شنبه"
                        ],
                        "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                        "toolbar": {
                            "exportToSVG": "دانلود SVG",
                            "exportToPNG": "دانلود PNG",
                            "exportToCSV": "دانلود CSV",
                            "menu": "منو",
                            "selection": "انتخاب",
                            "selectionZoom": "بزرگنمایی انتخابی",
                            "zoomIn": "بزرگنمایی",
                            "zoomOut": "کوچکنمایی",
                            "pan": "پیمایش",
                            "reset": "بازنشانی بزرگنمایی"
                        }
                    }
                }],
                defaultLocale: "fa",
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
                    dataLabels: {
                        total: {
                            enabled: false,
                        }
                    }
                },
            },
            xaxis: {
                labels: {
                    format: 'd MMM',
                },
                type: 'datetime',
                categories: data['categories'],
            },
            legend: {
                position: 'right',
                offsetY: 40
            },
            fill: {
                opacity: 1
            },
            colors: [color[i]],
        };
        var chartId = `indicator${i}`;
        var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
        chart.render();
    }
</script>
