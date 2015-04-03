<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>
            Beautiful Information
        </title>
        <style type="text/css">
html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
        </style>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="change.css">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>
        <script type="text/javascript" src="sorttable.js">
</script>
        <script type="text/javascript">
function initialize() {
        var centerlatlng = new google.maps.LatLng(0.000000, 0.000000);
        var myOptions = {
        zoom: 2,
        center: centerlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var latlng = new google.maps.LatLng(37.598500, 126.978300);
        var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
        var marker = new google.maps.Marker({
        title: "no implimentation",
        icon: img,
        position: latlng
        });
        marker.setMap(map);

        var latlng = new google.maps.LatLng(37.598500, 126.978300);
        var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
        var marker = new google.maps.Marker({
        title: "no implimentation",
        icon: img,
        position: latlng
        });
        marker.setMap(map);

        }
        </script><!--Connect to the database-->
        <!--Load the AJAX API-->

        <script type="text/javascript" src="https://www.google.com/jsapi">
</script>
    </head>
    <body style="margin:0px; padding:0px;" onload="initialize()">
        <div class="container">
            <div class="row">
                <div class="well" style="text-align:center;">
                    <img src="cosmos.png">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="well">
                    <div id="map_canvas" style="width: 80%; height: 50%; border-radius: 4px; margin:auto;"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="well" style="height: 340px;">
                    <!--Div that will hold the pie chart-->
                    <div id="pie_chart1" style="display: inline; float: left;"></div><!--Div that will hold the bar chart-->
                    <div id="bar_chart" style="display: inline; float: left;"></div><!--Div that will hold the pie chart-->
                    <div id="pie_chart2" style="display: inline; float: left;"></div>
                </div>
            </div>
        </div>
    </body>
</html>