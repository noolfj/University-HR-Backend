<?php
require_once "conn.php";
session_start();

// Проверяем, вошел ли пользователь в систему
if (!isset($_SESSION["Employee_Id"])) {
    header("Location: login.php");
    exit;
}

// Получаем ID текущего пользователя
$employee_id = $_SESSION["Employee_Id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $plan_id = $_POST["plan_id"];
    $comment = $_POST["comment"];

    // Обработка файла
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_name = basename($_FILES["file"]["name"]);
        $upload_dir = "../Personal/documents/"; // Папка для загрузки файлов
        // Убедитесь, что папка для загрузки существует
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Полный путь для сохранения файла
        $file_path = $upload_dir . $file_name;

        // Перемещение загруженного файла в указанную папку
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Файл успешно загружен

            // Сохранение данных в базу данных
            $sql = "INSERT INTO tasks_completed (Employee_Id, Plan_Id, File_Path, Comment) VALUES (?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("iiss", $employee_id, $plan_id, $file_path, $comment);
                if ($stmt->execute()) {
                    // Успешно отправлено, удаляем план из списка выбранных планов
                    $sql_delete_plan = "DELETE FROM employees_plans WHERE Employee_Id = ? AND Plan_Id = ?";
                    if ($stmt_delete_plan = $conn->prepare($sql_delete_plan)) {
                        $stmt_delete_plan->bind_param("ii", $employee_id, $plan_id);
                        $stmt_delete_plan->execute();
                        $stmt_delete_plan->close();
                    } else {
                        echo "Ошибка удаления плана: " . $conn->error;
                    }

                    // Перенаправляем пользователя на страницу подтверждения или обратно к списку планов
                    header("Location: zadacha-plan.php");
                    exit;
                } else {
                    echo "Ошибка выполнения запроса: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Ошибка подготовки запроса: " . $conn->error;
            }
        } else {
            echo "Ошибка загрузки файла.";
            exit;
        }
    } else {
        echo "Файл не загружен.";
        exit;
    }
}

// Закрытие соединения
$conn->close();
?>
