<!DOCTYPE html>
<html lang="en">
<head>        
  <!-- META SECTION -->
  <title>SWMS</title>            
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->        
  <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/> 

  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 

  <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>

  <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="js/d3.v3.min.js"></script>
  <script type="text/javascript" src="js/epanet.js"></script>

  <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>  -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
  <script src="js/hammer.js"></script>
  <script src="js/svg-pan-zoom.min.js"></script>
  <!-- Bootstrap header -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>   
  <style type="text/css">
    ::-webkit-scrollbar {
      width: 1px;
    }

    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.3);
      border-radius: 2px;
    }

    ::-webkit-scrollbar-thumb {
      border-radius: 2px;
      -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.5);
    }

.timeline:before{

    background: #f5f5f5!important; 
    border: 1px solid rgb(245, 245, 245)!important;
}
    svg {
      background-color: rgb(90, 88, 88);
      cursor: default;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      -o-user-select: none;
      user-select: none;
    }

    .faq .faq-item.active .faq-text{
      max-height: 800!important;
    }

    svg:not(.active):not(.ctrl) {
      cursor: crosshair;
    }

    path.link {
      fill: none;
      stroke: #000;
      stroke-width: 4px;
      cursor: default;
    }

    svg:not(.active):not(.ctrl) path.link {
      cursor: pointer;
    }

    path.link.selected {
      stroke-dasharray: 10,2;
    }

    path.link.dragline {
      pointer-events: none;
    }

    path.link.hidden {
      stroke-width: 0;
    }

    circle.node {
      stroke-width: 1.5px;
      cursor: pointer;
    }

    text {
      font: 12px sans-serif;
      pointer-events: none;
    }

    text.id {
      text-anchor: middle;
      font-weight: bold;
    }






    .popover-content {
      font-size: 14px;
    }

    .well-sm {
      height: 54px;
      margin-bottom: 10px;
    }

    .well-analysis {
      padding-top: 15px;
    }

    .legendcolor {
      display: inline-block;
      width: 30px;
      height: 25px;

      margin-right: 2%;
      margin-bottom: -5%;
    }

    .sankeynode rect {
      cursor: move;
      fill-opacity: .9;
      shape-rendering: crispEdges;
    }

    .sankeynode text {
      pointer-events: none;
      text-shadow: 0 1px 0 #fff;
    }

    .sankeylink {
      fill: none;
      stroke: white;
      stroke-opacity: .2;
    }

    .sankeylink:hover {
      stroke-opacity: .5;
    }

    #status {
      margin-bottom: 24px;
      text-align: left;
    }

    #jumbotron {
      height: 500px;
      padding: 0px;
      margin-bottom: 0px;
    }

    #inputPre, #output {
      text-align:left;
      overflow-y: auto;
      white-space: nowrap;
    }

    #inputTextarea {
      width: 97%;
      height: 20em;
    }

    #inputButtons {
      width: 620px;    
    }

    #file {

      float:left; 
      font-size: 18px; 
      padding-top: 4px; 
      line-height:20px;
      display: none;
    }

    #inputModal .modal-content {
      width: 979px;
    }

    #saveButton {
      display: none;
    }

    #legend {
      /*margin-top: -496px;
      float: right;
      width: 250px;
      display: none;*/
    }

    .cd-horizontal-timeline .timeline{
      width: 100%!important;
      max-width: none;
    }
    #ad {
      text-align: center;
      min-height: 5px;
      margin-top: 1px;
    }

    /* RESPONSIVE CSS */

    .list-group-item{
      padding: 10px 10px!important;
    }


    .progress-bar_one {
      background-color: #d7191c!important;
    }

    .progress-bar_to {
      background-color: #fdae61!important;
    }
    .progress-bar_three {
      background-color: #ffffbf!important;
    }
    .progress-bar_four {
      background-color: #a6d96a!important;
    }
    .progress-bar_five {
      background-color: #1a9641!important;
    }


  </style>
  <!-- EOF CSS INCLUDE -->                                    
