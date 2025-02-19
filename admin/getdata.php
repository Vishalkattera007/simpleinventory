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

if (isset($_POST['productId']) && is_numeric($_POST['productId'])) {
    $productId = intval($_POST['productId']); 

    $sql       = "SELECT * FROM `productdata` where id = $productId";
    $sqlresult = mysqli_query($con, $sql);

    if (mysqli_num_rows($sqlresult) > 0) {
        $row = mysqli_fetch_assoc($sqlresult);
        $uomId = $row['uomId'];
        $sql2 =  mysqli_query($con, "SELECT value FROM `uom` where id = $uomId");
        $row2 = mysqli_fetch_assoc($sql2);
        $uomValue = $row2['value'];
        $productCode = $row['productCode'];
        $material_Code_name = $row['material_Code_name'];
        $rowCount = mysqli_num_rows($sqlresult);
    }



    // Assuming $con is your database connection
    $stagesOptions = getstages($con, $productId);
    $blockOptions  = getblocks($con, $productId);
    $unitOptions   = getunits($con, $productId); 

    if (! empty($stagesOptions) || ! empty($blockOptions) || ! empty($unitOptions ) || ! empty($uomValue ) || ! empty($productCode ) || ! empty($material_Code_name ) || ! empty($rowCount )) {
        echo json_encode([
            'stages' => $stagesOptions,
            'blocks' => $blockOptions,
            'units'  => $unitOptions,
            'code'  => $productCode,
            'materialName'=> $material_Code_name,
            'uom'=>$uomValue,
            'rowCount' => $rowCount
        ]);
    } else {
        echo json_encode(["error" => "No options found"]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
    
}
