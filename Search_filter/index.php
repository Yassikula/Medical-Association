<?php

   session_start();
   
    if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])  && !isset($_SESSION['super_login'])) {
         header("location:../Login/index.php");

    }

  
include('../home.php');


require('../database connection.php');


?>

<?php


$name = '';
$nic = '';
$department = '';
$designation = '';
$hospital_name = '';
$hospital_city = '';

$query = "SELECT DISTINCT name,nic,department,designation,hospital_name,hospital_city FROM tbl_med ";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$tempname = array_unique(array_column($result, 'name'));
$nameArray= array_intersect_key($result, $tempname);

$tempnic = array_unique(array_column($result, 'nic'));
$nicArray= array_intersect_key($result, $tempnic);

$tempdepartment = array_unique(array_column($result, 'department'));
$departmentArray= array_intersect_key($result, $tempdepartment);

$tempdesignation = array_unique(array_column($result, 'designation'));
$designationArray= array_intersect_key($result, $tempdesignation);

$temphospital_name = array_unique(array_column($result, 'hospital_name'));
$hospital_nameArray= array_intersect_key($result, $temphospital_name);


$temphospital_city = array_unique(array_column($result, 'hospital_city'));
$hospital_cityArray= array_intersect_key($result, $temphospital_city);



foreach($nameArray as $row)
{
    $name .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
}

foreach($nicArray as $row)
{
    $nic .= '<option value="'.$row['nic'].'">'.$row['nic'].'</option>';
}

foreach($departmentArray as $row)
{
    $department .= '<option value="'.$row['department'].'">'.$row['department'].'</option>';
}

foreach($designationArray as $row)
{
    $designation .= '<option value="'.$row['designation'].'">'.$row['designation'].'</option>';
}

foreach($hospital_nameArray as $row)
{
    $hospital_name .= '<option value="'.$row['hospital_name'].'">'.$row['hospital_name'].'</option>';
}

foreach($hospital_cityArray as $row)
{
    $hospital_city .= '<option value="'.$row['hospital_city'].'">'.$row['hospital_city'].'</option>';
}
?>

<html>

<head>
    <title>Search Data </title>
 
            

  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript"
        src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js">
    </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>



</head>

<body>

    <style>
    body{
    	font-family: "Open Sans",sans-serif;
}
 .box {
	 background: #fff;
	 box-shadow: 0 25px 30px 0 rgba(0, 0, 0, 0.15);
	 border: rgba(0, 0, 0, 0.3);
	 width: 10rem;
	 margin: 2rem auto;
	 padding: 2rem;
}
 .ellipsis {
	 display: block;
	 white-space: nowrap;
	 overflow: hidden;
	 text-overflow: ellipsis;
	 transition: all 0.2s linear;
	 white-space: nowrap;
	 padding: 0.5rem 1rem;
}
 .ellipsis:focus, .ellipsis:hover {
	 color: transparent;
}
 .ellipsis:focus:after, .ellipsis:hover:after {
	 content: attr(data-text);
	 overflow: visible;
	 text-overflow: inherit;
	 background: #fff;
	 position: absolute;
	 left: auto;
	 top: auto;
	 width: auto;
	 max-width: 20rem;
	 border: 1px solid #eaebec;
	 padding: 0 0.5rem;
	 box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .28);
	 white-space: normal;
	 word-wrap: break-word;
	 display: block;
	 color: black;
	 margin-top: -1.25rem;
}
 
 
        .btnfilter {
            border: thick;
            margin-left: 139%;
            width: 143px;
            height: 46px;
            border: solid;
            margin-top: 44px;
            background-color:#255380;
            border-style: none;
        }
        .btnfilter:hover {
    background-color:#4b83ba;
  
  }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        body {

            margin-left: 285px;

        }

        .btnexcel {

   
            margin-left: 138.5%;
    margin-top: 1%;
    background: #be2020;
    border: none;
    height: 48px;
    color: white;
    margin-bottom: 45px;
    width: 145px;
    border: solid;
    border-radius: 6px;
}
.btnexcel:hover {
    border-color: #be2020b8;

  
  }   
        .container1 {
            margin-left: -83px;
	}
    
	
        /* RESPONSIVE */


        @media only screen and (max-width: 1000px) {



            .container1 {
              
                width: 166%;
    margin-left: -32%;
    margin-top: 146px;
            }

            .table-responsive{
                font-size: 20px;

            }
       
            table{
                font-size:19px;
                
            }
            .row{
                padding-inline-end: 56%;
            }
            .btnexcel{
            margin-left: 58%;
    margin-top: -5%;
    
               }   
            
            }
    </style>
    <!-- <div class="container box" style=" float: left;"> -->


   

      
            <!-- <a href="../Login/logout.php" class="btn btn-danger" style="    margin-left: 9px;">Logout</a> -->
            <div class="page-wrap">
   
        <h2 align="center" style="margin-left: 5px; margin-top: 61px;">Data of Sri Lanka Medical Association</h2>
        <br />
        <div class="row" style="width: 91%;">
            <div class="col-md-4">
                <div style="margin-left:32%; width: 65%; margin-top: 46px;">
                    <div class="form-group">
                        
