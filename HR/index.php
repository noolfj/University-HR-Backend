<?php
require_once "header.php";
?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Рейтинг</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>Статистика всех сотрудников</h3>

                            <div class="btn-group mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary filterBtn" data-filter="all">Все</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Электроснабжение и автоматика">Электроснабжение и автоматика</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Программирование и информационные  системы">Программирование и информационные  системы</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Инженерная экономика и менеджмент">Инженерная экономика и менеджмент</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter=" Физики и химии"> Физики и химии</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Автомобили и управление на транспорте">Автомобили и управление на транспорте</button>
                                <button class="btn btn-primary dropdown-toggle" type="button" id="departmentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Другие
    </button>
    <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Строительства">Строительства</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Государственный язык и обществоведение">Государственный язык и обществоведение</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Финансы и кредит">Финансы и кредит</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Высшая математика и информатика">Высшая математика и информатика</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Дизайна и архитектуры">Дизайна и архитектуры</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Пищевая продукция и агротехнология">Пищевая продукция и агротехнология</button></li>
        <li><button class="dropdown-item filterBtn" type="button" data-filter="Кафедры Языков">Кафедры Языков</button></li>
   
    </ul>
                            </div>

                            <!-- <div class="btn-group mb-3 d-flex justify-content-end">
  
    </div> -->
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th class="text-center">ФИО</th>
                                            <th>Кафедра</th>
                                            <th>Кредит</th>
                                            <th>Баллы</th>
                                            <th>Рейтинг</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "../conn.php";

                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // SELECT query
                                        $sql = "SELECT e.Employee_Id, 
        e.Full_Name AS FullName, 
        IFNULL(dep.Department_Name, 'Не указан') AS Department,
        IFNULL(tc.TotalCredit, 0) AS TotalCredit,
        IFNULL(r.Rating, 0) AS Rating,
        IFNULL(e.Path_Photo, '1.jpg') AS Path_Photo
        FROM employees e
        LEFT JOIN (SELECT Employee_Id, SUM(p.Plan_Credit) AS TotalCredit
                   FROM tasks_completed tc
                   LEFT JOIN plans p ON tc.Plan_Id = p.Plan_Id
                   GROUP BY Employee_Id) tc ON e.Employee_Id = tc.Employee_Id
        LEFT JOIN ratings r ON e.Employee_Id = r.Employee_Id
        LEFT JOIN departments dep ON e.Department_Id = dep.Department_Id
        ORDER BY Rating DESC"; 


                                        // Execute query
                                        $result = $conn->query($sql);
                                        $count = 0;

                               // Inside the while loop where the table rows are generated
while ($row = $result->fetch_assoc()) {
    $count++;
    $photoPath = "../Personal/upload/" . $row["Path_Photo"];
    echo "<tr>";
    echo "<td class='align-middle'>" . $count . "</td>";
    echo "<td class='align-middle'>" .
         "<div class='d-flex align-items-center'>" .
         "<div class='me-4'>" .
         "<img src='" . $photoPath . "' alt='' class='avatar-sm rounded-circle'>" .
         "</div>" .
         "<div>" .
         "<h5 class='font-size-16 mb-1'><a href='vazorat.php?employeeId=" . $row["Employee_Id"] . "' class='rating-link'>" . $row["FullName"] . "</a></h5>" .
         "</div>" .
         "</div>" .
         "</td>";
         echo "<td class='align-middle'>" . $row["Department"] . "</td>";
    echo "<td class='align-middle'>" . $row["TotalCredit"] . "</td>";

    $completedCredits = $row["TotalCredit"];
    $totalCredits = $row["TotalCredit"];
    $uncompletedCredits = 0;
    $points = ($completedCredits - $uncompletedCredits) * 4;
    echo "<td class='align-middle'>" . $points . "</td>";

    echo "</tr>";
}

                                        // Close connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Подключение jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Подключение библиотеки DataTables -->
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable({
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

    // Обработчик события нажатия кнопок фильтрации
    $('.filterBtn').on('click', function() {
        var filterValue = $(this).data('filter');

        if (filterValue === 'all') {
            table.columns(2).search('').draw();
        } else {
            table.columns(2).search(filterValue).draw();
        }
    });

    // Сортировка таблицы по баллам после загрузки данных
    table.order([4, 'desc']).draw();
});
</script>

<?php
require_once "footer.php";
?>