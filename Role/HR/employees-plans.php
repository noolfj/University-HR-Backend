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
                    <h4 class="page-title mb-0 font-size-18">Планы сотрудников</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Таблица выполненных заданий -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Выполненные задания</h3>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered border-2">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">№</th>
                                        <th style="width: 20%;">Сотрудник</th>
                                        <th style="width: 20%;">Название задания</th>
                                        <th style="width: 20%;">Файл</th>
                                        <th style="width: 20%;">Комментарий</th>
                                        <th style="width: 15%;">Дата выполнения</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_completed_tasks = "SELECT tasks_completed.*, employees.Full_Name, plans.Plan_Name 
                                                            FROM tasks_completed 
                                                            LEFT JOIN employees ON tasks_completed.Employee_Id = employees.Employee_Id 
                                                            LEFT JOIN plans ON tasks_completed.Plan_Id = plans.Plan_Id";
                                    $result_completed_tasks = $conn->query($sql_completed_tasks);

                                    if ($result_completed_tasks->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result_completed_tasks->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";
                                            // Выводим текстовые описания сотрудника и задания вместо их ID
                                            echo "<td>" . $row['Full_Name'] . "</td>";
                                            echo "<td>" . $row['Plan_Name'] . "</td>";
                                            // Добавляем ссылку на файл
                                            echo "<td><a href='" . $row['File_Path'] . "'>Посмотреть файл</a></td>";
                                            echo "<td>" . $row['COMMENT'] . "</td>";
                                            echo "<td>" . $row['Completion_Date'] . "</td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>Нет выполненных заданий.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Конец таблицы выполненных заданий -->
    </div>
</div>

<?php require_once "footer.php"; ?>