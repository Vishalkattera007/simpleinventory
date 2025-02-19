<?php
include __DIR__ . '/../db_config.php';

//queries
// Units
function unitsshow($con, $unit_id)
{
    $Unitssql = mysqli_query($con, "SELECT name FROM `units` where id = $unit_id");
    if ($Unitssql && mysqli_num_rows($Unitssql) > 0) {
        $unit_data = mysqli_fetch_assoc($Unitssql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function checkboxes($con, $code, $user_id = 0)
{
    if ($code == '001') {
        $columnName = "unitId";
        $tableName  = "productdata";
    } else {
        $columnName = "units";
        $tableName  = "usersdata";
    }

    // Fetch all available units
    $units_query = mysqli_query($con, "SELECT id, name FROM units");

    // Fetch user’s assigned units if editing
    $selected_units = [];
    if ($user_id > 0) {
        $user_units_query = mysqli_query($con, "SELECT $columnName FROM $tableName WHERE id = '$user_id'");
        if ($user_units_query) {
            $user_units_row = mysqli_fetch_assoc($user_units_query);
            $selected_units = explode(',', $user_units_row[$columnName]); // Convert CSV string to array
        }
    }

    // Display checkboxes
    if ($units_query && mysqli_num_rows($units_query) > 0) {
        while ($row = mysqli_fetch_assoc($units_query)) {
            $unit_id   = htmlspecialchars($row['id']);
            $unit_name = htmlspecialchars($row['name']);

            // Check if unit is already selected
            $checked = in_array($unit_id, $selected_units) ? 'checked' : '';

            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                      <input type="checkbox" class="custom-control-input" name="units[]" value="' . $unit_id . '" id="customCheck-' . $unit_id . '" ' . $checked . '>
                      <label class="custom-control-label" for="customCheck-' . $unit_id . '">' . $unit_name . '</label>
                  </div>';
        }
    } else {
        echo "<p class='text-center'>No units found</p>";
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
        <button class="btn btn-danger mx-2" type="submit" name="delete_unit">Delete</button>
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

    $check_query  = "SELECT id FROM units WHERE name = '$unit_name'";
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
    $check_query  = "SELECT id FROM units WHERE name = '$new_name' AND id != $unit_id";
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

//uom

function uomsshow($con, $uom_id)
{
    $stmt = mysqli_prepare($con, "SELECT name, value FROM uom WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $uom_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return [
            'name'  => htmlspecialchars($row['name']),
            'value' => htmlspecialchars($row['value']),
        ]; // Return an associative array
    } else {
        return ['name' => '', 'value' => '']; // Return empty values if no data found
    }
}

function uomcheckboxes($con, $uom_id = 0)
{
    $uom_query     = mysqli_query($con, "SELECT id, name FROM uom");
    $selected_uoms = [];
    if ($uom_id > 0) {
        $_query = mysqli_query($con, "SELECT uomId FROM productdata WHERE id = '$uom_id'");
        if ($_query) {
            $row           = mysqli_fetch_assoc($_query);
            $selected_uoms = explode(',', $row['uomId']); // Convert CSV string to array
        }
    }

    // Display checkboxes
    if ($uom_query && mysqli_num_rows($uom_query) > 0) {
        while ($row = mysqli_fetch_assoc($uom_query)) {
            $uom_id   = htmlspecialchars($row['id']);
            $uom_name = htmlspecialchars($row['name']);

            // Check if uom is already selected
            $checked = in_array($uom_id, $selected_uoms) ? 'checked' : '';

            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                      <input type="checkbox" class="custom-control-input" name="uom[]" value="' . $uom_id . '" id="customCheck-3' . $uom_id . '" ' . $checked . '>
                      <label class="custom-control-label" for="customCheck-3' . $uom_id . '">' . $uom_name . '</label>
                  </div>';
        }
    } else {
        echo "<p class='text-center'>No uom found</p>";
    }
}

function uomsList($con)
{
    $uomsql       = "SELECT id, name, value FROM `uom` ORDER BY id DESC";
    $uomsqlresult = mysqli_query($con, $uomsql);

    if (mysqli_num_rows($uomsqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($uomsqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['value']) . "</td>";
            echo '<td class="d-flex flex-row justify-content-start">
                    <a href="uom.php?id=' . $row['id'] . '">
                        <button class="btn btn-primary" type="button">Edit</button>
                    </a>
                    <form action="inserts.php" method="POST">
                        <input type="hidden" name="uom_id" value="' . $row['id'] . '">
                        <button class="btn btn-danger mx-2" type="submit" name="delete_uom">Delete</button>
                    </form>
                  </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No units found</td></tr>";
    }

}

function uomInsert($con, $unit_name, $uom_value, $created_by)
{
    $unit_name = mysqli_real_escape_string($con, trim($unit_name));

    $check_query  = "SELECT id FROM uom WHERE name = '$unit_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }

    $sql = "INSERT INTO uom (name,value, created_at, created_by, updated_at, updated_by)
            VALUES ('$unit_name','$uom_value', NOW(), $created_by, NULL, NULL)";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return mysqli_error($con);
    }
}

function uomUpdate($con, $uom_id, $name, $updated_by, $value)
{
    $new_name = mysqli_real_escape_string($con, trim($name));

    // Check if the new unit name already exists
    $check_query  = "SELECT id FROM umo WHERE name = '$name' AND id != $uom_id";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Uom name already exists!";
    }

    // Update unit
    $sql = "UPDATE uom SET name = '$name', value = '$value', updated_at = NOW(), updated_by = $updated_by WHERE id = $uom_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function uomDelete($con, $uom_id)
{
    $sql = "DELETE FROM uom WHERE id = $uom_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

// stages
function stagesshow($con, $unit_id)
{
    $stagessql = mysqli_query($con, "SELECT name FROM `stages` where id = $unit_id");
    if ($stagessql && mysqli_num_rows($stagessql) > 0) {
        $unit_data = mysqli_fetch_assoc($stagessql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function stagescheckboxes($con, $uom_id = 0)
{
    $stages_query    = mysqli_query($con, "SELECT id, name FROM stages");
    $selected_stages = [];
    if ($uom_id > 0) {
        $user_stages_query = mysqli_query($con, "SELECT stageId FROM productdata WHERE id = '$uom_id'");
        if ($user_stages_query) {
            $user_stages_row = mysqli_fetch_assoc($user_stages_query);
            $selected_stages = explode(',', $user_stages_row['stageId']); // Convert CSV string to array
        }
    }

    // Display checkboxes
    if ($stages_query && mysqli_num_rows($stages_query) > 0) {
        while ($row = mysqli_fetch_assoc($stages_query)) {
            $stage_id   = htmlspecialchars($row['id']);
            $stage_name = htmlspecialchars($row['name']);

            // Check if stage is already selected
            $checked = in_array($stage_id, $selected_stages) ? 'checked' : '';

            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                      <input type="checkbox" class="custom-control-input" name="stages[]" value="' . $stage_id . '" id="customCheck-1' . $stage_id . '" ' . $checked . '>
                      <label class="custom-control-label" for="customCheck-1' . $stage_id . '">' . $stage_name . '</label>
                  </div>';
        }
    } else {
        echo "<p class='text-center'>No stages found</p>";
    }

    // $stagessql = mysqli_query($con, "SELECT id, name FROM `stages`");
    // if ($stagessql && mysqli_num_rows($stagessql) > 0) {
    //     while ($row = mysqli_fetch_assoc($stagessql)) {
    // echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
    //                 <input type="checkbox" class="custom-control-input" name="stages[]" value="' . htmlspecialchars($row['id']) . '" id="customCheck-1' . htmlspecialchars($row['id']) . '">
    //                 <label class="custom-control-label" for="customCheck-1' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</label>
    //             </div>';

    //     }
    // } else {
    //     echo "<tr><td colspan='3' class='text-center'>No stages found</td></tr>";
    // }
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
        <button class="btn btn-danger mx-2" type="submit" name="delete_stage">Delete</button>
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

    $check_query  = "SELECT id FROM stages WHERE name = '$unit_name'";
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
    $check_query  = "SELECT id FROM stages WHERE name = '$new_name' AND id != $unit_id";
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
function blocksshow($con, $unit_id)
{
    $blockssql = mysqli_query($con, "SELECT name FROM `blocks` where id = $unit_id");
    if ($blockssql && mysqli_num_rows($blockssql) > 0) {
        $unit_data = mysqli_fetch_assoc($blockssql);
        return htmlspecialchars($unit_data['name']); // Prevent XSS attacks
    } else {
        return ""; // Return an empty string instead of "No Data" (better for form inputs)
    }
}

function blockscheckboxes($con, $uom_id = 0)
{
    $blocks_query    = mysqli_query($con, "SELECT id, name FROM blocks");
    $selected_blocks = [];
    if ($uom_id > 0) {
        $user_blocks_query = mysqli_query($con, "SELECT blockId FROM productdata WHERE id = '$uom_id'");
        if ($user_blocks_query) {
            $user_blocks_row = mysqli_fetch_assoc($user_blocks_query);
            $selected_blocks = explode(',', $user_blocks_row['blockId']); // Convert CSV string to array
        }
    }

    // Display checkboxes
    if ($blocks_query && mysqli_num_rows($blocks_query) > 0) {
        while ($row = mysqli_fetch_assoc($blocks_query)) {
            $block_id   = htmlspecialchars($row['id']);
            $block_name = htmlspecialchars($row['name']);

            // Check if stage is already selected
            $checked = in_array($block_id, $selected_blocks) ? 'checked' : '';

            echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                      <input type="checkbox" class="custom-control-input" name="blocks[]" value="' . $block_id . '" id="customCheck-2' . $block_id . '" ' . $checked . '>
                      <label class="custom-control-label" for="customCheck-2' . $block_id . '">' . $block_name . '</label>
                  </div>';
        }
    } else {
        echo "<p class='text-center'>No blocks found</p>";
    }

    // $blockssql = mysqli_query($con, "SELECT id, name FROM `blocks`");
    // if ($blockssql && mysqli_num_rows($blockssql) > 0) {
    //     while ($row = mysqli_fetch_assoc($blockssql)) {
    //         echo '<div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
    //                         <input type="checkbox" class="custom-control-input" name="blocks[]" value="' . htmlspecialchars($row['id']) . '" id="customCheck-2' . htmlspecialchars($row['id']) . '">
    //                         <label class="custom-control-label" for="customCheck-2' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</label>
    //                     </div>';
    //     }
    // } else {
    //     echo "<tr><td colspan='3' class='text-center'>No blocks found</td></tr>";
    // }
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
        <button class="btn btn-danger mx-2" type="submit" name="delete_block">Delete</button>
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

    $check_query  = "SELECT id FROM blocks WHERE name = '$unit_name'";
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
    $check_query  = "SELECT id FROM blocks WHERE name = '$new_name' AND id != $unit_id";
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
function roles($con, $selected_role = '')
{
    $roles_result = mysqli_query($con, "SELECT id, role FROM roles");

    if ($roles_result) {
        while ($row = mysqli_fetch_assoc($roles_result)) {
            $role_id   = htmlspecialchars($row['id']);
            $role_name = htmlspecialchars($row['role']);

            // Check if this role is the user's current role
            $selected = ($selected_role == $role_id) ? 'selected' : '';

            echo '<option value="' . $role_id . '" ' . $selected . '>' . $role_name . '</option>';
        }
    } else {
        echo '<option disabled>Error fetching roles</option>';
    }
}
//Users Data handling
function userInsert($con, $username, $employee_id, $password, $email, $phone, $role, $units, $created_by)
{
    $username    = mysqli_real_escape_string($con, trim($username));
    $employee_id = mysqli_real_escape_string($con, trim($employee_id));
    $password    = mysqli_real_escape_string($con, trim($password));
    $email       = mysqli_real_escape_string($con, trim($email));
    $phone       = mysqli_real_escape_string($con, trim($phone));
    $role        = mysqli_real_escape_string($con, trim($role));
    $units       = mysqli_real_escape_string($con, trim($units));

    $check_query  = "SELECT id FROM usersdata WHERE employeeId = '$employee_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Unit already exists!";
    }

    $sql = "INSERT INTO usersdata (username,employeeId,password,email,mobile,roleId,units,created_by,created_at)
            VALUES ('$username','$employee_id','$password','$email','$phone','$role','$units','$created_by', NOW())";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return mysqli_error($con);
    }
}
function usersUpdate($con, $username, $employee_id, $password, $email, $phone, $role, $units, $updated_by, $user_id)
{
    $email = mysqli_real_escape_string($con, trim($email));

    $sql = "UPDATE usersdata SET username = '$username', employeeId = '$employee_id', password = '$password', email = '$email', mobile = '$phone', roleId = '$role', units = '$units', updated_at = NOW(), updated_by = $updated_by WHERE id = $user_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function usersList($con)
{
    $usersql       = "SELECT * FROM `usersdata` ORDER BY id DESC";
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
            echo "<td>" . htmlspecialchars($row['roleId']) . "</td>";

            echo '<td class="d-flex flex-row justify-content-start">
        <a href="usersIn.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="user_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_user">Delete</button>
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
function usersDelete($con, $user_id)
{
    $sql = "DELETE FROM usersdata WHERE id = $user_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

//products handling

function productInsert($con, $product_code, $material_code, $material_name, $uom_ids, $blocks_ids, $stages_ids, $units_ids, $created_by)
{
    $product_code  = mysqli_real_escape_string($con, trim($product_code));
    $material_code = mysqli_real_escape_string($con, trim($material_code));
    $material_name = mysqli_real_escape_string($con, trim($material_name));
    $uom_ids       = mysqli_real_escape_string($con, trim($uom_ids));
    $blocks_ids    = mysqli_real_escape_string($con, trim($blocks_ids));
    $stages_ids    = mysqli_real_escape_string($con, trim($stages_ids));
    $units_ids     = mysqli_real_escape_string($con, trim($units_ids));

    $check_query  = "SELECT id FROM productdata WHERE productCode = '$product_code'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        return "Product already exists!";
    }

    $sql = "INSERT INTO productdata (productCode, materialCode, material_Code_name, blockId, stageId, unitId, uomId, created_by,created_at)
            VALUES ('$product_code', '$material_code', '$material_name', '$uom_ids', '$blocks_ids', '$stages_ids', '$units_ids','$created_by', NOW())";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return mysqli_error($con);
    }
}
function productUpdate($con, $product_id, $product_code, $material_code, $material_name, $uom_ids, $blocks_ids, $stages_ids, $units_ids, $updated_by)
{
    $sql = "UPDATE productdata SET productCode = '$product_code', materialCode = '$material_code', material_Code_name = '$material_name', blockId = '$blocks_ids', stageId = '$stages_ids', unitId = '$units_ids', uomId = '$uom_ids', updated_at = NOW(), updated_by = $updated_by WHERE id = $product_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

function productList($con)
{
    $sql       = "SELECT * FROM `productdata` ORDER BY id DESC";
    $sqlresult = mysqli_query($con, $sql);
    if (mysqli_num_rows($sqlresult) > 0) {
        $sno = 1;
        while ($row = mysqli_fetch_assoc($sqlresult)) {
            echo "<tr>";
            echo "<td>" . $sno . "</td>";
            echo "<td>" . htmlspecialchars($row['productCode']) . "</td>";
            echo "<td>" . htmlspecialchars($row['materialCode']) . "</td>";
            echo "<td>" . htmlspecialchars($row['material_Code_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['blockId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['stageId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['unitId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['uomId']) . "</td>";

            echo '<td class="d-flex flex-row justify-content-start">
        <a href="productsIn.php?id=' . $row['id'] . '">
            <button class="btn btn-primary" type="button">Edit</button>
        </a>
        <form action="inserts.php" method="POSt">
        <input type="hidden" name="product_id" value="' . $row['id'] . '">
        <button class="btn btn-danger mx-2" type="submit" name="delete_product">Delete</button>
        </form>
      </td>';
            echo "</tr>";
            $sno++;
        }
    } else {
        echo "<tr><td colspan='3' class='text-center'>No units found</td></tr>";
    }
}

function productData($con, $product_id, $column)
{
    $stmt = $con->prepare("SELECT $column FROM productdata WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data   = $result->fetch_assoc();

    return $data ? htmlspecialchars($data[$column]) : '';
}
function productDelete($con, $product_id)
{
    $sql = "DELETE FROM productdata WHERE id = $product_id";

    if (mysqli_query($con, $sql)) {
        return true; // Success
    } else {
        return mysqli_error($con); // Return error
    }
}

//Get Data function
function productsOnscreen($con, $selected_productCode = '')
{
    $query_result = mysqli_query($con, "SELECT * FROM productdata");

    if ($query_result) {
        echo '<option value="">--select One--</option>';
        while ($row = mysqli_fetch_assoc($query_result)) {
            $product_id  = htmlspecialchars($row['id']);
            $productCode = htmlspecialchars($row['productCode']);

            // Check if this role is the user's current role
            $selected = ($selected_productCode == $productCode) ? 'selected' : '';

            echo '<option value="' . $product_id . '" ' . $selected . '>' . $productCode . '</option>';
        }
    } else {
        echo '<option disabled>Error fetching roles</option>';
    }
}

function getstages($con, $productId)
{
    $query_result = mysqli_query($con, "SELECT stageId FROM productdata WHERE id = $productId");

    if ($query_result) {
        $row = mysqli_fetch_assoc($query_result);
        if (!$row || empty($row['stageId'])) {
            return [];
        }

        $stageIds = explode(',', $row['stageId']);
        $stageIds = array_map('trim', $stageIds);
        $stageIdsString = implode("','", $stageIds);

        $stage_query = mysqli_query($con, "SELECT id, name FROM stages WHERE id IN ('$stageIdsString')");
        $stages = [];

        while ($stage_row = mysqli_fetch_assoc($stage_query)) { 
            $stages[] = [
                'id'   => $stage_row['id'],
                'name' => $stage_row['name']
            ];
        }

        return $stages;
    }

    return [];
}


function getblocks($con, $productId)
{
    $query_result = mysqli_query($con, "SELECT blockId FROM productdata WHERE id = $productId");

    if ($query_result) {
        $row = mysqli_fetch_assoc($query_result);
        if (!$row || empty($row['blockId'])) {
            return [];
        }

        $blockIds = explode(',', $row['blockId']); // Convert "1,2" to array ["1", "2"]
        $blockIds = array_map('trim', $blockIds); // Trim spaces
        $blockIdsString = implode("','", $blockIds); // Convert to SQL-friendly format

        // Fetch block names for all block IDs
        $block_query = mysqli_query($con, "SELECT id, name FROM blocks WHERE id IN ('$blockIdsString')");
        $blocks = [];

        while ($block_row = mysqli_fetch_assoc($block_query)) { 
            $blocks[] = [
                'id'   => $block_row['id'],
                'name' => $block_row['name']
            ];
        }

        return $blocks;
    }

    return [];
}


function getunits($con, $productId)
{
    $query_result = mysqli_query($con, "SELECT unitId FROM productdata WHERE id = $productId");

    if ($query_result) {
        $row = mysqli_fetch_assoc($query_result);
        if (!$row || empty($row['unitId'])) {
            return [];
        }

        $unitIds = explode(',', $row['unitId']);
        $unitIds = array_map('trim', $unitIds);
        $unitIdsString = implode("','", $unitIds);

        $unit_query = mysqli_query($con, "SELECT id, name FROM units WHERE id IN ('$unitIdsString')");
        $units = [];

        while ($unit_row = mysqli_fetch_assoc($unit_query)) { 
            $units[] = [
                'id'   => $unit_row['id'],
                'name' => $unit_row['name']
            ];
        }

        return $units;
    }

    return [];
}

