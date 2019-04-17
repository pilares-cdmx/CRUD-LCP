// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$.ajax({
    url: 'http://187.216.164.109/CRUD-LCP/dataUsuariosPorPilar.php',
    type: 'GET',


})
.done(function(dataUsuariosPorPilar) {
    //console.log(dataUsuariosPorPilar);
    var dataUsuarios = [];

       for(var i in dataUsuariosPorPilar) {
           dataUsuarios.push(dataUsuariosPorPilar[i].usuarioPorPilar);
         }

         var ctx = document.getElementById("usuariosPorPilar");
         var myLineChart = new Chart(ctx, {
           type: 'bar',
           data: {
             labels: [
               "Araña",
               "Capulín",
               "Jalalpa",
               "Xalli",
               "Copete",
               "EmilianoZapata",
               "Chimalpa",
               "Tolnáhuac",
               "Frida Kahlo",
               "Atlampa",
               "RichardWagner",
               "BenitaGaleana",
               "Tlalpexco",
               "José Martí",
               "AgrícolaPantitlán",
               "CentralAbasto",
               "Cooperemos Pueblo",
               "Acahualtepec",
               "Gabriela Mistral",
               "Huayatla",
               "Caneguin",
               "Cuauhtenco",
               "Zapotitla",
               "RosarioCastellanos",
               "Tulyehualco",
               "SanFrancisco"],
             datasets: [{
               label: "Usuarios",
               backgroundColor: "rgba(56,212,159,0.75)",
               borderColor: "rgba(2,117,216,1)",
               data: dataUsuarios,
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
                   max: 800,
                   maxTicksLimit: 5
                 },
                 gridLines: {
                   display: true
                 }
               }],
             },
             legend: {
               display: true,
               fontSize: 3
             }
           }
         });
})
.fail(function() {
    console.log("errorUsersporpilar");
})
.always(function() {
    console.log("complete");
});

// Bar Chart Example
