$(document).ready(function () {
  $("#loadButton").click(function () {
    // var date = $("#date").val();
    // var productCode = $("#productCode").val();
    // var stage = $("#stage").val();
    // var block = $("#block").val();

    if (date && productCode && stage && block) {
      $(".formsContainer").fadeIn();
    } else {
      Swal.fire({
        icon: "error",
        title: "Data Not Filtered....",
        text: "Please select all required fields before proceeding.",
      });
    }

    let tableBodyOfForm2 = document.getElementById("form2Body");
    tableBodyOfForm2.innerHTML = "";

    for (let i = 1; i <= 20; i++) {
      let row = `<tr>
                    <td>${i}</td>
                    <td><input class="form-control" name="Code" type="text"></td>
                    <td><input class="form-control" name="Material" type="text"></td>
                    <td><input class="form-control" name="UOM" type="text"></td>
                    <td><input class="form-control" name="Spgr" type="number"></td>
                    <td><input class="form-control" name="OpBalance" type="number" oninput="calculateRow(this)"></td>
                    <td><input class="form-control" name="Receipts" type="number" oninput="calculateRow(this)"></td>
                    <td><input class="form-control" name="Source" type="text"></td>
                    <td><input class="form-control" name="Total" type="number" readonly></td>
                    <td><input class="form-control" name="Transfers" type="number" oninput="calculateRow(this)"></td>
                    <td><input class="form-control" name="Physical_stock" type="number" oninput="calculateRow(this)"></td>
                    <td><input class="form-control" name="WIP" type="number" oninput="calculateRow(this)"></td>
                    <td><input class="form-control" name="Closing_Balnace" type="number" readonly></td>
                    <td><input class="form-control" name="Net_Consumption" type="number" readonly></td>
                    <td><input class="form-control" name="Actual_cc" type="number" readonly></td>
                    <td><input class="form-control" name="STD_cc" type="number"></td>
                    <td><input class="form-control" name="Std_inputs" type="number"></td>
                    <td><input class="form-control" name="Per_batch" type="number"></td>
                </tr>`;
      tableBodyOfForm2.innerHTML += row;
    }
  });
  $("#saveData").click(function () {
    let form1Data = {
      date: $("#date").val(),
      productCode: $("#productCode").val(),
      stage: $("#stage").val(),
      block: $("#block").val(),
      completedBatches: $("#completedBatches").val(),
      wipBatches: $("#wipBatches").val(),
      openingStock: $("#openingStock").val(),
      closingStock: $("#closingStock").val(),
      totalProduction: $("#totalProduction").val(),
      totalDispatches: $("#totalDispatches").val(),
      stdYield: $("#stdYield").val(),
      targetYield: $("#targetYield").val(),
      actualYield: $("#actualYield").val(),
    };

    let form2Data = [];
    $("#form2Body tr").each(function () {
      let inputs = $(this).find("input");
      let isEmpty = true;
      let row = {
        serialNo: $(this).find("td:eq(0)").text(),
        code: $(this).find("td:eq(1) input").val(),
        material: $(this).find("td:eq(2) input").val(),
        uom: $(this).find("td:eq(3) input").val(),
        spGr: $(this).find("td:eq(4) input").val(),
        openingBalance: $(this).find("td:eq(5) input").val(),
        receipts: $(this).find("td:eq(6) input").val(),
        source: $(this).find("td:eq(7) input").val(),
        total: $(this).find("td:eq(8) input").val(),
        transfers: $(this).find("td:eq(9) input").val(),
        physicalStock: $(this).find("td:eq(10) input").val(),
        wip: $(this).find("td:eq(11) input").val(),
        closingBalance: $(this).find("td:eq(12) input").val(),
        netConsumption: $(this).find("td:eq(13) input").val(),
        actualCC: $(this).find("td:eq(14) input").val(),
        stdCC: $(this).find("td:eq(15) input").val(),
        stdInputs: $(this).find("td:eq(16) input").val(),
        perBatchConsumption: $(this).find("td:eq(17) input").val(),
      };
      inputs.each(function () {
        if ($(this).val().trim() !== "") {
          isEmpty = false;
        }
      });

      if (!isEmpty) {
        form2Data.push(row);
      }
    });

    console.log(form2Data);

    $.ajax({
      url: "intoData.php",
      type: "POST",
      data: {
        form1: JSON.stringify(form1Data),
        form2: JSON.stringify(form2Data),
      },
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Data Saved Successfully!",
          text: response,
        });
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Error!",
          text: "Something went wrong while saving data.",
        });
      },
    });
  });
});

function calculateRow(element) {
  let row = element.parentElement.parentElement;
  let openingBalance =
    parseFloat(row.cells[5].querySelector("input").value) || 0;
  let receipts = parseFloat(row.cells[6].querySelector("input").value) || 0;
  let transfers = parseFloat(row.cells[9].querySelector("input").value) || 0;
  let physicalStock =
    parseFloat(row.cells[10].querySelector("input").value) || 0;
  let wip = parseFloat(row.cells[11].querySelector("input").value) || 0;
  let total = openingBalance + receipts;
  row.cells[8].querySelector("input").value = total;
  let closingBalance = total - transfers - physicalStock - wip;
  row.cells[12].querySelector("input").value = closingBalance;
  let netConsumption = total - closingBalance;
  row.cells[13].querySelector("input").value = netConsumption;
  let completedBatches =
    parseFloat(document.getElementById("completedBatches").value) || 1;
  row.cells[14].querySelector("input").value = (
    netConsumption / completedBatches
  ).toFixed(2);
}
