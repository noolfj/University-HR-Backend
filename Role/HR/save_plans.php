<?php
// Подключение к базе данных
require_once "conn.php";

// Получение данных из POST-запроса
$data = json_decode(file_get_contents("php://input"), true);

// Подготовка запроса для вставки данных
$sql = "INSERT INTO plans (Plan_Name, Plan_Credit, Comment) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Проход по каждому плану и выполнение запроса
foreach ($data as $plan) {
    $name = $plan['name'];
    $credit = $plan['credit'];
    $comment = $plan['comment'];

    $stmt->bind_param("sss", $name, $credit, $comment);
    $stmt->execute();
}

// Проверка успешного выполнения запроса
if ($stmt->affected_rows > 0) {
    echo "success";
} else {
    echo "error";
}

// Закрытие подготовленного запроса и соединения
$stmt->close();
$conn->close();
?>
