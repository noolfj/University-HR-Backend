<?php 
require_once "header.php";

session_start();
if (empty($_SESSION["Username"])) {
    header("Location: ./index.php");
}

include_once "../conn.php";

$username = $_SESSION['Username'];

$sql_command = "SELECT e.Employee_Id, 
                e.Full_Name AS FullName, 
                IFNULL(deg.Degree_Name, 'Без степени') AS Degree,
                IFNULL(tc.TotalCredit, 0) AS TotalCredit,
                IFNULL(r.Rating, 0) AS Rating,
                IFNULL(e.Path_Photo, '1.jpg') AS Path_Photo
        FROM employees e
        LEFT JOIN (SELECT Employee_Id, SUM(p.Plan_Credit) AS TotalCredit
                    FROM tasks_completed tc
                    LEFT JOIN plans p ON tc.Plan_Id = p.Plan_Id
                    GROUP BY Employee_Id) tc ON e.Employee_Id = tc.Employee_Id
        LEFT JOIN ratings r ON e.Employee_Id = r.Employee_Id
        LEFT JOIN degrees deg ON e.Degree_Id = deg.Degree_Id
        WHERE e.Username = '{$username}'
        ORDER BY Rating DESC";

$result = mysqli_query($conn, $sql_command);

$data = array(); // Создайте пустой массив для хранения данных
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; // Добавьте строку данных в массив
    }
}

?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Статистика</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>Ваша статистика</h3>
                            <div class="table-responsive">
                                <table class="table mb-0">
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
                                        <?php foreach ($data as $row): ?>
                                            <tr>
                                                <td class="align-middle"><?php echo $row['Employee_Id']; ?></td>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-4">
                                                            <img src="upload/<?php if(!empty($row['Path_Photo'])) { echo $row['Path_Photo']; } else { echo "1.jpg"; } ?>"
                                                                alt="" class="avatar-sm rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-16 mb-1">
                                                                <?php echo ucwords($row['FullName']); ?></h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle"><?php echo $row['Degree']; ?></td>
                                                <td class="align-middle"><?php echo $row['TotalCredit']; ?></td>
                                                <?php
                                                // Calculate points based on completed and uncompleted credits
                                                $completedCredits = $row["TotalCredit"]; // Assuming this field represents completed credits
                                                $totalCredits = $row["TotalCredit"]; // Assuming this field represents total credits
                                                $uncompletedCredits = 0; // Initially assuming there are no uncompleted credits
                                                $points = ($completedCredits - $uncompletedCredits) * 4; // Calculating points, divided by 10
                                                echo "<td class='align-middle'>".$points."</td>"; // Display points
                                                ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once "footer.php"; ?>
