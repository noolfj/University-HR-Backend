<?php
require_once "conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, есть ли выбранные планы в отправленной форме
    if (isset($_POST["Plan_Id"])) {
        // Получаем ID текущего пользователя
        $employee_id = $_SESSION["Employee_Id"];

        // Получаем массив выбранных планов из формы
        $selected_plans = $_POST["Plan_Id"];

        // Перебираем выбранные планы и добавляем их в базу данных
        foreach ($selected_plans as $plan_id) {
            // Подготавливаем запрос на добавление плана для текущего пользователя в базу данных
            $sql = "INSERT INTO employees_plans (Employee_Id, Plan_Id) VALUES (?, ?)";

            // Подготавливаем запрос
            if ($stmt = $conn->prepare($sql)) {
                // Привязываем параметры
                $stmt->bind_param("ii", $employee_id, $plan_id);

                // Выполняем запрос
                $stmt->execute();
                
                // Закрываем запрос
                $stmt->close();
            } else {
                // Обработка ошибки подготовки запроса
                echo "Ошибка подготовки запроса: " . $conn->error;
            }
        }

        // Перенаправляем пользователя на страницу, чтобы избежать повторной отправки формы
        header("Location: select-plan.php");
        exit;
    } else {
        // Если пользователь не выбрал ни одного плана, то можете добавить соответствующее сообщение или обработку здесь
    }
}
?>
