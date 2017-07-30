 
var file_name='Net1.inp',minPressure=96.21505,
maxPressure=139.4097,
minDemand=-1.7691264,
maxDemand=1.3241916,
minFlow=0,data_sm_leak,
maxFlow=0,data_junc;
status();
measure();
leak();
var controle=0;

  var i_data_sm = 0; 

function status_big(data)
{
  minPressure=data.minPressure;
  maxPressure=data.maxPressure;
  minDemand= data.minDemand;
  maxDemand= data.maxDemand;
  minFlow=data.minFlow;
  maxFlow=data.maxFlow;

  drow_measures_Pressure();

  drow_measures_Flow();

  drow_measures_Demand();
}

function status()
{
  $.ajax({
    url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/stats',
    type: 'GET' ,   
    dataType: 'json',
    success: function(data, textStatus, jqXHR)
    {


      minPressure=data.minPressure;
      maxPressure=data.maxPressure;
      minDemand= data.minDemand;
      maxDemand= data.maxDemand;
      minFlow=data.minFlow;
      maxFlow=data.maxFlow;

      drow_measures_Pressure();

      drow_measures_Flow();

      drow_measures_Demand();


    },
    error: function(jqXHR, textStatus, errorThrown)
    {


    }
  });

}

function measure()
{
  $.ajax({
    url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/measures',
    type: 'GET' ,  
    dataType: 'json',
    success: function(data, textStatus, jqXHR)
    {

     data_sm=data;

     var html="";
     for(var times=1;times<=data_sm.length;times++)
     {
      var d= new Date(data_sm[times-1].time);
      

      if(times==1)
      {
       html+='<li><a href="#0"  id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" time_="'+data_sm[times-1].time+'" data-date="'+times+'/01/2014" class="selected">'+d.getHours()+':00'+'</a></li>';
       
     }
     else
     {
       html+='<li><a href="#0"  id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" time_="'+data_sm[times-1].time+'" data-date="'+times+'/01/2014" class="">'+d.getHours()+':00'+'</a></li>';
       
     }
     
   }
   $('#ol_times').html('');

   $('#ol_times').append(html);

   update_time();
 },
 error: function(jqXHR, textStatus, errorThrown)
 {


 }
});  
}

function leak()
{
  $.ajax({
    url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/leaks',
    type: 'GET' ,  
    dataType: 'json',
    success: function(data, textStatus, jqXHR)
    {

     data_sm_leak=data;



   },
   error: function(jqXHR, textStatus, errorThrown)
   {


   }
 });


}




