<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }

        .container {
            max-width: 1520px;
            margin: auto;
        }

        .form-section {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 0px 11px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        input {
            font-size: 12px;
            padding: 4px;
            border: none;
            width: 100%;
            text-align: center;
        }

        .btn {
            padding: 8px 12px;
            margin: 5px;
            cursor: pointer;
        }

        select {
            font-size: 12px;
            padding: 4px;
        }

        .form2-container {
            width: 1000px;
            margin: auto;
        }

        @media print {
            body {
                font-size: 10px;
            }

            .btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Production Report</h2>
        <div class="form-section" id="productionForm1">
            <label>Date:</label>
            <input type="date" id="date" name="date" onchange="enableNext('productCode')">
            <label>Product Code:</label>
            <select id="productCode" name="productCode" onchange="enableNext('stage')">
                <option value="">Select Option</option>
                <option value="Product Code1">Product Code1</option>
                <option value="Product Code2">Product Code2</option>
            </select>
            <label>Stage:</label>
            <select id="stage" name="stage" onchange="enableNext('block')">
                <option value="">Select Option</option>
                <option value="Stage 1">Stage 1</option>
                <option value="Stage 2">Stage 2</option>
            </select>
            <label>Block:</label>
            <select id="block" name="block" onchange="enableNext('loadButton')">
                <option value="">Select Option</option>
                <option value="Block A">Block A</option>
                <option value="Block B">Block B</option>
            </select>
            <button class="btn" id="loadButton" onclick="loadForms()">LOAD</button>
        </div>

        <div id="productionForm" style="display: none;">
            <h3>Form-1</h3>
            <table>
                <tr>
                    <th>Completed Batches</th>
                    <th>WIP Batches</th>
                    <th>Opening Stock</th>
                    <th>Closing Stock</th>
                    <th>Total Production</th>
                    <th>Total Dispatches</th>
                    <th>STD Yield</th>
                    <th>Target Yield</th>
                    <th>Actual Yield</th>
                </tr>
                <tr>
                    <td><input type="number" name="completedBatches" id="completedBatches"></td>
                    <td><input type="number" name="wipBatches" name="wipBatches" id="wipBatches"></td>
                    <td><input type="number" name="openingStock" id="openingStock"></td>
                    <td><input type="number" name="closingStock" id="closingStock"></td>
                    <td><input type="number" name="totalProduction" id="totalProduction"></td>
                    <td><input type="number" name="totalDispatches" id="totalDispatches"></td>
                    <td><input type="number" name="stdYield" id="stdYield"></td>
                    <td><input type="number" name="targetYield" id="targetYield"></td>
                    <td><input type="number" name="actualYield" id="actualYield"></td>
                </tr>
            </table>

            <h3>Form-2</h3>
            <table>
                <tr>
                    <th>S.NO</th>
                    <th>Code</th>
                    <th>Name of the Material</th>
                    <th>UOM</th>
                    <th>Sp.Gr</th>
                    <th>Opening Balance</th>
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
                <tbody id="form2Body"></tbody>
            </table>

            <button class="btn" id="previewData" onclick="saveData()">Save</button>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#previewData").click(function(e) {
                e.preventDefault(); // Prevent default form submission

                let formData = $("#productionForm :input")
                    .filter(function() {
                        return $.trim(this.value).length > 0; // Exclude empty fields
                    })
                    .serialize();

                $.ajax({
                    type: "POST",
                    url: "save_data.php",
                    data: formData,
                    success: function(response) {
                        alert("Data saved successfully: " + response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });
        });
    </script>

    <script>
        function enableNext(id) {
            document.getElementById(id).disabled = false;
        }

        function loadForms() {
            document.getElementById('productionForm').style.display = 'block';
            let tableBody = document.getElementById("form2Body");
            tableBody.innerHTML = "";
            for (let i = 1; i <= 20; i++) {
                let row = `<tr>
                    <td>${i}</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="number"></td>
                    <td><input type="number" oninput="calculateRow(this)"></td>
                    <td><input type="number" oninput="calculateRow(this)"></td>
                    <td><input type="text"></td>
                    <td><input type="number" readonly></td>
                    <td><input type="number" oninput="calculateRow(this)"></td>
                    <td><input type="number" oninput="calculateRow(this)"></td>
                    <td><input type="number" oninput="calculateRow(this)"></td>
                    <td><input type="number" readonly></td>
                    <td><input type="number" readonly></td>
                    <td><input type="number" readonly></td>
                    <td><input type="number"></td>
                    <td><input type="number"></td>
                    <td><input type="number"></td>
                </tr>`;
                tableBody.innerHTML += row;
            }
        }

        function calculateRow(element) {
            let row = element.parentElement.parentElement;
            let openingBalance = parseFloat(row.cells[5].querySelector("input").value) || 0;
            let receipts = parseFloat(row.cells[6].querySelector("input").value) || 0;
            let transfers = parseFloat(row.cells[9].querySelector("input").value) || 0;
            let physicalStock = parseFloat(row.cells[10].querySelector("input").value) || 0;
            let wip = parseFloat(row.cells[11].querySelector("input").value) || 0;
            let total = openingBalance + receipts;
            row.cells[8].querySelector("input").value = total;
            let closingBalance = total - transfers - physicalStock - wip;
            row.cells[12].querySelector("input").value = closingBalance;
            let netConsumption = total - closingBalance;
            row.cells[13].querySelector("input").value = netConsumption;
            let completedBatches = parseFloat(document.getElementById("completedBatches").value) || 1;
            row.cells[14].querySelector("input").value = (netConsumption / completedBatches).toFixed(2);
        }
    </script>
</body>

</html>