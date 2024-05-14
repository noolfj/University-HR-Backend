<?php 
require_once "header.php";
require_once "conn.php";

// Запрос на получение планов из базы данных
$sql = "SELECT * FROM plans";
$result = mysqli_query($conn, $sql);

?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">ПЛАН</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">План</a></li>
                            <li class="breadcrumb-item active">Отправить выполненные задачи</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Вывод планов из БД в форму -->
        <?php 
        // Проверяем, есть ли результаты запроса
        if(mysqli_num_rows($result) > 0) {
            $counter = 1; // Инициализируем счетчик
            // Цикл для вывода каждого плана из базы данных
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<form class="repeater" enctype="multipart/form-data">';
                echo '<div data-repeater-list="group-a">';
                echo '<div data-repeater-item class="row">';
                echo '<div class="mb-3">'; // Изменили ширину столбца для порядкового номера
                echo '<p class="form-label">' . $counter . '</p>'; // Выводим порядковый номер
                echo '</div>';
                // Остальной код формы оставляем без изменений
                echo '<div class="mb-3 col-lg-2">';
                echo '<p class="form-label">' . $row['Plan_Name'] . '</p>';
                echo '</div>';
                echo '<div class="mb-3 col-lg-2">';
                echo '<label class="form-label" for="file">Выберите файл</label>';
                echo '<input type="file" class="form-control-file" id="file" name="file">';
                echo '</div>';
                echo '<div class="mb-3 col-lg-2">';
                echo '<label class="form-label" for="credit">Кредит</label>';
                echo '<input type="text" id="credit" name="credit" class="form-control">';
                echo '</div>';
                echo '<div class="mb-3 col-lg-2">';
                echo '<label class="form-label" for="status">Статус</label>';
                // Здесь можно добавить поле для статуса, например, выпадающий список или радиокнопки
                echo '</div>';
                echo '<div class="mb-3 col-lg-2">';
                echo '<label class="form-label" for="comment">Комментарий</label>';
                echo '<textarea id="comment" name="comment" class="form-control"></textarea>';
                echo '</div>';
                echo '<div class="mb-3 col-lg-2">';
                echo '<label class="form-label">Дата добавления</label>';
                echo '<input type="text" class="form-control" value="" disabled>';
                echo '</div>';
                echo '<div class="col-lg-10"></div>';
                echo '<div class="col-lg-2 d-flex justify-content-end">';
                echo '<div class="mb-3 align-self-center">';
                echo '<input data-repeater-create type="button" class="btn btn-success" value="Отправить" />';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $counter++; // Увеличиваем счетчик после вывода каждой записи
            }
        } else {
            echo '<p>Нет доступных планов.</p>';
        }
        ?>
        <!-- Конец вывода планов -->

        <?php require_once "footer.php"; ?>
