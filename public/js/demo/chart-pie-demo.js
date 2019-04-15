// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$.ajax({
  url: 'http://187.216.164.109/CRUD-LCP/dataActividades.php',
    type: 'GET',
})
.done(function(dataActividades) {
    console.log("success");
    var usuariosPorTipoAct = [];

         for(var i in dataActividades) {
             usuariosPorTipoAct.push(dataActividades[i].userPorActividad);
           }
           
           var ctx = document.getElementById("myPieChart");
           var myPieChart = new Chart(ctx, {
             type: 'pie',
             data: {
               labels: ["Cultura", "Autonomía Económica", "Ciberescuela", "Deporte"],
               datasets: [{
                 data: usuariosPorTipoAct,
                 backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
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
