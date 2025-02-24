<?php
    include 'admin/functions.php';
    // Ensure $baseUrl is defined
    $baseUrl = dirname($_SERVER['SCRIPT_NAME']) . '/';

    $sql       = "SELECT * FROM `form2_data` ORDER BY id DESC";
    $sqlresult = mysqli_query($con, $sql);

    if (mysqli_num_rows($sqlresult) > 0) {
        $row     = mysqli_fetch_assoc($sqlresult);
        $form1Id = $row['form1_id'];

        $sql2 = mysqli_query($con, "SELECT * FROM form1_data WHERE id = $form1Id");
        // $sqlresult2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($sql2) > 0) {
            $row2              = mysqli_fetch_assoc($sql2);
            $opening_stock     = $row2['opening_stock'];
            $closing_stock     = $row2['closing_stock'];
            $total_dispatches  = $row2['total_dispatches'];
            $total_production  = $row2['total_production'];
            $std_yield         = $row2['std_yield'];
            $target_yield      = $row2['target_yield'];
            $actual_yield      = $row2['actual_yield'];
            $stage             = $row2['stage'];
            $block             = $row2['block'];
            $completed_batches = $row2['completed_batches'];
            $wip_batches       = $row2['wip_batches'];
            $product_code      = $row2['product_code'];
            $date              = $row2['date'];

        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl ?>style.css">
    <!-- jQuery (Required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS (Styles for Tables) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables Buttons CSS (Styles for Export Buttons) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body>
    <div class="projectName m-3">
        <h1 class="text-center">Symed Laboratories Limited- Unit-6</h1>
    </div>
    
    <div class="container">
        <div class="container-fluid bg-light p-3 rounded">
        <table class="table">
                <tr>
                    <th colspan="4" width="50%">Production Consumption-Coefficient Statement </th>
                    <td colspan="6" width="50%"><?php echo $date?></td>
                </tr>
                <tr>
                    <th rowspan="1" colspan="1" width="10%">Mfg. Block</th>
                    <th rowspan="1" colspan="1" width="10%">Product / Stage</th>
                    <td rowspan="1" colspan="1" width="15%"><?php echo $product_code?></td>
                    <td rowspan="1" colspan="1" width="15%"><?php echo $stage?></td>
                    <th width="10%" colspan="1">Opening Stock</th>
                    <td width="10%" colspan="1"><?php echo $opening_stock?></td>
                    <th width="10%" colspan="1">Closing Stock</th>
                    <th width="5%" colspan="1">STD Yield</th>
                    <td width="5%" colspan="1"><?php echo $std_yield?></td>
                </tr>
                <tr>
                    <th colspan="1" width="10%">Block-A</th>
                    <th colspan="1" width="10%">Completed batches</th>
                    <td colspan="1" width="10%"><?php echo $completed_batches?></td>
                    <td colspan="1" width="10%"></td>
                    <th colspan="1" width="10%">Total Production</th>
                    <td colspan="1" width="10%"><?php echo $total_production?></td>
                    <th colspan="1" width="10%"><?php echo $closing_stock?></th>
                    <th colspan="1" width="10%">Target Yield</th>
                    <td colspan="1" width="10%"><?php echo $target_yield?></td>
                </tr>
                <tr>
                    <td colspan="1" width="10%"></td>
                    <th colspan="1" width="10%">WIP Batches</th>
                    <td colspan="1" width="10%"><?php echo $wip_batches?></td>
                    <td colspan="1" width="10%"></td>
                    <th colspan="1" width="10%">Total Dispatches/Consumption</th>
                    <td colspan="1" width="10%"><?php echo $total_dispatches?></td>
                    <td colspan="1" width="10%"></td>
                    <th colspan="1" width="10%">Actual Yield</th>
                    <td colspan="1" width="10%"><?php echo $actual_yield?></td>
                </tr>
                <tr>
                <th colspan="19" class="d-none"></th>
                </tr>
            </table>
            <div class="table-responsive">
            <table class="table table-bordered form_2 ">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Code</th>
                        <th>Material (Name)</th>
                        <th>UOM</th>
                        <th>Sp.Gr</th>
                        <th>Op. Balance</th>
                        <th>Receipts</th>
                        <th>Source</th>
                        <th>Total</th>
                        <th>Transfers</th>
                        <th>Physical Stock</th>
                        <th>WIP</th>
                        <th>Closing Balance</th>
                        <th>Net Consumption</th>
                        <th>Actual CC</th>
                        <th>STD CC</th>
                        <th>Std Inputs</th>
                        <th>Per Batch Consumption</th>
                    </tr>
                </thead>
                <tbody>
                    <?php form2List($con); ?>
                </tbody>
            </table>
            </div>

            <button type="button" class="btn btn-success" id="saveData">Save Data</button>
        </div>
    </div>


    <!-- DataTables Core JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons Extension -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Required Libraries for Export Functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> <!-- For Excel Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> <!-- For PDF Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Initialize DataTable with Export Buttons -->
    <script>
        $(document).ready(function() {
            $('.form_2').DataTable({
                dom: 'Bfrtip', // Enables buttons
                buttons: [
                    'copyHtml5',
                    'csvHtml5',
                    'excelHtml5',
                    // 'pdfHtml5',
                    'print'
                ]
            });
        });
    </script>

</body>

</html>