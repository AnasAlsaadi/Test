$(function(){        
    /* reportrange */
    if($("#reportrange").length > 0){   
        $("#reportrange").daterangepicker({                    
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM.DD.YYYY',
            separator: ' to ',
            startDate: moment().subtract('days', 29),
            endDate: moment()            
          },function(start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
        
        $("#reportrange span").html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }
    /* end reportrange */
    
    /* Rickshaw dashboard chart */
    
    
    /* Donut dashboard chart */
   
    
    /* Bar dashboard chart */
   
    
    /* Vector Map */
    var jvm_wm = new jvm.WorldMap({container: $('#dashboard-map-seles'),
                                    map: 'world_mill_en', 
                                    backgroundColor: '#FFFFFF',                                      
                                    regionsSelectable: true,
                                    regionStyle: {selected: {fill: '#B64645'},
                                                    initial: {fill: '#33414E'}},
                                    markerStyle: {initial: {fill: '#3FBAE4',
                                                   stroke: '#3FBAE4'}},
                                    markers: [{latLng: [50.27, 30.31], name: 'Kyiv - 1'},                                              
                                              {latLng: [52.52, 13.40], name: 'Berlin - 2'},
                                              {latLng: [48.85, 2.35], name: 'Paris - 1'},                                            
                                              {latLng: [51.51, -0.13], name: 'London - 3'},                                                                                                      
                                              {latLng: [40.71, -74.00], name: 'New York - 5'},
                                              {latLng: [35.38, 139.69], name: 'Tokyo - 12'},
                                              {latLng: [37.78, -122.41], name: 'San Francisco - 8'},
                                              {latLng: [28.61, 77.20], name: 'New Delhi - 4'},
                                              {latLng: [39.91, 116.39], name: 'Beijing - 3'}]
                                });    
    /* END Vector Map */

    
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
    
    
});

