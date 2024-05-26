<?php
require_once "header.php";
require_once "conn.php";

?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Редактирование CV сотрудника</h4>
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

                        <?php
                        if (isset($_GET['id'])) {
                            $employee_id = $_GET['id'];

                            $conn = new mysqli($servername, $username, $password, $database);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT e.Employee_Id, e.Full_Name, e.Department_Id, dep.Department_Name 
                                    FROM employees e 
                                    LEFT JOIN departments dep ON e.Department_Id = dep.Department_Id 
                                    WHERE e.Employee_Id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $employee_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $employee = $result->fetch_assoc();

                            if ($employee) {
                                echo '<form action="save_cv.php" method="POST">
                                        <input type="hidden" name="employee_id" value="'.$employee['Employee_Id'].'">
                                        <div class="form-group">
                                            <label>ФИО:</label>
                                            <input type="text" class="form-control" name="full_name" value="'.$employee['Full_Name'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Кафедра:</label>
                                            <input type="text" class="form-control" name="department" value="'.$employee['Department_Name'].'">
                                        </div>
                                        <!-- Добавьте остальные поля формы по вашему усмотрению -->
                                        <input type="submit" class="btn btn-primary" value="Сохранить">
                                      </form>';
                            } else {
                                echo "Сотрудник не найден.";
                            }

                            $stmt->close();
                            $conn->close();
                        } else {
                            echo "ID сотрудника не указан.";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "footer.php";
?>