<!-- select name   -->
                        <input type="text" name="filter_name" id="filter_name" class="form-control" list="filter_name_list"
                            placeholder="Select Name" />
                        <!-- <datalist id="filter_name_list" class='whatever'>
                            <option>
                                <!-- <?php echo $name; ?> -->
                        <!-- </datalist> --> 

                    </div>

 <!-- select nic     -->
                    <div class="form-group">
                        
                          
                        <input name="filter_nic" id="filter_nic" class="form-control" list="filter_nic_list"
                            placeholder="Select NIC" />
                        <!-- <datalist id="filter_nic_list" class='whatevernic'>
                            <option>
                            <!-- <?php echo $nic; ?> -->
                        <!-- </datalist> --> 
                    </div>
                </div>

                <div style="  margin-left: 126%; width: 65%; margin-top: -97px;">

  <!-- select designation       -->
                <div class="form-group">
                       
                           
                        <input name="filter_designation" id="filter_designation" class="form-control" list="filter_designation_list"
                            placeholder="Select Designation" />
                        <datalist id="filter_designation_list" class='whateverdesignation'>
                            <option>
                            <?php echo $designation; ?>
                        </datalist>

                    </div>

    <!-- select filter_department     -->

            <div class="form-group">
                      
                        

                        <input name="filter_designation" id="filter_department" class="form-control" list="filter_department_list"
                            placeholder="Select Department" />
                        <datalist id="filter_department_list" class='whateverdepartment'>
                            <option>
                            <?php echo $department; ?>
                        </datalist>
                    </div>
                </div>

                <div style="  margin-left: 219%; width: 65%; margin-top: -100px;">
    <!-- select hospital_name          -->

                    <div class="form-group">
                    
                            
                        <input name="filter_hospital_name" id="filter_hospital_name" class="form-control" list="filter_hospital_name_list"
                            placeholder="Select Hospital Name" />
                        <datalist id="filter_hospital_name_list"  class='whateverhospital_name'>
                            <option>
                            <?php echo $hospital_name; ?>
                        </datalist>
                    </div>

    <!-- select hospital_city   -->

                    <div class="form-group">
                       
                        <input name="filter_hospital_city" id="filter_hospital_city" class="form-control" list="filter_hospital_city_list"
                            placeholder="Select City" />
                        <!-- <datalist id="filter_hospital_city_list" class='whateverhospital_city'>
                            <option>
                            <!-- <?php echo $hospital_city; ?> -->

                        <!-- </datalist> --> 

                    </div>
                </div>
                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-info btnfilter">Filter</button>
                </div>
    <button class="btnexcel" onclick="exportTableToCSV('members.csv')">Download Report</button>

    </div>
        </div>
        <div class="container1">
        <div class="table-responsive" style="overflow-x:auto;  width: 89%;margin-left: 5%;">
            <table id="customer_data" class="table table-bordered table-striped table v-middle">
                <thead>
                    <tr>
                        <th style="width:41px;" >More Details</th>
                        <th width="20%" > Name</th>
                        <th width="10%" >Hospital Name</th>
                        <th width="10%" >Hospital City</th>
                        <th width="15%" >Department</th>
                        <th width="15%">Designation</th>
                        <th width="20%" > NIC</th>
                        <th width="10%" >Phone</th>
                        <th width="10%" >Email</th>
                        <th width="15%" >Activity</th>
                  
                        

                   

                    </tr>
                </thead>
            </table>




            <br />
            <br />
            <br />
