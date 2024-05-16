<?php
// Подключение к базе данных
require_once "../conn.php";


// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $vacancyTitle = $_POST["vacancyTitle"];
    $description = $_POST["description"];
    $requirements = $_POST["requirements"];
    $salary = $_POST["salary"];
    $location = $_POST["location"];

    // Подготовка SQL-запроса для вставки данных
    $sql = "INSERT INTO vacancies (Vacancy_Title, Description, Requirements, Salary, Location)
            VALUES ('$vacancyTitle', '$description', '$requirements', '$salary', '$location')";

    // Выполнение SQL-запроса
    if ($conn->query($sql) === TRUE) {
        header("Location: add-vacansies.php");
        exit();
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

// Закрытие подключения
$conn->close();
?>