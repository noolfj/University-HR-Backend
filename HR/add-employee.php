<?php
include_once "header.php";
require_once "add-emp.php";
?>


<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->



<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Сотрудники</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Страницы</a></li>
                            <li class="breadcrumb-item active">Добавить сотрудника>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Добавить сотрудника</h3>
                        <form method="POST" action="add-emp.php">

                            <div class="form-group mb-3">
                                <label for="Full_Name">ФИО:</label>
                                <input type="text" class="form-control" id="Full_Name" name="Full_Name" required
                                    placeholder="Введите ФИО" value="<?php echo $Full_Name; ?>">
                                <span class="error"><?php echo $Full_NameErr; ?></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Date_of_Birth">Дата рождения:</label>
                                <input type="date" class="form-control" id="Date_of_Birth" name="Date_of_Birth" required
                                    placeholder="Введите дата рождения" value="<?php echo $Date_of_Birth; ?>">
                                <span class="error"><?php echo $Date_of_BirthErr; ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Place_of_Birth">Место рождения:</label>
                                <input type="text" class="form-control" id="Place_of_Birth" name="Place_of_Birth"
                                    required placeholder="Введите место рождения "
                                    value="<?php echo $Place_of_Birth; ?>">
                                <span class="error"><?php echo $Place_of_BirthErr; ?></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Position_Id">Должность:</label>
                                <select class="form-control" id="Position_Id" name="Position_Id">
                                    <option value="">Выберите должность</option>
                                    <?php
        // SELECT query
        require_once "../conn.php";
        $sql = "SELECT Position_Id, Position_Name FROM positions";

        // Execute query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Check if the position id matches the selected value
                $selected = ($row["Position_Id"] == $Position_Id) ? "selected" : "";
                echo "<option value='" . $row["Position_Id"] . "' " . $selected . ">" . $row["Position_Name"] . "</option>";
            }
        }
        ?>
                                </select>
                                <span class="error"><?php echo $Position_IdErr; ?></span>
                            </div>


                            <div class="form-group mb-3">
                                <label class="form-label">Степень</label>
                                <select class="form-select" id="Degree_Id" name="Degree_Id" required>
                                    <option disabled selected>Выберите степень</option>
                                    <?php
        // SELECT query
        $sql = "SELECT Degree_Id, Degree_Name FROM degrees";

        // Execute query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["Degree_Id"] . "'>" . $row["Degree_Name"] . "</option>";
            }
        }
        ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Факультет</label>
                                <select class="form-select" id="Faculty_Id" name="Faculty_Id" required>
                                    <option disabled selected>Выберите факультет</option>
                                    <?php
        // SELECT query
        $sql = "SELECT Faculty_Id, Faculty_Name FROM faculties";

        // Execute query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["Faculty_Id"] . "'>" . $row["Faculty_Name"] . "</option>";
            }
        }
        ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Кафедра</label>
                                <select class="form-select" id="Department_Id" name="Department_Id" required>
                                    <option disabled selected>Выберите кафедру</option>
                                    <?php
        // SELECT query
        $sql = "SELECT Department_Id, Department_Name FROM departments";

        // Execute query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["Department_Id"] . "'>" . $row["Department_Name"] . "</option>";
            }
        }
        ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Роль пользователя</label>
                                <select class="form-select" id="User_Role_Id" name="User_Role_Id" required>
                                    <option disabled selected>Выберите роль пользователя</option>
                                    <?php
        // SELECT query
        $sql = "SELECT User_Role_Id, User_Type FROM user_roles";

        // Execute query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["User_Role_Id"] . "'>" . $row["User_Type"] . "</option>";
            }
        }
        ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Email">Email:</label>
                                <input type="Email" class="form-control" id="Email" name="Email" required
                                    placeholder="Введите email" value="<?php echo $Email; ?>">
                                <span class="error"><?php echo $EmailErr; ?></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Phone_Number">Номер телефона:</label>
                                <input type="text" class="form-control" id="Phone_Number" name="Phone_Number" required
                                    placeholder="Введите номер телефона" value="<?php echo $Phone_Number; ?>">
                                <span class="error"><?php echo $Phone_NumberErr; ?></span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Employee_Number">Табельный номер:</label>
                                <input type="text" class="form-control" id="Employee_Number" name="Employee_Number"
                                    required placeholder="Введите табельный номер"
                                    value="<?php echo $Employee_Number; ?>">
                                <span class="error"><?php echo $Employee_NumberErr; ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Username">Логин:</label>
                                <input type="Username" class="form-control" id="Username" name="Username" required
                                    placeholder="Введите login" value="<?php echo $Username; ?>">
                                <span class="error"><?php echo $UsernameErr; ?></span>
                            </div>
                            <div>

                                <div class="form-group mb-3">
                                    <label for="Password">Пароль:</label>
                                    <input type="Password" class="form-control" id="Password" name="Password" required
                                        placeholder="Введите пароль" value="<?php echo $Password; ?>">
                                    <span class="error"><?php echo $PasswordErr; ?></span>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        formaction="add-emp.php">Добавить</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    <?php 
include_once "footer.php";
?>