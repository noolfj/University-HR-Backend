<?php
// delete-departament.php

// Подключение к базе данных
require_once "../conn.php";

// Проверяем, был ли передан идентификатор факультета или кафедры для удаления
if (isset($_GET["faculty_id"])) {
    // Получаем идентификатор факультета из GET-запроса
    $facultyId = $_GET["faculty_id"];

    // Формируем SQL-запрос для удаления факультета из базы данных
    $sql = "DELETE FROM faculties WHERE Faculty_Id = $facultyId";
    
} elseif (isset($_GET["department_id"])) {
    // Получаем идентификатор кафедры из GET-запроса
    $departmentId = $_GET["department_id"];

    // Формируем SQL-запрос для удаления кафедры из базы данных
    $sql = "DELETE FROM departments WHERE Department_Id = $departmentId";
} else {
    // Если не передан ни идентификатор факультета, ни идентификатор кафедры, выводим сообщение об ошибке
    echo "Идентификатор факультета или кафедры не был передан.";
    exit(); // Завершаем выполнение скрипта
}

// Выполняем SQL-запрос
$result = mysqli_query($conn, $sql);

if ($result) {
    // Если удаление прошло успешно, перенаправляем пользователя обратно на страницу со списком факультетов и кафедр
    header("Location: departament.php"); // Замените "departament.php" на ваш URL-адрес страницы со списком факультетов и кафедр
    exit();
} else {
    // Если произошла ошибка, выводим сообщение об ошибке
    echo "Ошибка при удалении.";
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>