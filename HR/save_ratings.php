<?php
require_once "conn.php";

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $item) {
    $employeeId = $item['employeeId'];
    $rating = $item['rating'];

    // Обновляем рейтинг сотрудника в базе данных
    $sql = "UPDATE emp_rating SET omuzgor = '$rating' WHERE Employee_Id = $employeeId";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Ошибка при обновлении данных: " . mysqli_error($conn));
    }
}

echo "success";
?>
