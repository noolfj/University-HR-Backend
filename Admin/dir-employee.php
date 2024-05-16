<?php 
require_once "header.php";
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
        <!-- Подключение стилей DataTables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Список сотрудников</h3>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>Степень</th>
                                    <th>Факультет</th>
                                    <th>Кафедры</th>
                                    <th>Почта</th>
                                    <th>Номер телефона</th>
                                    <th>Табельный номер</th>
                                    <th>Дата рождения</th>
                                    <th>Место рождения</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        
                                        include_once '../conn.php';

                                        // SELECT query
                                        $sql = "select e.Full_Name as FullName, ur.Position_Name as Position_Name, d.Degree_Name as DegreeName, f.Faculty_Name as FacultyName, dep.Department_Name as DepartmentName, e.Email, e.Phone_Number as PhoneNumber, e.Employee_Number EmployeeNumber, e.Date_of_Birth as DateofBirth, e.Place_of_Birth as PlaceofBirth from employees e left join positions ur on e.Position_Id = ur.Position_Id left join degrees d on e.Degree_Id = d.Degree_Id left join faculties f on e.Faculty_Id = f.Faculty_Id left join departments dep on e.Department_Id = dep.Department_Id;";

                                        // Execute query
                                        $result = $conn->query($sql);
                                        $count =0;
                                        // Check if there are any results
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>".
                                                        "<td>".$row["FullName"]."</td>".
                                                        "<td>".$row["Position_Name"]."</td>".
                                                        "<td>".$row["DegreeName"]."</td>".
                                                        "<td>".$row["FacultyName"]."</td>".
                                                        "<td>".$row["DepartmentName"]."</td>".
                                                        "<td>".$row["Email"]."</td>".
                                                        "<td>".$row["PhoneNumber"]."</td>".
                                                        "<td>".$row["EmployeeNumber"]."</td>".
                                                        "<td>".$row["DateofBirth"]."</td>".
                                                        "<td>".$row["PlaceofBirth"]."</td>".
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
            <!-- end col -->
        </div>
        <!-- end row -->


        <!-- Подключение jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Подключение библиотеки DataTables -->
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

        <?php 
require_once "footer.php";
?>