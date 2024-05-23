<?php

require_once "conn.php";


$sql = "SELECT 
omusgor1_1, 
omusgor1_2, 
omusgor1_3, 
omusgor1_4, 
omusgor1_5, 
omusgor1_6, 
omusgor1_7, 
omusgor1_8, 
omusgor2_1, 
omusgor2_2, 
omusgor2_3, 
omusgor2_4, 
omusgor2_5, 
omusgor2_6,
omusgor3_1, 
omusgor3_2, 
omusgor3_3, 
omusgor3_4, 
omusgor3_5, 
omusgor3_6, 
omusgor3_7, 
omusgor3_8, 
omusgor3_9, 
omusgor3_10, 
omusgor3_11, 
omusgor4_1, 
omusgor4_2, 
omusgor4_3, 
omusgor4_4, 
omusgor4_5, 
omusgor4_6, 
omusgor4_7, 
omusgor5_1, 
omusgor5_2, 
omusgor5_3, 
omusgor5_4, 
omusgor5_5, 
omusgor5_6, 
omusgor5_7, 
omusgor5_8, 
omusgor5_9, 
omusgor5_10, 
omusgor5_11 
FROM emp_rating_vazorat 
WHERE Employee_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId);
$stmt->execute();
$stmt->store_result();

// Инициализация переменной для хранения общей суммы
$totalSum = 0;

// Получение результатов запроса
$stmt->bind_result(
    $omusgor1_1, 
    $omusgor1_2, 
    $omusgor1_3, 
    $omusgor1_4, 
    $omusgor1_5, 
    $omusgor1_6, 
    $omusgor1_7, 
    $omusgor1_8, 
    $omusgor2_1, 
    $omusgor2_2, 
    $omusgor2_3, 
    $omusgor2_4, 
    $omusgor2_5, 
    $omusgor2_6,
    $omusgor3_1, 
    $omusgor3_2, 
    $omusgor3_3, 
    $omusgor3_4, 
    $omusgor3_5, 
    $omusgor3_6, 
    $omusgor3_7, 
    $omusgor3_8, 
    $omusgor3_9, 
    $omusgor3_10, 
    $omusgor3_11, 
    $omusgor4_1, 
    $omusgor4_2, 
    $omusgor4_3, 
    $omusgor4_4, 
    $omusgor4_5, 
    $omusgor4_6, 
    $omusgor4_7, 
    $omusgor5_1, 
    $omusgor5_2, 
    $omusgor5_3, 
    $omusgor5_4, 
    $omusgor5_5, 
    $omusgor5_6, 
    $omusgor5_7, 
    $omusgor5_8, 
    $omusgor5_9, 
    $omusgor5_10, 
    $omusgor5_11
);

// Суммирование всех значений
while ($stmt->fetch()) {
    $totalSum += array_sum(array(
        $omusgor1_1, $omusgor1_2, $omusgor1_3, $omusgor1_4, 
        $omusgor1_5, $omusgor1_6, $omusgor1_7, $omusgor1_8, 
        $omusgor2_1, $omusgor2_2, $omusgor2_3, $omusgor2_4, 
        $omusgor2_5, $omusgor2_6, $omusgor3_1, $omusgor3_2, 
        $omusgor3_3, $omusgor3_4, $omusgor3_5, $omusgor3_6, 
        $omusgor3_7, $omusgor3_8, $omusgor3_9, $omusgor3_10, 
        $omusgor3_11, $omusgor4_1, $omusgor4_2, $omusgor4_3, 
        $omusgor4_4, $omusgor4_5, $omusgor4_6, $omusgor4_7, 
        $omusgor5_1, $omusgor5_2, $omusgor5_3, $omusgor5_4, 
        $omusgor5_5, $omusgor5_6, $omusgor5_7, $omusgor5_8, 
        $omusgor5_9, $omusgor5_10, $omusgor5_11
    ));
}

// Разделение общей суммы на 100
$totalSum /= 100;

// Вывод результата
echo "Общая сумма: " . $totalSum;

?>
