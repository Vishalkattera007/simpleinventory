<?php
include 'admin/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="projectName m-3">
        <h1 class="text-center">Production Report</h1>

    </div>

    <div class="container">
        <div class="container-fluid bg-light p-3 rounded">
            <div class="row d-flex flex-row g-2">
                <div class="lg-12 col-sm-3 p-3">
                    <label class="label" for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control mt-1 w-100" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="lg-12 col-sm-2 p-3">
                    <label class="label" for="pc">Product Code</label>
                    <select class="form-select mt-1" id="productCode" name="productCode" required>

                        <?php productsOnscreen($con); ?>
                    </select>
                </div>
                <div class="lg-12 col-sm-2 p-3">
                    <label class="label" for="stage">Stage</label>
                    <select class="form-select mt-1" id="stage" name="stage" required>

                    </select>
                </div>
                <div class="lg-12 col-sm-2 p-3">
                    <label class="label" for="block">Block</label>
                    <select class="form-select mt-1" id="block" name="block" required>

                    </select>
                </div>
                <div class="lg-12 col-sm-2 p-3">
                    <label class="label" for="block">Units</label>
                    <select class="form-select mt-1" id="units" name="units" required>

                    </select>
                </div>
            </div>
            <div class="row d-flex flex-row g-2">
                <div class="lg-12 col-sm-12 p-3 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-dark w-100" id="loadButton">Load Data</button>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light p-3 rounded formsContainer">
            <div class="row d-flex flex-row g-2">
                <h3>Form 1</h3>
                <table class="table form_1">
                    <thead>
                        <tr>
                            <th class="col">Completed Batches</th>
                            <th class="col">WIP Batches</th>
                            <th class="col">Opening Stock</th>
                            <th class="col">Closing Stock</th>
                            <th class="col">Total Production</th>
                            <th class="col">Total Dispatches</th>
                            <th class="col">STD Yield</th>
                            <th class="col">Target Yield</th>
                            <th class="col">Actual Yield</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- <th scope="row">1</th> -->
                            <td><input type="number" class="form-control" name="completedBatches" id="completedBatches"></td>
                            <td><input type="number" class="form-control" name="wipBatches" id="wipBatches"></td>
                            <td><input type="number" class="form-control" name="openingStock" id="openingStock"></td>
                            <td><input type="number" class="form-control" name="closingStock" id="closingStock"></td>
                            <td><input type="number" class="form-control" name="totalProduction" id="totalProduction"></td>
                            <td><input type="number" class="form-control" name="totalDispatches" id="totalDispatches"></td>
                            <td><input type="number" class="form-control" name="stdYield" id="stdYield"></td>
                            <td><input type="number" class="form-control" name="targetYield" id="targetYield"></td>
                            <td><input type="number" class="form-control" name="actualYield" id="actualYield"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row d-flex flex-row g-2">
                <h3>Form 2</h3>
                <table class="table form_2">
                    <thead>
                        <tr>
                            <th class="col">S.NO</th>
                            <th class="col">Code</th>
                            <th class="col">Material (Name)</th>
                            <th class="col">UOM</th>
                            <th class="col">Sp.Gr</th>
                            <th class="col">Op.. Balance</th>
                            <th class="col">Receipts</th>
                            <th class="col">Source</th>
                            <th class="col">Total</th>
                            <th class="col">Transfers</th>
                            <th class="col">Physical Stock</th>
                            <th class="col">WIP</th>
                            <th class="col">Closing Balance</th>
                            <th class="col">Net Consumption</th>
                            <th class="col">Actual CC</th>
                            <th class="col">STD CC</th>
                            <th class="col">Std Inputs</th>
                            <th class="col">Per Batch Consumption</th>
                        </tr>
                    </thead>
                    <tbody id="form2Body"></tbody>
                </table>

            </div>
            <button type="button" class="btn btn-success" id="saveData">Save Data</button>
        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
            $('#productCode').change(function() {
                var productId = $(this).val();
                $.ajax({
            url: 'admin/getdata.php', // Path to the PHP script
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                console.log(response); // Handle response (display or process it)
                $('#stage').empty();
                if (response.stages.length > 0) {
                    response.stages.forEach(stage => {
                        $('#stage').append(`<option value="${stage.id}">${stage.name}</option>`);
                    });
                } else {
                    $('#stage').append('<option disabled>No Stages Found</option>');
                }

                $('#block').empty();
                if (response.blocks.length > 0) {
                    response.blocks.forEach(block => {
                        $('#block').append(`<option value="${block.id}">${block.name}</option>`);
                    });
                } else {
                    $('#block').append('<option disabled>No Blocks Found</option>');
                }

                $('#units').empty();
                if (response.units.length > 0) {
                    response.units.forEach(unit => {
                        $('#units').append(`<option value="${unit.id}">${unit.name}</option>`);
                    });
                } else {
                    $('#units').append('<option disabled>No Units Found</option>');
                } 

            },
            error: function(xhr, status, error) {
                console.log("AJAX Error: " + error);
            }
        });

            });
        });
    </script>
</body>

</html>