function get_data_junc(elem)
{

  var pressure_big=[];var demand_big=[];
  if(file_name=="M.inp")
  {

    for(var i_d=0; i_d<data_sm.length;i_d++)
    {
      var time_big= data_sm[i_d].time;
      var result = $.grep(data_sm[i_d].data.nodes, function(e){

       return e.id == $(elem).attr('title');

     });

      if (result.length == 0) {

      } else if (result.length == 1) {
 
        pressure_big.push([time_big,result[0].pressure]);

        demand_big.push([time_big,result[0].demand]);

      } else {
 
      }
    } 
    Highcharts.stockChart('junc_p', {


      title: {
        text: 'junc chart pressure' 
      },

      subtitle: {
        text: 'junc ID = '+$(elem).attr('title')
      },

      xAxis: {
        gapGridLineWidth: 0
      },rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },

      series: [{
        name: 'junc pressure',
        type: 'area',
        data: pressure_big,
        gapSize: 5,
        tooltip: {
          valueDecimals: 2
        },
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        threshold: null
      }]
    });

    Highcharts.stockChart('junc_d', {


      title: {
        text: 'junc chart demand' 
      },

      subtitle: {
        text: 'junc ID = '+$(elem).attr('title')
      },

      xAxis: {
        gapGridLineWidth: 0
      },rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },

      series: [{
        name: 'junc demand',
        type: 'area', 
        data: demand_big,
        gapSize: 5,
        tooltip: {
          valueDecimals: 2
        },
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        threshold: null
      }]
    });


  }
  else

  {
    $.ajax({
      url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/nodes/'+$(elem).attr('title')+'/measures',
      type: 'GET' ,  
      dataType: 'json',
      data:{
        from:convert_to_time_long(""+$('#junc_from_date').val()+" "+$('#junc_from_time').val()),

        to:convert_to_time_long(""+$('#junc_to_date').val()+" "+$('#junc_to_time').val()),

      },
      success: function(data, textStatus, jqXHR)
      {

       data_junc=data;

    // epanetjs.setMode(epanetjs.INPUT);

    $('#legend').show();

    $(elem).attr('fill','#9966ff');
    Highcharts.stockChart('junc_p', {


      title: {
        text: 'junc chart pressure' 
      },

      subtitle: {
        text: 'junc ID = '+$(elem).attr('title')
      },

      xAxis: {
        gapGridLineWidth: 0
      },rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },

      series: [{
        name: 'junc pressure',
        type: 'area',
        data: data_junc.PRESSURE,
        gapSize: 5,
        tooltip: {
          valueDecimals: 2
        },
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        threshold: null
      }]
    });



    Highcharts.stockChart('junc_d', {


      title: {
        text: 'junc chart demand' 
      },

      subtitle: {
        text: 'junc ID = '+$(elem).attr('title')
      },

      xAxis: {
        gapGridLineWidth: 0
      },rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },

      series: [{
        name: 'junc demand',
        type: 'area', 
        data: data_junc.DEMAND,
        gapSize: 5,
        tooltip: {
          valueDecimals: 2
        },
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        threshold: null
      }]
    });

  },
  error: function(jqXHR, textStatus, errorThrown)
  {


  }
});
  }


}





function get_data_pump(elem)
{

  var pump_big_data=[];
  if(file_name=="M.inp")
  {
   for(var i_d=0; i_d<data_sm.length;i_d++)
   {
    var time_big= data_sm[i_d].time;
    var result = $.grep(data_sm[i_d].data.pumps, function(e){

     return e.id == $(elem).attr('id');

   });

    if (result.length == 0) {

    } else if (result.length == 1) {


      pump_big_data.push([time_big,result[0].flow]);


    } else {


    }
  }


  Highcharts.stockChart('ch_pump', {
    chart: {
      alignTicks: false
    },

    rangeSelector: {
      selected: 1
    },

    title: {
      text: 'Pump status on/off'
    },

    series: [{
      type: 'column',
      name: 'pump status',
      data: pump_big_data,

    }],rangeSelector: {
      buttons: [{
        type: 'hour',
        count: 1,
        text: '1h'
      }, {
        type: 'day',
        count: 1,
        text: '1D'
      }, {
        type: 'all',
        count: 1,
        text: 'All'
      }],
      selected: 1,
      inputEnabled: false
    },
  }); 
}
else
{

 // var pumpdata={"before":[{"id":"HSP3","schedule":[[3600,0],[7200,0],[10800,0],[14400,0],[18000,0],[21600,1],[25200,0],[28800,0],[32400,0],[36000,0],[39600,0],[43200,0],[46800,0],[50400,0],[54000,0],[57600,0],[61200,0],[64800,0],[68400,0],[72000,0],[75600,1],[79200,1],[82800,0],[86400,1],[90000,0]]}],"after":[{"id":"HSP3","schedule":[[3600,0],[7200,0],[10800,0],[14400,0],[18000,0],[21600,1],[25200,0],[28800,0],[32400,0],[36000,0],[39600,0],[43200,0],[46800,0],[50400,0],[54000,0],[57600,0],[61200,0],[64800,0],[68400,0],[72000,0],[75600,1],[79200,1],[82800,0],[86400,1],[90000,0]]}]};


 //console.log(pumpdata.before[0].schedule);
 $.ajax({

  url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/pumps/'+$(elem).attr('id')+'/schedule',
  type: 'GET' ,  
  dataType: 'json',
  data:{
    from:convert_to_time_long(""+$('#pump_from_date').val()+" "+$('#pump_from_time').val()),

    to:convert_to_time_long(""+$('#pump_to_date').val()+" "+$('#pump_to_time').val()),

  },
  success: function(data, textStatus, jqXHR)
  {

   pumpdata=data;


  // for(var i_p=0;i_p<pumpdata.before[0].schedule.length;i_p++)
  // {
  //   pumpdata.before[0].schedule[i_p][0]=pumpdata.before[0].schedule[i_p][0]*1000;

  //   console.log(pumpdata.before[0].schedule[i_p][0]);
  //   console.log(pumpdata.before[0].schedule[i_p][1]);
  // }
  

  $('#legend').show();

  //$(elem).attr('fill','#9966ff');



  Highcharts.stockChart('ch_pump', {
    chart: {
      alignTicks: false
    },

    rangeSelector: {
      selected: 1
    },

    title: {
      text: 'Pump status on/off'
    },

    series: [{
      type: 'column',
      name: 'pump status',
      data: pumpdata.before[0].schedule,

    }],rangeSelector: {
      buttons: [{
        type: 'hour',
        count: 1,
        text: '1h'
      }, {
        type: 'day',
        count: 1,
        text: '1D'
      }, {
        type: 'all',
        count: 1,
        text: 'All'
      }],
      selected: 1,
      inputEnabled: false
    },
  });

},
error: function(jqXHR, textStatus, errorThrown)
{


}
});
}

}


