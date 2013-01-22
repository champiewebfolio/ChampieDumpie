<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ChampieDumpie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{ HTML::style(URL::$base.'/assets/bootstrap/css/bootstrap.css') }}
    {{ HTML::style(URL::$base.'/assets/bootstrap/css/bootstrap-responsive.css') }}
    {{ HTML::style(URL::$base.'/assets/app/js/plugin/jquery.easy-pie-chart.css') }}
    {{ HTML::style(URL::$base.'/assets/app/css/styles.css') }}
   
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active" ><a href="#/">Home</a></li>
          <li><a href="#/api" >API</a></li>
          <li><a href="#/contact" >Contact</a></li>
        </ul>
        <h3 class="muted">ChampieDumpie</h3>
      </div>

      <hr>

      <div class="jumbotron">

        <h3>Let's see how many shares your site have.</h3>
         <br/>
       
         
         <p>Enter your Site URL:</p>
         <p><input id="siteURLField"   data-bind="value: getSiteURL, click: resetField" class="span4" /></p>
 
        <button type="button" id="startAnalyze" class="btn btn-primary"  data-bind="click: startAnalytics" data-loading-text="Analyzing...">Start</button>
        <br/><br/>
        <hr/>
        <strong>Results</strong>
         <div class="progress" data-bind="style: {display: progressStatusVisibility()}">
            <div class="bar bar-success" style="width: 65%;"></div>
             <div class="bar bar-danger" style="width: 30%;"></div>
          </div>
    
      </div>
   
     

      <div class="row-fluid marketing" style="width:90%;margin:auto;"  data-bind="style: {display: resultsVisibility()}" >
      
            
                        <div class="thumbnail span6" style="text-align:center;height:300px;overflow:hidden;">
                           <img data-bind="attr: {src: url, title: details },style: {display: imgVisibility()}"  class="img-polaroid"/>
                             <h1 class="numberOfShares" data-bind="text: numberOfShares"></h1>
                             <h3>Total Shares</h3>
                        </div>
                         <div class="thumbnail span3" style="text-align:center;height:300px;overflow:hidden;">
                           <div class="chart" style="text-align:center;">
                                <div id="linkShares" class="percentage"  data-percent="0"><span data-bind="text: linkShares">0</span>%</div>
                                <div class="label">Link Shares</div>
                            </div>
                        </div>
                        <div class="thumbnail span3" style="text-align:center;height:300px;overflow:hidden;">
                             <div class="chart" style="text-align:center;">
                                <div id="drillDown" class="percentage" data-percent="0"><span  data-bind="text: drillDown" >0</span>%</div>
                                <div class="label">Drill down shares</div>
                            </div>
                        </div>
                   
                 
                           
      </div>
       <ul class="thumbnails" style="text-align:center;"  data-bind="foreach: sitePages,style: {display: resultsVisibility()}">
                                            <li class="span2">
                                              <div class="thumbnail" style="border:0px;height:240px;overflow:hidden;">
                                                 <img data-bind="attr: {src: pageScreenshotURL}" class="media-object pull-left" />
                                                 <h1 class="pull-left label label-success"  data-bind="text: singlePageNumberOfShares"></h1>
                                                 <h4 data-bind="text: pageTitle"></h4>
                                                 <p data-bind="text: pageDescription"></p>
                                              </div>
                                            </li>
       </ul>
       <div style="clear:both;"></div>
      <div class="footer">
         <hr>

        <p>&copy; Champ Camba <?php echo date("Y");?> - Laravel Trainings</p>
      </div>

    </div> <!-- /container -->
  {{ HTML::script(URL::$base.'/assets/app/js/jquery-1.7.1.min.js') }}
  {{ HTML::script(URL::$base.'/assets/bootstrap/js/bootstrap.min.js') }}
  {{ HTML::script(URL::$base.'/assets/app/js/knockout.2.2.1.min.js') }}
  {{ HTML::script(URL::$base.'/assets/app/js/knockout-mapping.2.3.5.min.js') }}
  {{ HTML::script(URL::$base.'/assets/app/js/sammy.0.7.2.min.js') }}
  {{ HTML::script(URL::$base.'/assets/app/js/plugin/jquery.easy-pie-chart.js') }}
  {{ HTML::script(URL::$base.'/assets/app/js/Dark-Klout.js') }}
    

  </body>
</html>
