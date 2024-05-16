<?php 
require_once "header.php";
?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Департамент</h4>
                    <div class="page-title-right">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Список всех факультетов</h4>
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr class="bg-white">
                                        <th>№</th>
                                        <th>Факультет</th>
                                        <th>Удалить</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                            require_once "../conn.php";

                            $sql = "SELECT * FROM faculties";
                            $result = mysqli_query($conn , $sql);
                            
                            $i = 1;
                            if(mysqli_num_rows($result) > 0){
                                while($rows = mysqli_fetch_assoc($result)) {
                                    $Faculty_Id = $rows["Faculty_Id"];
                                    $Faculty_Name = $rows["Faculty_Name"];
                            ?>
                                    <tr id="row-<?php echo $Faculty_Id; ?>">
                                        <td><?php echo $Faculty_Id; ?></td>
                                        <td><?php echo $Faculty_Name; ?></td>
                                        <td>
                                            <a href='delete-departament.php?faculty_id=<?php echo $Faculty_Id; ?>'
                                                class='btn-sm btn-primary ml-2'
                                                onclick="return confirm('Вы уверены, что хотите удалить факультет?')">
                                                <span><i class='fa fa-trash'></i></span> </a>
                                        </td>
                                    </tr>
                                    <?php 
                                $i++;
                                }
                            } else {
                                echo "<tr><td colspan='15'>Факультет не найден!</td></tr>";
                            }
                            ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="row mt-3 text-center">
                            <div class="col-12">
                                <button class="btn btn-primary" onclick="redirectToPagefaculty()">Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Список всех кафедр</h4>
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr class="bg-white">
                                    <th>№</th>
                                    <th>Кафедра</th>
                                    <th>Удалить</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        require_once "../conn.php";

                        $sql = "SELECT * FROM departments";
                        $result = mysqli_query($conn , $sql);
                        
                        $i = 1;
                        if(mysqli_num_rows($result) > 0){
                            while($rows = mysqli_fetch_assoc($result)) {
                                $Department_Id = $rows["Department_Id"];
                                $Department_Name = $rows["Department_Name"];
                        ?>
                                <tr id="row-<?php echo $Department_Id; ?>">
                                    <td><?php echo $Department_Id; ?></td>
                                    <td><?php echo $Department_Name; ?></td>
                                    <td>
                                        <a href='delete-departament.php?department_id=<?php echo $Department_Id; ?>'
                                            class='btn-sm btn-primary ml-2'
                                            onclick="return confirm('Вы уверены, что хотите удалить кафедру?')">
                                            <span><i class='fa fa-trash'></i></span> </a>
                                    </td>
                                </tr>
                                <?php 
                            $i++;
                            }
                        } else {
                            echo "<tr><td colspan='15'>Кафедра не найден!</td></tr>";
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="col-12">
                            <button class="btn btn-primary" onclick="redirectToPagedepartment()">Добавить</button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <script>
    function redirectToPagefaculty() {
        window.location.href = "add-faculty.php";
    }

    function redirectToPagedepartment() {
        window.location.href = "add-departament.php";
    }
    </script>

    <?php 
    require_once "footer.php";
    ?>