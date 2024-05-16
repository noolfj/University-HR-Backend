<?php 
// Подключение к базе данных
session_start();

if (empty($_SESSION["Username"])) {
    header("Location: ./index.php");
    exit();
}

$reasonErr = $startdateErr = $enddateErr = $commentsErr = $pdf_fileErr = "";
$reason = $startdate = $enddate = $comments = $pdf_file = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["reason"])) {
        $reasonErr = "<p style='color:red'>* Требуется причина</p>";
    } else {
        $reason = $_POST["reason"];
    }

    if (empty($_POST["startDate"])) {
        $startdateErr = "<p style='color:red'>* Требуется дата начала</p>";
    } else {
        $startdate = $_POST["startDate"];
    }

    if (empty($_POST["endDate"])) {
        $enddateErr = "<p style='color:red'>* Требуется дата окончания</p>";
    } else {
        $enddate = $_POST["endDate"];
    }

    if (empty($_POST["comments"])) {
        $commentsErr = "<p style='color:red'>* Требуется комментарий</p>";
    } else {
        $comments = $_POST["comments"];
    }

    if (empty($_FILES["pdf_file"]["name"])) {
        $pdf_fileErr = "<p style='color:red'>* Требуется документ PDF</p>";
    } else {
        $pdf_file = $_FILES["pdf_file"]["name"];
    }

    if (!empty($reason) && !empty($startdate) && !empty($enddate) && !empty($comments) && !empty($pdf_file)) {

        // Получение ФИО сотрудника из базы данных на основе логина
        $fullname = "";
        require_once "../conn.php";

        $sql_fullname = "SELECT Full_Name FROM employees WHERE Username = '{$_SESSION['Username']}'";
        $result_fullname = mysqli_query($conn, $sql_fullname);

        if ($result_fullname && mysqli_num_rows($result_fullname) > 0) {
            $row_fullname = mysqli_fetch_assoc($result_fullname);
            $fullname = $row_fullname["Full_Name"];
        }

        // Подготовка данных для вставки в базу данных
        $reason = mysqli_real_escape_string($conn, $reason);
        $startdate = mysqli_real_escape_string($conn, $startdate);
        $enddate = mysqli_real_escape_string($conn, $enddate);
        $comments = mysqli_real_escape_string($conn, $comments);
        $pdf_file = mysqli_real_escape_string($conn, $pdf_file);

      // Перемещение загруженного файла в нужное место
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Проверяем, был ли загружен файл без ошибок
    if ($_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        // Проверяем тип загруженного файла
        $file_type = mime_content_type($_FILES['pdf_file']['tmp_name']);
        if ($file_type != 'application/pdf') {
            echo "Ошибка: Допускаются только файлы PDF.";
            exit();
        }

        // Определяем путь для сохранения файла
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($_FILES['pdf_file']['name']);
        
        // Перемещаем файл из временного хранилища в желаемую директорию
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $upload_file)) {
            echo "Файл успешно загружен.";
            // Присваиваем переменной $pdf_file имя загруженного файла
            $pdf_file = $_FILES['pdf_file']['name'];
        } else {
            echo "Ошибка при загрузке файла.";
        }
    } else {
        echo "Ошибка: " . $_FILES['pdf_file']['error'];
    }

    // Вставка данных в базу данных
    $sql = "INSERT INTO employee_leave (reason, start_date, end_date, comments, full_name, status, Username, pdf_file) 
    VALUES ('$reason', '$startdate', '$enddate', '$comments', '$fullname', 'В ожидании', '{$_SESSION['Username']}', '$pdf_file')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Успешно добавлено
        $reason = $startdate = $enddate = $comments = $pdf_file = "";
        header("Location: status-leave.php"); // Перенаправление на другую страницу
        exit(); // Важно завершить выполнение скрипта после перенаправления
    } else {
        // Ошибка при выполнении запроса
        echo "Ошибка: " . mysqli_error($conn);
    }

        } else {
            // Ошибка при перемещении файла
            echo "Ошибка при загрузке файла.";
        }

        // Закрыть подключение к базе данных
        mysqli_close($conn);
    }
}
?>
