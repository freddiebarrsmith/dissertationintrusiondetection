

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
  <body>
    <div id="page">
      <div class="header">
        <a href="#menu"></a>
        Lotka Volterra Intrusion Detection System
      </div>
    
    <div class ="container">
       <div class="row">
          <div class="col-md-12">
    <br>        
  
            <div class = "well">
    <h1>Search/Sort IP's</h1>
    <br>
     

<!-- This needs to be button to search for database, should  send to search2 which queries database -->
    <h3> Search </h3>
        <br>
         <form action="dnssearch.php" method="post">
      <input type="text"  placeholder="DNS Name">
      <input type="submit" value="Perform DNS Search">
</form>
    <br>
<!-- This needs to be button to return chronological sort of IP's -->

        <h3> Chronological Ordering</h3>
        <br>
         <form action="chronological.php" method="post">
              <input type="submit" value="Order IP's Chronologically">
</form>

<!-- This needs to be button to return sorting of IP's by threat ranking -->

   <br>
        <h3> Threat Ordering</h3>
        <br>
        <form action="threatranking.php" method="post">
              <input type="submit" value="Order IP's By Threat Ranking">
</form>


<form action="timeperiod.php" method="post">
          <h3>See IP Threats for a given time period</h3>
          <br>
          Start Date of Period (format: '20060501')<input type="text" name="starttime1" placeholder="20060501"><br>
          End Date of Period: (format: '20060501')<input type="text" name="endtime1" placeholder="20060501"><br>
              <input type="submit" value="Return Results">
          </form><br>

        </div>

<!-- Needs to be 2 date fields in order to give ip's that have packets from 2 given dates -->



<!-- Needs to be dropdown list to return list of ip's for a given country, add extra field to ip database that is simply country geolocated -->



  
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