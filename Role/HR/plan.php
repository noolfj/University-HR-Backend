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



        <!-- Вывод существующих планов -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Существующие планы</h3>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered border-2">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">№</th>
                                        <th style="width: 31%;">Норма</th>
                                        <th style="width: 31%;">Кредит</th>
                                        <th style="width: 31%;">Примечание</th>
                                        <th style="width: 2%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_existing_plans = "SELECT * FROM plans";
                                    $result_existing_plans = $conn->query($sql_existing_plans);

                                    if ($result_existing_plans->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result_existing_plans->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";
                                            echo "<td>" . $row['Plan_Name'] . "</td>";
                                            echo "<td>" . $row['Plan_Credit'] . "</td>";
                                            echo "<td>" . $row['Comment'] . "</td>";
                                            echo "<td><button class='btn btn-danger btn-sm delete-row' data-id='" . $row['Plan_Id'] . "'>Удалить</button></td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>Нет существующих планов.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Конец вывода существующих планов -->

<script>
   // Функция для удаления строки при нажатии на кнопку "Удалить"
   function deleteRow(event) {
            var row = event.target.closest("tr");
            var planId = event.target.dataset.id;

            // Отправляем AJAX-запрос на сервер для удаления плана
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Если удаление успешно, удаляем строку из таблицы
                    if (xhr.responseText === "success") {
                        row.remove();
                    } else {
                        header("Location: plan.php");
exit(); 
                        // alert("Ошибка при удалении плана!");
                    }
                }
            };
            xhr.open("POST", "delete_plan.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("planId=" + planId);
        }

        // Добавляем обработчик события для кнопок "Удалить"
        document.querySelectorAll(".delete-row").forEach(function(button) {
            button.addEventListener("click", deleteRow);
        });

    </script>

<?php 
require_once "footer.php";
?>
