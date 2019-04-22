// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
$.ajax({
    url: 'http://187.216.164.109/CRUD-LCP/data.php',
    type: 'GET',
})
.done(function(data) {
    //console.log(data);
      var usuariosRegistrados = [];

      for(var i in data) {
          usuariosRegistrados.push(data[i].fecha);
        }

    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            "abril 01",
            "abril 02",
            "abril 03",
            "abril 04",
            "abril 05",
            "abril 06",
            "abril 07",
            "abril 08",
            "abril 09",
            "abril 10",
            "abril 11",
            "abril 12",
            "abril 13",
            "abril 14",
            "abril 15",
            "abril 16",
            "abril 17",
            "abril 18",
            "abril 19",
            "abril 20",
            "abril 21",
            "abril 22"],
        datasets: [{
          label: "Usuarios",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: usuariosRegistrados,
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 1500,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
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
