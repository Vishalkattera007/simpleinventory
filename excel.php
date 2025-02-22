<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symed Laboratories Limited- Unit-6</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0px 0px 0px 5px;
			padding: 0px 0px 0px 0px;
        }
        .excel-table {

            border-collapse: collapse;
            background-color: white;
        }
		.excel-table99 {

            border-collapse: collapse;
            background-color: white;
        }
        .excel-table th, .excel-table td {
            border: 1px solid #d0d0d0;
            padding: 5px;
            text-align: left;
            /* min-width: ; */
        }
		.excel-table99 th, .excel-table99 td {
            border: 1px solid #d0d0d0;
            padding: 5px;
            text-align: left;
            /* min-width: ; */
        }
        .excel-table th {
            /* background-color: ; */
            color: #000;
            position: sticky;
            top: 0;
            z-index: 2;
        }
		.excel-table99 th {
            /* background-color: ; */
            color: #000;
            position: sticky;
            top: 0;
            z-index: 2;
        }
        .excel-table tr:nth-child(even) {
            background-color: cadetblue;
        }
		/* .excel-table99 tr:nth-child(even) {
            background-color: ;
        } */


        .container {
            max-height: 400px;
            word-break: break-all;
			font-size: 11px;
}
        /* } */
        td[contenteditable="true"] {
            background-color: cadetblue;
            outline: none;
        }
    </style>
</head>
<body style="border: solid 1px;width: 1000px;height: 1011px;">

    <h2>Symed Laboratories Limited- Unit-6
		<!--<button type="reset" value="Reset"
			style="margin: 0px 350px;font-size: 13px;font-weight: bold;background: #2F75B5;color: #fff;border: 1px gray;width: 51px;height: 25px;">
			SAVE
		</button>-->

	</h2>
	<h3>Form 1</h3>
    <div class="container">
	 <table class="excel-table99" style="width: 1000px;">
            <thead>
                <tr>
					<th>Production Consumption-Coefficient Statement</th>
					<th style="background: cadetblue;color: #fff;">MONTH & YEAR (DATA HERE)</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
                </tr>
				<tr>
					<th>Mfg.Block</th>
					<th>Product / Stage</th>
					<th style="background: cadetblue;color: #fff;">PC(DATA HERE)</th>
                    <th style="background: cadetblue;color: #fff;">Stage(DATA HERE)</th>
					<th>Opening Stock</th>
					<th style="background: cadetblue;color: #fff;">OS(DATA HERE)</th>
                    <th>Closing Stock</th>
                    <th>STD Yield</th>
                    <th style="background: cadetblue;color: #fff;">STD(DATA HERE)</th>
                </tr>
				<tr>
					<th style="background: cadetblue;color: #fff;">Block(DATA HERE)</th>
					<th>Completed Batches</th>
					<th style="background: cadetblue;color: #fff;">CBatches(DATA HERE)</th>
                    <th></th>
					<th>Total Production</th>
					<th style="background: cadetblue;color: #fff;">T.Pro.(DATA HERE)</th>
                    <th style="background: cadetblue;color: #fff;">CS(DATA HERE)</th>
                    <th>Target Yield</th>
                   <th style="background: cadetblue;color: #fff;">TY(DATA HERE)</th>
                </tr>
				<tr>
					<th></th>
					<th>WIP Batches</th>
					<th style="background: cadetblue;color: #fff;">WIPB(DATA HERE)</th>
                    <th></th>
					<th>Total Dispatches/Consumption</th>
					<th style="background: cadetblue;color: #fff;">T.Dis/Con(DATA HERE)</th>
                    <th></th>
                    <th>Actual Yield</th>
                    <th style="background: cadetblue;color: #fff;">(DATA HERE)</th>
                </tr>
            </thead>

            <tbody>
                <!--<tr>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 57px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 60px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 77px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 33px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 39px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 39px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 43px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 31px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="	width: 31px;">
					</td>
                </tr>-->
            </tbody>
        </table>

	<!--FORM-1------------------------------------------------>
	<h3>Form 2</h3>
        <table class="excel-table" style="width: 1000px;">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Code</th>
                    <th style="width:108px;">Name of the Material</th>
                    <th style="width: 35px;">UOM</th>
					<th style="width: 35px;">Sp.Gr</th>
                    <th style="width: 45px;">Opening Balance</th>
					<th style="width: 46px;">Receipts</th>
                    <th style="width: 38px;">Source</th>
					<th style="width: 35px;">Total</th>
					<th style="width: 50px;">Transfers</th>
                    <th style="width: 45px;">Physical Stock</th>
                    <th style="width: 35px;">WIP</th>
                    <th style="width: 45px;">Closing Balance</th>
					<th style="width: 49px;">Net Consumption</th>
                    <th style="width: 44px;">Actual CC</th>
					<th style="width: 32px;">STD CC</th>
                    <th style="width: 35px;">Std Inputs</th>
					<th style="width: 51px;">Per Batch consumption</th>
                </tr>
            </thead>
            <tbody style="background: cadetblue;color: #fff;">
                <tr >
                    <td contenteditable="true">1</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
                <tr>
                    <td contenteditable="true">2</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
                <tr>
                    <td contenteditable="true">3</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
                <tr>
                    <td contenteditable="true">4</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">5</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">6</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">7</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">8</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">9</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">10</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">11</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">12</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">13</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">14</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">15</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">16</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">17</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">18</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">19</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
				<tr>
                    <td contenteditable="true">20</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
					<td contenteditable="true"></td>
                </tr>
            </tbody>
        </table>
		<script>
        function calculate() {
            let opening = parseFloat(document.getElementById("opening").value) || 0;
            let receipts = parseFloat(document.getElementById("receipts").value) || 0;
            let transfers = parseFloat(document.getElementById("transfers").value) || 0;

            let total = opening + receipts;
            document.getElementById("total").value = total;

            let closing = total - transfers;
            document.getElementById("closing").value = closing;

            let consumption = total - closing;
            document.getElementById("consumption").value = consumption;
        }
    </script>
		<div id="remarks">
			<p><label for="remarks">Remarks:</label></p>
			<textarea name="remarks" rows="5" cols="133" style="background: cadetblue;color: #fff;">
			REMARKS DATA HERE.
			</textarea>
		</div>
		</br></br></br>
		 <table class="excel-table99" style="width: 1000px;">
            <thead>
                <tr>
					<th>Prepared by  -    Block/Product Incharge</th>
					<th>Verified by - Production Head / Site Finance</th>
					<th>Verified by - Site head</th>

                </tr>
				<tr>
					<th style="height: 25px;"></th>
					<th style="height: 25px;"></th>
					<th style="height: 25px;"></th>

                </tr>

            </thead>

            <tbody>
                <!--<tr>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 57px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 60px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 77px;">
					</td>
                    <td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 33px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 39px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 39px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 43px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="width: 31px;">
					</td>
					<td contenteditable="true">
						<input type="number" id="number" name="number" style="	width: 31px;">
					</td>
                </tr>-->
            </tbody>
        </table>
    </div>

</body>
</html>
