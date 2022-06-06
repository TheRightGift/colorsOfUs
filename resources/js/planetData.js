import "morrisjs/morris.css";
import "morrisjs/morris.min.js";
// export const donutChart = $(function () {
    
// });

export const planetChartData = $(function () {
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Orders",
            value: 8500,

        }, {
            label: "Panding",
            value: 3630,
        }, {
            label: "Delivered",
            value: 4870
        }],
        resize: true,
        colors:['#fb9678', '#01c0c8', '#4F5467']
    });
 
    // Morris.Area({
    //     element: 'morris-area-chart',
    //     data: [{
    //         period: '2010',
    //         iphone: 50,
    //         ipad: 80,
    //         itouch: 20
    //     }, {
    //         period: '2011',
    //         iphone: 130,
    //         ipad: 100,
    //         itouch: 80
    //     }, {
    //         period: '2012',
    //         iphone: 80,
    //         ipad: 60,
    //         itouch: 70
    //     }, {
    //         period: '2013',
    //         iphone: 70,
    //         ipad: 200,
    //         itouch: 140
    //     }, {
    //         period: '2014',
    //         iphone: 180,
    //         ipad: 150,
    //         itouch: 140
    //     }, {
    //         period: '2015',
    //         iphone: 105,
    //         ipad: 100,
    //         itouch: 80
    //     },
    //     {
    //         period: '2016',
    //         iphone: 250,
    //         ipad: 150,
    //         itouch: 200
    //     }],
    //     xkey: 'period',
    //     ykeys: ['iphone', 'ipad', 'itouch'],
    //     labels: ['iPhone', 'iPad', 'iPod Touch'],
    //     pointSize: 3,
    //     fillOpacity: 0,
    //     pointStrokeColors: ['#55ce63', '#009efb', '#2f3d4a'],
    //     behaveLikeLine: true,
    //     gridLineColor: '#e0e0e0',
    //     lineWidth: 3,
    //     hideHover: 'auto',
    //     lineColors: ['#55ce63', '#009efb', '#2f3d4a'],
    //     resize: true

    // });
});

export default planetChartData;