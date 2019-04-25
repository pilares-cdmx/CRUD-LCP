// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$.ajax({
  // url: 'http://187.216.164.109/CRUD-LCP/dataActividades.php',
    url: 'http://187.216.164.109/CRUD-LCP/Crud/registrosPiePorGenero',
    type: 'GET',
})
.done(function(dataRegistrosPorGenero) {
    // console.log("success");
    var registrosPorGenero = [];

         for(var i in dataRegistrosPorGenero) {
            registrosPorGenero.push(dataRegistrosPorGenero[i].registroGenero);
           }

           var ctx = document.getElementById("myPieChartPorGenero");
           var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
               labels: ["Mujer", "Hombre"],
               datasets: [{
                 data: registrosPorGenero,
                 backgroundColor: ['#957bff', '#287745'],
               }],
             },
             options: {
               legend: {
                 display: true,
                 position: "bottom"
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

// Pie Chart Example
