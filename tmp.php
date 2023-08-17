<?php
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 300; URL=$url1");
?>
<?php
# Loading config data from *.ini-file
$ini = parse_ini_file ('../config.ini');

# Assigning the ini-values to usable variables
$db_host = $ini['db_host'];
$db_name = $ini['db_name'];
$db_table = $ini['db_table'];
$db_user = $ini['db_user'];
$db_password = $ini['db_password'];

# Prepare a connection to the mySQL database
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

?>
<!-- start of the HTML part that Google Chart needs -->
<html>
<head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- This loads the 'corechart' package. -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                var data = google.visualization.arrayToDataTable([
//                      ['Timestamp', 'Temperature', 'Humidity', 'Heat Index'],
                        ['Timestamp', 'Temperature', 'Humidity'],
<?php

# This query connects to the database and get the last 10 readings
$sql = "SELECT temperature, humidity, timestamp FROM $db_table";

$result = $connection->query($sql);

# This while - loop formats and put all the retrieved data into ['timestamp', 'temperature', 'humidity'] way.
        while ($row = $result->fetch_assoc()) {
               // $xxx = $row["timestamp"];
               
               //  $new_time = $xxx("Y-m-d H:i:s", strtotime('+5 hours'));
               // $timestamp_rest = substr($new_time,10,6);
               $timestamp_rest = substr($row["timestamp"],10,6);
              //  $timestamp_rest->add(new DateInterval('PT2H'));
              //  $timestamp_rest = substr($xxx ,10,6);
                 //$xxx = substr($timestamp_rest, strtotime('+5 hours'));
               
              //  echo "['".$xxx."',".$row['temperature'].",".$row['humidity']."],";
                 echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity']."],";
//              echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity'].",".$row['heatindex']."],";
                }
?>
]);

// Curved line
var options = {
                title: 'Temperature and humidity - bedroom',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                        slantedText:true,
                        slantedTextAngle:45
                        }
                };

// Curved chart
var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
chart.draw(data, options);

} // End bracket from drawChart
//</script>









 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- This loads the 'corechart' package. -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                var data = google.visualization.arrayToDataTable([
//                      ['Timestamp', 'Temperature', 'Humidity', 'Heat Index'],
                        ['Timestamp', 'Temperature', 'Humidity'],
<?php

# This query connects to the database and get the last 10 readings
$sql = "SELECT temperature, humidity, timestamp FROM sensordata2";

$result = $connection->query($sql);

# This while - loop formats and put all the retrieved data into ['timestamp', 'temperature', 'humidity'] way.
        while ($row = $result->fetch_assoc()) {
               // $xxx = $row["timestamp"];
               
               //  $new_time = $xxx("Y-m-d H:i:s", strtotime('+5 hours'));
               // $timestamp_rest = substr($new_time,10,6);
               $timestamp_rest = substr($row["timestamp"],10,6);
              //  $timestamp_rest->add(new DateInterval('PT2H'));
              //  $timestamp_rest = substr($xxx ,10,6);
                 //$xxx = substr($timestamp_rest, strtotime('+5 hours'));
               
              //  echo "['".$xxx."',".$row['temperature'].",".$row['humidity']."],";
                 echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity']."],";
//              echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity'].",".$row['heatindex']."],";
                }
?>
]);

// Curved line
var options = {
                title: 'Temperature and humidity - living room',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                        slantedText:true,
                        slantedTextAngle:45
                        }
                };

// Curved chart
var chart = new google.visualization.LineChart(document.getElementById('2curve_chart'));
chart.draw(data, options);

} // End bracket from drawChart
//</script>





 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- This loads the 'corechart' package. -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                var data = google.visualization.arrayToDataTable([
//                      ['Timestamp', 'Temperature', 'Humidity', 'Heat Index'],
                        ['Timestamp', 'Temperature', 'Humidity'],
<?php

# This query connects to the database and get the last 10 readings
$sql = "SELECT temperature, humidity, timestamp FROM sensordata3";

$result = $connection->query($sql);

# This while - loop formats and put all the retrieved data into ['timestamp', 'temperature', 'humidity'] way.
        while ($row = $result->fetch_assoc()) {
               // $xxx = $row["timestamp"];
               
               //  $new_time = $xxx("Y-m-d H:i:s", strtotime('+5 hours'));
               // $timestamp_rest = substr($new_time,10,6);
               $timestamp_rest = substr($row["timestamp"],10,6);
              //  $timestamp_rest->add(new DateInterval('PT2H'));
              //  $timestamp_rest = substr($xxx ,10,6);
                 //$xxx = substr($timestamp_rest, strtotime('+5 hours'));
               
              //  echo "['".$xxx."',".$row['temperature'].",".$row['humidity']."],";
                 echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity']."],";
//              echo "['".$timestamp_rest."',".$row['temperature'].",".$row['humidity'].",".$row['heatindex']."],";
                }
?>
]);

// Curved line
var options = {
                title: 'Temperature and humidity - outside',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                        slantedText:true,
                        slantedTextAngle:45
                        }
                };

// Curved chart
var chart = new google.visualization.LineChart(document.getElementById('3curve_chart'));
chart.draw(data, options);

} // End bracket from drawChart
//</script>




















<!-- The charts below is ony available in the 'bar' package -->
<script type="text/javascript">
</script>
</head>

<?php

# Prepare a connection to the mySQL database
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

?>
<div id="curve_chart" style="width: 1600px; height: 640px;"></div>




<div id="2curve_chart" style="width: 1600px; height: 640px;"></div>
<div id="3curve_chart" style="width: 1600px; height: 640px;"></div>
<div id="barchart_values" style="width: 900px; height: 480px;"></div>
<div id="top_x_div" style="width: 900px; height: 480px;"></div>