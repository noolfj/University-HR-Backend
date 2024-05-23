<?php
require_once "../conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверка соединения
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Получение данных из формы
    $employeeId = $_POST['Employee_Id'] ?? null;

    // Проверка наличия данных
    if ($employeeId !== null) {
        // Проверка существования записи для данного сотрудника
        $checkStmt = $conn->prepare("SELECT COUNT(*) AS count FROM emp_rating_vazorat WHERE Employee_Id = ?");
        $checkStmt->bind_param("i", $employeeId);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $checkStmt->close();

        if ($count > 0) {
            // Обновление существующей записи
            $updateStmt = $conn->prepare("
            UPDATE emp_rating_vazorat 
            SET 
                omusgor1_1 = ?, omusgor1_2 = ?, omusgor1_3 = ?, omusgor1_4 = ?, omusgor1_5 = ?, omusgor1_6 = ?, omusgor1_7 = ?, omusgor1_8 = ?,
                omusgor2_1 = ?, omusgor2_2 = ?, omusgor2_3 = ?, omusgor2_4 = ?, omusgor2_5 = ?, omusgor2_6 = ?,
                omusgor3_1 = ?, omusgor3_2 = ?, omusgor3_3 = ?, omusgor3_4 = ?, omusgor3_5 = ?, omusgor3_6 = ?, omusgor3_7 = ?, omusgor3_8 = ?, omusgor3_9 = ?, omusgor3_10 = ?, omusgor3_11 = ?,
                omusgor4_1 = ?, omusgor4_2 = ?, omusgor4_3 = ?, omusgor4_4 = ?, omusgor4_5 = ?, omusgor4_6 = ?, omusgor4_7 = ?,
                omusgor5_1 = ?, omusgor5_2 = ?, omusgor5_3 = ?, omusgor5_4 = ?, omusgor5_5 = ?, omusgor5_6 = ?, omusgor5_7 = ?, omusgor5_8 = ?, omusgor5_9 = ?, omusgor5_10 = ?, omusgor5_11 = ?
            WHERE Employee_Id = ?
        ");
         $updateStmt->bind_param("dddddddddddddddddddddddddddddddddddddddddddi" /* продолжите для остальных типов данных */, 
                $_POST['omusgor1_1'],
                $_POST['omusgor1_2'],
                $_POST['omusgor1_3'],
                $_POST['omusgor1_4'],
                $_POST['omusgor1_5'],
                $_POST['omusgor1_6'],
                $_POST['omusgor1_7'],
                $_POST['omusgor1_8'],
                $_POST['omusgor2_1'],
                $_POST['omusgor2_2'],
                $_POST['omusgor2_3'],
                $_POST['omusgor2_4'],
                $_POST['omusgor2_5'],
                $_POST['omusgor2_6'],
                $_POST['omusgor3_1'],
                $_POST['omusgor3_2'],
                $_POST['omusgor3_3'],
                $_POST['omusgor3_4'],
                $_POST['omusgor3_5'],
                $_POST['omusgor3_6'],
                $_POST['omusgor3_7'],
                $_POST['omusgor3_8'],
                $_POST['omusgor3_9'],
                $_POST['omusgor3_10'],
                $_POST['omusgor3_11'],
                $_POST['omusgor4_1'],
                $_POST['omusgor4_2'],
                $_POST['omusgor4_3'],
                $_POST['omusgor4_4'],
                $_POST['omusgor4_5'],
                $_POST['omusgor4_6'],
                $_POST['omusgor4_7'],
                $_POST['omusgor5_1'],
                $_POST['omusgor5_2'],
                $_POST['omusgor5_3'],
                $_POST['omusgor5_4'],
                $_POST['omusgor5_5'],
                $_POST['omusgor5_6'],
                $_POST['omusgor5_7'],
                $_POST['omusgor5_8'],
                $_POST['omusgor5_9'],
                $_POST['omusgor5_10'],
                $_POST['omusgor5_11'],
                $employeeId
            );


            
            if ($updateStmt->execute()) {
                echo "Данные успешно обновлены";
                // header("Location: index.php");
                // exit();
            } else {
                echo "Ошибка: " . $updateStmt->error;
            }

            $updateStmt->close();
        } else {
            echo "Ошибка: Запись для данного сотрудника не существует.";
        }
    } else {
        echo "Ошибка: данные формы не получены.";
    }

    // Закрытие соединения
    $conn->close();
} else {
    echo "Неправильный метод запроса.";
}
?>
