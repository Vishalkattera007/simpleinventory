<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture Form-1 Data

if (isset($_POST['Submit'])) {
    // Your code here
}
//if (!isset($_POST['date'], $_POST['productCode'], $_POST['stage'], $_POST['block'])) {
  //  die("Error: Missing required form data.");
//}

// Capture Form-1 Data
$date = $_POST['date'];
$productCode = $_POST['productCode'];
$stage = $_POST['stage'];
$block = $_POST['block'];
$completedBatches = $_POST['completedBatches'];
$wipBatches = $_POST['wipBatches'];
$openingStock = $_POST['openingStock'];
$closingStock = $_POST['closingStock'];
$totalProduction = $_POST['totalProduction'];
$totalDispatches = $_POST['totalDispatches'];
$stdYield = $_POST['stdYield'];
$targetYield = $_POST['targetYield'];
$actualYield = $_POST['actualYield'];

// Use Prepared Statement to Prevent SQL Injection
$stmt1 = $conn->prepare("INSERT INTO form1_data (date, product_code, stage, block, completed_batches, wip_batches, opening_stock, closing_stock, total_production, total_dispatches, std_yield, target_yield, actual_yield) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt1->bind_param("ssssiiiiiiiii", $date, $productCode, $stage, $block, $completedBatches, $wipBatches, $openingStock, $closingStock, $totalProduction, $totalDispatches, $stdYield, $targetYield, $actualYield);

if ($stmt1->execute()) {
    $form1_id = $stmt1->insert_id; // Get the last inserted ID
    $stmt1->close(); // Close statement

    // Capture and Insert Form-2 Data
    if (isset($_POST['s_no'])) {
        $stmt2 = $conn->prepare("INSERT INTO form2_data (form1_id, s_no, code, material_name, uom, sp_gr, opening_balance, receipts, source, total, transfers, physical_stock, wip, closing_balance, net_consumption, actual_cc, std_cc, std_inputs, per_batch_consumption) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        foreach ($_POST['s_no'] as $index => $s_no) {
            $code = $_POST['code'][$index];
            $material_name = $_POST['material_name'][$index];
            $uom = $_POST['uom'][$index];
            $sp_gr = $_POST['sp_gr'][$index];
            $opening_balance = $_POST['opening_balance'][$index];
            $receipts = $_POST['receipts'][$index];
            $source = $_POST['source'][$index];
            $total = $_POST['total'][$index];
            $transfers = $_POST['transfers'][$index];
            $physical_stock = $_POST['physical_stock'][$index];
            $wip = $_POST['wip'][$index];
            $closing_balance = $_POST['closing_balance'][$index];
            $net_consumption = $_POST['net_consumption'][$index];
            $actual_cc = $_POST['actual_cc'][$index];
            $std_cc = $_POST['std_cc'][$index];
            $std_inputs = $_POST['std_inputs'][$index];
            $per_batch_consumption = $_POST['per_batch_consumption'][$index];

            $stmt2->bind_param("iisssddddddddddddd", $form1_id, $s_no, $code, $material_name, $uom, $sp_gr, $opening_balance, $receipts, $source, $total, $transfers, $physical_stock, $wip, $closing_balance, $net_consumption, $actual_cc, $std_cc, $std_inputs, $per_batch_consumption);
            $stmt2->execute();
        }
        $stmt2->close(); // Close statement
    }

    echo "Data saved successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>