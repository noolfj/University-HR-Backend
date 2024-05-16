<?php
// Подключение к базе данных
require_once "../conn.php";

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы и защита от SQL-инъекций
    $departmentName = mysqli_real_escape_string($conn, $_POST['departmentInput']);

    // Добавление департамента
    $sqlInsertDepartment = "INSERT INTO departments (Department_Name) VALUES ('$departmentName')";
    $resultInsertDepartment = mysqli_query($conn, $sqlInsertDepartment);

    if ($resultInsertDepartment) {
        echo "Кафедра успешно добавлен.";
        header("Location: departament.php");
        exit();
    } else {
        echo "Ошибка при добавлении департамента: " . mysqli_error($conn);
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
}
?>