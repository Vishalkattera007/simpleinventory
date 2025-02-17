<?php
include '../db_config.php';

//queries
// Units
function unitsshow($con, $unit_id){
    $Unitssql       = mysqli_query($con, "SELECT name FROM `units` where id = $unit_id");
    if ($Unitssql && mysqli_num_rows($Unitssql) > 0) {
        $unit_data = mysqli_fetch_assoc($Unitssql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function checkboxes($con){
    $Unitssql       = mysqli_query($con, "SELECT id, name FROM `units`");
    if ($Unitssql && mysqli_num_rows($Unitssql) > 0) {
        while ($row = mysqli_fetch_assoc($Unitssql)) {
            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-'.htmlspecialchars($row['id']).'">
                              <label class="custom-control-label" for="customCheck-'.htmlspecialchars($row['id']).'">'.htmlspecialchars($row['name']).'</label>
                           </div>';
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No units found</td></tr>";
    }
}

function unitsList($con)
{
    $Unitssql       = "SELECT id, name, created_at, updated_at FROM `units` ORDER BY id DESC";
    $Unitssqlresult = mysqli_query($con, $Unitssql);
    if (mysqli_num_rows($Unitssqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($Unitssqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
            echo '<td class="d-flex flex-row justify-content-start">
        <a href="units.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="unit_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_unit">Delete' . $row['id'] . '</button>
        </form>
      </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No units found</td></tr>";
    }
}


function unitsInsert($con, $unit_name, $created_by)
{
    $unit_name = mysqli_real_escape_string($con, trim($unit_name));

    $check_query = "SELECT id FROM units WHERE name = '$unit_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }


    $sql = "INSERT INTO units (name, created_at, created_by, updated_at, updated_by) 
            VALUES ('$unit_name', NOW(), $created_by, NULL, NULL)";

    if (mysqli_query($con, $sql)) {
        return true; 
    } else {
        return mysqli_error($con); 
    }
}

function unitsUpdate($con, $unit_id, $new_name, $updated_by)
{
    $new_name = mysqli_real_escape_string($con, trim($new_name));

    // Check if the new unit name already exists
    $check_query = "SELECT id FROM units WHERE name = '$new_name' AND id != $unit_id";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit name already exists!";
    }

    // Update unit
    $sql = "UPDATE units SET name = '$new_name', updated_at = NOW(), updated_by = $updated_by WHERE id = $unit_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function unitsDelete($con, $unit_id)
{
    $sql = "DELETE FROM units WHERE id = $unit_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}


// stages
function stagesshow($con, $unit_id){
    $stagessql       = mysqli_query($con, "SELECT name FROM `stages` where id = $unit_id");
    if ($stagessql && mysqli_num_rows($stagessql) > 0) {
        $unit_data = mysqli_fetch_assoc($stagessql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function stagescheckboxes($con){
    $stagessql       = mysqli_query($con, "SELECT id, name FROM `stages`");
    if ($stagessql && mysqli_num_rows($stagessql) > 0) {
        while ($row = mysqli_fetch_assoc($stagessql)) {
            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-'.htmlspecialchars($row['id']).'">
                              <label class="custom-control-label" for="customCheck-'.htmlspecialchars($row['id']).'">'.htmlspecialchars($row['name']).'</label>
                           </div>';
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No stages found</td></tr>";
    }
}

function stagesList($con)
{
    $stagessql       = "SELECT id, name, created_at, updated_at FROM `stages` ORDER BY id DESC";
    $stagessqlresult = mysqli_query($con, $stagessql);
    if (mysqli_num_rows($stagessqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($stagessqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
            echo '<td class="d-flex flex-row justify-content-start">
        <a href="stage.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="stage_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_stage">Delete' . $row['id'] . '</button>
        </form>
      </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No stages found</td></tr>";
    }
}


function stagesInsert($con, $unit_name, $created_by)
{
    $unit_name = mysqli_real_escape_string($con, trim($unit_name));

    $check_query = "SELECT id FROM stages WHERE name = '$unit_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }


    $sql = "INSERT INTO stages (name, created_at, created_by, updated_at, updated_by) 
            VALUES ('$unit_name', NOW(), $created_by, NULL, NULL)";

    if (mysqli_query($con, $sql)) {
        return true; 
    } else {
        return mysqli_error($con); 
    }
}

function stagesUpdate($con, $unit_id, $new_name, $updated_by)
{
    $new_name = mysqli_real_escape_string($con, trim($new_name));

    // Check if the new unit name already exists
    $check_query = "SELECT id FROM stages WHERE name = '$new_name' AND id != $unit_id";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit name already exists!";
    }

    // Update unit
    $sql = "UPDATE stages SET name = '$new_name', updated_at = NOW(), updated_by = $updated_by WHERE id = $unit_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function stagesDelete($con, $sage_id)
{
    $sql = "DELETE FROM stages WHERE id = $sage_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}


// blocks
function blocksshow($con, $unit_id){
    $blockssql       = mysqli_query($con, "SELECT name FROM `blocks` where id = $unit_id");
    if ($blockssql && mysqli_num_rows($blockssql) > 0) {
        $unit_data = mysqli_fetch_assoc($blockssql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function blockscheckboxes($con){
    $blockssql       = mysqli_query($con, "SELECT id, name FROM `blocks`");
    if ($blockssql && mysqli_num_rows($blockssql) > 0) {
        while ($row = mysqli_fetch_assoc($blockssql)) {
            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-'.htmlspecialchars($row['id']).'">
                              <label class="custom-control-label" for="customCheck-'.htmlspecialchars($row['id']).'">'.htmlspecialchars($row['name']).'</label>
                           </div>';
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No blocks found</td></tr>";
    }
}

function blocksList($con)
{
    $blockssql       = "SELECT id, name, created_at, updated_at FROM `blocks` ORDER BY id DESC";
    $blockssqlresult = mysqli_query($con, $blockssql);
    if (mysqli_num_rows($blockssqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($blockssqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
            echo '<td class="d-flex flex-row justify-content-start">
        <a href="blocks.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="block_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_block">Delete' . $row['id'] . '</button>
        </form>
      </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No blocks found</td></tr>";
    }
}


function blocksInsert($con, $unit_name, $created_by)
{
    $unit_name = mysqli_real_escape_string($con, trim($unit_name));

    $check_query = "SELECT id FROM blocks WHERE name = '$unit_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }


    $sql = "INSERT INTO blocks (name, created_at, created_by, updated_at, updated_by) 
            VALUES ('$unit_name', NOW(), $created_by, NULL, NULL)";

    if (mysqli_query($con, $sql)) {
        return true; 
    } else {
        return mysqli_error($con); 
    }
}

function blocksUpdate($con, $unit_id, $new_name, $updated_by)
{
    $new_name = mysqli_real_escape_string($con, trim($new_name));

    // Check if the new unit name already exists
    $check_query = "SELECT id FROM blocks WHERE name = '$new_name' AND id != $unit_id";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit name already exists!";
    }

    // Update unit
    $sql = "UPDATE blocks SET name = '$new_name', updated_at = NOW(), updated_by = $updated_by WHERE id = $unit_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function blocksDelete($con, $block_id)
{
    $sql = "DELETE FROM blocks WHERE id = $block_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}



// Roles
function roles($con)
{
    $roles_result = mysqli_query($con, "select role from roles");
    if ($roles_result) {
        while ($row = mysqli_fetch_assoc($roles_result)) {
            echo '<option value="' . htmlspecialchars($row['role']) . '">' . htmlspecialchars($row['role']) . '</option>';
        }
    } else {
        echo '<option disabled>Error fetching roles</option>';
    }
}


//Users Data handling
function userInsert($con, $username, $employee_id, $password, $email, $phone, $role, $created_by)
{
    $username = mysqli_real_escape_string($con, trim($username));
    $employee_id = mysqli_real_escape_string($con, trim($employee_id));
    $password = mysqli_real_escape_string($con, trim($password));
    $email = mysqli_real_escape_string($con, trim($email));
    $phone = mysqli_real_escape_string($con, trim($phone));
    $role = mysqli_real_escape_string($con, trim($role));


    $check_query = "SELECT id FROM usersdata WHERE employeeId = '$employee_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }


    $sql = "INSERT INTO usersdata (username,employeeId,password,email,mobile,roleId,created_by,created_at) 
            VALUES ('$username','$employee_id','$password','$email','$phone','$role','$created_by', NOW())";

    if (mysqli_query($con, $sql)) {
        return true; 
    } else {
        return mysqli_error($con); 
    }
}

function usersList($con)
{
    $usersql       = "SELECT username,employeeId,email,mobile FROM `usersdata` ORDER BY id DESC";
    $usersqlresult = mysqli_query($con, $usersql);
    if (mysqli_num_rows($usersqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($usersqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['employeeId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
            echo '<td class="d-flex flex-row justify-content-start">
        <a href="user.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="unit_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_unit">Delete' . $row['id'] . '</button>
        </form>
      </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No units found</td></tr>";
    }
}


function getUserData($con, $user_id, $column)
{
    $stmt = $con->prepare("SELECT $column FROM usersdata WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data   = $result->fetch_assoc();

    return $data ? htmlspecialchars($data[$column]) : '';
}
