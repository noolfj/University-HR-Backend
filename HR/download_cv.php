<?php
require_once "conn.php"; // Подключаем файл с настройками подключения к базе данных
require_once('../fpdf/fpdf.php');

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    try {
        // Устанавливаем кодировку UTF-8 для корректного отображения кириллических символов
        $conn->set_charset("utf8");

        $sql = "SELECT e.Employee_Id, e.Full_Name, e.Department_Id, dep.Department_Name
                FROM employees e
                LEFT JOIN departments dep ON e.Department_Id = dep.Department_Id
                WHERE e.Employee_Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $employee = $result->fetch_assoc();

        if ($employee) {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);

            $pdf->Cell(40, 10, 'Employee CV');
            $pdf->Ln(10);

            $pdf->SetFont('Arial', '', 12);

            $pdf->Cell(40, 10, 'ID: ' . $employee['Employee_Id']);
            $pdf->Ln(10);

            $pdf->Cell(40, 10, 'Full Name: ' . $employee['Full_Name']);
            $pdf->Ln(10);

            $pdf->Cell(40, 10, 'Department: ' . $employee['Department_Name']);
            $pdf->Ln(10);

            $pdf->Output('D', 'CV_' . $employee_id . '.pdf');
            $stmt->close();
        } else {
            echo "Employee not found.";
        }

        $conn->close();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Employee ID not specified.";
}
?>
