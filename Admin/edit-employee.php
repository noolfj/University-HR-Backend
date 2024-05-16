<?php 
require_once "header.php";
?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Изменение данных</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Сотрудники</a></li>
                            <li class="breadcrumb-item active">Управлять сотрудниками</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Редактирование информации о сотрудниках</h4>
                        <div class="table-responsive">

                            <table id="datatable" class="table table-bordered"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr class="bg-white">
                                        <th>№</th>
                                        <th>ФИО</th>
                                        <th>Дата рождения</th>
                                        <th>Место рождения</th>
                                        <th>Должность</th>
                                        <th>Степень</th>
                                        <th>Факультет</th>
                                        <th>Кафедра</th>
                                        <th>Роль пользователя</th>
                                        <th>Email</th>
                                        <th>Телефон</th>
                                        <th>Табельный номер</th>
                                        <th>Дата добавления</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    require_once "../conn.php";

                                    $sql = "SELECT * FROM employees";
                                    $result = mysqli_query($conn , $sql);
                                    
                                    $i = 1;
                                    if(mysqli_num_rows($result) > 0){
                                        while($rows = mysqli_fetch_assoc($result)) {
                                            $Employee_Id = $rows["Employee_Id"];
                                            $Full_Name = $rows["Full_Name"];
                                            $Date_of_Birth = $rows["Date_of_Birth"];
                                            $Place_of_Birth = $rows["Place_of_Birth"];
                                            $Position_Id = $rows["Position_Id"];
                                            $Degree_Id = $rows["Degree_Id"];
                                            $Faculty_Id = $rows["Faculty_Id"];
                                            $Department_Id = $rows["Department_Id"];
                                            $User_Role_Id = $rows["User_Role_Id"];
                                            $Email = $rows["Email"];
                                            $Phone_Number = $rows["Phone_Number"];
                                            $Employee_Number = $rows["Employee_Number"];
                                            $Date_Added = $rows["Date_Added"];
                                    ?>
                                    <tr id="row-<?php echo $Employee_Id; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $Full_Name; ?></td>
                                        <td><?php echo $Date_of_Birth; ?></td>
                                        <td><?php echo $Place_of_Birth; ?></td>
                                        <td><?php echo $Position_Id; ?></td>
                                        <td><?php echo $Degree_Id; ?></td>
                                        <td><?php echo $Faculty_Id; ?></td>
                                        <td><?php echo $Department_Id; ?></td>
                                        <td><?php echo $User_Role_Id; ?></td>
                                        <td><?php echo $Email; ?></td>
                                        <td><?php echo $Phone_Number; ?></td>
                                        <td><?php echo $Employee_Number; ?></td>
                                        <td><?php echo $Date_Added; ?></td>
                                        <td>
                                            <a href='update-employee.php?id=<?php echo $Employee_Id; ?>'
                                                class='btn-sm btn-primary ml-2'> <span><i class='fa fa-edit'></i></span>
                                            </a>
                                            <a href='delete-employee.php?id=<?php echo $Employee_Id; ?>'
                                                class='btn-sm btn-primary ml-2'
                                                onclick="return confirm('Вы уверены, что хотите удалить этого сотрудника?')">
                                                <span><i class='fa fa-trash'></i></span> </a>
                                        </td>

                                    </tr>
                                    <?php 
                                        $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='15'>Сотрудники не найдены!</td></tr>";
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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