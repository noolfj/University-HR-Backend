<?php 
require_once "header.php";
require_once "../conn.php";
session_start();

// Получаем ID текущего пользователя
$employee_id = $_SESSION["Employee_Id"];

// Запрос на получение планов, которые еще не выбраны текущим пользователем
$sql = "SELECT * FROM plans WHERE Plan_Id NOT IN 
        (SELECT Plan_Id FROM employees_plans WHERE Employee_Id = ?)";

// Подготовка запроса
if ($stmt = $conn->prepare($sql)) {
    // Привязываем параметры
    $stmt->bind_param("i", $employee_id);

    // Выполняем запрос
    $stmt->execute();

    // Получаем результат
    $result = $stmt->get_result();

    ?>

    <link href="../assets/css/styles.css" rel="stylesheet" />

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
                                <li class="breadcrumb-item active">Выбрать план</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="process-plan.php"> <!-- Измените путь к вашему файлу -->
                                <h3>Список планов</h3>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>№</th>
                                                <th class="text-center">Норма</th>
                                                <th>Кредит</th>
                                                <th>Примечание</th>
                                                <th>Выбрать</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // Инициализация счетчика
                                            $counter = 1;
                                            // Цикл для вывода каждого плана из базы данных
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                // Используем счетчик для отображения номера
                                                echo "<th scope='row'>" . $counter . "</th>";
                                                echo "<td>" . $row['Plan_Name'] . "</td>";
                                                echo "<td>" . $row['Plan_Credit'] . "</td>";
                                                echo "<td>" . $row['Comment'] . "</td>";
                                                echo "<td class='text-center'>";
                                                echo "<label class='checkbox-wrapper'>";
                                                echo "<input type='checkbox' name='Plan_Id[]' value='" . $row['Plan_Id'] . "'>";
                                                echo "<span class='checkmark'></span>";
                                                echo "</label>";
                                                echo "</td>";
                                                echo "</tr>";
                                                // Инкрементируем счетчик
                                                $counter++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="button-items mt-3 text-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Отправить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <?php 
    // Закрываем запрос
    $stmt->close();
} else {
    echo "Ошибка подготовки запроса: " . $conn->error;
}

require_once "footer.php";
?>
