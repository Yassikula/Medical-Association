<?php
include('security.php');
?>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                
                            $query = "SELECT id FROM tbl_med ORDER BY id";  
                            $statement = $connection->prepare($query);
$statement->execute();
$statement ->row_Count();

                            // $row_count =$result->fetchAll();
                            // $row = row_count ($query);

                            echo '<h4> Total Admin: '.$row_Count.'</h4>';
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>