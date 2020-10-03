Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx = document.getElementById("myAreaChart");
var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]

var Serenazgo = []
var Ambulancia = []
var Bomberos = []
var Fiscalización = []
var Mujer = []
var nombres = []
var totalmes = []
var año = new Date().getFullYear();

$.getJSON('toChart', function (respuesta) {
    respuesta.reverse().forEach(element => {
        if (element.año != año)
            nombres.push(`${meses[Number(element.mes)]} ${element.año}`)
        else
            nombres.push(meses[Number(element.mes)]);
        Serenazgo.push(element.Serenazgo);
        Ambulancia.push(element.Ambulancia);
        Bomberos.push(element.Bomberos);
        Fiscalización.push(element.Fiscalización);
        Mujer.push(element.Mujer);
        totalmes.push(element.total)
    })
    myLineChart.update();
})

export {
    Serenazgo,
    Ambulancia,
    Bomberos,
    Fiscalización,
    Mujer,
    nombres,
    totalmes
};


function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Area Chart Example
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: nombres,
        datasets: [{
            label: "SERENAZGO",
            borderColor: "#8e5ea2",
            data: Serenazgo,
        }, {
            label: "AMBULANCIA",
            borderColor: "#3cba9f",
            data: Ambulancia,
        }, {
            label: "BOMBEROS",
            borderColor: "#3e95cd",
            data: Bomberos,
        }, {
            label: "FISCALIZACIÓN",
            borderColor: '',
            data: Fiscalización,
        }, {
            label: "ALERTA MUJER",
            borderColor: "rgba(78, 115, 223, 1)",
            data: Mujer,
        }],
    },
    options: {
        maintainAspectRatio: true,
        layout: {
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: true
                },
                ticks: {
                    padding:10,
                    maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 12,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    /*  callback: function (value, index, values) {
                         return number_format(value);
                     } */
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: true,
            labels: {
                fontColor: '#666',
            }
        },
        tooltips: {
        displayColors: false,}
    }
});
