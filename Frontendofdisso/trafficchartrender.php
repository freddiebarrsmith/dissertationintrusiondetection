<html>
<head>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
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



      data.addRows([
        [1,  10,  10,  10,  10,  10,  10],
        [2,  10,  10,  10,  10,  10,  10],
        [3,  10,  10,  10,  10,  10,  10],
        [5,  10,  10,  10,  10,  10,  10]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
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
