$(document).ready(function(){
    
    $(window).on('scroll', function(){
        if ($(window).scrollTop()){
            $('.fixed-menu').addClass('move-fixed-menu'); 
        }else{
            $('.fixed-menu').removeClass('move-fixed-menu'); 
        }
    });

    $('.fixed-menu .fa-angle-left').on('click', function (){
        
        $(this).parent('.fixed-menu').toggleClass('is-visible');       
        
        if( $(this).parent('.fixed-menu').hasClass('is-visible') )
        {
           $('.fixed-menu').addClass('rem-over');
           $(this).parent('.fixed-menu').animate({ 
               right: '-340px',
               overFlow: 'initial'
           }, 300);
            
            $('.content-all').animate({
                marginRight: 0,
                paddingRight: 20
           }, 300);
            
           $('.fa-angle-left').css("left", "-55px");
           $('.fa-angle-left').css("border-top-right-radius", "0");
           $('.fa-angle-left').css("border-bottom-right-radius", "0");
           $('.fa-angle-left').css("border-top-left-radius", "50px");
           $('.fa-angle-left').css("border-bottom-left-radius", "50px");
           $('.fa-angle-left').css("box-shadow", "none");
            
        }else{
            
           $(this).parent('.fixed-menu').animate({
 
               right: '0px'
 
           }, 500);
            
            $('.content-all').animate({
 
               marginRight: '306px',
               paddingRight: 0
 
           }, 500);
            
            $('.fa-angle-left').css("left", "0");
            $('.fa-angle-left').css("border-top-right-radius", "50px");
            $('.fa-angle-left').css("border-bottom-right-radius", "50px");
            $('.fa-angle-left').css("border-top-left-radius", "0px");
            $('.fa-angle-left').css("border-bottom-left-radius", "0px");
            $('.fa-angle-left').css("box-shadow", "7px 2px 9px -3px rgba(0, 0, 0, 0)");
        }
    });
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    });
    $(function() {
         $('.chart').easyPieChart({
             size: 125,
             barColor: '#ce00ff',
             scaleColor:false,
             lineWidth: 9,
             trackWidth: 3,
             lineCap: 'circle'
         });
     });
     
     var pieChartCanvas = $("#mycanvas").get(0).getContext("2d");
     var pieChart = new chart(pieChartCanvvas);
     var PieData = [
       {
           value: 700,
           color: "cornflowerblue",
           highlight: "lightskyblue",
           label: "javaScript"
       },
       {
           value: 500,
           color: "lightgreen",
           highlight: "yellowgreen",
           label: "HTML"    
       },
       {
           value: 400,
           color: "orange",
           highlight: "darkorange",
           label: "css"    
       }
     ];
    
     var pieOptions = {
         segmentShowStroke: true,
         segmentStrokeColor: "#00f",
         segmentStrokeWidth: 2,
         percentageInnerCutout: 50,
         animationSteps: 100,
         animationEasing: "easeOutBounce",
         animateRotate: true,
         animateScale: false,
         responsive: true,
         maintainAspectRatio: true,
         
     };
     pieChart.Doughnut(PieData, pieOptions);

    //  setTimeout(function () {
    //     $("#exampleModal").modal('show');

    //     setTimeout(function () {
    //         $("#exampleModal").modal('hide');
    //     }, 3000);
        
    // }, 1000);
    
 });