</head>
<body>
  <style>.page-container .page-content{
   margin-left:0px!important;
 }</style>

 <!-- START PAGE CONTAINER -->
 <div class="page-container">

  <!-- PAGE CONTENT -->
  <div class="page-content">

    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
      <!-- TOGGLE NAVIGATION -->
      <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
      </li>

      <!-- END TASKS -->
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                     

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
      <li><a href="#">Home</a></li>                    
      <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB -->                       

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">



      <div class="row">

        <div class="col-md-12" >

          <!-- START SALES BLOCK -->
          <div class="panel panel-default" >
            <div class="panel-heading">
              <div class="panel-title-box">
                <h3>Measures</h3>
                <span>measures  tanks and juncs </span>
              </div>                                     
              <ul class="panel-controls panel-controls-title">                                        

                <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
              </ul>                                    

            </div> 
            

            <!-- START JUSTIFIED TABS -->
            <div class="panel panel-default tabs" style="box-shadow: 0px 1px 1px 0px rgb(255, 255, 255)!important;">
              <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab8" data-toggle="tab">NODEs</a></li>
                <li><a href="#tab9" data-toggle="tab">LINKs</a></li> 
              </ul>
              <div class="panel-body tab-content">
                <div class="tab-pane active" id="tab8">
                  <h5 style="text-align: center">Demand</h5>

                  <div class="row center-block text-center">
                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#1a9641" class="legendcolor"> </span><span > <a id="d_1">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#fdae61" class="legendcolor"> </span><span><a id="d_2">-666.624 to 2.520 </a> </span></li>

                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#ffffbf" class="legendcolor"> </span><span> <a id="d_3">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#a6d96a" class="legendcolor"> </span><span> <a id="d_4">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#d7191c" class="legendcolor"> </span><span> <a id="d_5">-666.624 to 2.520 </a> </span></li>
                    </div>

                  </div>
                  <h5 style="text-align: center ;    margin-top: 2%;">Pressure</h5>

                  <div class="row center-block text-center">
                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#1a9641" class="legendcolor"> </span><span > <a id="p_1">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#fdae61" class="legendcolor"> </span><span><a id="p_2">-666.624 to 2.520 </a> </span></li>

                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#ffffbf" class="legendcolor"> </span><span> <a id="p_3">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#a6d96a" class="legendcolor"> </span><span> <a id="p_4">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#d7191c" class="legendcolor"> </span><span> <a id="p_5">-666.624 to 2.520 </a> </span></li>
                    </div>

                  </div>



                </div>
                <div class="tab-pane" id="tab9">
                  <h5 style="text-align: center ;    margin-top: 2%;">Flow</h5>

                  <div class="row center-block text-center">
                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#0571b0" class="legendcolor"> </span><span > <a id="f_1">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#f4a582" class="legendcolor"> </span><span><a id="f_2">-666.624 to 2.520 </a> </span></li>

                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#929292" class="legendcolor"> </span><span> <a id="f_3">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">

                      <li class="list-group-item"><span style="background:#92c5de" class="legendcolor"> </span><span> <a id="f_4">-666.624 to 2.520 </a> </span></li>
                    </div>

                    <div class="col-lg-2">
                      <li class="list-group-item"><span style="background:#ca0020" class="legendcolor"> </span><span> <a id="f_5">-666.624 to 2.520 </a> </span></li>
                    </div>

                  </div>

                </div>

              </div>

            </div>  
          </div>    
        </div>  
      </div>                       

      <div class="row">

        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title-box">
                <h3>Networks</h3>
                <span></span>
              </div>                                     
              <ul class="panel-controls panel-controls-title">                                        

                <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
              </ul>                                    

            </div>
            <div class="panel-body">  
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-2">

                    <a href="javascript:epanetjs.loadSample('Net1.inp')"><button type="button" class="btn btn-info btn-rounded" file_name="Net1.inp" onclick="change_file_name(this)">Network 1</button></a>

                  </div> 
                  <div class="col-lg-2">

                    <a href="javascript:epanetjs.loadSample('Net2.inp')"><button type="button" class="btn btn-info btn-rounded"  file_name="Net2.inp" onclick="change_file_name(this)">Network 2</button></a>
                  </div>

                  <div class="col-lg-2">

                    <a href="javascript:epanetjs.loadSample('Net3.inp')"><button type="button" class="btn btn-info btn-rounded"  file_name="Net3.inp" onclick="change_file_name(this)">Network 3</button></a>
                  </div>

                  <div class="col-lg-2">

                    <a href="javascript:epanetjs.loadSample('M.inp')"><button type="button" class="btn btn-info btn-rounded" file_name="M.inp" onclick="change_file_name(this)">Network 4 (Big)</button></a>

                  </div>
                </div>

              </div>
            </div>

          </div>

        </div>

      </div>
      <div class="row">



<!--<div class="col-lg-2">
   <div id="legend">
          </div>

</div>

!-->



