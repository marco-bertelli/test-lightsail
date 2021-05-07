







// Use Morris.Area instead of Morris.Line
Morris.Area({
    element: 'graph-area-line',
    behaveLikeLine: false,
    data: [
        {x: '2014 Q1', y: 2, z: 3},
        {x: '2014 Q2', y: 2, z: 1},
        {x: '2014 Q3', y: 2, z: 4},
        {x: '2014 Q4', y: 3, z: 3}
       
    ],
    xkey: 'x',
    ykeys: ['y', 'z'],
    labels: ['Y', 'Z'],
    lineColors:['#E67A77','#79D1CF']



});





// Use Morris.Area instead of Morris.Line
Morris.Donut({
    element: 'graph-donut',
    data: [
        {value: 70, label: 'Accettata', formatted: 'at least 70%' },
        {value: 15, label: 'In Attesa', formatted: 'approx. 15%' },
        {value: 10, label: 'Rifutata', formatted: 'approx. 10%' },
     
    ],
    backgroundColor: '#fff',
    labelColor: '#1fb5ac',
    colors: [
        '#95D7BB','#D9DD81','#E67A77','#95D7BB'         
    ],
    formatter: function (x, data) { return data.formatted; }
});









