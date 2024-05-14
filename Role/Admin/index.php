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
                            <h3>Рейтинг всех сотрудников</h3>

                            <div class="btn-group mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary filterBtn" data-filter="all">Все</button>
                              
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Кандидат физико-математических наук, доцент">Кандидат физико-математических наук, доцент</button>

                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Кандидат технических наук">Кандидат технических наук</button>

                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Доктор экономических наук,Профессор">Доктор экономических
                                    наук, профессор</button>

                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Кандидат экономических наук,Доцент">Кандидат экономических
                                    наук, доцент</button>

                          <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Бакалавриат">Бакалавриат</button>
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Магистратура">Магистратура</button>
                        
                                <button type="button" class="btn btn-primary filterBtn"
                                    data-filter="Степень ассоциата">Степень ассоциата</button>


                                <button type="button" class="btn btn-primary filterBtn" data-filter="Без степени">Без
                                    степени</button>
                            </div>


                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th class="text-center">ФИО</th>
                                            <th>Степень</th>
                                            <th>Кредит</th>
                                            <th>Баллы</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          
                                          require_once "conn.php";
                                          
                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                // SELECT query
                                                $sql = "SELECT r.Rating_Id as Id, 
                                                IFNULL(e.Path_Photo, '') as Path, 
                                                e.Full_Name as FullName, 
                                                deg.Degree_Name as Degree,
                                                CONCAT(r.Credit_Done, '/', r.Credit_Full) as Credit,
                                                r.Rating 
                                         FROM ratings r
                                         LEFT JOIN employees e ON r.Employee_Id = e.Employee_Id
                                         LEFT JOIN degrees deg ON e.Degree_Id = deg.Degree_Id
                                         ORDER BY Rating DESC;";

                                                // Execute query
                                                $result = $conn->query($sql);
                                                $count =0;
                                                // Check if there are any results
                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        $count++;
                                                        if ($row["Path"] == "") {
                                                            $row["Path"]= "1.jpg";
                                                        }
                                                        echo "<tr>".
                                                            "   <td class='align-middle'>".$count."</td>".
                                                            "   <td class='align-middle'>".
                                                            "   <div class='d-flex align-items-center'>".
                                                            "       <div class='me-4'> ".
                                                            "           <img src='../Personal/upload/".$row["Path"]."' alt='' class='avatar-sm rounded-circle'>".
                                                            "       </div>".
                                                            "       <div>".
                                                            "           <h5 class='font-size-16 mb-1'>".$row["FullName"]."</h5>".
                                                            "       </div>".
                                                            "   </div>".
                                                            "    </td>".
                                                            "   <td class='align-middle'>".$row["Degree"]."</td>".
                                                            "   <td class='align-middle'>".$row["Credit"]."</td>".
                                                            "   <td class='align-middle'>".$row["Rating"]."</td>".
                                                            "</tr>";
                                                    }
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
            });
            </script>


            <?php
require_once "footer.php";
?>