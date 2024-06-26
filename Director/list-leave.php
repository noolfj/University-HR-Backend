<?php 
require_once "header.php";
session_start();

if (empty($_SESSION["Username"])) {
    header("Location: ./index.php");
    exit();
}

$Username = $_SESSION["Username"];
require_once "../conn.php";

$sql = "SELECT * FROM employee_leave";
$result = mysqli_query($conn , $sql);
$i = 1;
?>

<style>
    #commentText {
        word-wrap: break-word;
        overflow-wrap: break-word;
        overflow-y: auto;
        max-height: 300px;
    }
    .status-accepted {
        color: green;
    }
    .status-rejected {
        color: red;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Сотрудники</h4>
                </div>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

      

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Список заявок</h3>
                <div >
                <table id="datatable" class="table table-bordered " style="width: 100%;">
                        <thead>
                        <tr>
                                        <th>№</th>
                                        <th class="text-center">ФИО</th>
                                        <th>Причина</th>
                                        <th>Дата начала</th>
                                        <th>Дата окончания</th>
                                        <th>Комментарий</th>
                                        <th>Документ</th>
                                        <th class="text-center">Статус</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $start_date = $rows["start_date"];
                                            $end_date = $rows["end_date"];
                                            $fullname = $rows["full_name"];
                                            $reason = $rows["reason"];
                                            $comments = $rows["comments"];
                                            $status = $rows["status"];
                                            $leave_id = $rows["leave_id"];    
                                            $pdf_file = $rows["pdf_file"];  
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo "$i."; ?></th>
                                        <td><?php echo $fullname; ?></td>
                                        <td><?php echo $reason; ?></td>
                                        <td><?php echo $start_date; ?></td>
                                        <td><?php echo $end_date; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Действия">
                                                <button type="button" class="btn btn-primary view-comments" data-bs-toggle="modal" data-bs-target="#commentModal" data-comment="<?php echo htmlspecialchars($comments); ?>">
                                                    Посмотреть
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Действия">
                                                <a href="../Personal/uploads/<?php echo $pdf_file; ?>" target="_blank" class="btn btn-primary">Посмотреть</a>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                            if ($status == 'В ожидании') {
                                                echo "<span class='status'>В ожидании</span>";
                                            } elseif ($status == 'Принято') {
                                                echo "<span class='status-accepted'>Принято</span>";
                                            } elseif ($status == 'Отклонено') {
                                                echo "<span class='status-rejected'>Отклонено</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php 
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='8' class='text-center'>Заявления не найдены</td></tr>";
                                    }
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

        <!-- Модальное окно для комментариев -->
        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Комментарий</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="commentText">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var viewButtons = document.querySelectorAll('.view-comments');
            var modalCommentText = document.getElementById('commentText');

            viewButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var commentText = this.getAttribute('data-comment');
                    modalCommentText.innerHTML = commentText;
                    $('#commentModal').modal('show');
                });
            });
        });
        </script>

<?php 
require_once "footer.php";
?>
