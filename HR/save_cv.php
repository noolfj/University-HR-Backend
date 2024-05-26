<?php
require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $full_name = $_POST['full_name'];
    $department_id = $_POST['department'];

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE employees SET Full_Name = ?, Department_Id = ? WHERE Employee_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $full_name, $department_id, $employee_id);

    if ($stmt->execute()) {
        echo "Данные успешно сохранены.";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
