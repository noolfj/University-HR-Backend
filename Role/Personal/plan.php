<?php 
require_once "header.php";
require_once "conn.php";
session_start();

// Проверяем, вошел ли пользователь в систему
if (!isset($_SESSION["Employee_Id"])) {
    header("Location: login.php");
    exit;
}

// Получаем ID текущего пользователя
$employee_id = $_SESSION["Employee_Id"];

// Запрос на получение выбранных планов для текущего пользователя
$sql = "SELECT p.* FROM plans p
        INNER JOIN employees_plans ep ON p.Plan_Id = ep.Plan_Id
        WHERE ep.Employee_Id = ?";

// Подготовка запроса
if ($stmt = $conn->prepare($sql)) {
    // Привязка параметров
    $stmt->bind_param("i", $employee_id);
    
    // Выполнение запроса
    $stmt->execute();
    
    // Получение результата
    $result = $stmt->get_result();
    
    ?>

    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Ваши планы</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Выбранные планы</h3>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>№</th>
                                            <th class="text-center">Норма</th>
                                            <th>Кредит</th>
                                            <th>Примечание</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // Инициализируем счетчик
                                        $counter = 1;
                                        // Цикл для вывода каждого выбранного плана
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $counter . "</th>";
                                            echo "<td>" . $row['Plan_Name'] . "</td>";
                                            echo "<td>" . $row['Plan_Credit'] . "</td>";
                                            echo "<td>" . $row['Comment'] . "</td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php 

    // Закрытие запроса
    $stmt->close();
} else {
    echo "Ошибка подготовки запроса: " . $conn->error;
}

// Закрытие соединения
$conn->close();

require_once "footer.php";
?>
