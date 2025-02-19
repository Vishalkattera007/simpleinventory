<?php
    include 'admin/functions.php';
    // Ensure $baseUrl is defined
    $baseUrl = dirname($_SERVER['SCRIPT_NAME']) . '/';
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
        <h1 class="text-center">Form2 List</h1>
    </div>

    <div class="container">
        <div class="container-fluid bg-light p-3 rounded table-responsive">
            <table class="table table-bordered form_2">
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