<?php 
require_once "header.php";
?>


<style> 
.float-right {
    float: right;
}

.table-bordered {
    border: 4px double #dee2e6; /* Цвет и толщина границы */
}

</style>


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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Создать план</h3>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered border-2">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">№</th>
                                        <th style="width: 31%;">Норма</th>
                                        <th style="width: 31%;">Кредит</th>
                                        <th style="width: 31%;">Примечание</th>
                                        <th style="width: 2%;"></th> <!-- Добавлен столбец для кнопки удаления -->
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr>
                                        <td>1</td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td><button class="btn btn-danger btn-sm delete-row">Удалить</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <!-- Обертка для кнопок "Добавить" и "Сохранить" -->
                            <button id="addRow" class="btn btn-primary mt-3 mr-2">+</button>
                            <button id="save" class="btn btn-success mt-3">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
        // Функция для удаления строки при нажатии на кнопку "Удалить"
        function deleteRow(event) {
            var row = event.target.closest("tr");
            row.remove();
        }

        // Добавляем обработчик события для кнопок "Удалить"
        document.querySelectorAll(".delete-row").forEach(function(button) {
            button.addEventListener("click", deleteRow);
        });

        // Обработчик события для кнопки "Добавить строку"
        document.getElementById("addRow").addEventListener("click", function() {
            var tableBody = document.getElementById("tableBody");
            var newRow = tableBody.insertRow();
            var rowCount = tableBody.rows.length;
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4); // Добавлен новый столбец для кнопки удаления
            cell1.textContent = rowCount; // Номер строки
            cell2.contentEditable = "true";
            cell3.contentEditable = "true";
            cell4.contentEditable = "true";
            cell5.innerHTML = '<button class="btn btn-danger btn-sm delete-row">Удалить</button>';
            cell5.querySelector(".delete-row").addEventListener("click",
            deleteRow); // Добавляем обработчик события для новой кнопки "Удалить"
        });

        document.getElementById("save").addEventListener("click", function() {
            // Здесь можно добавить логику сохранения данных
            alert("Данные сохранены!");
        });
        </script>




        <?php 
require_once "footer.php";
?>