<?php
// Функция для проверки типа файла (PDF)
function isPDF($file) {
    $allowed = ['pdf'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    return in_array(strtolower($ext), $allowed);
}

require_once "header.php";
require_once "../conn.php";
session_start();

// Проверяем, вошел ли пользователь в систему
if (!isset($_SESSION["Employee_Id"])) {
    header("Location: login.php");
    exit;
}

// Получаем ID текущего пользователя
$employee_id = $_SESSION["Employee_Id"];

// Запрос на получение планов, которые еще не выбраны текущим пользователем
$sql_all_plans = "SELECT * FROM plans WHERE Plan_Id NOT IN 
        (SELECT Plan_Id FROM employees_plans WHERE Employee_Id = ?)";

// Запрос на получение выбранных планов для текущего пользователя
$sql_selected_plans = "SELECT p.* FROM plans p
        INNER JOIN employees_plans ep ON p.Plan_Id = ep.Plan_Id
        WHERE ep.Employee_Id = ?";

// Подготовка запроса для всех планов
if ($stmt_all_plans = $conn->prepare($sql_all_plans)) {
    // Привязка параметров
    $stmt_all_plans->bind_param("i", $employee_id);
    // Выполнение запроса
    $stmt_all_plans->execute();
    // Получение результата
    $result_all_plans = $stmt_all_plans->get_result();
}

// Подготовка запроса для выбранных планов
if ($stmt_selected_plans = $conn->prepare($sql_selected_plans)) {
    // Привязка параметров
    $stmt_selected_plans->bind_param("i", $employee_id);
    // Выполнение запроса
    $stmt_selected_plans->execute();
    // Получение результата
    $result_selected_plans = $stmt_selected_plans->get_result();
    ?>

    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">ПЛАН</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">План</a></li>
                                <li class="breadcrumb-item active">Отправить выполненные планы</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Вывод выбранных планов для текущего пользователя -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Выбранные планы</h3>
                            <?php 
                            if(mysqli_num_rows($result_selected_plans) > 0) {
                                $counter = 1; // Инициализируем счетчик
                                echo '<table class="table mb-0 table-bordered">';
                                echo '<thead class="table-light">';
                                echo '<tr>';
                                echo '<th>№</th>';
                                echo '<th class="text-center">Норма</th>';
                                echo '<th>Кредит</th>';
                                echo '<th>Примечание</th>';
                                echo '<th>Файл</th>';
                                echo '<th>Комментарий</th>';
                                echo '<th>Действие</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                while ($row = mysqli_fetch_assoc($result_selected_plans)) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $counter . '</th>';
                                    echo '<td>' . $row['Plan_Name'] . '</td>';
                                    echo '<td>' . $row['Plan_Credit'] . '</td>';
                                    echo '<td>' . $row['Comment'] . '</td>';
                                    echo '<td>';
                                    echo '<form method="post" action="submit-task.php" enctype="multipart/form-data">';
                                    echo '<input type="file" name="file" class="form-control-file" accept="application/pdf">';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<textarea name="comment" class="form-control"></textarea>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<input type="hidden" name="plan_id" value="' . $row['Plan_Id'] . '">';
                                    echo '<button type="submit" class="btn btn-success">Отправить</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $counter++;
                                }
                                echo '</tbody>';
                                echo '</table>';
                            } else {
                                echo '<p>Нет выбранных планов.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Конец вывода выбранных планов -->

    </div>

    <?php 
    // Закрытие запросов
    $stmt_all_plans->close();
    $stmt_selected_plans->close();
} else {
    echo "Ошибка подготовки запроса: " . $conn->error;
}

// Закрытие соединения
$conn->close();

require_once "footer.php";
?>
