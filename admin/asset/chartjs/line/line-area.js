$(window).on("load", function(){
    var ctx = $("#area-chart");
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
            data: [0, 150, 140, 105, 190, 230, 270],
            backgroundColor: "rgba(201,187,174,.3)",
            borderColor: "transparent",
            pointBorderColor: "#C9BBAE",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
            pointRadius: 4,
        }, {
            label: "My Second dataset",
            data: [0, 90, 120, 240, 140, 250, 190],
            backgroundColor: "rgba(29,233,182,.6)",
            borderColor: "transparent",
            pointBorderColor: "#1DE9B6",
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
    var areaChart = new Chart(ctx, config);
});