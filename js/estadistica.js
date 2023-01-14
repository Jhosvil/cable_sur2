// Grafico barra
//Contexto representa el tipo de canvas a utilizar
const contexto = document.getElementById("lienzo").getContext("2d");
const grafico = new Chart(contexto, {
    type: 'bar',
    data: {
        labels: ["", "", "", "o", ""],
        datasets: [
            {

                label:'Clientes',
                data: [15,20],
                backgroundColor: [
                    'rgba(39,174,96, 0.5)',
                    'rgba(211,84,0, 0.5)',
                    'rgba(231,76,60,0.5)',
                    'rgba(86,101,115, 0.5)'
                ],
                borderColor: [ 
                    'rgba(39,174,96,0.5)',
                    'rgba(211,84,0,1)',
                    'rgba(231,76,60,1)',
                    'rgba(86,101,115,1)'
                ],
                borderWidth: 2
            }            
        ]
    },
    options:  {
        scales : { y: { beginAtZero: true } },
        responsive: true,
        plugins:{
            legend: {
                position: 'top',
            },
        },
        maintainAspectRatio: false
    }
});
getData();

function getData(){
    let labelChart = [];
    let dataChart = [];

    $.ajax({
        url: 'controllers/estadistica.controller.php',
        type: 'GET',
        data: 'operacion=graficoBarrasTotalClientesXDistritos',
        success: function (result){
            debugger;
            let datos = JSON.parse(result);
            
            console.log(datos);

            datos.forEach(valor => {
            
                labelChart.push(valor["distrito"]);
                dataChart.push(valor["total"]);
            
            });

            console.log(dataChart);

            //Actualizando gráfico
            grafico.data.labels = labelChart;
            grafico.data.datasets[0].data = dataChart;
            grafico.update();
        }
    });
}

function totalCliente() {
    var datos = {
        'operacion' : 'totalClientes'
    }
    $.ajax({
        url     : 'controllers/estadistica.controller.php',
        type    : 'GET',
        data    : datos,
        success : function(e) {
            $("#totalClientetot").html(e);
        }
    });
}
totalCliente();