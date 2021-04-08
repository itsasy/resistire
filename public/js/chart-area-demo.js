Chart.defaults.global.defaultFontFamily = 'Roboto', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx = document.getElementById("myAreaChart");
var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]

var Dataset = []
var Serenazgo = []
var Ambulancia = []
var Bomberos = []
var Fiscalizacion = []
var Mujer = []
var nombres = []
var totalmes = []
var Solidos = []
var Reciclaje = []
var Mental = []
var Covid = []
var Construccion = []
var Transito = []
var Ambulante = []
var año = new Date().getFullYear();

function SumaObjeto(objeto) {
    return objeto.reduce((anterior, actual) => {
        for (let key in actual) {
            if (actual.hasOwnProperty(key)) {
                anterior[key] = (anterior[key] || 0) + actual[key];
            }
        }
        return anterior;
    });
}

var recorrer = myValues.reverse().forEach(element => {
    if (element.año != año) {
        nombres.push(`${meses[Number(element.mes) - 1]} ${element.año}`)
    } else
        nombres.push(meses[Number(element.mes) - 1]);
    Serenazgo.push(element.Serenazgo);
    Ambulancia.push(element.Ambulancia);
    Bomberos.push(element.Bomberos);
    Mujer.push(element.Mujer);
    Fiscalizacion.push(element.Fiscalización);
    Solidos.push(element.Solidos);
    Reciclaje.push(element.Reciclaje);
    Mental.push(element.Mental);
    Covid.push(element.Covid);
    Construccion.push(element.Construccion);
    Transito.push(element.Transito);
    Ambulante.push(element.Ambulante);
    totalmes.push(element.total)

})


export {
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
};
if (SumaObjeto(myValues)['Serenazgo'] != undefined && SumaObjeto(myValues)['Bomberos'] != 0) {
    Dataset.push({
        label: 'Serenazgo',
        data: Serenazgo,
        borderColor: "#00B4DB",
    })
}

if (SumaObjeto(myValues)['Ambulancia'] != undefined && SumaObjeto(myValues)['Bomberos'] != 0) {
    Dataset.push({
        label: 'Ambulancia',
        data: Ambulancia,
        borderColor: "#01CEFB",
    })
}

if (SumaObjeto(myValues)['Bomberos'] != undefined && SumaObjeto(myValues)['Bomberos'] != 0) {
    Dataset.push({
        label: 'Bomberos',
        data: Bomberos,
        borderColor: "#CC312D",
    })
}

if (SumaObjeto(myValues)['Fiscalizacion'] != undefined && SumaObjeto(myValues)['Fiscalizacion'] != 0) {
    Dataset.push({
        label: 'Fiscalización',
        data: Fiscalizacion,
        borderColor: '#F8CF27',
    })
}

if (SumaObjeto(myValues)['Mujer'] != undefined && SumaObjeto(myValues)['Mujer'] != 0) {
    Dataset.push({
        label: 'Mujer',
        data: Mujer,
        borderColor: "#ffcdd2",
    })
}

if (SumaObjeto(myValues)['Solidos'] != undefined && SumaObjeto(myValues)['Solidos'] != 0) {
    Dataset.push({
        label: 'Solidos',
        data: Solidos,
        borderColor: "#ffcdd2",
    })
}
if (SumaObjeto(myValues)['Reciclaje'] != undefined && SumaObjeto(myValues)['Reciclaje'] != 0) {
    Dataset.push({
        label: 'Reciclaje',
        data: Reciclaje,
        borderColor: "#ffcdd2",

    })
}
if (SumaObjeto(myValues)['Mental'] != undefined && SumaObjeto(myValues)['Mental'] != 0) {
    Dataset.push({
        label: 'Mental',
        data: Mental,
        borderColor: "#ffcdd2",

    })
}
if (SumaObjeto(myValues)['Covid'] != undefined && SumaObjeto(myValues)['Covid'] != 0) {
    Dataset.push({
        label: 'Covid',
        data: Covid,
        borderColor: "#ffcdd2",
    })
}
if (SumaObjeto(myValues)['Construccion'] != undefined && SumaObjeto(myValues)['Construccion'] != 0) {
    Dataset.push({
        label: 'Construccion',
        data: Construccion,
        borderColor: "#ffcdd2",
    })
}
if (SumaObjeto(myValues)['Transito'] != undefined && SumaObjeto(myValues)['Transito'] != 0) {
    Dataset.push({
        label: 'Transito',
        data: Transito,
        borderColor: "#ffcdd2",
    })
}
if (SumaObjeto(myValues)['Ambulante'] != undefined && SumaObjeto(myValues)['Ambulante'] != 0) {
    Dataset.push({
        label: 'Ambulante',
        data: Ambulante,
        borderColor: "#ffcdd2",
    })
}
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: nombres,
        datasets: Dataset
    },
    options: {
        maintainAspectRatio: true,
        legend: {
            labels: {
                fontColor: '#666',
            }
        },
        tooltips: {
            displayColors: false,
        }
    }
});

