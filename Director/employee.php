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
                                    <tr>
                                            <td>Ахмедов Равшан</td>
                                            <td>Преподователь</td>
                                            <td>Кандидат наук</td>
                                            <td>Информатика и энергетика</td>
                                            <td>Программирование и информационная система</td>
                                            <td>Ahmedov1010@mail.ru</td>
                                            <td>+992 92 9922992</td>
                                            <td>12345</td>
                                            <td>12.01.1995</td>
                                            <td>Худжанд</td>
                                        </tr>

                                        <tr>
                                            <td>Рахмонов Парвиз</td>
                                            <td>Преподователь</td>
                                            <td> - </td>
                                            <td>Информатика и энергетика</td>
                                            <td>Программирование и информационная система</td>
                                            <td>Rahmonov122@mail.ru</td>
                                            <td>+992 92 99221212</td>
                                            <td>31241</td>
                                            <td>16.04.1982</td>
                                            <td>Душанбе</td>
                                        </tr>
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