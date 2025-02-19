<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'functions.php';
header('Content-Type: application/json');

if (isset($_POST['productCode'])) {
    $productId = intval($_POST['productId']); // Sanitize input

    // Fetch stageId for the product
    $query  = "SELECT stageId FROM productdata WHERE id = $productId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['stageId' => $row['stageId']]);
    } else {
        echo json_encode(['stageId' => null]); // No stageId found
    }
}

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Assuming $con is your database connection
    $stagesOptions = getstages($con, $productId);
    $blockOptions  = getblocks($con, $productId);
    $unitOptions   = getunits($con, $productId); 

    if (! empty($stagesOptions) || ! empty($blockOptions) || ! empty($unitOptions)) {
        echo json_encode([
            'stages' => $stagesOptions,
            'blocks' => $blockOptions,
            'units'  => $unitOptions
        ]);
    } else {
        echo json_encode(["error" => "No options found"]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
