<?php
require_once "header.php";
// Подключение к базе данных
require_once "add-facul.php";

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
                        <h4>Создать факультет</h4>
                        <form id="createFacultyForm" method="POST">
                            <div class="form-group">
                                <label for="facultyInput">Факультет</label>
                                <input type="text" class="form-control" id="facultyInput" name="facultyInput"
                                    placeholder="Введите название факультета">
                            </div>
                            <div class="row mt-3 text-center">
                                <div class="col-12">
                                    <button class="btn btn-success" formaction="add-facul.php">Сохранить</button>
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