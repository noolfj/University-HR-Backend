<?php 
$Username_Err = $pass_err = $login_Err = "";
$Username = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_REQUEST["Username"])) {
        $Username_Err = " <p style='color:red'> * Email Can Not Be Empty</p> ";
    } else {
        $Username = $_REQUEST["Username"];
    }

    if (empty($_REQUEST["Password"])) {
        $pass_err = " <p style='color:red'> * Password Can Not Be Empty</p> ";
    } else {
        $pass = $_REQUEST["Password"];
    }

    if (!empty($Username) && !empty($pass)) {

        // database connection
        require_once "conn.php";

        $sql_query = "SELECT * FROM employees WHERE Username='$Username' AND Password='$pass'";
        $result = mysqli_query($conn, $sql_query);

        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                session_start();
                session_unset();
                $_SESSION["Username"] = $rows["Username"];
                $_SESSION["Employee_Id"] = $rows["Employee_Id"]; // Save Employee_Id to session
                
                // Проверка роли пользователя
                if ($rows["User_Role_Id"] === "1") {
                    header("Location: Admin/index.php?login-success");
                    exit;
                } elseif ($rows["User_Role_Id"] === "5") {
                    header("Location: Director/index.php?login-success");
                    exit;
                } elseif ($rows["User_Role_Id"] === "4") {
                    header("Location: HR/index.php?login-success");
                    exit;
                } elseif ($rows["User_Role_Id"] === "2") {
                    header("Location: Personal/index.php?login-success");
                    exit;
                } else {
                    // Обработка неизвестной роли
                    $login_Err = "<div class='alert alert-danger alert-dismissible fade show'>
                                    <strong>Unknown role!</strong>
                                    <button type='button' class='close' data-dismiss='alert'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                }
            }
        } else {
            // Пользователь не найден
            $login_Err = "<div class='alert alert-warning alert-dismissible fade show'>
                            <strong>Invalid Email/Password</strong>
                            <button type='button' class='close' data-dismiss='alert'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Главная страница</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="../assets/images/error-img.png">
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        h2 {
            font-family: times, sans-serif; /* Замените Arial на нужный вам шрифт */
        }
    </style>
    <h2 class="text-center text-black">Управление персоналом в учебном заведении</h2>
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <p class="text-white-50 mb-0">Добро пожаловать!</p>
                                <a class="logo logo-admin mt-4">
                                    <img src="../assets/images/logoEX.png" alt="Логотип" height="48">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="Username">Логин</label>
                                        <input type="text" class="form-control" value="<?php echo $Username; ?>" name="Username" placeholder="Введите логин">
                                        <?php echo $Username_Err; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Пароль</label>
                                        <input type="Password" class="form-control" id="Password" name="Password" placeholder="Введите пароль">
                                        <?php echo $pass_err; ?>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="signin">Войти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="../assets/libs/jquery/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/libs/node-waves/waves.min.js"></script>
    <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/libs/jszip/jszip.min.js"></script>
    <script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/js/pages/datatables.init.js"></script>
    <script src="../assets/js/app.js"></script>
</body>
</html>
