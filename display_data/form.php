<!DOCTYPE html>
<html>
<!-- bootstrap Lib -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- datatable lib -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
    .add {

        position: relative;
        left: 2%;
        top: -33px;
    }

    label {
  display: block;
  margin-bottom: 6px;
    }
  .description {
    color: #999;
  }
}

.item-container {
  position: relative;
}
.item-list {
  left: 5px;
  list-style: none;
  margin: 0;
  padding: 0;
  position: absolute;
  right: 5px;
  top: 6px;
}
  
  li {
    border: 1px solid #0ad;
    background: #cdf;
    line-height: 23px;
    margin-top: -1px;
    padding: 4px;
  }
    .close {
      color: #0ad;
      cursor: pointer;
      float: right;
      font-size: 20px;
      margin-right: 4px
    }
  }
}
#item-text {
  box-sizing: border-box;
  line-height: 32px;
  padding: 4px 8px;
  width: 100%
}


    
</style>

<?php
include('../database connection.php');


$sql = 'SELECT * FROM tbl_med ORDER BY department,designation,hospital_name,hospital_city ASC';
$statement = $connection->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();



$tempdepartment = array_unique(array_column($users, 'department'));
$departmentArray= array_intersect_key($users, $tempdepartment);

$tempdesignation = array_unique(array_column($users, 'designation'));
$designationArray= array_intersect_key($users, $tempdesignation);

$temphospital_name = array_unique(array_column($users, 'hospital_name'));
$hospital_nameArray= array_intersect_key($users, $temphospital_name);


$temphospital_city = array_unique(array_column($users, 'hospital_city'));
$hospital_cityArray= array_intersect_key($users, $temphospital_city);

 ?>

<div class="modal-content" style="width: 118%;">
    <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
        <h4 class="modal-title">Add Course</h4>
    </div>
    <div class="modal-body" >
        <label>Enter Course Name</label>
        <input type="text" name="name" id="name" class="form-control" required /><br>
        <label>NIC</label>
        <input type="text" name="nic" id="nic" class="form-control" required/><br>
        <label>Contact Number</label>
        <input  type="text" name="contact" id="contact" class="form-control"   oninput="checkcontact(this);"  required/><br>
        <!-- <input type="text" name="contact" id="contact" class="form-control" required > -->
        <label>Email</label>
        <input type="text" name="email" id="email" class="form-control" required/><br>

        <div class="row">
    <div class="col">
        <label>Hospital Name</label>

        <!-- select 1 -->

        <input type="text" id="hospital_name" name="hospital_name" list="hospital_name_list" style="position: relative; right: 1px; top: 2px;  height: 32px; width: 213px;" class="form-control" required/></h2>
<datalist id="hospital_name_list" name="hospital_name" >
    
<?php foreach ($hospital_nameArray as $output){ ?>
            <option><?php echo $output["hospital_name"];?></option>
            <?php } 
  ?>
</datalist>

<br>
</div>
<div class="col">

        <label>Hospital City</label>
       

        <input id="hospital_city" name="hospital_city" list="hospital_city_list" style="position: relative; right: 1px; top: 2px;  height: 32px; width: 213px;" class="form-control" required/></h2>
<datalist id="hospital_city_list" name="hospital_city" >

<?php foreach ($hospital_cityArray as $output){ ?>
<option><?php echo $output["hospital_city"];?></option>
<?php } 
?>
</datalist>

</div>
<br>
  </div>

  <div class="row">
    <div class="col">

        <label>Department</label>

        
        <input id="department" name="department" list="department_list" style="position: relative; right: 1px; top: 2px;  height: 32px; width: 213px;" class="form-control" required/></h2>
<datalist id="department_list" name="department" >
    
            <?php foreach ($departmentArray as $output){ ?>
            <option><?php echo $output["department"];?></option>
            <?php } 
  ?>
</datalist>
</div>
<br>
        <!-- </select> -->
        <div class="col">

        <label>Designation</label>


        <input id="designation" name="designation" list="designation_list" style="position: relative; right: 1px; top: 2px;  height: 32px; width: 213px;" class="form-control" required/></h2>
<datalist id="designation_list" name="designation" >

            <?php foreach ($designationArray as $output){ ?>
            <option><?php echo $output["designation"];?></option>
            <?php } 
  ?>
</datalist>

    
</div>
  </div>

  <br>

        <label>Activity</label>
        <textarea  name="activity" rows="10" cols="70" id="activity" class="form-control"  required>




        </textarea>
      

    </div>
    <div class="modal-footer">
        <input type="hidden" name="course_id" id="course_id" />
        <input type="hidden" name="operation" id="operation" />
        <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</form>

<script>

function checkcontact(contactInput) {
            var formatted = contactInput.value.replace(/\D/g, '');
            if (formatted.length !== 10) {
              contactInput.setCustomValidity('please enter 10 digit number')
            } else {
              contactInput.setCustomValidity(""); // be sure to leave this empty! 
            }
        }

var form = document.getElementById("course_form");
        if (form.attachEvent) {
            form.attachEvent("submit", processForm);
        } else {
            form.addEventListener("submit", processForm);
        }

function processForm(e) {
              e.preventDefault();
    console.log('cool');
}
</script>