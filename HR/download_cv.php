<?php
require_once "conn.php";
require_once('../tcpdf/tcpdf.php');

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    try {
        // Устанавливаем кодировку UTF-8 для корректного отображения кириллических символов
        $conn->set_charset("utf8");

        $sql = "SELECT e.Employee_Id, e.Full_Name, e.Department_Id, e.Path_Photo AS photo_path, dep.Department_Name,
        e.Date_of_Birth, e.Place_of_Birth, e.Position_Id, e.Degree_Id, e.Faculty_Id, 
        e.Email, e.Phone_Number, e.Employee_Number, e.Date_Added
        FROM employees e
        LEFT JOIN departments dep ON e.Department_Id = dep.Department_Id
        WHERE e.Employee_Id = ?";


        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $employee = $result->fetch_assoc();

        if ($employee) {
            // Проверяем, был ли уже отправлен какой-либо вывод
            if (ob_get_contents()) {
                ob_end_clean(); // Если да, очищаем буфер вывода
            }

            // Создаем новый PDF документ
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // Добавляем новую страницу
            $pdf->AddPage();

            // Устанавливаем шрифт и размер шрифта
            $pdf->SetFont('dejavusans', '', 12);

            // Выводим информацию о сотруднике в PDF
            $pdf->Cell(0, 15, 'РЕЗЮМЕ', 0, 1, 'C');
            $pdf->Ln(15);

            $base_path = '../Personal/upload/';

            // Полный путь к фотографии
            $photo_path = $base_path . $employee['photo_path'];

            // Добавляем фотографию сотрудника
            if (!empty($photo_path) && file_exists($photo_path)) {
                $extension = strtolower(pathinfo($photo_path, PATHINFO_EXTENSION));
                if ($extension === 'jpg' || $extension === 'jpeg') {
                    $pdf->Image($photo_path, 10, 20, 40, 0, 'JPEG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                } elseif ($extension === 'png') {
                    $pdf->Image($photo_path, 10, 20, 40, 0, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                } else {
                    // Если расширение не поддерживается, выводим фото по умолчанию
                    $pdf->Image('../Personal/upload/1.jpg', 10, 20, 40, 0, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
                }

                // Позиция X для дополнительной информации
                $infoX = 60;

                // Получаем название должности по её идентификатору
                $position_name = "";
                if ($employee['Position_Id'] != null) {
                    $position_id = $employee['Position_Id'];
                    $position_query = "SELECT Position_Name FROM positions WHERE Position_Id = ?";
                    $position_stmt = $conn->prepare($position_query);
                    $position_stmt->bind_param("i", $position_id);
                    $position_stmt->execute();
                    $position_result = $position_stmt->get_result();
                    $position_row = $position_result->fetch_assoc();
                    $position_name = $position_row['Position_Name'];
                }

                // Получаем название степени по её идентификатору
                $degree_name = "";
                if ($employee['Degree_Id'] != null) {
                    $degree_id = $employee['Degree_Id'];
                    $degree_query = "SELECT Degree_Name FROM degrees WHERE Degree_Id = ?";
                    $degree_stmt = $conn->prepare($degree_query);
                    $degree_stmt->bind_param("i", $degree_id);
                    $degree_stmt->execute();
                    $degree_result = $degree_stmt->get_result();
                    $degree_row = $degree_result->fetch_assoc();
                    $degree_name = $degree_row['Degree_Name'];
                }

                // Получаем название факультета по его идентификатору
                $faculty_name = "";
                if ($employee['Faculty_Id'] != null) {
                    $faculty_id = $employee['Faculty_Id'];
                    $faculty_query = "SELECT Faculty_Name FROM faculties WHERE Faculty_Id = ?";
                    $faculty_stmt = $conn->prepare($faculty_query);
                    $faculty_stmt->bind_param("i", $faculty_id);
                    $faculty_stmt->execute();
                    $faculty_result = $faculty_stmt->get_result();
                    $faculty_row = $faculty_result->fetch_assoc();
                    $faculty_name = $faculty_row['Faculty_Name'];
                }

                // Получаем название кафедры по её идентификатору
                $department_name = "";
                if ($employee['Department_Id'] != null) {
                    $department_id = $employee['Department_Id'];
                    $department_query = "SELECT Department_Name FROM departments WHERE Department_Id = ?";
                    $department_stmt = $conn->prepare($department_query);
                    $department_stmt->bind_param("i", $department_id);
                    $department_stmt->execute();
                    $department_result = $department_stmt->get_result();
                    $department_row = $department_result->fetch_assoc();
                    $department_name = $department_row['Department_Name'];
                }
                

                // Выводим остальную информацию о сотруднике после фотографии и заменяем числовые идентификаторы на соответствующие названия
                $pdf->SetXY($infoX, $pdf->GetY() + 5); // Увеличиваем Y координату на 5 для отступа
                $pdf->Cell(0, 10, 'ФИО: ' . $employee['Full_Name'], 0, 1);
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Дата рождения: ' . $employee['Date_of_Birth'], 0, 1);
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Место рождения: ' . $employee['Place_of_Birth'], 0, 1);
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Должность: ' . $position_name, 0, 1); // Используем полученное название должности
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Степень: ' . $degree_name, 0, 1); // Используем полученное название степени
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Факультет: ' . $faculty_name, 0, 1); // Используем полученное название факультета
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Кафедра: ' . $department_name, 0, 1); // Используем полученное название кафедры
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Email: ' . $employee['Email'], 0, 1);
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Телефон: ' . $employee['Phone_Number'], 0, 1);
                
                $pdf->SetXY($infoX, $pdf->GetY() + 2); // Увеличиваем Y координату на 2 для уменьшения интервала
                $pdf->Cell(0, 10, 'Дата принятия на работу: ' . $employee['Date_Added'], 0, 1);
                // Продолжаем выводить остальные поля по аналогии
            }


            // Устанавливаем HTTP-заголовки для скачивания PDF файла
            $pdf->Output('CV_' . $employee_id . '.pdf', 'D');
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

