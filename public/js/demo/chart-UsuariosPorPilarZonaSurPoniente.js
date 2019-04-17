// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$.ajax({
    url: 'http://187.216.164.109/CRUD-LCP/dataPilaresZonaSurPoniente.php',
    type: 'GET',


})
.done(function(dataUsuariosPilaresSurPoniente) {
    //console.log(dataZona);
    var usuariosPorZonas = [];

       for(var i in dataUsuariosPilaresSurPoniente) {
           usuariosPorZonas.push(dataUsuariosPilaresSurPoniente[i].usuarioPorPilar);
         }

         var ctx = document.getElementById("usuariosSurPoniente");
         var myLineChart = new Chart(ctx, {
           type: 'bar',
           data: {
             labels: ["El Copete", "Emiliano Zapata", "Huayatla"],
             datasets: [{
               label: "Usuarios",
               backgroundColor: "rgba(224,207,13,0.7)",
               borderColor: "rgba(2,117,216,1)",
               data: usuariosPorZonas,
             }],
           },
           options: {
             scales: {
               xAxes: [{
                 time: {
                   unit: 'registros'
                 },
                 gridLines: {
                   display: false
                 },
                 ticks: {
                   maxTicksLimit: 6
                 }
               }],
               yAxes: [{
                 ticks: {
                   min: 0,
                   max: 600,
                   maxTicksLimit: 5
                 },
                 gridLines: {
                   display: true
                 }
               }],
             },
             legend: {
               display: false
             }
           }
         });
})
.fail(function() {
    console.log("error");
})
.always(function() {
    console.log("complete");
});

// Bar Chart Example
