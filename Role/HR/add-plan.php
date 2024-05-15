<?php 
require_once "header.php";
require_once "conn.php";
?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">ПЛАН</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Форма для добавления новых планов -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Добавить план</h3>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered border-2">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">№</th>
                                        <th style="width: 31%;">Норма</th>
                                        <th style="width: 31%;">Кредит</th>
                                        <th style="width: 31%;">Примечание</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr>
                                        <td>1</td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="float: right;">
                            <button id="modifyRow" class="btn btn-primary mt-3 mr-2">+</button>
                            <button id="save" class="btn btn-success mt-3">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Конец формы добавления новых планов -->

        <script>
            document.getElementById("modifyRow").addEventListener("click", function() {
                var tableBody = document.getElementById("tableBody");
                var newRow = tableBody.insertRow();
                var rowCount = tableBody.rows.length;
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                cell1.textContent = rowCount;
                cell2.contentEditable = "true";
                cell3.contentEditable = "true";
                cell4.contentEditable = "true";
            });

            document.getElementById("save").addEventListener("click", async function() {
                var tableRows = document.querySelectorAll("#tableBody tr");
                var plans = [];

                tableRows.forEach(function(row) {
                    var plan = {};
                    var cells = row.querySelectorAll("td");
                    plan.name = cells[1].innerText.trim();
                    plan.credit = cells[2].innerText.trim();
                    plan.comment = cells[3].innerText.trim();
                    plans.push(plan);
                });

                try {
                    const response = await fetch("save_plans.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(plans)
                    });
                    const result = await response.text();
                    if (result.trim() === "success") {
                        alert("Данные успешно сохранены!");
                        location.reload(); // Обновление страницы
                    } else {
                        alert("Ошибка при сохранении данных: " + result);
                    }
                } catch (error) {
                    console.error("Ошибка:", error);
                    alert("Ошибка при сохранении данных!");
                }
            });
        </script>

    </div>
</div>

<?php require_once "footer.php"; ?>
