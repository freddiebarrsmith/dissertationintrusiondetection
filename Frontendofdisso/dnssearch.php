<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
        <meta name="author" content="www.frebsite.nl">
        <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
        <title>
            Lotka Volterra Intrusion Detection System
        </title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="inc/demo.css">
        <link type="text/css" rel="stylesheet" href="../mmenu/css/jquery.mmenu.all.css">
        <script type="text/javascript" src="../js/jquery-1.8.3.min.js">
</script>
        <script type="text/javascript" src="../mmenu/js/jquery.mmenu.min.all.js">
</script>
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
        <style type="text/css">
html, body, #map-canvas { height: 50%; margin: 0; padding: 0;}
        </style>
<style type="text/css">
html, body, #map-canvas2 { height: 50%; margin: 0; padding: 0;}
        </style>

    </head>
    <body onload="multipleinitialize()">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script><?php
  $country = $_GET['country'];

                   include_once('connect.php');
        $result = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB WHERE country = $country;");           

        while($row = mysqli_fetch_array($result))
          {
        $iplonglat[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
          }

        $jsoniplonglat = json_encode($iplonglat);


/*  
ok you need to select all the different ips where the ipid in IPDB
is the same as the IPDB's where 

*/



          $result2 = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID=IPTHREAT.ipID WHERE IPTHREAT.dictionarythreat = 1 AND IPDB.country = $country; ; ");           

        while($row = mysqli_fetch_array($result2))
          {
        $iplonglat2[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
          }

        $jsoniplonglat2 = json_encode($iplonglat2);



          $result3 = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID=IPTHREAT.ipID WHERE IPTHREAT.portscanthreat = 1; ; ");           

        while($row = mysqli_fetch_array($result3))
          {
        $iplonglat3[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
          }

        $jsoniplonglat3 = json_encode($iplonglat3);



                  $result4 = mysqli_query($conn, "SELECT ip, longitude, latitude FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID=IPTHREAT.ipID WHERE IPTHREAT.dosthreat = 1; ; ");           

        while($row = mysqli_fetch_array($result4))
          {
        $iplonglat4[] = array('ip'=>$row['ip'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longitude']);
          }

        $jsoniplonglat4 = json_encode($iplonglat4);



        ?>








        <script type="text/javascript">





        function multipleinitialize() {
            initialize();
            initialize2();
        initialize3();
        initialize4();
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

        function initialize2(){
        var centerlatlng = new google.maps.LatLng(0.000000, 0.000000);
        var myOptions = {
        zoom: 2,
        center: centerlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map2 = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);






        function jsonloopinitialiser2(latitude, longitude){
        latitude = Number(latitude)
        longitude = Number(longitude)

        var latlng = new google.maps.LatLng(latitude, longitude);
        var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
        var marker = new google.maps.Marker({
        title: "function",
        icon: img,
        position: latlng
        });
        marker.setMap(map2);
        }


        var obj = <?php echo $jsoniplonglat2; ?>;     

        for(var i= 0; i < obj.length; i++) {
        var json = obj[i];
        ip = json.ip;
        latitude = json.latitude;
        longitude = json.longitude;
        jsonloopinitialiser2(latitude, longitude);
        }
        }

        function initialize3(){
        var centerlatlng = new google.maps.LatLng(0.000000, 0.000000);
        var myOptions = {
        zoom: 2,
        center: centerlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map3 = new google.maps.Map(document.getElementById("map_canvas3"), myOptions);






        function jsonloopinitialiser3(latitude, longitude){
        latitude = Number(latitude)
        longitude = Number(longitude)

        var latlng = new google.maps.LatLng(latitude, longitude);
        var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
        var marker = new google.maps.Marker({
        title: "function",
        icon: img,
        position: latlng
        });
        marker.setMap(map3);
        }


        var obj = <?php echo $jsoniplonglat3; ?>;     

        for(var i= 0; i < obj.length; i++) {
        var json = obj[i];
        ip = json.ip;
        latitude = json.latitude;
        longitude = json.longitude;
        jsonloopinitialiser3(latitude, longitude);
        }
        }

        function initialize4(){
        var centerlatlng = new google.maps.LatLng(0.000000, 0.000000);
        var myOptions = {
        zoom: 2,
        center: centerlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map4 = new google.maps.Map(document.getElementById("map_canvas4"), myOptions);






        function jsonloopinitialiser4(latitude, longitude){
        latitude = Number(latitude)
        longitude = Number(longitude)

        var latlng = new google.maps.LatLng(latitude, longitude);
        var img = new google.maps.MarkerImage('http://chart.apis.google.com/chart?cht=mm&chs=12x16&chco=FFFFFF,0000FF,000000&ext=.png');
        var marker = new google.maps.Marker({
        title: "function",
        icon: img,
        position: latlng
        });
        marker.setMap(map4);
        }


        var obj = <?php echo $jsoniplonglat4; ?>;     

        for(var i= 0; i < obj.length; i++) {
        var json = obj[i];
        ip = json.ip;
        latitude = json.latitude;
        longitude = json.longitude;
        jsonloopinitialiser4(latitude, longitude);
        }
        }




        </script><!--Connect to the database-->
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi">
</script><script type="text/javascript">




        function portscan() {
        var portscanning = document.getElementById("portscanning");
        var suspiciousip = document.getElementById("suspiciousip");
        var authenticationlogs = document.getElementById("authenticationlogs");
        var dosattack = document.getElementById("dosattack");
        suspiciousip.style.display="none";
        dosattack.style.display="none";
        authenticationlogs.style.display="none";
        portscanning.style.display="block";
        }

        function authlogs() {
        var portscanning = document.getElementById("portscanning");
        var suspiciousip = document.getElementById("suspiciousip");
        var authenticationlogs = document.getElementById("authenticationlogs");
        var dosattack = document.getElementById("dosattack");

        suspiciousip.style.display="none";
        dosattack.style.display="none";
        portscanning.style.display="none";
        authenticationlogs.style.display="block";
        }

        function suspiciousips() {
        var portscanning = document.getElementById("portscanning");
        var suspiciousip = document.getElementById("suspiciousip");
        var authenticationlogs = document.getElementById("authenticationlogs");
        var dosattack = document.getElementById("dosattack");


        dosattack.style.display="none";
        authenticationlogs.style.display="none";
        portscanning.style.display="none";
        suspiciousip.style.display="block";
        }

        function dos() {
        var portscanning = document.getElementById("portscanning");
        var suspiciousip = document.getElementById("suspiciousip");
        var authenticationlogs = document.getElementById("authenticationlogs");
        var dosattack = document.getElementById("dosattack");

        authenticationlogs.style.display="none";
        portscanning.style.display="none";
        suspiciousip.style.display="none";
        dosattack.style.display="block";
        }

        /* dosattack.style.display="none";
        dosattack.style.display="block";
        suspiciousip.style.display="none";
        suspiciousip.style.display="block";
        suspiciousip.style.visibility="hidden";


        portscanning.style.display="none";
        portscanning.style.display="block";
        authenticationlogs.style.display="none";
        authenticationlogs.style.display="block"; */





        </script>
        <div id="page">
            <div class="header">
                <a href="#menu"></a> Lotka Volterra Intrusion Detection System
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Threats
                    </h1>
                    <div class="well">
                        <div class="btn-group" role="group" aria-label="...">
                            <button onclick="dos()" type="button" class="btn btn-default">Denial Of Service</button> <button onclick="portscan()" type="button" id="portscanbutton" class="btn btn-default">Port Scan</button> <button onclick="authlogs()" type="button" class="btn btn-default">Authentication Logs</button> <button onclick="suspiciousips()" type="button" class="btn btn-default">All Suspicious IP's</button>
                        </div>
                        <div id="suspiciousip">
                            <h1>
                                Suspicious IPs
                            </h1>
                            <div class="container">
                                <div class="row">
                                    <div class="well">
                                        <div id="map_canvas" style="width: 1000px; height: 200px; border-radius: 4px; margin:auto;"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-condensed" id="suspiciousiptable">
                                <tr>
                                    <th>
                                        IP
                                    </th>
                                    <th>
                                        DNS Name
                                    </th><?php
                                                                                                                                                                                                                                             include 'connect.php';
                                                                                                                                                                                                                                              $result = mysqli_query($conn,"SELECT ipID, ip, DNSname FROM IPDB;");
                                                                                                                                                                                                                                            while($row = mysqli_fetch_array($result))
                                                                                                                                                                                                                                              {
                                                                                                                                                                                                                                              ?>
                                </tr>
                                <tr>
                                    <?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['ip'] . "</a></td>" ;
                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                ?><?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['DNSname'] . "</a></td>" ;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?>
                                </tr>
                            </table>
                        </div>
                        <div id="authenticationlogs">
                            <h1>
                                Dictionary Attacks
                            </h1>
                                                        <div class="container">
                                <div class="row">
                                    <div class="well">
                                        <div id="map_canvas2" style="width: 1000px; height: 200px; border-radius: 4px; margin:auto;"></div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-condensed" id="authlogtable">
                                <tr>
                                    <th>
                                        IP
                                    </th>
                                    <th>
                                        DNS Name
                                    </th><?php
                                                                                                                                                                                                                                             include 'connect.php';
                                                                                                                                                                                                                                              $result = mysqli_query($conn,"SELECT IPDB.ipID, IPDB.ip, IPDB.DNSname FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID = IPTHREAT.ipID WHERE IPTHREAT.dictionarythreat = 1;");
                                                                                                                                                                                                                          while($row = mysqli_fetch_array($result))
                                                                                                                                                                                                                                              {
                                                                                                                                                                                                                                              ?>
                                </tr>
                                <tr>
                                    <?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['ip'] . "</a></td>" ;
                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                ?><?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['DNSname'] . "</a></td>" ;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?>
                                </tr>
                            </table>
                        </div>
                        <div id="portscanning">
                            <h1>
                                Port Scanning Attempts
                            </h1>

                                                        <div class="container">
                                <div class="row">
                                    <div class="well">
                                        <div id="map_canvas3" style="width: 1000px; height: 200px; border-radius: 4px; margin:auto;"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <th>
                                        IP
                                    </th>
                                    <th>
                                        DNS Name
                                    </th><?php
                                                                                                                                                                                                                                             include 'connect.php';
                                                                                                                                                                                                                                              $result = mysqli_query($conn,"SELECT IPDB.ipID, IPDB.ip, IPDB.DNSname FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID = IPTHREAT.ipID WHERE IPTHREAT.portscanthreat = 1;");
                                                                                                                                                                                                                          while($row = mysqli_fetch_array($result))
                                                                                                                                                                                                                                              {
                                                                                                                                                                                                                                              ?>
                                </tr>
                                <tr>
                                    <?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['ip'] . "</a></td>" ;
                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                ?><?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['DNSname'] . "</a></td>" ;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?>
                                </tr>
                            </table>
                        </div>
                        <div id="dosattack">
                            <h1>
                                Denial Of Service Attacks
                            </h1>
                                                                                    <div class="container">
                                <div class="row">
                                    <div class="well">
                                        <div id="map_canvas4" style="width: 1000px; height: 200px; border-radius: 4px; margin:auto;"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <th>
                                        IP
                                    </th>
                                    <th>
                                        DNS Name
                                    </th><?php
                                                                                                                                                                                                                                             include 'connect.php';
                                                                                                                                                                                                                                              $result = mysqli_query($conn,"SELECT IPDB.ipID, IPDB.ip, IPDB.DNSname FROM IPDB INNER JOIN IPTHREAT ON IPDB.ipID = IPTHREAT.ipID WHERE IPTHREAT.dosthreat = 1;");
                                                                                                                                                                                                                          while($row = mysqli_fetch_array($result))
                                                                                                                                                                                                                                              {
                                                                                                                                                                                                                                              ?>
                                </tr>
                                <tr>
                                    <?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['ip'] . "</a></td>" ;
                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                ?><?php echo  "<td>" . "<a href=ipdetailspage.php?ipID=". $row['ipID'] . ">" . $row['DNSname'] . "</a></td>" ;
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Threats</a>
                </li>
                <li>
                    <a href="search.php">Search/Sort IPs</a>
                </li>
                <li>
                    <a href="statisticalanalysis.php">Statistical Analysis</a>
                </li>
                <li>
                    <a href="explanation.php">Project Explanation</a>
                </li>
            </ul>
        </nav><script type="text/javascript" src="../js/bootstrap.js">
</script>
    </body>
</html>