<?php
require_once "header.php";
require_once "../conn.php";

// Проверяем наличие параметра employeeId в URL
if (isset($_GET['employeeId'])) {
    $employeeId = $_GET['employeeId'];

    // Получаем данные сотрудника и его рейтинги из таблицы emp_rating_vazorat
    $sql = "SELECT e.Employee_Id, e.Full_Name, ev.rating_Id, er.nazv, er.comm, er.ball, er.omuzgor
            FROM employees e
            JOIN emp_rating_vazorat ev ON e.Employee_Id = ev.Employee_Id
            JOIN emp_rating er ON ev.emp_rat_id = er.emp_rat_id
            WHERE e.Employee_Id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employeeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employeeData = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Нет данных для отображения.";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID сотрудника не указан.";
    exit;
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Рейтинг сотрудника: <?php echo $employeeData[0]['Full_Name']; ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>Данные сотрудника</h3>
                            <table class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Комментарий</th>
                                        <th>Баллы</th>
                                        <th>Омузгор</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($employeeData as $row) {
                                        $count++;
                                        echo "<tr>";
                                        echo "<td class='align-middle'>" . $count . "</td>";
                                        echo "<td class='align-middle'>" . $row['nazv'] . "</td>";
                                        echo "<td class='align-middle'>" . $row['comm'] . "</td>";
                                        echo "<td class='align-middle'>" . $row['ball'] . "</td>";
                                        echo "<td class='align-middle'>" . $row['omuzgor'] . "</td>";
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
    </div>
</div>

<?php
require_once "footer.php";
?>
