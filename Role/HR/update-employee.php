<?php 
require_once "header.php";
require_once "conn.php";
// Проверяем, был ли передан идентификатор сотрудника для редактирования
if(isset($_GET['id'])) {
    $employeeId = $_GET['id'];

    // Получаем данные о сотруднике из БД
    $sql = "SELECT * FROM employees WHERE Employee_Id = $employeeId";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Получаем данные о сотруднике
        $fullName = $row["Full_Name"];
        $dateOfBirth = $row["Date_of_Birth"];
        $placeOfBirth = $row["Place_of_Birth"];
        $positionId = $row["Position_Id"];
        $degreeId = $row["Degree_Id"];
        $facultyId = $row["Faculty_Id"];
        $departmentId = $row["Department_Id"];
        $userRoleId = $row["User_Role_Id"];
        $email = $row["Email"];
        $phoneNumber = $row["Phone_Number"];
        $employeeNumber = $row["Employee_Number"];
        $dateAdded = $row["Date_Added"];
    } else {
        echo "Сотрудник не найден.";
        header("Location: edit-employee.php");
        exit();
    }
} else {
    // echo "Неверный запрос.";
    exit;
}

// Обработка формы редактирования
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $fullName = $_POST['full_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $placeOfBirth = $_POST['place_of_birth'];
    $positionId = $_POST['position_id'];
    $degreeId = $_POST['degree_id'];
    $facultyId = $_POST['faculty_id'];
    $departmentId = $_POST['department_id'];
    $userRoleId = $_POST['user_role_id'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $employeeNumber = $_POST['employee_number'];
    $selectedPositionId = $positionId;
$selectedDegreeId = $degreeId;
$selectedFacultyId = $facultyId;
$selectedDepartmentId = $departmentId;
$selectedUserRoleID = $userRoleId;

    // Обновляем запись в БД
    $sql = "UPDATE employees SET Full_Name='$fullName', Date_of_Birth='$dateOfBirth', Place_of_Birth='$placeOfBirth', Position_Id='$positionId', Degree_Id='$degreeId', Faculty_Id='$facultyId', Department_Id='$departmentId', User_Role_Id='$userRoleId', Email='$email', Phone_Number='$phoneNumber', Employee_Number='$employeeNumber' WHERE Employee_Id = $employeeId";

    if(mysqli_query($conn, $sql)) {
        // echo "Данные успешно обновлены.";
   
    } else {
        
        // echo "Ошибка при обновлении данных: " . mysqli_error($conn);
    }
}
?>


<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Сотрудники</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Изменить данные сотрудника</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">ФИО</label>
                                <input type="text" class="form-control mb-3" name="full_name"
                                    value="<?php echo isset($fullName) ? $fullName : ''; ?>" required
                                    placeholder="Введите ФИО">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Дата рождения</label>
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="<?php echo $dateOfBirth; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Место рождения</label>
                                <input type="text" class="form-control" name="place_of_birth"
                                    value="<?php echo $placeOfBirth; ?>" required placeholder="Введите место рождения">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Должность</label>

                            <select class="form-select" name="position_id" required>
                            <?php
$sqlPositions = "SELECT Position_Id, Position_Name FROM positions";
$resultPositions = mysqli_query($conn, $sqlPositions);

if (mysqli_num_rows($resultPositions) > 0) {
    while ($rowPosition = mysqli_fetch_assoc($resultPositions)) {
        if ($rowPosition['Position_Id'] == $selectedPositionId) {
            echo "<option value='" . $rowPosition['Position_Id'] . "' selected>" . $rowPosition['Position_Name'] . "</option>";
        } else {
            echo "<option value='" . $rowPosition['Position_Id'] . "'>" . $rowPosition['Position_Name'] . "</option>";
        }
    }
} else {
    echo "<option disabled>Нет доступных должностей</option>";
}
?>
                            </select>


                            <div class="mb-3">
                                <label class="form-label">Степень</label>

                                <select class="form-select" name="degree_id" required>
                                    <?php
    // Выбираем все степени из таблицы degrees
    $sqlDegrees = "SELECT Degree_Id, Degree_Name FROM degrees";
    $resultDegrees = mysqli_query($conn, $sqlDegrees);

    // Проверяем, есть ли результаты
    if (mysqli_num_rows($resultDegrees) > 0) {
        // Выводим каждую степень как опцию в выпадающем списке
        while ($rowDegree = mysqli_fetch_assoc($resultDegrees)) {
            // Проверяем, является ли текущая степень выбранной
            if ($rowDegree['Degree_Id'] == $selectedDegreeId) {
                echo "<option value='" . $rowDegree['Degree_Id'] . "' selected>" . $rowDegree['Degree_Name'] . "</option>";
            } else {
                echo "<option value='" . $rowDegree['Degree_Id'] . "'>" . $rowDegree['Degree_Name'] . "</option>";
            }
        }
    } else {
        echo "<option disabled>Нет доступных степеней</option>";
    }
    ?>
                                </select>


                            </div>

                            <div class="mb-3">
                                <label class="form-label">Факультет</label>

                                <select class="form-select" name="faculty_id" required>
                                    <?php
    // Выбираем все факультеты из таблицы faculties
    $sqlFaculties = "SELECT Faculty_Id, Faculty_Name FROM faculties";
    $resultFaculties = mysqli_query($conn, $sqlFaculties);

    // Проверяем, есть ли результаты
    if (mysqli_num_rows($resultFaculties) > 0) {
        // Выводим каждый факультет как опцию в выпадающем списке
        while ($rowFaculty = mysqli_fetch_assoc($resultFaculties)) {
            // Проверяем, является ли текущий факультет выбранным
            if ($rowFaculty['Faculty_Id'] == $selectedFacultyId) {
                echo "<option value='" . $rowFaculty['Faculty_Id'] . "' selected>" . $rowFaculty['Faculty_Name'] . "</option>";
            } else {
                echo "<option value='" . $rowFaculty['Faculty_Id'] . "'>" . $rowFaculty['Faculty_Name'] . "</option>";
            }
        }
    } else {
        echo "<option disabled>Нет доступных факультетов</option>";
    }
    ?>
                                </select>


                            </div>

                            <div class="mb-3">
                                <label class="form-label">Кафедра</label>
                                <select class="form-select" name="department_id" required>
                                    <?php
    // Выбираем все кафедры из таблицы departments
    $sqlDepartments = "SELECT Department_Id, Department_Name FROM departments";
    $resultDepartments = mysqli_query($conn, $sqlDepartments);

    // Проверяем, есть ли результаты
    if (mysqli_num_rows($resultDepartments) > 0) {
        // Выводим каждую кафедру как опцию в выпадающем списке
        while ($rowDepartment = mysqli_fetch_assoc($resultDepartments)) {
            // Проверяем, является ли текущая кафедра выбранной
            if ($rowDepartment['Department_Id'] == $selectedDepartmentId) {
                echo "<option value='" . $rowDepartment['Department_Id'] . "' selected>" . $rowDepartment['Department_Name'] . "</option>";
            } else {
                echo "<option value='" . $rowDepartment['Department_Id'] . "'>" . $rowDepartment['Department_Name'] . "</option>";
            }
        }
    } else {
        echo "<option disabled>Нет доступных кафедр</option>";
    }
    ?>
                                </select>


                            </div>

                            <div class="mb-3">
                                <label class="form-label">Роль пользователя</label>

                                <select class="form-select" name="user_role_id" required>
                                <?php
$sqlUserRoles = "SELECT User_Role_Id, User_Type FROM user_roles";
$resultUserRoles = mysqli_query($conn, $sqlUserRoles);

if (mysqli_num_rows($resultUserRoles) > 0) {
    while ($rowUserRole = mysqli_fetch_assoc($resultUserRoles)) {
        if ($rowUserRole['User_Role_Id'] == $selectedUserRoleID) {
            echo "<option value='" . $rowUserRole['User_Role_Id'] . "' selected>" . $rowUserRole['User_Type'] . "</option>";
        } else {
            echo "<option value='" . $rowUserRole['User_Role_Id'] . "'>" . $rowUserRole['User_Type'] . "</option>";
        }
    }
} else {
    echo "<option disabled>Нет доступных ролей пользователей</option>";
}
?>

                                </select>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>"
                                    required placeholder="Введите email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Номер телефона</label>
                                <input type="tel" class="form-control" name="phone_number"
                                    value="<?php echo $phoneNumber; ?>" required placeholder="Введите номер телефона">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Табельный номер</label>
                                <input type="text" class="form-control" name="employee_number"
                                    value="<?php echo $employeeNumber; ?>" required
                                    placeholder="Введите табельный номер">
                            </div>
               

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                                <a href="edit-employee.php" class="btn btn-danger waves-effect waves-light">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php 
require_once "footer.php"; 
?>

             <!--                             <div class="mb-3">
                                <label class="form-label">Логин</label>
                                <input type="text" class="form-control" required placeholder="Введите логин">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="password" class="form-control" required placeholder="Введите пароль">
                            </div> -->


                            <!-- <div class="text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light"
                                    formaction="update-emp.php">Сохранить</button>
                            </div> -->
                            <!-- <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <button class="btn btn-success">Сохранить</button>
                                </div> -->