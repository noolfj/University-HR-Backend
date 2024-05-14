<?php
require_once "header.php";

session_start();

// Проверяем наличие сессии пользователя
if (empty($_SESSION["Username"])) {
    header("Location: ../login.php");
    exit; // Прекращаем выполнение скрипта после перенаправления
}

// Подключаем файл с базой данных
// Подключаем файл с базой данных
require_once "conn.php";

// Подготовленный запрос SQL
$sql_query = "SELECT Full_Name, Position_Id, Email, Phone_Number, Degree_Id, Faculty_Id, Department_Id, Employee_Number, Date_Of_Birth, Place_Of_Birth, Path_Photo FROM employees WHERE Username = ?";


// Подготавливаем запрос к базе данных
$stmt = mysqli_prepare($conn, $sql_query);

// Проверяем, успешно ли подготовлен запрос
if ($stmt) {
    // Привязываем параметр
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["Username"]);

    // Выполняем запрос
    mysqli_stmt_execute($stmt);

    // Получаем результат запроса
    $result = mysqli_stmt_get_result($stmt);

    // Проверяем, есть ли результаты
    if (mysqli_num_rows($result) > 0) {
        // Извлекаем данные о сотруднике
        $row = mysqli_fetch_assoc($result);
        $Full_Name = ucwords($row["Full_Name"]);
        $Position_Id = $row["Position_Id"];
        $Email = $row["Email"];
        $Phone_Number = $row["Phone_Number"];
        $Degree_Id = $row["Degree_Id"];
        $Faculty_Id = $row["Faculty_Id"];
        $Department_Id = $row["Department_Id"];
        $Employee_Number = $row["Employee_Number"];
        $Date_Of_Birth = $row["Date_Of_Birth"];
        $Place_Of_Birth = $row["Place_Of_Birth"];
        $Path_Photo = $row["Path_Photo"];
    
        // Получение названия факультета
        $sql_faculty = "SELECT Faculty_Name FROM faculties WHERE Faculty_Id = ?";
        $stmt_faculty = mysqli_prepare($conn, $sql_faculty);
        mysqli_stmt_bind_param($stmt_faculty, "i", $Faculty_Id);
        mysqli_stmt_execute($stmt_faculty);
        $result_faculty = mysqli_stmt_get_result($stmt_faculty);
        $row_faculty = mysqli_fetch_assoc($result_faculty);
        $Faculty_Name = $row_faculty['Faculty_Name'];
    
        // Получение названия кафедры
        $sql_department = "SELECT Department_Name FROM departments WHERE Department_Id = ?";
        $stmt_department = mysqli_prepare($conn, $sql_department);
        mysqli_stmt_bind_param($stmt_department, "i", $Department_Id);
        mysqli_stmt_execute($stmt_department);
        $result_department = mysqli_stmt_get_result($stmt_department);
        $row_department = mysqli_fetch_assoc($result_department);
        $Department_Name = $row_department['Department_Name'];
    
        // Получение названия должности
        $sql_position = "SELECT Position_Name FROM positions WHERE Position_Id = ?";
        $stmt_position = mysqli_prepare($conn, $sql_position);
        mysqli_stmt_bind_param($stmt_position, "i", $Position_Id);
        mysqli_stmt_execute($stmt_position);
        $result_position = mysqli_stmt_get_result($stmt_position);
        $row_position = mysqli_fetch_assoc($result_position);
        $Position_Name = $row_position['Position_Name'];
    
        // Получение названия степени
        $sql_degree = "SELECT Degree_Name FROM degrees WHERE Degree_Id = ?";
        $stmt_degree = mysqli_prepare($conn, $sql_degree);
        mysqli_stmt_bind_param($stmt_degree, "i", $Degree_Id);
        mysqli_stmt_execute($stmt_degree);
        $result_degree = mysqli_stmt_get_result($stmt_degree);
        $row_degree = mysqli_fetch_assoc($result_degree);
        $Degree_Name = $row_degree['Degree_Name'];
    } else {
        echo "Данные не найдены";
    }
    
} else {
    echo "Ошибка запроса: " . mysqli_error($conn);
}


?>




<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Профиль</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start row -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-widgets py-3">
                            <div class="text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="position-relative">
                                        <img src="../Personal/upload/<?php if(!empty($Path_Photo)){ echo $Path_Photo; }else{ echo "1.jpg"; } ?>" alt=""
                                            class="avatar-lg mx-auto img-thumbnail rounded-circle"
                                            style="width: 150px; height: 150px;">
                                        <div class="online-circle"
                                            style="position: absolute; right: -50px; top: 100px;">
                                            <i class="fas fa-circle text-success"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a href="#" class="text-reset fw-medium font-size-20"><?php echo $Full_Name; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h2>Личная Информация</h2>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Почта:</p>
                                    <h5 class=""><?php echo $Email; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Номер телефона:</p>
                                    <h5 class=""><?php echo $Phone_Number; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Должность:</p>
                                    <h5 class=""><?php echo $Position_Name; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Степень:</p>
                                    <h5 class=""><?php echo $Degree_Name; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Факультет:</p>
                                    <h5 class=""><?php echo $Faculty_Name; ?></h5>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Кафедры:</p>
                                    <h5 class=""><?php echo $Department_Name; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Табельный номер:</p>
                                    <h5 class=""><?php echo $Employee_Number; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Дата рождения:</p>
                                    <h5 class=""><?php echo $Date_Of_Birth; ?></h5>
                                </div>

                                <div class="mt-3">
                                    <p class="font-size-16 text-muted mb-1">Место рождения:</p>
                                    <h5 class=""><?php echo $Place_Of_Birth; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="button-items mt-3 text-center">
                            <a href="edit-profile.php" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bx-user-pin font-size-16 align-middle me-2"></i> Изменить профиль
                            </a>

                            <a href="profile-photo.php" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bxs-photo-album font-size-16 align-middle me-2"></i> Изменить фото
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <!-- end row -->

    </div>


    <?php 
require_once "footer.php";
?>