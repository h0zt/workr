$(document).ready(function () {
   
  $.post("includes/data.php",
  function (data)
  {
      console.log(data);
      
      var number = [];
      var month = [];

      for (var i in data) {
          number.push(data[i].Total);
          month.push(data[i].Months);
      }
      

      var chartdata = {
          labels: month,
          datasets: [
              {
                label:'graph',
                borderWidth:4,
                borderColor:'#7571f9',
                hoverBorderWidth:3,
                hoverBorderColor:'linear-gradient(230deg, #fc5286, #fbaaa2)',
                data: number
              }
             
          ]

      };


      //CONFIGURE
      var graphTarget = $("#chart");

      var barGraph = new Chart(graphTarget, {
          type: 'line',
          data: chartdata,
          options:{
            responsive:true,
            title:{
              display:true,
              text:'Month Against Customers  ',
              fontColor:'#666'
            },
            legend:{
              display:true,
              position:'top',
              labels:{fontColor:'#ffffff' }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },

            stacked:false,

            tooltips:{
              enabled:true
            },

            scales:{
              y:{
                grid:{
                  drawOnChartArea:false
                }
              }
            }
          }


      });

      

  });
});








