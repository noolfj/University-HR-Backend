<?php 
require_once "header.php";
require_once "employ-leave.php";
?>

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Отправить заявку</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Заявка</a></li>
                            <li class="breadcrumb-item active">Отправить заявку</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <!-- Центрируем форму -->
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation mx-auto" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                            <h3>Отправить заявку</h3>
                            <div class="mb-3 row">
                                <label for="reason" class="col-md-2 col-form-label">Причина</label>
                                <div class="col-md-10">
                                    <select class="form-select" id="reason" name="reason">
                                        <option disabled selected>Выбрать</option>
                                        <option>Отпуск</option>
                                        <option>Командировка</option>
                                        <option>Больничный</option>
                                        <option>Увольнение</option>
                                    </select>
                                    <span class="error"><?php echo $reasonErr; ?></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="startdate" class="col-md-2 col-form-label">Дата начала</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" value="<?php echo $startdate; ?>" name="startDate">
                                    <?php echo $startdateErr; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="enddate" class="col-md-2 col-form-label">Дата окончания</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" value="<?php echo $enddate; ?>" name="endDate">
                                    <?php echo $enddateErr; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="comments" class="col-md-2 col-form-label">Комментарии</label>
                                <div class="col-md-10">
                                    <textarea required class="form-control" value="<?php echo $comments; ?>" name="comments" rows="5"></textarea>
                                    <?php echo $commentsErr; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
    <label for="file" class="col-md-2 col-form-label">Документ (PDF)</label>
    <div class="col-md-10">
        <input type="file" class="form-control" name="pdf_file" accept=".pdf" required />
        <span class="text-muted">Разрешены только PDF-файлы</span>
        <?php echo $pdf_fileErr; ?>
    </div>
</div>

                            <div class="text-center">
                                <!-- Центрируем кнопку -->
                                <input type="submit" value="Отправить" class="btn btn-primary" formaction="employ-leave.php" name="signin">
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
