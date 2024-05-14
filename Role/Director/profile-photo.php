<?php 
require_once "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_FILES["Path_Photo"]["name"];
    $temp_loc = $_FILES["Path_Photo"]["tmp_name"];
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_types = array("png", "jpg", "jpeg");

    if (in_array($extension, $allowed_types)) {
        $new_file_name = uniqid("", true) . '.' . $extension;
        $location = "../Personal/upload/" . $new_file_name;
        if (move_uploaded_file($temp_loc, $location)) {
            require_once "conn.php";
            $sql = "UPDATE employees SET Path_Photo = '$new_file_name' WHERE Username = '$_SESSION[Username]' ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>
                    $(document).ready(function(){
                        $('#showModal').modal('show');
                        $('#addMsg').text('Фотография успешно обновлена!!');
                        $('#linkBtn').attr('href', 'profile.php');
                        $('#linkBtn').text('Посмотреть профиль');
                        $('#closeBtn').text('Загрузить заново');
                    });
                </script>";
            } else {
                echo "<script>
                    $(document).ready(function(){
                        $('#showModal').modal('show');
                        $('#addMsg').text('Ошибка при обновлении фотографии!');
                        $('#linkBtn').hide();
                        $('#closeBtn').text('Ok, Understood');
                    });
                </script>";
            }
        }
    } else {
        echo "<script>
            $(document).ready(function(){
                $('#showModal').modal('show');
                $('#addMsg').text('Разрешены только файлы JPG, PNG и JPEG!!');
                $('#linkBtn').hide();
                $('#closeBtn').text('Ok, Understood');
            });
        </script>";
    }
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Изменить фото профиля</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="profile.php">Профиль</a></li>
                            <li class="breadcrumb-item active">Изменить фото профиля</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 25px;">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Фотография:</label>
                                <div>
                                    <input type="file" class="form-control" name="Path_Photo" required />
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Сохранить" class="btn btn-success waves-effect waves-light" name="save_changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "footer.php"; ?>
