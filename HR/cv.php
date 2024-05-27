<?php 
require_once "header.php";

// Подключение к базе данных (замените данными вашей конфигурации)
require_once "conn.php";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $database);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL запрос для извлечения данных из таблицы employees
$sql = "SELECT e.Employee_Id, e.Full_Name, 
               IFNULL(dep.Department_Name, 'Не указан') AS Department
        FROM employees e
        LEFT JOIN departments dep ON e.Department_Id = dep.Department_Id
        ORDER BY e.Full_Name";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">CV сотрудников</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>CV</h4>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ФИО</th>
                                        <th>Кафедра</th>
                                        <th>Ссылка на CV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Вывод данных в таблицу HTML
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>
                                                    <td>'.htmlspecialchars($row["Full_Name"]).'</td>
                                                    <td>'.htmlspecialchars($row["Department"]).'</td>
                                                    <td><a href="download_cv.php?id='.$row["Employee_Id"].'" target="_blank">Скачать CV</a></td>
                                                  </tr>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>Нет данных</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- <td><a href="edit_cv.php?id='.$row["Employee_Id"].'">'.$row["Full_Name"].'</a></td> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "lengthMenu": "Показать _MENU_ записей на странице",
                "zeroRecords": "Ничего не найдено",
                "info": "Показано с _START_ по _END_ из _TOTAL_ записей",
                "infoEmpty": "Показано с 0 по 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "search": "Поиск:",
                "paginate": {
                    "first": "Первая",
                    "last": "Последняя",
                    "next": "Следующая",
                    "previous": "Предыдущая"
                }
            }
        });
    });
    </script>
</div>

<?php 
require_once "footer.php";
?>
