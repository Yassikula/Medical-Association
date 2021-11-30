<?php  
include('database connection.php');
//  $connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT hospital_name, count(*)  as number FROM tbl_med GROUP BY hospital_name";  
 
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
           google.charts.setOnLoadCallback(drawChart2);  
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['hospital_name', 'Number'],  
                          <?php  
                        //   while($row = mysqli_fetch_array($result))  
                          foreach($result as $row)
                          {  
                               echo "['".$row["hospital_name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Area',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;margin-left: 28%;">  
                <br />  
                <div id="piechart2" style="width: 900px; height: 500px; "></div>  
           </div>  
      </body>  
 </html>  