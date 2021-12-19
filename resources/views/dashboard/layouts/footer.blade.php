<script src="{{ asset('public/dash/js/jquiry.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('public/dash/js/main.js')}}"></script>
<script src="{{ asset('public/dash/js/jquery.easypiechart.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');
            let massPopChart = new Chart(myChart, {
                type:'bar',
                data:{
                    labels:['السبت', 'الحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت'],
                    datasets:[{
                        label:'Population',
                        data:[
                            453060,
                            251045,
                            617594,
                            286519,
                            405162,
                            305162,
                            555162,
                            95072
                        ],
                        backgroundColor:'#EE504F',
                        borderWidth:1,
                        borderColor:'#fff',
                        hoverBorderWidth:2,
                        hoverBorderColor:'#fff'
                    }]
                },
                option:{
                    legend:{
                        display:false,
                    }
                }
            });
</script>
<script>
    $(document).ready(function () {
              setTimeout(function () {
                  $("#exampleModal").modal('show');
    
                  //  setTimeout(function () {
                  //     $("#exampleModal").modal('hide');
                  //  }, 4000);
                  
              }, 1000);
          });
</script>