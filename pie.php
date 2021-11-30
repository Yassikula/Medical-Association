<?php  
include('database connection.php');
//  $connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT designation, count(*)  as number FROM tbl_med GROUP BY designation";  
 
 $statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
//  $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  

      <style>
      rect{
        fill:#f1f1f1;
      }
      </style>
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['designation', 'Number'],  
                          <?php  
                        //   while($row = mysqli_fetch_array($result))  
                          foreach($result as $row)
                          {  
                               echo "['".$row["designation"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Area',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;margin-left: 28%;    margin-top: 150px;">  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px; "></div>  
           </div>  
      </body>  
 </html>  