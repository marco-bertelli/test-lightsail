<!-- HTML -->
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width= device-width, initial-scale=1.0">

		<title>Rataran</title>	

		<meta name="keywords" content="HTML5" />
		<meta name="description" content="Responsive HTML5">
		<meta name="author" content="Runelab">
		
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/custom.css">

		<!--font-->
		<link href="https://www.fontify.me/wf/c45f9b496168feaee7a731fa325e6705" rel="stylesheet" type="text/css">
		<link href="https://www.fontify.me/wf/f05718b8a41eb329672f50bb55788557" rel="stylesheet" type="text/css">
		<link href="https://www.fontify.me/wf/305ebf7b6a32f5a8f2d8a2f670ff0979" rel="stylesheet" type="text/css">
		<link href="https://www.fontify.me/wf/e6be3d2ca9f6e0ae85eeeaeb28724bd3" rel="stylesheet" type="text/css">
		
		<!-- Resources Map -->
		<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
		<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
		<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>
	</head>
	<!-- Chart code -->
<script>
/**
 * SVG path for target icon
 */
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

/**
 * SVG path for plane icon
 */
var planeSVG = "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47";

/**
 * Create the map
 */
var map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
"theme": "dark",


  "dataProvider": {
    "map": "worldLow",
    "zoomLevel": 3.5,
    "zoomLongitude": -55,
    "zoomLatitude": 42,

    "lines": [ {
      "id": "line1",
      "arc": -0.85,
      "alpha": 0.3,
      "latitudes": [ 48.8567, 43.8163, 34.3, 23 ],
      "longitudes": [ 2.3510, -79.4287, -118.15, -82 ]
    }, {
      "id": "line2",
      "alpha": 0,
      "color": "#000000",
      "latitudes": [ 48.8567, 43.8163, 34.3, 23 ],
      "longitudes": [ 2.3510, -79.4287, -118.15, -82 ]
    } ],
    "images": [ {
      "svgPath": targetSVG,
      "title": "Paris",
      "latitude": 48.8567,
      "longitude": 2.3510
    }, {
      "svgPath": targetSVG,
      "title": "Toronto",
      "latitude": 43.8163,
      "longitude": -79.4287
    }, {
      "svgPath": targetSVG,
      "title": "Los Angeles",
      "latitude": 34.3,
      "longitude": -118.15
    }, {
      "svgPath": targetSVG,
      "title": "Havana",
      "latitude": 23,
      "longitude": -82
    }, {
      "svgPath": planeSVG,
      "positionOnLine": 0,
      "color": "#000000",
      "alpha": 0.1,
      "animateAlongLine": true,
      "lineId": "line2",
      "flipDirection": true,
      "loop": true,
      "scale": 0.03,
      "positionScale": 1.3
    }, {
      "svgPath": planeSVG,
      "positionOnLine": 0,
      "color": "#585869",
      "animateAlongLine": true,
      "lineId": "line1",
      "flipDirection": true,
      "loop": true,
      "scale": 0.03,
      "positionScale": 1.8
    } ]
  },

  "areasSettings": {
    "unlistedAreasColor": "#8dd9ef"
  },

  "imagesSettings": {
    "color": "#585869",
    "rollOverColor": "#585869",
    "selectedColor": "#585869",
    "pauseDuration": 0.2,
    "animationDuration": 2.5,
    "adjustAnimationSpeed": true
  },

  "linesSettings": {
    "color": "#585869",
    "alpha": 0.4
  },

  "export": {
    "enabled": true
  }

} );
</script>
<!-- Styles -->
<style>

