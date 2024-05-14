<?php 
require_once "header.php";
require_once "conn.php";
// require_once "process-plan.php";

// Запрос на получение планов из базы данных
$sql = "SELECT * FROM plans";
$result = mysqli_query($conn, $sql);

?>

<link href="../assets/css/styles.css" rel="stylesheet" />

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
                            <li class="breadcrumb-item active">Выбрать план</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="process-plan.php"> <!-- Добавлена форма с указанием action -->
                    <h3>Список планов</h3>
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <!-- Добавлен класс table-bordered -->
                            <thead class="table-light">
                                <tr>
                                    <th>№</th>
                                    <th class="text-center">Норма</th>
                                    <th>Кредит</th>
                                    <th>Примечание</th>
                                    <th>Выбрать</th> <!-- Новый заголовок -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Цикл для вывода каждого плана из базы данных
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $row['Plan_Id'] . "</th>";
                                    echo "<td>" . $row['Plan_Name'] . "</td>";
                                    echo "<td>" . $row['Plan_Credit'] . "</td>";
                                    echo "<td>" . $row['Comment'] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<label class='checkbox-wrapper'>";
                                    echo "<input type='checkbox' name='Plan_Id[]' value='" . $row['Plan_Id'] . "'>"; // Добавлено name и value для чекбокса
                                    echo "<span class='checkmark'></span>";
                                    echo "</label>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="button-items mt-3 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Отправить
                            </button>
                        </div>
                    </div>
                </form> <!-- Закрываем форму -->
            </div>
        </div>
    </div>
</div>
        <?php 
require_once "footer.php";
?>
