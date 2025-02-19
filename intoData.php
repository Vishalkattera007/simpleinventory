<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form1 = json_decode($_POST["form1"], true);
    $form2 = json_decode($_POST["form2"], true);

    $date              = mysqli_real_escape_string($con, $form1['date']);
    $product_code      = mysqli_real_escape_string($con, $form1['productCode']);
    $stage             = mysqli_real_escape_string($con, $form1['stage']);
    $block             = mysqli_real_escape_string($con, $form1['block']);
    $completed_batches = (int) $form1['completedBatches'];
    $wip_batches       = (int) $form1['wipBatches'];
    $opening_stock     = (int) $form1['openingStock'];
    $closing_stock     = (int) $form1['closingStock'];
    $total_production  = (int) $form1['totalProduction'];
    $total_dispatches  = (int) $form1['totalDispatches'];
    $std_yield         = (float) $form1['stdYield'];
    $target_yield      = (float) $form1['targetYield'];
    $actual_yield      = (float) $form1['actualYield'];

    // SQL Query
    $sql = "INSERT INTO form1_data
            (date, product_code, stage, block, completed_batches, wip_batches, opening_stock, closing_stock, total_production, total_dispatches, std_yield, target_yield, actual_yield)
            VALUES
            ('$date', '$product_code', '$stage', '$block', '$completed_batches', '$wip_batches', '$opening_stock', '$closing_stock', '$total_production', '$total_dispatches', '$std_yield', '$target_yield', '$actual_yield')";

    if (mysqli_query($con, $sql)) {
        $form1Idhere = mysqli_insert_id($con);
    } else {
        echo "Error: " . mysqli_error($con);
    }


    foreach($form2 as $row){
        $s_no = (int)$row['serialNo'];
        $code = mysqli_real_escape_string($con, $row['code']);
        $material = mysqli_real_escape_string($con, $row['material']);
        $uom = mysqli_real_escape_string($con, $row['uom']);
        $sp_gr = (float)$row['spGr'];
        $opening_balance = (int)$row['openingBalance'];
        $receipts = (int)$row['receipts'];
        $source = mysqli_real_escape_string($con, $row['source']);
        $total = (int)$row['total'];
        $transfers = (int)$row['transfers'];
        $physical_stock = (int)$row['physicalStock'];
        $wip = (int)$row['wip'];
        $closing_balance = (int)$row['closingBalance'];
        $net_consumption = (int)$row['netConsumption'];
        $actual_cc = (float)$row['actualCC'];
        $std_cc = (float)$row['stdCC'];
        $std_inputs = (float)$row['stdInputs'];
        $per_batch_consumption = (float)$row['perBatchConsumption'];

        $sql2 = "INSERT INTO form2_data 
                (form1_id, s_no, code, material_name, uom, sp_gr, opening_balance, receipts, source, total, transfers, physical_stock, wip, closing_balance, net_consumption, actual_cc, std_cc, std_inputs, per_batch_consumption) 
                VALUES 
                ('$form1Idhere', '$s_no', '$code', '$material', '$uom', '$sp_gr', '$opening_balance', '$receipts', '$source', '$total', '$transfers', '$physical_stock', '$wip', '$closing_balance', '$net_consumption', '$actual_cc', '$std_cc', '$std_inputs', '$per_batch_consumption')";

        if (mysqli_query($con, $sql2)) {
            echo "✅ Form 2 row (S.NO: $s_no) inserted successfully!<br>";
        } else {
            echo "❌ Error inserting Form 2 (S.NO: $s_no): " . mysqli_error($con) . "<br>";
        }
    }
} else {
    echo "Invalid request.";
}
