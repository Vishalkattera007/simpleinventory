<?php
include 'admin/functions.php';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>

        <table>
            <tr>
                <th colspan="4">Production Consumption-Coefficient Statement</th>
                <th colspan="3">Opening Stock</th>
                <th colspan="3">Production & Dispatch</th>
                <th colspan="3">Yield</th>
            </tr>
          
            <tr>
                <td rowspan="2">Mfg. Block</td>
                <td rowspan="2">Product / Stage</td>
                <td rowspan="2">Completed Batches</td>
                <td rowspan="2">WIP Batches</td>
                <td>Opening Stock</td>
                <td>Total Production</td>
                <td>Closing Stock</td>
                <td>Total Dispatch/Consumption</td>
                <td>Actual Yield</td>
                <td>STD Yield</td>
                <td>Target Yield</td>
            </tr>
            <tr>
                <td></td>
                <td>12</td>
                <td>25</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">(DATA HERE)</td>
                <td colspan="3">(DATA HERE)</td>
                <td colspan="3">(DATA HERE)</td>
            </tr>
        </table>

        <table>
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
            <?php form2List($con) ?>
        </table>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>