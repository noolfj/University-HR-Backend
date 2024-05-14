<?php 
require_once "header.php";

?>
<?php 

require_once "conn.php";

// Проверяем, был ли передан идентификатор вакансии для редактирования
if(isset($_GET['Vacancy_Id'])) {
    $Vacancy_Id = $_GET['Vacancy_Id'];

    // Получаем данные о вакансии из БД
    $sql = "SELECT * FROM vacancies WHERE Vacancy_Id = $Vacancy_Id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Получаем данные о вакансии
        $Vacancy_Title = $row["Vacancy_Title"];
        $Description = $row["Description"];
        $Requirements = $row["Requirements"];
        $Salary = $row["Salary"];
        $Location = $row["Location"];
    } else {
        echo "Вакансия не найдена.";
        header("Location: list-vacansies.php");
        exit();
    }
} else {

    // echo "Неверный запрос.";
    // exit();
}

// Обработка формы редактирования
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $Vacancy_Title = $_POST["vacancy_Title"];
    $Description = $_POST["description"];
    $Requirements = $_POST["requirements"];
    $Salary = $_POST["salary"];
    $Location = $_POST["location"];

    // Обновляем запись в БД
    $sql = "UPDATE vacancies SET Vacancy_Title='$Vacancy_Title', Description='$Description', Requirements='$Requirements', 
    Salary='$Salary', Location='$Location' WHERE Vacancy_Id = $Vacancy_Id";

    if(mysqli_query($conn, $sql)) {
        // echo "Данные успешно обновлены.";
       
    } else {
        echo "Ошибка при обновлении данных: " . mysqli_error($conn);
    }
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
                    <h4 class="page-title mb-0 font-size-18">Вакансия</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Страницы</a></li>
                            <li class="breadcrumb-item active">Вакансия</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <form  method="POST" >

            <input type="hidden" id="vacancyId" value="<?php echo $Vacancy_Id; ?>">
            <div class="mb-3">
                <label for="vacancyTitle" class="form-label">Название вакансии</label>
                <input type="text" class="form-control" id="vacancyTitle" name="vacancy_Title" value="<?php echo $Vacancy_Title; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание вакансии</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $Description; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="requirements" class="form-label">Требования к кандидатам</label>
                <textarea class="form-control" id="requirements" name="requirements" rows="3" required><?php echo $Requirements; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Зарплата</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $Salary; ?>" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Местоположение</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $Location; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success"  >Сохранить изменения</button>
            </div>
        </form>
    </div>

    

    <!-- End Page-content -->
<?php 
require_once "footer.php";
?>