<div class="col-md-12 ">

  <!-- START SALES BLOCK -->
  <div id="jumbotron__" class="panel panel-default ">
    <div class="panel-heading">
      <div class="panel-title-box">
        <h3 class="">Netowrk</h3>
        <span></span>
      </div>                                     
      <ul class="panel-controls panel-controls-title">                                        

        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
      </ul>                                    

    </div>
    <div class="panel-body">                                    
      <div class="row stacked">

        <div class="col-md-12">
          <div id="inputModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Edit EPANET Model</h3>
                </div>
                <div class="modal-body">
                  <textarea id="inputTextarea">
                   [TITLE]
                   EPANET Example Network 1
                   A simple example of modeling chlorine decay. Both bulk and
                   wall reactions are included. 

                   [JUNCTIONS]
                   ;ID               Elev          Demand        Pattern         
                   10               710           0                               ;
                   11               710           150                             ;
                   12               700           150                             ;
                   13               695           100                             ;
                   21               700           150                             ;
                   22               695           200                             ;
                   23               690           150                             ;
                   31               700           100                             ;
                   32               710           100                             ;

                   [RESERVOIRS]
                   ;ID               Head          Pattern         
                   9                800                             ;

                   [TANKS]
                   ;ID               Elevation     InitLevel     MinLevel      MaxLevel      Diameter      MinVol        VolCurve
                   2                850           120           100           150           50.5          0                               ;

                   [PIPES]
                   ;ID               Node1             Node2             Length        Diameter      Roughness     MinorLoss     Status
                   10               10                11                10530         18            100           0             Open    ;
                   11               11                12                5280          14            100           0             Open    ;
                   12               12                13                5280          10            100           0             Open    ;
                   21               21                22                5280          10            100           0             Open    ;
                   22               22                23                5280          12            100           0             Open    ;
                   31               31                32                5280          6             100           0             Open    ;
                   110              2                 12                200           18            100           0             Open    ;
                   111              11                21                5280          10            100           0             Open    ;
                   112              12                22                5280          12            100           0             Open    ;
                   113              13                23                5280          8             100           0             Open    ;
                   121              21                31                5280          8             100           0             Open    ;
                   122              22                32                5280          6             100           0             Open    ;

                   [PUMPS]
                   ;ID               Node1             Node2             Parameters
                   9                9                 10                HEAD 1  ;

                   [VALVES]
                   ;ID               Node1             Node2             Diameter      Type  Setting       MinorLoss   

                   [TAGS]

                   [DEMANDS]
                   ;Junction         Demand        Pattern           Category

                   [STATUS]
                   ;ID               Status/Setting

                   [PATTERNS]
                   ;ID               Multipliers
                   ;Demand Pattern
                   1                1.0           1.2           1.4           1.6           1.4           1.2         
                   1                1.0           0.8           0.6           0.4           0.6           0.8         

                   [CURVES]
                   ;ID               X-Value       Y-Value
                   ;PUMP: Pump Curve for Pump 9
                   1                1500          250         

                   [CONTROLS]
                   LINK 9 OPEN IF NODE 2 BELOW 110
                   LINK 9 CLOSED IF NODE 2 ABOVE 140


                   [RULES]

                   [ENERGY]
                   Global Efficiency    75
                   Global Price         0.0
                   Demand Charge        0.0

                   [EMITTERS]
                   ;Junction         Coefficient

                   [QUALITY]
                   ;Node             InitQual
                   10               0.5
                   11               0.5
                   12               0.5
                   13               0.5
                   21               0.5
                   22               0.5
                   23               0.5
                   31               0.5
                   32               0.5
                   9                1.0
                   2                1.0

                   [SOURCES]
                   ;Node             Type          Quality       Pattern

                   [REACTIONS]
                   ;Type       Pipe/Tank         Coefficient


                   [REACTIONS]
                   Order Bulk             1
                   Order Tank             1
                   Order Wall             1
                   Global Bulk            -.5
                   Global Wall            -1
                   Limiting Potential     0.0
                   Roughness Correlation  0.0

                   [MIXING]
                   ;Tank             Model

                   [TIMES]
                   Duration             24:00 
                   Hydraulic Timestep   1:00 
                   Quality Timestep     0:05 
                   Pattern Timestep     2:00 
                   Pattern Start        0:00 
                   Report Timestep      1:00 
                   Report Start         0:00 
                   Start ClockTime      12 am
                   Statistic            None

                   [REPORT]
                   Status               Yes
                   Summary              No
                   Page                 0

                   [OPTIONS]
                   Units                GPM
                   Headloss             H-W
                   Specific Gravity     1.0
                   Viscosity            1.0
                   Trials               40
                   Accuracy             0.001
                   CHECKFREQ            2
                   MAXCHECK             10
                   DAMPLIMIT            0
                   Unbalanced           Continue 10
                   Pattern              1
                   Demand Multiplier    1.0
                   Emitter Exponent     0.5
                   Quality              Chlorine mg/L
                   Diffusivity          1.0
                   Tolerance            0.01

                   [COORDINATES]
                   ;Node             X-Coord           Y-Coord
                   10               20.00             70.00           
                   11               30.00             70.00           
                   12               50.00             70.00           
                   13               70.00             70.00           
                   21               30.00             40.00           
                   22               50.00             40.00           
                   23               70.00             40.00           
                   31               30.00             10.00           
                   32               50.00             10.00           
                   9                10.00             70.00           
                   2                50.00             90.00           

                   [VERTICES]
                   ;Link             X-Coord           Y-Coord

                   [LABELS]
                   ;X-Coord           Y-Coord          Label & Anchor Node
                   6.99             73.63            "Source"                 
                   13.48            68.13            "Pump"                 
                   43.85            91.21            "Tank"                 

                   [BACKDROP]
                   DIMENSIONS       7.00              6.00              73.00             94.00           
                   UNITS            None
                   FILE             
                   OFFSET           0.00              0.00            

                   [END]


                 </textarea>
               </div>
               <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-primary" onclick="runButton()">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <!-- NAVBAR -->





        <div class="row ">
          <div class="col-lg-12 " style="    height: 593px;">
<!--
  <div id="map" style="height: 600px;"></div> -->
