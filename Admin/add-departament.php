<?php
require_once "header.php";
// Подключение к базе данных
require_once "add-depart.php";

?>
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Департамент</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Создать кафедру</h4>
                        <form id="createDepartmentForm" method="POST">
                            <div class="form-group">
                                <label for="departmentInput">Кафедра</label>
                                <input type="text" class="form-control" id="departmentInput" name="departmentInput"
                                    placeholder="Введите название кафедры">
                            </div>
                            <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <button class="btn btn-success" formaction="add-depart.php">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
require_once "footer.php";
?>