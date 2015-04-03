

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>Lotka Volterra Intrusion Detection System</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="css/datepicker.css" />
    <link type="text/css" rel="stylesheet" href="inc/demo.css" />
    <link type="text/css" rel="stylesheet" href="../mmenu/css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../mmenu/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#menu")
          .find("a[href!=\"#page\"]")
         .click(function() { window.location = a[href!="#page"];})
          .end()
          .mmenu({
    classes: "mm-slide"
          });
      });
    </script>
  </head>
    <body onload="multipleinitialize()">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>
    <div id="page">
      <div class="header">
        <a href="#menu"></a>
        Lotka Volterra Intrusion Detection System
      </div>
    <?php
                   include_once('connect.php');

                        $ipID = $_GET['ipID'];



                        $IPid = stripslashes($ipID);
                        $IPid = mysqli_real_escape_string($conn, $ipID);

        $result = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB WHERE ipID = $IPid;");           

        while($row = mysqli_fetch_array($result))
          {
        $iplonglat[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
          }

        $jsoniplonglat = json_encode($iplonglat);

    ?>



  <script type="text/javascript">





        function multipleinitialize() {
            initialize();

        }


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


</script>


    <div class ="container">
       <div class="row">
          <div class="col-md-12">
    <br>        
  
            <div class = "well">
    <h1>Threat Profile</h1>

            <?php 
                        include_once('connect.php'); 

                        ?><br>













                <?php


                                           include_once('connect.php');
                                $result = mysqli_query($conn, "SELECT ipID, ip, DNSname, longitude, latitude FROM IPDB WHERE ipID = $ipID;");           
                                 
                                while($row = mysqli_fetch_array($result))
                                  {
                                  
      echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Internet Protocol Address</div>";
  echo "<div class=\"panel-body\">";
    echo $row['ip'];
  echo "</div>";
echo "</div>";



?>

                                    <div class="well">
                                        <div id="map_canvas" style="width: 1000px; height: 200px; border-radius: 4px; margin:auto;"></div>
                                    </div>

<?php

      echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Domain Name Server Name</div>";
  echo "<div class=\"panel-body\">";
    echo $row['DNSname'];
  echo "</div>";
echo "</div>";


     echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Whois Query Results</div>";
  echo "<div class=\"panel-body\">";

include 'Whois.php'; 

$sld = 'reg.ru';

$domain = new Phois\Whois\Whois($sld);

$whois_answer = $domain->info();

echo $whois_answer;

if ($domain->isAvailable()) {
    echo "Domain is available\n";
} else {
    echo "Domain is registered\n";
}

  echo "</div>";
echo "</div>";



      echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Domain Name Server Name</div>";
  echo "<div class=\"panel-body\">";
    echo $row['DNSname'];
  echo "</div>";
echo "</div>";


      echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Coordinates</div>";
  echo "<div class=\"panel-body\">";

    echo "Longitude:" . $row['longitude'];
echo "<br>";
  echo "Latitude:" . $row['latitude'];
  echo "</div>";
echo "</div>";
                                   
                         





                                   


                                    
                                  }


      echo "<div class=\"panel panel-default\">";
  echo "<div class=\"panel-heading\">Ports</div>";
  echo "<div class=\"panel-body\">";



                                           include_once('connect.php');
                                $result = mysqli_query($conn, "SELECT ports FROM PORTSFORIP WHERE ipID = $ipID;");           
               $echocounter = 0;                  
                                while($row = mysqli_fetch_array($result))
                                  {

$echocounter++;
  echo  $row['ports'] . ",";

if ($echocounter > 20){
echo "<br>";
$echocounter = 0;
}



}



                                  


  echo "</div>";
echo "</div>";



?>







    Packets Taken:

    <table class="table table-striped">
                <?php


                                           include_once('connect.php');
                                $result = mysqli_query($conn, "SELECT IPsourceport, IPdestport, OperatingSystem, datetime FROM PACKETSFORIP WHERE ipID = $ipID;");           
                                 
                                while($row = mysqli_fetch_array($result))
                                  {
                                  
                                   echo "<tr>" . "<td>" . $row['IPsourceport'] . "</td><td> " . $row['IPdestport']. "</td><td> " . $row['OperatingSystem']. "</td><td> " . $row['datetime']. "</td></tr>




                                   </tr>";


                                    
                                  }



                                  ?>
            </table>



<?php

?>

<!-- Needs to be 2 date fields in order to give ip's that have packets from 2 given dates -->



<!-- Needs to be dropdown list to return list of ip's for a given country, add extra field to ip database that is simply country geolocated -->



  
      </div>
    </div>
</div>
  </div>
</div>
    <nav id="menu">
      <ul>
        <li><a href="index.php">Threats</a></li>
        <li><a href="search.php">Search/Sort IPs</a></li>
        <li><a href="statisticalanalysis.php">Statistical Analysis</a></li>
        <li><a href="explanation.php">Project Explanation</a></li>
      </ul>
    </nav>

     <script type="text/javascript" src="../js/bootstrap.js"></script>
  </body>
</html>