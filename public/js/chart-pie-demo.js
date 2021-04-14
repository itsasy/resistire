// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx = document.getElementById("myPieChart");

import {
    Serenazgo,
    Ambulancia,
    Bomberos,
    Fiscalizacion,
    Mujer,
    nombres,
    totalmes,
    Solidos,
    Reciclaje,
    Mental,
    Covid,
    Construccion,
    Transito,
    Ambulante
} from "./chart-area-demo.js";

var value = [];
switch (usr_type) {
    case 1:
        value = totalmes;
        break;
    case 2:
        value = totalmes;
        break;
    case 4:
        value = Serenazgo;
        break;
    case 5:
        value = Ambulancia;
        break;
    case 6:
        value = Bomberos;
        break;
    case 7:
        value = Fiscalizacion;
        break;
    case 8:
        value = Mujer;
        break;
    case 9:
        value = Solidos;
        break;
    case 10:
        value = Reciclaje;
        break;
    case 11:
        value = Mental;
        break;
    case 12:
        value = Covid;
        break;
    case 13:
        value = Construccion;
        break;
    case 14:
        value = Transito;
        break;
    case 15:
        value = Ambulante;
        break;
}
// Pie Chart Example
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: nombres,
        datasets: [{
            labels: value,
            data: value,
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e71f1f', '#003f5c', '#2f4b7c', '#665191', '#a05195', '#d45087', '#f95d6a', '#ff7c43', '#ffa600'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: true,
        tooltips: {
            ////////////
            display: false,
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
