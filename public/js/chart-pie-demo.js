// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


import {
    Serenazgo,
    Ambulancia,
    Bomberos,
    Fiscalización,
    Mujer,
    nombres,
    totalmes
} from "./chart-area-demo.js";

$.getJSON('toChart', function () {
    myPieChart.update();
})

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: nombres,
    datasets: [{
      labels: totalmes,
      data: totalmes,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: true,
    tooltips: {
      ////////////
      display:false,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
        plugins: {
            labels: [{
                render: 'value',
                fontColor: '#FFFFFF',
                fontStyle: 'bold',
            }],
            
        },
        cutoutPercentage: 60,
  },
});
