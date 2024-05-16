<?php
// Подключение к базе данных
require_once "../conn.php";

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы и защита от SQL-инъекций
    $facultyName = mysqli_real_escape_string($conn, $_POST['facultyInput']);

    // Добавление факультета
    $sqlInsertFaculty = "INSERT INTO faculties (Faculty_Name) VALUES ('$facultyName')";
    $resultInsertFaculty = mysqli_query($conn, $sqlInsertFaculty);

    if ($resultInsertFaculty) {
        echo "Факультет успешно добавлен.";
        header("Location: departament.php");
        exit();
    } else {
        echo "Ошибка при добавлении факультета: " . mysqli_error($conn);
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
}
?>