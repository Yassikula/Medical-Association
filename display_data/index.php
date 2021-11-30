<?php

session_start();

include('../database connection.php');

include('../home.php');

if (!isset($_SESSION['admin_login'])) {
    header("location: ../Login/index.php");
}

// include('index_bulk.php');

$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<!DOCTYPE html>
<html>

<head>
    <title>Display Data</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style type="text/css">
        .container {
            margin-top: 11px;
        }

        h1 {
            text-align: center;
            padding-bottom: 60px;
        }

        body {
            margin-top: 159px;
            margin-left: -25%;
        }
        .site-footer {
            width: 118.05%;
        }

        #profile-description {
            max-width: 400px;
            margin-top: 50px;
            position: relative;
        }

        #profile-description .text {
            /*   width: 660px;  */
            margin-bottom: 5px;
            color: #777;
            padding: 0 15px;
            position: relative;
            font-family: Arial;
            font-size: 14px;
            display: block;
        }

        #profile-description .show-more {
            /*   width: 690px;  */
            color: #777;
            position: relative;
            font-size: 12px;
            padding-top: 5px;
            height: 20px;
            text-align: center;
            background: #f1f1f1;
            cursor: pointer;
        }


        #profile-description .show-more:hover {
            color: #1779dd;
        }

        #profile-description .show-more-height {
            height: 65px;
            overflow: hidden;
        }


        .addbtn {
            /* margin-top: 4.5%; margin-left: 78%;  width:190px; position: relative; */
        }

        @media screen and (max-width: 1000px) {
            .addbtn {

                margin-left: -85px;
                margin-top: 152px;
            }

            h2 {
                font-size: 17px;
            }
        }
    </style>

</head>

<body>
    <div class="page-wrap">

        <h2 style="margin-left: 45%;;margin-top: 106px;">Manage Association Data</h2>

        <!-- <div style="margin-top:3%; left: 81%;position: absolute;"> -->
        <button type="button" id="add_button"
            style=" background-color: #255380; margin-top: 0.5%; margin-left: 78%;  width:190px; position: relative;"
            data-toggle="modal" data-target="#userModal" class="btn btn-success">Create
            New Record</button>
    </div>
    <div class="container">
        <div class="table-responsive" style="    margin-left: 63px;">
            <table id="course_table" class="table table-striped table v-middle" style=" width: 1012px;">
                <thead bgcolor="#6cd8dc">
                    <tr class="table-primary" style=" background-color: #8998a7;">
                        <!-- <th width="30%">ID</th> -->
                        <th width="30%">Name</th>
                        <!-- <th width="50%">NIC</th> -->
                        <!-- <th width="50%">Contact Number</th> -->
                        <!-- <th width="50%">Email</th> -->
                        <th width="70%">Hospital Name</th>
                        <th width="70%">Hospital City</th>
                        <th width="50%">Department </th>
                        <th width="50%">Designation </th>
                        <th width="50%">More Details</th>
                        <th width="50%">Update</th>
                        <th width="50%">Delete</th>

                    </tr>
                </thead>
            </table>
            <br>
            <div>
            </div>





<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form action=" " method="post" id="course_form" class="needs-validation" enctype="multipart/form-data"
            novalidate>

            <?php
include('form.php');
    
    
    ?>
        </form>

    </div>
</div>

<!-- view details   -->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="margin-left: -10px;">More Details</h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</head>

</html>
<div style="margin-left: -2%;">

<?php

// include('../footer.php');
?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add_button').click(function () {
            $('#course_form')[0].reset();
            $('.modal-title').text("Create New Details");
            $('#action').val("Add");
            $('#operation').val("Add")
        });

        var dataTable = $('#course_table').DataTable({
            "paging": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "info": true,
            "ajax": {
                url: "fetch.php",
                type: "POST"
            },
            "columnDefs": [{
                "target": [0, 3, 4],
                "orderable": false,
            }, ],
        });


        $(document).on('click', '.view', function () {
            var course_id = $(this).attr("id");
            if (course_id != '') {
                $.ajax({
                    url: "view.php",
                    method: "POST",
                    data: {
                        course_id: course_id
                    },
                    success: function (data) {
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });

        $(document).on('submit', '#course_form', function (event) {
            event.preventDefault();
            var id = $('#id').val();
            var name = $('#name').val();
            var nic = $('#nic').val();
            var contact = $('#contact').val();
            var email = $('#email').val();
            var hospital_name = $('#hospital_name').val();
            var hospital_city = $('#hospital_city').val();
            var department = $('#department').val();
            var designation = $('#designation').val();
            var activity = $('#activity').val();

            if (name != '' && nic != '' && contact != '' && email != '' && hospital_name != '' &&
                hospital_city != '' && department != '' && designation != '' && activity != '') {
                $.ajax({
                    url: "insert.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#course_form')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            } else {
                alert("Fields are Required");
            }
        });

        $(document).on('click', '.update', function () {
            var course_id = $(this).attr("id");
            $.ajax({
                url: "fetch_single.php",
                method: "POST",
                data: {
                    course_id: course_id
                },
                dataType: "json",
                success: function (data) {
                    $('#userModal').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#nic').val(data.nic);
                    $('#contact').val(data.contact);
                    $('#email').val(data.email);
                    $('#hospital_name').val(data.hospital_name);
                    $('#hospital_city').val(data.hospital_city);
                    $('#department').val(data.department);
                    $('#designation').val(data.designation);
                    $('#activity').val(data.activity);
                    $('.modal-title').text("Edit  Details");
                    $('#course_id').val(course_id);
                    $('#action').val("Save");
                    $('#operation').val("Edit");
                }
            });
        });



        $(document).on('click', '.delete', function () {

            var course_id = $(this).attr("id");
            if (confirm("Are you sure want to delete this user?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        course_id: course_id
                    },
                    success: function (data) {
                        dataTable.ajax.reload();
                    }
                });
            } else {
                return false;
            }
        });

    });
</script>


<script src="../js/script.js"></script>

