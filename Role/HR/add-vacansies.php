<?php 
require_once "header.php";
require_once "add-vacn.php";
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
                    <h4 class="page-title mb-0 font-size-18">Вакансия</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Страницы</a></li>
                            <li class="breadcrumb-item active">Вакансия>
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
                        <h3>Добавить вакансию</h3>
                        <form id="vacancyForm" method="POST" action="add-vacn.php">
                            <div class="mb-3">
                                <label for="vacancyTitle" class="form-label">Название вакансии</label>
                                <input type="text" class="form-control" id="vacancyTitle" name="vacancyTitle" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание вакансии</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="requirements" class="form-label">Требования</label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Зарплата</label>
                                <input type="text" class="form-control" id="salary" name="salary" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Местоположение</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" formaction="add-vacn.php">Добавить
                                    вакансию</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <?php 
require_once "footer.php";
?>