<!-- <button class="btnexcel" onclick="exportTableToCSV('members.csv')">Print Details</button> -->

    </div>
    
    </div>
    </div>
 
 
    </body>

</html>

<div style="margin-left: -8%;">
<?php

// include('../footer.php');
?>

</div>

<?php
include ('sort.php');
?>

<script>  



    //   $(document).ready(function(){  
    //        $('#filter_name').keyup(function(){  
    //             search_table($(this).val());  
    //        });  
    //        function search_table(value){  
    //             $('#customer_data tr').each(function(){  
    //                  var found = 'false';  
    //                  $(this).each(function(){  
    //                       if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
    //                       {  
    //                            found = 'true';  
    //                       }  
    //                  });  
    //                  if(found == 'true')  
    //                  {  
    //                       $(this).show();  
    //                  }  
    //                  else  
    //                  {  
    //                       $(this).hide();  
    //                  }  
    //             });  
    //        }  
    //   });  
 </script>  

<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        fill_datatable();

        function fill_datatable(filter_designation = '', filter_name = '', filter_nic = '', filter_department =
            '', filter_hospital_name = '', filter_hospital_city = '') {

            var dataTable = $('#customer_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "searching": false,
                "ajax": {
                    url: "fetch.php",
                    type: "POST",
                    data: {
                        filter_designation: filter_designation,
                        filter_name: filter_name,
                        filter_nic: filter_nic,
                        filter_department: filter_department,
                        filter_hospital_name: filter_hospital_name,
                        filter_hospital_city: filter_hospital_city
                    }
                },
             
   
   "lengthMenu": [ [10, 50, 100,250,1000, -1], [10, 50, 100,250, 1000,"All"] ]

 

            });

  
        }

        $('#filter').click(function () {
            var filter_designation = $('#filter_designation').val();
            var filter_name = $('#filter_name').val();
            var filter_nic = $('#filter_nic').val();
            var filter_department = $('#filter_department').val();
            var filter_hospital_name = $('#filter_hospital_name').val();
            var filter_hospital_city = $('#filter_hospital_city').val();

            if (filter_designation != '' || filter_name != '' || filter_nic != '' ||
                filter_department != '' || filter_hospital_name != '' || filter_hospital_city != '') {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_designation, filter_name, filter_nic, filter_department,
                    filter_hospital_name, filter_hospital_city);
            } else {
                alert('Select Both filter option');
                $('#customer_data').DataTable().destroy();
                fill_datatable();
            }
        });

        $(document).on('click', '.view', function(){
  var course_id = $(this).attr('id');
  var options = {
   ajaxPrefix: '',
   ajaxData: {course_id:course_id},
   ajaxComplete:function(){
    this.buttons([{
     type: Dialogify.BUTTON_PRIMARY
    }]);
   }
  };
  new Dialogify('view.php', options)
   .title(' More Details')
   .showModal();
 });
  
//  oTable = $('#customer_data').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#filter_name').keyup(function(){
//       oTable.search($(this).val()).draw() ;
// })


    });
</script>




<script>
    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 1; j < cols.length; j++)
                row.push(cols[j].innerText);

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
</script>
<script>
    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {
            type: "text/csv"
        });

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }
</script>

