// months
const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

const d = new Date();
var month1name = monthNames[d.getMonth() - 2];
var month2name = monthNames[d.getMonth() - 1];
var month3name = monthNames[d.getMonth()];

// chart colors
var colors = ['#291875'];

var month1data = document.querySelector('.revenue-month1');
var month2data = document.querySelector('.revenue-month2');
var month3data = document.querySelector('.revenue-month3');

if (month1data != null && month2data != null && month3data != null) {
    // revenues
    var month1dataValue = document.querySelector('.revenue-month1').innerHTML;
    var month2dataValue = document.querySelector('.revenue-month2').innerHTML;
    var month3dataValue = document.querySelector('.revenue-month3').innerHTML;

    /* large line chart */
    var chLine = document.getElementById("revenue");
    var chartData = {
        labels: [month1name, month2name, month3name],
        datasets: [{
            data: [month1dataValue, month2dataValue, month3dataValue],
            backgroundColor: 'transparent',
            borderColor: colors[0],
            borderWidth: 4,
            pointBackgroundColor: colors[0]
        }]
    };

    if (chLine) {
        new Chart(chLine, {
            type: 'line',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false
                }
            }
        });
    }
}