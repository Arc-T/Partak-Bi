let options;

let locale = {
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
};

let font_family = 'Shabnam';

switch (chart_value) {
case 'bar':
options = {
series: res.indicators,
chart: {
locales: [locale],
defaultLocale: 'fa',
fontFamily: font_family,
type: 'bar',
height: 350,
stacked: true,
stackType: '100%'
},
plotOptions: {
bar: {
horizontal: true,
},
},
stroke: {
width: 1,
colors: ['#fff']
},
title: {
text: '100% Stacked Bar',
align: 'center'
},
xaxis: {
categories: res.dates
},
tooltip: {
y: {
formatter: function (val) {
return val + "K"
}
}
},
fill: {
opacity: 1
},
legend: {
position: 'top',
horizontalAlign: 'center',
verticalAlign: 'bottom',
offsetX: 40
}
};
break;
case 'line':
options = {
series: res.indicators,
chart: {
locales: [locale],
defaultLocale: 'fa',
fontFamily: font_family,
height: 350,
type: 'line',
zoom: {
enabled: false
}
},
dataLabels: {
enabled: false
},
stroke: {
curve: 'straight'
},
title: {
text: 'Product Trends by Month',
align: 'center'
},
grid: {
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
xaxis: {
categories: res.dates,
}
};
break;
case 'pie':
options = {
series: [44, 55, 13, 43, 22],
chart: {
locales: [locale],
defaultLocale: 'fa',
fontFamily: font_family,
width: 400,
type: 'pie',
},
labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
responsive: [{
breakpoint: 480,
options: {
chart: {
width: 200
},
}
}]
};
break;
case 'radar':
options = {
series: [{
name: 'Series 1',
data: [20, 100, 40, 30, 50, 80, 33],
}],
chart: {
locales: [locale],
defaultLocale: 'fa',
fontFamily: font_family,
height: 350,
type: 'radar',
},
dataLabels: {
enabled: true
},
plotOptions: {
radar: {
size: 140,
polygons: {
strokeColors: '#e9e9e9',
fill: {
colors: ['#f8f8f8', '#fff']
}
}
}
},
title: {
align: 'center',
text: 'Radar with Polygon Fill'
},
colors: ['#FF4560'],
markers: {
size: 4,
colors: ['#fff'],
strokeColor: '#FF4560',
strokeWidth: 2,
},
tooltip: {
y: {
formatter: function (val) {
return val
}
}
},
xaxis: {
categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
},
yaxis: {
labels: {
formatter: function (val, i) {
if (i % 2 === 0) {
return val
} else {
return ''
}
}
}
}
};
break;
case 'area':
options = {
series: [{
name: 'series1',
data: [31, 40, 28, 51, 42, 109, 100]
}, {
name: 'series2',
data: [11, 32, 45, 32, 34, 52, 41]
}],
chart: {
locales: [locale],
defaultLocale: 'fa',
fontFamily: font_family,
height: 350,
type: 'area'
},
dataLabels: {
enabled: false
},
stroke: {
curve: 'smooth'
},
xaxis: {
type: 'datetime',
categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
"2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
x: {
format: 'dd/MM/yy HH:mm'
},
},
};
break;
default:
options = {};
}

if (options) {

let chart = new ApexCharts(chart_number, options);
chart.render();

} else {
console.error('Invalid chart');
}