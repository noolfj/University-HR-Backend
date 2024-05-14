<?php 
require_once "header.php";
require_once "conn.php";
// Подключение к базе данных (предположим, что у вас уже есть подключение $db)
// Вам может потребоваться настроить параметры подключения

// Запрос на получение планов из базы данных
$sql = "SELECT * FROM plans";


$result = mysqli_query($conn , $sql);

?>

<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">ПЛАН</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Список планов</h3>
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>№</th>
                                        <th class="text-center">Норма</th>
                                        <th>Кредит</th>
                                        <th>Примечание</th>
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
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
require_once "footer.php";
?>