function get_data_tank(elem)
{
  var tank_big_data=[];
  if(file_name=="M.inp")
  {

    for(var i_d=0; i_d<data_sm.length;i_d++)
    {
      var time_big= data_sm[i_d].time;
      var result = $.grep(data_sm[i_d].data.tanks, function(e){

       return e.id == $(elem).attr('title');

     });
      
      if (result.length == 0) {

      } else if (result.length == 1) {

       
        tank_big_data.push([time_big,result[0].volume]);


      } else {

        
      }
    }



    Highcharts.stockChart('tanks', {


      title: {
        text: 'Tanks Chart (VOLUME)'
      },

      subtitle: {
        text: 'tank ID = '+$(elem).attr('title')
      },

      xAxis: {
        gapGridLineWidth: 0
      },

      rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },

      series: [{
        name: 'AAPL',
        type: 'area',
        data:tank_big_data ,
        gapSize: 5,
        tooltip: {
          valueDecimals: 2
        },
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        threshold: null
      }]
    });

  }
  else
  {
   $.ajax({ 
    url: 'http://swms-api.herokuapp.com/networks/'+file_name+'/tanks/'+$(elem).attr('title')+'/measures',
    type: 'GET' ,  
    dataType: 'json',
    data:{
      from:convert_to_time_long(""+$('#tank_from_date').val()+" "+$('#tank_from_time').val()),

      to:convert_to_time_long(""+$('#tank_to_date').val()+" "+$('#tank_to_time').val()),

    },
    success: function(data, textStatus, jqXHR)
    {

      var tank_data= data;
      epanetjs.setMode(epanetjs.INPUT);



      $(elem).attr('fill','#9966ff');

      Highcharts.stockChart('tanks', {


        title: {
          text: 'Tanks Chart (VOLUME)'
        },

        subtitle: {
          text: 'tank ID = '+$(elem).attr('title')
        },

        xAxis: {
          gapGridLineWidth: 0
        },

        rangeSelector: {
          buttons: [{
            type: 'hour',
            count: 1,
            text: '1h'
          }, {
            type: 'day',
            count: 1,
            text: '1D'
          }, {
            type: 'all',
            count: 1,
            text: 'All'
          }],
          selected: 1,
          inputEnabled: false
        },

        series: [{
          name: 'AAPL',
          type: 'area',
          data:tank_data.VOLUME ,
          gapSize: 5,
          tooltip: {
            valueDecimals: 2
          },
          fillColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
            [0, Highcharts.getOptions().colors[0]],
            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
            ]
          },
          threshold: null
        }]
      });






    },
    error: function(jqXHR, textStatus, errorThrown)
    {


    }
  });

 }





}

















