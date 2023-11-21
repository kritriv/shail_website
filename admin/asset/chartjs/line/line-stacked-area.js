$(window).on("load", function(){
    var ctx = $('#line-stacked-area');
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }]
        },
        title: {
            display: true,
            text: 'Chart.js Line Chart - Legend'
        }
    };
    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: "rgba(103, 58, 183,.4)",
            borderColor: "transparent",
            pointBorderColor: "#673AB7",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
        }, {
            label: "My Second dataset",
            data: [28, 48, 40, 19, 86, 27, 90],
            backgroundColor: "rgba(0,188,212,.4)",
            borderColor: "transparent",
            pointBorderColor: "#00BCD4",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
        }, {
            label: "My Third dataset",
            data: [80, 25, 16, 36, 67, 18, 76],
            backgroundColor: "rgba(255,87,34,.4)",
            borderColor: "transparent",
            pointBorderColor: "#FF5722",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
        }]
    };
    var config = {
        type: 'line',
        options : chartOptions,
        data : chartData
    };
    var stackedAreaChart = new Chart(ctx, config);
});