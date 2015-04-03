<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>
            Beautiful Information
        </title>


    </head>
    <body style="margin:0px; padding:0px;" onload="initialize()">
 



        <style type="text/css">
html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
        </style>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>



      <?php


           include_once('connect.php');
$result = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB;");           

while($row = mysqli_fetch_array($result))
  {
$iplonglat[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
  }

$jsoniplonglat = json_encode($iplonglat);

?>


        <script type="text/javascript">








function initialize() {




        var centerlatlng = new google.maps.LatLng(0.000000, 0.000000);
        var myOptions = {
        zoom: 2,
        center: centerlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);






function jsonloopinitialiser(latitude, longitude){
 latitude = Number(latitude)
 longitude = Number(longitude)

 var latlng = new google.maps.LatLng(latitude, longitude);
  var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
   var marker = new google.maps.Marker({
   title: "function",
   icon: img,
    position: latlng
     });
      marker.setMap(map);
}


    

        

        

    var obj = <?php echo $jsoniplonglat; ?>;     

for(var i= 0; i < obj.length; i++) {
var json = obj[i];
ip = json.ip;
latitude = json.latitude;
 longitude = json.longitude;
  jsonloopinitialiser(latitude, longitude);
}
}

        </script><!--Connect to the database-->
        <!--Load the AJAX API-->

        <script type="text/javascript" src="https://www.google.com/jsapi">
</script>





 
        <div class="container">
            <div class="row">
                <div class="well">
                    <div id="map_canvas" style="width: 80%; height: 50%; border-radius: 4px; margin:auto;"></div>
                </div>
            </div>
        </div>
    </body>
</html>