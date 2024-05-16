<?php 
require_once "header.php";
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
                            <li class="breadcrumb-item active">Вакансия>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Обновить вакансию</h3>
                  
                            <?php
// Подключение к базе данных
require_once "../conn.php";

// SQL-запрос для извлечения данных о вакансиях
$sql = "SELECT * FROM vacancies";
$result = $conn->query($sql);

// Переменная для отслеживания номера порядка
$counter = 1;

// Вывод данных в HTML-таблицу
if ($result->num_rows > 0) {
    echo "<table id=\"vacanciesTable\" class=\"table\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th>№</th>";
    echo "<th>Название вакансии</th>";
    echo "<th>Описание вакансии</th>";
    echo "<th>Требования</th>";
    echo "<th>Зарплата</th>";
    echo "<th>Местоположения</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr data-id='" . $row['Vacancy_Id'] . "'>";
        echo "<td>" . $counter . "</td>";
        echo "<td>" . $row['Vacancy_Title'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "<td>" . $row['Requirements'] . "</td>";
        echo "<td>" . $row['Salary'] . "</td>";
        echo "<td>" . $row['Location'] . "</td>";
        echo "<td>";
        echo "<a href='edit-vacancies.php?Vacancy_Id=" . $row['Vacancy_Id'] . "' class='btn btn-sm btn-primary editVacancyButton'>Редактировать</a>";
        echo "</td>";
        echo "</tr>";

        // Увеличение счетчика на 1
        $counter++;
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 результатов";
}

// Закрытие подключения
$conn->close();
?>
                  </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <?php 
require_once "footer.php";
?>