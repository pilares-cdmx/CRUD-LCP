// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$.ajax({
    url: 'http://187.216.164.109/CRUD-LCP/dataZona.php',
    type: 'GET',


})
.done(function(dataZona) {
    //console.log(dataZona);
    var usuariosPorZonas = [];

       for(var i in dataZona) {
           usuariosPorZonas.push(dataZona[i].userPorZona);
         }

         var ctx = document.getElementById("myBarChart");
         var myLineChart = new Chart(ctx, {
           type: 'bar',
           data: {
             labels: ["Poniente", "Norte", "Iztapalapa", "Sur Poniente", "Sur", "Centro y oriente"],
             datasets: [{
               label: "Usuarios",
               backgroundColor: "rgba(2,117,216,1)",
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
                   max: 1200,
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