//////////////////////////////



function drow_measures_Pressure( )
{

  var step= (maxPressure - minPressure) / 5,i=1;

  for(var ii=minPressure ; ii <= maxPressure;ii+=step)
  {

    var id="#p_"+i, step_=(ii+step).toFixed(3);
    

    $(id).text((ii).toFixed(3) +" to " +step_ );
    ++i;
  }


}

function drow_measures_Demand( )
{

  var step= (maxDemand - minDemand) / 5,i=1;

  for(var ii=minDemand ; ii <= maxDemand;ii+=step)
  {

    var id="#d_"+i, step_=(ii+step).toFixed(3);


    $(id).text((ii).toFixed(3) +" to " +step_ );
    ++i;
  }


}

function drow_measures_Flow( )
{

  var step= (maxFlow - minFlow) / 5,i=1;

  for(var ii=minFlow ; ii <= maxFlow;ii+=step)
  {

    var id="#f_"+i, step_=(ii+step).toFixed(3);


    $(id).text((ii).toFixed(3) +" to " +step_ );
    ++i;
  }


}


function convert_to_time_long(startdate)
{

  var a=startdate.split(" ");
  var d=a[0].split("-");
  var t=a[1].split(":");
  startdate= new Date(d[0],(d[1]-1),d[2],t[0],t[1],t[2]);
  startdate = startdate.getTime();
  return startdate;
}















