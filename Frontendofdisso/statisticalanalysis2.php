

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>Lotka Volterra Intrusion Detection System</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="inc/demo.css" />
    <link type="text/css" rel="stylesheet" href="../mmenu/css/jquery.mmenu.all.css" />

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
  
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <?php
                 include_once('connect.php');
        $result = mysqli_query($conn, "SELECT hour, numberofpackets, synpackets, tcppackets, icmppackets, udppackets, otherpackets FROM packetsperhour;");        
while($row = mysqli_fetch_array($result))
          {

              $packetsperhour[] = array('hour'=>$row['hour'], 'numberofpackets'=>$row['numberofpackets'], 'synpackets'=>$row['synpackets'], 'tcppackets'=>$row['tcppackets'], 'icmppackets'=>$row['icmppackets'], 'udppackets'=>$row['udppackets'], 'otherpackets'=>$row['otherpackets']);
          }

        $packetsperhour = json_encode($packetsperhour);

?>
  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Hours');
      data.addColumn('number', 'Total Packets');
      data.addColumn('number', 'SYN Packets');
      data.addColumn('number', 'TCP Packets');
      data.addColumn('number', 'ICMP Packets');
      data.addColumn('number', 'UDP Packets');
      data.addColumn('number', 'Other Packets');

      var obj = <?php echo $packetsperhour; ?>;
      

        for(var i= 0; i < obj.length; i++) {
        var json = obj[i];
        hour = json.hour;
        numberofpackets = json.numberofpackets;
        synpackets = json.synpackets;
        tcppackets = json.tcppackets;
        icmppackets = json.icmppackets;
        udppackets = json.udppackets;
        otherpackets = json.otherpackets;

        hour = parseInt(hour)
        numberofpackets = parseInt(numberofpackets);
        synpackets = parseInt(synpackets);
        tcppackets = parseInt(tcppackets);
        icmppackets = parseInt(icmppackets);
        udppackets = parseInt(udppackets);
        otherpackets = parseInt(otherpackets);

      data.addRow(
        [hour,  numberofpackets,  synpackets,  tcppackets,  icmppackets,  udppackets,  otherpackets]
      );

    }

      var options = {
        chart: {
          title: 'Total Packets and Types',
          subtitle: 'Over Past 24 Hours'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, options);
    }
  </script>
  </head>
  <body>
    <div id="page">
      <div class="header">
        <a href="#menu"></a>
        Lotka Volterra Intrusion Detection System
      </div>
    
    <div class ="container">
       <div class="row">
          <div class="col-md-12">
            <h1>Statistical Analysis</h1>
  
            <div class = "well">

                                      <div class="btn-group" role="group" aria-label="...">
                            <button onclick="dos()" type="button" class="btn btn-default">1 Day</button> <button onclick="portscan()" type="button" id="portscanbutton" class="btn btn-default">1 Week</button> <button onclick="authlogs()" type="button" class="btn btn-default">1 Month</button> 
                        </div>
                        <br>
                <div id="linechart_material"></div>
    



 
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