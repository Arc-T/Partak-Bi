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
            height: 350,
            type: 'line',
            zoom: {
                enabled: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Product Trends by Month',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            type: 'datetime',
            categories: data['categories'],
        }
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
                height: 350,
                type: 'line',
                zoom: {
                    enabled: true
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            // title: {
            //     text: 'Product Trends by Month',
            //     align: 'left'
            // },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: data['categories'],
            },
            colors: [color[i]],
        };

        var chartId = `indicator${i}`;

        var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
        chart.render();
    }
</script>