function update_time()
{
  jQuery(document).ready(function($){
    var timelines = $('.cd-horizontal-timeline'),
    eventsMinDistance = 60;

    (timelines.length > 0) && initTimeline(timelines);

    function initTimeline(timelines) {
      timelines.each(function(){
        var timeline = $(this),
        timelineComponents = {};
      //cache timeline components 
      timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
      timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
      timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
      timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
      timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
      timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
      timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
      timelineComponents['eventsContent'] = timeline.children('.events-content');

      //assign a left postion to the single events along the timeline
      setDatePosition(timelineComponents, eventsMinDistance);
      //assign a width to the timeline
      var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
      //the timeline has been initialize - show it
      timeline.addClass('loaded');

      //detect click on the next arrow
      timelineComponents['timelineNavigation'].on('click', '.next', function(event){
        event.preventDefault();
        updateSlide(timelineComponents, timelineTotWidth, 'next');
      });
      //detect click on the prev arrow
      timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
        event.preventDefault();
        updateSlide(timelineComponents, timelineTotWidth, 'prev');
      });
      //detect click on the a single event - show new event content
      timelineComponents['eventsWrapper'].on('click', 'a', function(event){
        event.preventDefault();
        timelineComponents['timelineEvents'].removeClass('selected');
        $(this).addClass('selected');
        updateOlderEvents($(this));
        updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
        updateVisibleContent($(this), timelineComponents['eventsContent']);
      });

      //on swipe, show next/prev event content
      timelineComponents['eventsContent'].on('swipeleft', function(){
        var mq = checkMQ();
        ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
      });
      timelineComponents['eventsContent'].on('swiperight', function(){
        var mq = checkMQ();
        ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
      });

      //keyboard navigation
      $(document).keyup(function(event){
        if(event.which=='37' && elementInViewport(timeline.get(0)) ) {
          showNewContent(timelineComponents, timelineTotWidth, 'prev');
        } else if( event.which=='39' && elementInViewport(timeline.get(0))) {
          showNewContent(timelineComponents, timelineTotWidth, 'next');
        }
      });
    });
    }

    function updateSlide(timelineComponents, timelineTotWidth, string) {
    //retrieve translateX value of timelineComponents['eventsWrapper']
    var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
    wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
    //translate the timeline to the left('next')/right('prev') 
    (string == 'next') 
    ? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
    : translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
  }

  function showNewContent(timelineComponents, timelineTotWidth, string) {
    //go from one event to the next/previous one
    var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
    newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

    if ( newContent.length > 0 ) { //if there's a next/prev event - show it
      var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
    newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');

    updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
    updateVisibleContent(newEvent, timelineComponents['eventsContent']);
    newEvent.addClass('selected');
    selectedDate.removeClass('selected');
    updateOlderEvents(newEvent);
    updateTimelinePosition(string, newEvent, timelineComponents);
  }
}

function updateTimelinePosition(string, event, timelineComponents) {
    //translate timeline to the left/right according to the position of the selected event
    var eventStyle = window.getComputedStyle(event.get(0), null),
    eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
    timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
    timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
    var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

    if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
      translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
    }
  }

  function translateTimeline(timelineComponents, value, totWidth) {
    var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
    value = (value > 0) ? 0 : value; //only negative translate value
    value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
    setTransformValue(eventsWrapper, 'translateX', value+'px');
    //update navigation arrows visibility
    (value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
    (value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
  }

  function updateFilling(selectedEvent, filling, totWidth) {
    //change .filling-line length according to the selected event
    var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
    eventLeft = eventStyle.getPropertyValue("left"),
    eventWidth = eventStyle.getPropertyValue("width");
    eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
    var scaleValue = eventLeft/totWidth;
    setTransformValue(filling.get(0), 'scaleX', scaleValue);
  }

  function setDatePosition(timelineComponents, min) {
    for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
      var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
      distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 2;
      timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
    }
  }

  function setTimelineWidth(timelineComponents, width) {
    var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
    timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
    timeSpanNorm = Math.round(timeSpanNorm) + 4,
    totalWidth = timeSpanNorm*width;
    timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
    updateFilling(timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents['fillingLine'], totalWidth);
    updateTimelinePosition('next', timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents);

    return totalWidth;
  }

  function updateVisibleContent(event, eventsContent) {
    var eventDate = event.data('date'),
    visibleContent = eventsContent.find('.selected'),
    selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
    selectedContentHeight = selectedContent.height();

    if (selectedContent.index() > visibleContent.index()) {
      var classEnetering = 'selected enter-right',
      classLeaving = 'leave-left';
    } else {
      var classEnetering = 'selected enter-left',
      classLeaving = 'leave-right';
    }

    selectedContent.attr('class', classEnetering);
    visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
      visibleContent.removeClass('leave-right leave-left');
      selectedContent.removeClass('enter-left enter-right');
    });
    eventsContent.css('height', selectedContentHeight+'px');
  }

  function updateOlderEvents(event) {
    event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
  }

  function getTranslateValue(timeline) {
    var timelineStyle = window.getComputedStyle(timeline.get(0), null),
    timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
    timelineStyle.getPropertyValue("-moz-transform") ||
    timelineStyle.getPropertyValue("-ms-transform") ||
    timelineStyle.getPropertyValue("-o-transform") ||
    timelineStyle.getPropertyValue("transform");

    if( timelineTranslate.indexOf('(') >=0 ) {
      var timelineTranslate = timelineTranslate.split('(')[1];
      timelineTranslate = timelineTranslate.split(')')[0];
      timelineTranslate = timelineTranslate.split(',');
      var translateValue = timelineTranslate[4];
    } else {
      var translateValue = 0;
    }

    return Number(translateValue);
  }

  function setTransformValue(element, property, value) {
    element.style["-webkit-transform"] = property+"("+value+")";
    element.style["-moz-transform"] = property+"("+value+")";
    element.style["-ms-transform"] = property+"("+value+")";
    element.style["-o-transform"] = property+"("+value+")";
    element.style["transform"] = property+"("+value+")";
  }

  //based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
  function parseDate(events) {
    var dateArrays = [];
    events.each(function(){
      var singleDate = $(this),
      dateComp = singleDate.data('date').split('T');
      if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
        var dayComp = dateComp[0].split('/'),
        timeComp = dateComp[1].split(':');
      } else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
        var dayComp = ["2000", "0", "0"],
        timeComp = dateComp[0].split(':');
      } else { //only DD/MM/YEAR
        var dayComp = dateComp[0].split('/'),
        timeComp = ["0", "0"];
      }
      var newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
      dateArrays.push(newDate);
    });
    return dateArrays;
  }

  function daydiff(first, second) {
    return Math.round((second-first));
  }

  function minLapse(dates) {
    //determine the minimum distance among events
    var dateDistances = [];
    for (i = 1; i < dates.length; i++) { 
      var distance = daydiff(dates[i-1], dates[i]);
      dateDistances.push(distance);
    }
    return Math.min.apply(null, dateDistances);
  }

  /*
    How to tell if a DOM element is visible in the current viewport?
    http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
    */
    function elementInViewport(el) {
      var top = el.offsetTop;
      var left = el.offsetLeft;
      var width = el.offsetWidth;
      var height = el.offsetHeight;

      while(el.offsetParent) {
        el = el.offsetParent;
        top += el.offsetTop;
        left += el.offsetLeft;
      }

      return (
        top < (window.pageYOffset + window.innerHeight) &&
        left < (window.pageXOffset + window.innerWidth) &&
        (top + height) > window.pageYOffset &&
        (left + width) > window.pageXOffset
        );
    }

    function checkMQ() {
    //check if mobile or desktop device
    return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
  }
});
}





