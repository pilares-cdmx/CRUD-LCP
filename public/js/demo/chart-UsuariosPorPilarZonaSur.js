// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$.ajax({
    url: 'http://187.216.164.109/CRUD-LCP/dataPilaresZonaSur.php',
    type: 'GET',


})
.done(function(dataUsuariosPilaresSur) {
    //console.log(dataZona);
    var usuariosPorZonas = [];

       for(var i in dataUsuariosPilaresSur) {
           usuariosPorZonas.push(dataUsuariosPilaresSur[i].usuarioPorPilar);
         }

         var ctx = document.getElementById("usuariosSur");
         var myLineChart = new Chart(ctx, {
           type: 'bar',
           data: {
             labels: ["Cuauhtenco", "Zapotitla", "Rosario Castellanos", "Tulyehualco", "San Francisco"],
             datasets: [{
               label: "Usuarios",
               backgroundColor: "rgba(11,219,41,0.7)",
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