<!-- <div style="width:100%; height: 593px;     background: url(w.png);"></div>
               <div id="jumbotron" class="jumbotron"  style="background-color:  rgba(238, 238, 238, 0)!important;position: absolute;
    top: 0px;
    width: 100%;">
                <svg id="svgSimple" width="100%" style="height: 600px!important"></svg>
              </div>  -->

              <div id="jumbotron" class="jumbotron lll "  >
                <svg id="svgSimple" class="svg_" width="100%" style="height: 600px!important"></svg>
              </div>
            </div>



          </div>

          <div class=" marketing">
            <div id="ad">

            </div>
            <div class="row" style="    display: none;">
              <div class="col-lg-6" id="inputContainer" style="    padding: 1%;">

                <h2 class="">Input
                  <button type="button" class="btn btn-default" data-content="Select File-&gt;Export-&gt;Network... in EPANET to save INP files. If opening does not work, open in text editor, then copy and paste." title="" data-toggle="popover" data-original-title="INP file input">
                    <span class="glyphicon glyphicon-info-sign"></span>
                  </button>
                </h2>

                <div class="well well-sm" id="inputButtons">
                  <input type="file" id="file" style="display: none" data-toggle="tooltip" title="File is kept locally in your browser. It is not sent to the server."/> 
                  <button id="saveButton" class="btn" type="button" role="button" onclick="saveButton()" data-toggle="tooltip" title="Save model in INP format.">Save</button>              
                  <button href="#inputModal" type="button" role="button" class="btn" data-toggle="modal">Edit</button>
                </div>
                <pre id="inputPre" data-toggle="tooltip" title="Click to edit">
                </pre>          
              </div><!-- /.col-lg-8 -->
              <div class="col-lg-6" id="analysisContainer" style="padding: 1%;">
                <h2>Analysis</h2> 
                <div class="well well-sm well-analysis">
                  <span id="status">
                    <span class="label label-success">Success</span>
                  </span>    
                  Time
                  <select id="time" onchange="epanetjs.renderAnalysis()">
                    <option>1</option>
                  </select>
                  &nbsp;Node
                  <select id="nodeResult" onchange="epanetjs.renderAnalysis()">
                    <option>Demand</option>
                    <option>Head</option>
                    <option>Pressure</option>
                  </select>
                  &nbsp;Link
                  <select id="linkResult" onchange="epanetjs.renderAnalysis()">
                    <option>Flow</option>
                    <option>Velocity</option>
                    <option>Headloss</option>
                  </select>
                </div>         
                <pre id="output"></pre>
              </div><!-- /.col-lg-8 -->        
            </div><!-- /.row -->


            <!-- FOOTER -->


          </div><!-- /.container -->

          <!-- About modal -->
          <div id="about" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">epanet.js 2.0.12.4</h4>
                </div>
                <div class="modal-body">
                  <p>Copyright &copy; 2013 Steffen Macke and others.</p>
                  <p>Analyse EPANET INP files in your browser. The INP files
                    are kept locally in the browser and not send to a server.</p>
                    <p>Uses the original EPANET 2 source code.</p>
                    <p>This product includes color specifications and designs 
                     developed by Cynthia Brewer (http://colorbrewer.org/).</p>
                     <p>Epanet.de is not affiliated with or managed by the United 
                       States Environmental Protection Agency or any other 
                       governmental agency.</p>
                       <p>Additional information is available on 
                         <a href="http://epanet.de/developer/epanetjs.html">epanet.de/developer/epanetjs.html</a>.</p>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">OK</button>                    
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- progress modal -->
                <div id="working" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-cog"></span> EPANET analysis in progress</h4>
                      </div>
                      <div class="modal-body">
                        <p><span class="glyphicon glyphicon-time"></span> Please wait...</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">OK</button>                    
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


              </div>
              <progress value="0" max="100" id="progress" hidden=1></progress>
            </div>                                    
          </div>
        </div>
        <!-- END SALES BLOCK -->

      </div>
      <div class="col-md-12" >

        <!-- START SALES BLOCK -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title-box">
              <h3>Options</h3>
              <span></span>
            </div>                                     
            <ul class="panel-controls panel-controls-title">                                        

              <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
            </ul>                                    

          </div>
            <!--<div class="panel-body">  
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-12">

                    
                  </div>
                  <hr>
                  <div class="col-lg-12">

                   
                  </div>
                </div>

              </div>
            </div>!-->


            <div class="panel-body faq" style="   ">

              <div class="faq-item">
                <div class="faq-title"><span class="fa fa-angle-down"></span>Pump Chart </div>
                <div class="faq-text">
                  <div class="row" style="    margin-bottom: 2%;">
                    <div class="col-lg-6">
                      <div class="row">
                        <h5 style="text-align: center">From</h5>
                        <div class="col-lg-6">

                         <div class="input-group">
                           <input type="text" id="pump_from_date"  class="form-control datepicker" value="2017-06-01" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>

                       </div>

                       <div class="col-lg-6">
                        <div class="form-group">  
                          <div class="input-group bootstrap-timepicker">
                            <input  id="pump_from_time"  type="text" class="form-control timepicker24"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                          </div>

                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                      <h5 style="text-align: center">To</h5>
                      <div class="col-lg-6">

                       <div class="input-group">
                        <input  id="pump_to_date"  type="text" class="form-control datepicker" value="2017-06-20" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>

                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">  
                        <div class="input-group bootstrap-timepicker">
                          <input  id="pump_to_time"  type="text" class="form-control timepicker24"/>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div id="ch_pump" style="height: 350px; width: 100%;"></div>
            </div>
          </div>






          <div class="faq-item">
            <div class="faq-title"><span class="fa fa-angle-down"></span>Tanks Chart </div>
            <div class="faq-text">
              <div class="row" style="    margin-bottom: 2%;">
                <div class="col-lg-6">
                  <div class="row">
                    <h5 style="text-align: center">From</h5>
                    <div class="col-lg-6">

                     <div class="input-group">
                       <input type="text" id="tank_from_date"  class="form-control datepicker" value="2017-06-01" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>
                       <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                     </div>

                   </div>

                   <div class="col-lg-6">
                    <div class="form-group">  
                      <div class="input-group bootstrap-timepicker">
                        <input  id="tank_from_time"  type="text" class="form-control timepicker24"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                      </div>

                    </div>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="row">
                  <h5 style="text-align: center">To</h5>
                  <div class="col-lg-6">

                   <div class="input-group">
                    <input  id="tank_to_date"  type="text" class="form-control datepicker" value="2017-06-20" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>

                </div>

                <div class="col-lg-6">
                  <div class="form-group">  
                    <div class="input-group bootstrap-timepicker">
                      <input  id="tank_to_time"  type="text" class="form-control timepicker24"/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div id="tanks" style="height: 350px; width: 100%;"></div>
        </div>
      </div>
      <div class="faq-item">
        <div class="faq-title"><span class="fa fa-angle-down"></span>Junc Chart</div>
        <div class="faq-text">
          <div class="row" style="    margin-bottom: 2%;">
            <div class="col-lg-6">
              <div class="row">
                <h5 style="text-align: center">From</h5>
                <div class="col-lg-6">

                 <div class="input-group">
                  <input type="text"  id="junc_from_date"   class="form-control datepicker" value="2017-06-01" data-date="" data-date-format="yyy-mm-dd" data-date-viewmode="years"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>

              </div>

              <div class="col-lg-6">
                <div class="form-group">  
                  <div class="input-group bootstrap-timepicker">
                    <input type="text"  id="junc_from_time"   class="form-control timepicker24"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>

                </div>
              </div>
            </div>


          </div>
          <div class="col-lg-6">
            <div class="row">
              <h5 style="text-align: center">To</h5>
              <div class="col-lg-6">

               <div class="input-group">
                <input type="text"  id="junc_to_date"  class="form-control datepicker" value="2017-06-20" data-date="" data-date-format="yyy-mm-dd" data-date-viewmode="years"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>

            </div>

            <div class="col-lg-6">
              <div class="form-group">  
                <div class="input-group bootstrap-timepicker">
                  <input type="text"  id="junc_to_time"  class="form-control timepicker24"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>




      <div class="col-md-12">
        <!-- START TABS -->                                
        <div class="panel panel-default tabs">                            
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Pressure</a></li>
            <li><a href="#tab-second" role="tab" data-toggle="tab">Demand</a></li> 
          </ul>                            
          <div class="panel-body tab-content">
            <div class="tab-pane active" id="tab-first">

              <div id="junc_p" style="height: 400px; width: 100%;"></div>
            </div>
            <div class="tab-pane" id="tab-second">

              <div id="junc_d" style="height: 400px; width: 100%;"></div>
            </div>


          </div>
        </div>                                                   
        <!-- END TABS -->                        
      </div>
    </div>
  </div>








  <div class="faq-item">
    <div class="faq-title"><span class="fa fa-angle-down"></span>Simulation</div>
    <div class="faq-text" style="    padding: 0px 0px;">


      <div class="row">

        <div class="col-lg-12  text-center center-block">

          <div class="form-group">
            <label class=" control-label"> </label>

            <label class="switch" style="margin-top: 4%;">
             <p>Start Simulation</p> 
             <input type="checkbox" id="start_simulate_" value="2">
             <span></span>
           </label>


         </div>

         <section class="cd-horizontal-timeline" style="    margin-top: 1%;">
          <div class="timeline">
            <div class="events-wrapper">
              <div class="events">
                <ol style="list-style: none;" id="ol_times">
                  <li><a href="#0"  data-date="16/01/2014" class="selected">16 Jan</a></li>
                  <li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
                  <li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
                  <li><a href="#0" data-date="20/05/2014">20 May</a></li>
                  <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
                  <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
                  <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
                  <li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
                  <li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
                  <li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
                  <li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
                </ol>


                <span class="filling-line" aria-hidden="true"></span>
              </div> 
            </div> 

            <ul class="cd-timeline-navigation" style="list-style: none;">
              <li><a href="#0" class="prev inactive">Prev</a></li>
              <li><a href="#0" class="next">Next</a></li>
            </ul> 
          </div> 


        </section>

<!-- 
        <button class="btn btn-primary"  onclick="start_simulate()">START</button>  -->
      </div> 
      <div class="col-lg-12" id="juncs">
       <!-- START PROJECTS BLOCK -->
       <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title-box">
            <h3>Juncs</h3>
            <span>Simulate All Juncs</span>
          </div>                                    
          <ul class="panel-controls" style="margin-top: 2px;">
            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                       
          </ul>
        </div>
        <div class="panel-body panel-body-table" style="    overflow: scroll;
        height: 350px;">

        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="10%">Junc ID</th>
                <th width="10%">Pressure</th>
                <th width="35%">Status</th>
                <th width="10%">Demand</th>
                <th width="35%">Status</th>
              </tr>
            </thead>
            <tbody id="junc_sm">
                    <!--   <tr>
                        <td><strong>Atlant</strong></td>
                        <td><span class="label label-danger">Developing</span></td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 10px; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar_four" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 100%; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                      </tr>
                    -->

                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <!-- END PROJECTS BLOCK -->


        </div>






        <div class="col-lg-7" id="juncs">
         <!-- START PROJECTS BLOCK -->
         <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title-box">
              <h3>Pipes</h3>
              <span>Simulate All Pipes</span>
            </div>                                    
            <ul class="panel-controls" style="margin-top: 2px;">
              <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                       
            </ul>
          </div>
          <div class="panel-body panel-body-table" style="    overflow: scroll;
          height: 350px;">

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10%">PipeID</th>
                  <th width="10%">Flow</th>
                  <!-- <th width="35%">Direction</th>  -->
                  <th width="35%">Status</th> 
                </tr>
              </thead>
              <tbody id="pipes_sm">
                    <!--   <tr>
                        <td><strong>Atlant</strong></td>
                        <td><span class="label label-danger">Developing</span></td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 10px; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar_four" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 100%; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                      </tr>
                    -->

                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <!-- END PROJECTS BLOCK -->


        </div>




        <div class="col-lg-5" id="juncs">
         <!-- START PROJECTS BLOCK -->
         <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title-box">
              <h3>Tanks</h3>
              <span>Simulate All Tanks</span>
            </div>                                    
            <ul class="panel-controls" style="margin-top: 2px;">
              <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                       
            </ul>
          </div>
          <div class="panel-body panel-body-table" style="    overflow: scroll;
          height: 350px;">

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10%">TankID</th>
                  <th width="30%">Flow</th> 
                  <th width="30%">Volume</th> 
                  <th width="60%">sttus</th> 
                </tr>
              </thead>
              <tbody id="tank_sm">
                    <!--   <tr>
                        <td><strong>Atlant</strong></td>
                        <td><span class="label label-danger">Developing</span></td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 10px; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar_four" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div style="width: 100%; height: 10px; background-color: red;"></div>
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                        <td>
                          <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                          </div>
                        </td>
                      </tr>
                    -->

                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <!-- END PROJECTS BLOCK -->


        </div>


      </div>

    </div>
  </div>


























</div>
</div>
</div>

<div class="col-md-12">

  <!-- START SALES BLOCK -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title-box">
        <h3>Leak</h3>
        <span></span>
      </div>                                     
      <ul class="panel-controls panel-controls-title">                                        

        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
      </ul>                                    

    </div>
    <div class="panel-body">                     

      <div class="col-md-12">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default" style="    height: 306px;
        overflow: scroll;">
        <div class="panel-heading ui-draggable-handle">
          <div class="panel-title-box">
            <h3>LEAKS</h3>
            <span>Leaks Details</span>
          </div>                                    
          <ul class="panel-controls" style="margin-top: 2px;">
            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>

          </ul>
        </div>
        <div class="panel-body panel-body-table">

          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="15%">Pipe ID</th>
                  <th width="30%">Details</th>
                  <th width="20%">Distance</th>

                  <th width="20%">Time</th>

                  <th width="15%">Event</th>
                </tr>
              </thead>
              <tbody id="pipes_leak_sm">


              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- END PROJECTS BLOCK -->

    </div>


  </div>
</div>
</div>





</div>
<!-- END DASHBOARD CHART -->

 


</div>
<!-- END PAGE CONTENT WRAPPER -->                                
</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->


<!-- END PRELOADS -->                  


<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                 
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 

<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>



<script type="text/javascript" src="js/plugins/highlight/jquery.highlight-4.js"></script>

<!-- END THIS PAGE PLUGINS -->       

<!-- START TEMPLATE --> 

<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script> 
<script type="text/javascript" src="js/faq.js"></script>



<!-- END TEMPLATE -->
<script type="text/javascript" src="js/demo_dashboard.js"></script>

<script src="js/FileSaver.min.js"></script> 

<script src="js/highstock.js"></script>
<script src="js/exporting.js"></script> 

<script src="js/ajax.js"></script>
<script src="js/data.js"></script>

<script src="js/notify.min.js"></script> 
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script>


 window.onload = function() {
  var panZoom = window.panZoom = svgPanZoom('.svg_', {
    zoomEnabled: true,
    controlIconsEnabled: true,
    fit: 1,
    center: 1
  });

  $(window).resize(function(){
    panZoom.resize();
    panZoom.fit();
    panZoom.center();
  })
};
           //     $(".timepicker24").timepicker({minuteStep: 5,showSeconds: true,showMeridian: false});
           !function ($) {
            $(function() {
              try {
                var reader = new FileReader();
                if(reader)
                  $("input[type=file").show();
              } catch (e) {}
              try {
                var blob = new Blob();
                if(blob)
                  $("#saveButton").show();
              } catch (e) {}
              $("[data-toggle=popover]").popover();
            })
          }(window.jQuery)

          if(window.File && window.FileReader && window.FileList)
            document.getElementById('file').style.display = 'block';
          function handleFileSelect(evt) {
            if(!evt.target || !evt.target.files || !evt.target.files.length || 0 == evt.target.files.length)
             return;

           var f = evt.target.files[0],
           reader = new FileReader();
           reader.onload = (function(theFile) {
            return function(e) {
              document.getElementById('inputTextarea').value = e.target.result;
              runButton();
            };
          })(f);

          reader.readAsText(f);
        }
        document.getElementById('file').addEventListener('change', handleFileSelect, false);
        $('#inputPre').on('click', function () {$('#inputModal').modal('show');});

       // connect to canvas
       var Module = {
        preRun: [],
        postRun: [],
        print: (function() {
          var element = document.getElementById('output');
          element.value = ''; // clear browser cache
          return function(text) {
            text = Array.prototype.slice.call(arguments).join(' ');
            // These replacements are necessary if you render to raw HTML
            //text = text.replace(/&/g, "&amp;");
            //text = text.replace(/</g, "&lt;");
            //text = text.replace(/>/g, "&gt;");
            //text = text.replace('\n', '<br>', 'g');
            element.value += text + "\n";
            element.scrollTop = element.scrollHeight; // focus on bottom
          };
        })(),
        printErr: function(text) {
          text = Array.prototype.slice.call(arguments).join(' ');
          if (0) { // XXX disabled for safety typeof dump == 'function') {
            dump(text + '\n'); // fast, straight to the real console
          } else {
            console.log("");
          }
        },
        canvas: document.getElementById('canvas'),
        setStatus: function(text) {
          if (!Module.setStatus.last) Module.setStatus.last = { time: Date.now(), text: '' };
          if (text === Module.setStatus.text) return;
          var m = text.match(/([^(]+)\((\d+(\.\d+)?)\/(\d+)\)/);
          var now = Date.now();
          if (m && now - Date.now() < 30) return; // if this is a progress update, skip it if too soon
          var statusElement = document.getElementById('status');
          var progressElement = document.getElementById('progress');
          if (m) {
            text = m[1];
            progressElement.value = parseInt(m[2])*100;
            progressElement.max = parseInt(m[4])*100;
            progressElement.hidden = false;
          } else {
            progressElement.value = null;
            progressElement.max = null;
            progressElement.hidden = true;
          }
          statusElement.innerHTML = text;
        },
        totalDependencies: 0,
        monitorRunDependencies: function(left) {
          this.totalDependencies = Math.max(this.totalDependencies, left);
          Module.setStatus(left ? 'Preparing... (' + (this.totalDependencies-left) + '/' + this.totalDependencies + ')' : 'All downloads complete.');
        }
      };
      Module.setStatus('Downloading...');


      function drow_chart_JUNCTIONS (elem)
      {
        get_data_junc(elem);



        var svgElement = document.querySelector('.svg_')
        var panZoomTiger = svgPanZoom(svgElement)
      }
      function drow_chart_pump(elem)
      {
       get_data_pump(elem);
     }


     function drow_chart_TANKS (elem)
     {

      get_data_tank(elem);



    }

    function drow_chart_RESERVOIRS (elem)
    {
      //  console.log(elem);



    }
    function drow_chart_Link (elem)
    {
      console.log(elem);

// get_data_tank(elem);

$(elem).attr('stroke','#9966ff');
}
</script>



<script src="js/js.js"></script>

<!-- END TEMPLATE -->
<!-- END SCRIPTS -->         
</body>
</html>



<script>

  function start_simulate()
  {

    simulate_data();
  }
  function simulate_data()
  {


    paint_pressure= maxPressure - minPressure; 
    paint_demand = maxDemand - minDemand; 
    paint_flow= maxFlow- minFlow;

    var nodes=data_sm[i_data_sm].data.nodes, pipes=data_sm[i_data_sm].data.pipes,time=data_sm[i_data_sm].time,tanks=data_sm[i_data_sm].data.tanks;
    var id_time_clickable="#time__"+time;


    if(controle==0)
    {

      jQuery.each( data_sm_leak, function( i, val ) {

        var html_leak='';
        if(time==val[0].time)
        {

          
          if( document.getElementById('line_'+val[0].pipeID))
          {
            $.notify("Leak Detection !", "error");
           html_leak+='<tr><td>'+val[0].pipeID+'</td>';
           html_leak+='<td> Between '+val[0].nodeID+' And '+val[0].secondNodeID+'</td>';
           html_leak+='<td>'+val[0].distance+'</td>';
           html_leak+='<td>'+time+'</td>';
           html_leak+='<td> <button pipe="'+val[0].pipeID+'" firstNode="'+val[0].nodeID+'" secondNode="'+val[0].secondNodeID+'" type="button" class="btn btn-info" onclick="simulate_leak(this)">Info</button></td> </tr>';
         }


       }

       $('#pipes_leak_sm').append(html_leak);
     });


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


}

if(i_data_sm<data_sm.length-1)
{

  if( $('#start_simulate_').is(':checked'))

  {


    controle=0;
    ++i_data_sm;
    $(document).ready(function(){
      $( id_time_clickable ).trigger( "click" );

    });
  }
  else
  {

    controle=1;
  }
}
else
{
  i_data_sm=0;
  return;
}


window.setTimeout(simulate_data, 2000);
}




function get_color_Pressure(number)
{
  var color= ["#1a9641","#fdae61","#ffffbf","#a6d96a","#d7191c"];

  var color_name= ["one","tow","three","four","five"];
  var step= (maxPressure - minPressure) / 5,i=1;
  var i=0;
  for(var ii=minPressure ; ii <= maxPressure;ii+=step)
  {

    step_=(ii+step).toFixed(3); 
    if(number>=ii && number<=step_)
    {


      return color[i];
    }
    
    ++i;
  }
}



function get_color_Flow(number)
{
  var color= ["#0571b0","#f4a582","#929292","#92c5de","#ca0020"];

  var step= (maxFlow - minFlow) / 5,i=1;
  var i=0;
  for(var ii=minFlow ; ii <= maxFlow;ii+=step)
  {

    step_=(ii+step).toFixed(3); 
    if(number>=ii && number<=step_)
    {


      return color[i];
    }


    
    ++i;
  }
}



function get_color_Demand(number)
{
  var color= ["#1a9641","#fdae61","#ffffbf","#a6d96a","#d7191c"];
  var step= (maxDemand - minDemand) / 5,i=1;
  var i=0;
  for(var ii=minDemand ; ii <= maxDemand;ii+=step)
  {

    step_=(ii+step).toFixed(3); 
    if(number>=ii && number<=step_)
    {

      return color[i];
    }
    
    ++i;
  }
}




function simulate_leak(elem)
{

 epanetjs.setMode(epanetjs.INPUT)

 document.getElementById('line_'+$(elem).attr('pipe')).setAttribute('stroke','#d7191c');


 document.getElementById('circle_'+$(elem).attr('firstNode')).setAttribute('fill','#d7191c');

 document.getElementById('circle_'+$(elem).attr('secondNode')).setAttribute('fill','#d7191c');
}


function change_file_name(elem)
{
  file_name=$(elem).attr('file_name');
  console.log(file_name);
  if(file_name=="M.inp")
  {
    data_sm=data_big_net;

    data_sm_leak= data_big_leak;
    status_big(data_big_status); 
    console.log(data_sm);

    var html="";
    for(var times=1;times<=data_sm.length;times++)
    {
      var d= new Date(data_sm[times-1].time);


      if(times==1)
      {
       html+='<li><a href="#0"  id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" data-date="'+times+'/01/2014" class="selected">'+d.getHours()+':00'+'</a></li>';

     }
     else
     {
       html+='<li><a href="#0"  id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" data-date="'+times+'/01/2014" class="">'+d.getHours()+':00'+'</a></li>';

     }

   }
   $('#ol_times').html('');

   $('#ol_times').append(html);

   update_time();


   $('#pipes_leak_sm').html('');
   $('#junc_sm').html('');

   $('#pipes_sm').html('');

   $('#tank_sm').html('');
i_data_sm=0;
 }
 else
 {
   status();
   measure();
   leak();

   console.log(data_sm);
   var html="";
   for(var times=1;times<=data_sm.length;times++)
   {
    var d= new Date(data_sm[times-1].time);

    // html+='<li><a href="#0"  data-date="'+times+'/01/2014" class="">'+d.getMonth()+' '+d.getDate() +' ' +d.getFullYear()+' '+ d.getHours()+':00:00'+  '</a></li>';
    if(times==1)
    {
     html+='<li><a href="#0" id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" data-date="'+times+'/01/2014" class="selected">'+d.getHours()+':00'+'</a></li>';

   }
   else
   {
     html+='<li><a href="#0"  id="time__'+data_sm[times-1].time+'" onclick="change_time(this)" data-date="'+times+'/01/2014" class="">'+d.getHours()+':00'+'</a></li>';

   }
   
 }
 $('#ol_times').html('');

 $('#ol_times').append(html);




 update_time();




 $('#pipes_leak_sm').html('');
 $('#junc_sm').html('');

 $('#pipes_sm').html('');

 $('#tank_sm').html('');
i_data_sm=0;
}
} 


$('#start_simulate_').change(function(){

  if(i_data_sm >0)
  {

  }
  else
  {
    if($(this).is(':checked'))
    {

     simulate_data();
   }
   else

   {
   }

 } 
})
</script>