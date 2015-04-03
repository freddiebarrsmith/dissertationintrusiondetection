<html>
<head>
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
  <div id="linechart_material"></div>
</body>
</html>