function change_time(elem)
{

console.log(i_data_sm);

console.log(controle);
if( (i_data_sm==0) || (i_data_sm>0 && controle==1))
{

console.log("dddaaaa");
 paint_pressure= maxPressure - minPressure; 
 paint_demand = maxDemand - minDemand; 
 paint_flow= maxFlow- minFlow;

 var i_data_sm_=$(elem).attr('time_');
 dataaaa=data_sm;
 for(var iii=0;iii<data_sm.length;iii++)
 {
  if(data_sm[iii].time==i_data_sm_)
  {

    data_sm=data_sm[iii];
  }
}

var nodes=data_sm.data.nodes, pipes=data_sm.data.pipes,time=data_sm.time,tanks=data_sm.data.tanks;

////////////////////

jQuery.each( data_sm_leak, function( i, val ) {

  var html_leak='';
  if(i_data_sm_==val[0].time)
  {

    $.notify("Leak Detection !", "error");
    if( document.getElementById('line_'+val[0].pipeID))
    {
     html_leak+='<tr><td>'+val[0].pipeID+'</td>';
     html_leak+='<td> Between '+val[0].nodeID+' And '+val[0].secondNodeID+'</td>';
     html_leak+='<td>'+val[0].distance+'</td>';
     html_leak+='<td>'+i_data_sm_+'</td>';
     html_leak+='<td> <button pipe="'+val[0].pipeID+'" firstNode="'+val[0].nodeID+'" secondNode="'+val[0].secondNodeID+'" type="button" class="btn btn-info" onclick="simulate_leak(this)">Info</button></td> </tr>';
   }


 }

 $('#pipes_leak_sm').append(html_leak);
});



///////////////////


html="";
if(nodes.length>0)
{

  for(var j=0; j<nodes.length;j++)
  {



    paint_pressure_current= nodes[j].pressure - minPressure;
    paint_demand_current = nodes[j].demand - minDemand;
    if(j<100)
    {


      html+='<tr> <td><strong>'+nodes[j].id+'</strong></td>';
      html+='<td>'+nodes[j].pressure+'</td> ';
      html+='<td> <div class="progress progress-small progress-striped active"  > ';
      html+='<div style="width:  '+parseInt(((parseFloat(paint_pressure_current)*100)/paint_pressure))+'%; height: 10px; background-color: '+get_color_Pressure(nodes[j].pressure)+'!important;"></div><div class="progress-bar"  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="'+paint_pressure+'" style="width: '+parseInt(((parseFloat(paint_pressure_current)*100)/paint_pressure))+'%;">85%</div></div> </td>';
      html+='<td>'+nodes[j].demand+'</td> ';

      html+='<td> <div class="progress progress-small progress-striped active">';
      html+='<div style="width:  '+parseInt(((parseFloat(paint_demand_current)*100)/paint_demand))+'%; height: 10px; background-color: '+get_color_Demand(nodes[j].demand)+'!important;"></div><div class="progress-bar " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="'+paint_demand+'" style="width: '+parseInt(((parseFloat(paint_demand_current)*100)/paint_demand))+'%;">85%</div></div> </td> </tr>';
    }
    if( document.getElementById('circle_'+nodes[j].id))
    {
     document.getElementById('circle_'+nodes[j].id).setAttribute('fill',get_color_Pressure(nodes[j].pressure));

   }

 }


 $('#junc_sm').html('');
 $('#junc_sm').append(html);




} 


/////////////////////


html="";
if(pipes.length>0)
{

  for(var p=0;p<pipes.length;p++)
  {
    paint_flow_current= pipes[p].flow- minFlow;
    if(p<100)
    {

      html+='<tr> <td>'+pipes[p].id+'</td>';
      html+='<td>'+pipes[p].flow+'</td>';
       //html+='<td></td>';
   //  if(pipes[p].flow>0)
   //  {

   //   html+='<td>From :'+pipes[p].firstNode+' => To : '+pipes[p].secondNode+'</td>';
   // }
   // else
   // {
   //   html+='<td>From :'+pipes[p].secondNode+' => To : '+pipes[p].firstNode+'</td>';
   // }

   html+='<td> <div class="progress progress-small progress-striped active">';
   html+='<div style="width:  '+parseInt(((parseFloat(paint_flow_current)*100)/paint_flow))+'%; height: 10px; background-color: '+get_color_Flow(pipes[p].flow)+'!important;"></div><div class="progress-bar " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="'+paint_flow+'" style="width: '+parseInt(((parseFloat(paint_flow_current)*100)/paint_flow))+'%;">85%</div></div> </td> </tr>';
 }
 if( document.getElementById('line_'+pipes[p].id))
 {
  document.getElementById('line_'+pipes[p].id).setAttribute('stroke',get_color_Flow(pipes[p].flow));

}

}

$('#pipes_sm').html('');
$('#pipes_sm').append(html);

}


////////////////////////////////////

if(tanks.length>0)
{
  html="";
  for(var t=0; t<tanks.length;t++)
  {

    paint_pressure_current= tanks[t].pressure - minPressure;
    html+='<tr> <td>'+tanks[t].id+'</td>';
    html+='<td>'+tanks[t].pressure+'</td>';

    html+='<td>'+tanks[t].volume+'</td>';
    html+='<td> <div class="progress progress-small progress-striped active"  > ';
    html+='<div style="width:  '+parseInt(((parseFloat(paint_pressure_current)*100)/paint_pressure))+'%; height: 10px; background-color: '+get_color_Pressure(tanks[t].pressure)+'!important;"></div><div class="progress-bar"  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="'+paint_pressure+'" style="width: '+parseInt(((parseFloat(paint_pressure_current)*100)/paint_pressure))+'%;">85%</div></div> </td>';

  }


  $('#tank_sm').html('');
  $('#tank_sm').append(html);

}


////////////////////

data_sm=dataaaa;

}
}