#chartdiv {
  width: 100%;
  height: 500px;
}			
</style>

	<body>
	<header>
			<nav  class="navbar navbar-default blue" style="border-style:none;margin:0;padding-top:15px;">
				<div class="container-fluid" id="header">
					<div class="navbar-header">	
						  
						<button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar2">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<img alt="Brand" src="logo.png" width="151" height="54">
					</div>		 
					<div class="collapse navbar-collapse prova" id="navbar2" style=''>
						<ul class="nav navbar-nav navbar-right" >
							<li><a class="aMenu"href="">HOME</a></li>
							<li><a class="aMenu" href="shop.html">SHOP</a></li>
							<li><a class="aMenu" href="">STRUMENTI</a></li>
							<li><a class="aMenu" href="news.html">NEWS</a></li>
							<li><a class="aMenu" href="aiuto.html">AIUTO</a></li>
							<li><a class="aMenu" href="contatti.html">CONTATTI</a></li>
						</ul>
					</div>	
				</div>	
			</nav>
		</header>
		
			<div id="chartdiv"></div>		
		
		<div class="row" style="margin-top:-2%;margin-bottom:-5%">
			<div class="col-md-12" id='blueWhite'>
				
			</div>
		</div>
		<div class="row " style='padding:5%'>
			<div class="col-md-7">
				<div id="pippo" class="col-md-offset-1 col-md-10 col-md-offset-1  embed-responsive embed-responsive-16by9 ">
					<iframe class="embed-responsive-item" style="height:70%; width:100%;" src="https://player.vimeo.com/video/189291290" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>


			</div>
			<div class="col-md-4 pull-right" style='margin-top:-5%;'>
				<div id="mappaid" class="col-md-8 col-md-offset-1" style='margin-bottom:30px'>
					<img src="img/mappa.png" class="img-responsive img-circle" alt="World">
				</div>
				<h2>WELCOME TO THE FUTURE</h2>
				<p>Rataran vuole fornire uno strumento in grado di dare una visione globale su come si stanno muovendo i Top Trader</p>
			  <!-- <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p> -->
			</div>
		</div>
		<div class="row ">
			<div class="col-md-10 col-md-offset-1">
			  <h1>WE'VE INVENTED TECHNOLOGY THAT DETECTS EVEN THE SMARTEST CRIMINALS WITHOUT BLOCKING ANY GOOD CUSTOMERS</h1>
			</div>
		</div>
		<div class="row " style='padding:5%'>
			<div class="col-md-4">
			  <h2>Trader</h2>
			  <p>Rataran si pone l'obbiettivo di far emergere i migliori trader quali creatori di idee, di investimento</p>
			</div>
			<div class="col-md-4 ">
			  <h2>Guida all'investimento in borsa</h2>
			  <p>Rataran vuole fornire uno strumento in grado di dare una visione globale su come si stanno muovendo i Top Trader</p>
			</div>
			<div class="col-md-4 ">
			  <h2>Investitori</h2>
			  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			</div>
		</div>
		<div class="row blue">
			<div  id='whiteBlue' style='margin-top:-10%;'></div>
		</div>
		<div class="row blue" style="">
			<div class="col-md-12" id='svgHolder'>
				
			</div>
		</div>
		<div class="row grey">
			<div  id='blueGrey' style='margin-top:-16%;'></div>
		</div>
		<div class="row grey" style="color:white;margin-top:-2.5%;">
			<div class="col-xs-5 " >
				<h2 class='pull-right'> Sei un investitore ? </h2>
			</div>
			<div class="col-xs-6 pull-right" >
				<h2> Sei un trader ? </h2>
			</div>
			<div class="col-xs-4 col-xs-offset-1 " style='border:1px solid white; padding:0;'>
				<div style='border:1px solid white; color:white; margin:4px;'>
				  <h2>846 Investitori iscritti</h2>
				  <h4>Iscrivendosi gratuitamente l'utente avrà accesso alla
					  classifica, ai profili dei singoli Trader e allo storico delle
					  loro operazioni.
				  </h4>
					<h5>Iscrivendosi gratuitamente l'utente avrà accesso alla
						classifica, ai profili dei singoli Trader e allo storico delle
						loro operazioni.
					</h5>
				</div>
			</div>
			<div class="col-xs-4 col-xs-offset-1 " style='border:1px solid white; padding:0;'>
				<div style='padding:30px; border:1px solid white; color:white; margin:4px;'>
				  <h2>1079 trader seguiti <span style="display: block; width: 40%; border: 2px solid white"></span></h2>
					<h4>Iscrivendosi gratuitamente l'utente avrà accesso alla
						classifica, ai profili dei singoli Trader e allo storico delle
						loro operazioni.
					</h4>
					<h5>Iscrivendosi gratuitamente l'utente avrà accesso alla
						classifica, ai profili dei singoli Trader e allo storico delle
						loro operazioni.
					</h5>
				</div>
			</div>
		</div>
		<!-- Barra -->
		<div class="row blue" style="min-height:400px">
		</div>
		
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<script >
			var map2load ='svg/home.svg';
            $('#svgHolder').load(map2load, null, function () {
                var svg = document.getElementById('svg2');
				var svg2 = $("#svg2");
				console.log ("svg", svg);
				console.log ("svg2", svg2);
                svg.setAttribute("width", "100%");
                svg.setAttribute("height", "100%");
            });
			var map2load ='rettangoliSVG/rettangolo_blu_grigio.svg';
            $('#blueGrey').load(map2load, null, function () {
                <!-- var svg = document.getElementById('svg2'); -->
				<!-- console.log ($(this).children())
                $("#blueGrey").children().attr("width", "100%");
                $("#blueGrey").children().attr("height", "100%");
            });
			var map2load ='rettangoliSVG/rettangolo_bianco_blu.svg';
            $('#whiteBlue').load(map2load, null, function () {
                <!-- var svg = document.getElementById('svg2'); -->
				<!-- console.log ($(this).children())
                $(this).children()[0].setAttribute("width", "100%");
                $(this).children()[0].setAttribute("height", "100%");
            });
			var map2load ='rettangoliSVG/rettangolo_blu_bianco.svg';
            $('#blueWhite').load(map2load, null, function () {
                <!-- var svg = document.getElementById('svg2'); -->
				<!-- console.log ($(this).children())
                $(this).children()[0].setAttribute("width", "100%");
                $(this).children()[0].setAttribute("height", "100%");
            });
		</script>
	
	</body>
</html>