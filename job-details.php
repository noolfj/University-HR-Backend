<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Вакансия</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">

    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">

    <link href="../styles/css/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../styles/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../styles/css/tooplate-gotto-job.css" rel="stylesheet">

    <!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
</head>

<body id="top">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center">
                <img src="assets/images/logoVAC.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <!-- <strong class="logo-text">HR</strong>
                        <small class="logo-slogan">University</small> -->
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="vacansiy.php">Главная страница</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Подробности о работе</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="vacansiy.php">Главная страница</a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Подробности о работе

                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


        <?php
// Подключение к базе данных
require_once "conn.php";

// Получение ID вакансии из URL
if (isset($_GET['vacancy_id'])) {
    $vacancy_id = $_GET['vacancy_id'];

    // Запрос к базе данных для получения данных о вакансии по ID
    $sql = "SELECT * FROM vacancies WHERE Vacancy_Id = $vacancy_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Если данные найдены, вывести их в соответствующих полях HTML
        $row = mysqli_fetch_assoc($result);
        ?>

        <!-- HTML разметка -->
        <section class="job-section section-padding pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h2 class="job-title mb-0"><?php echo $row['Vacancy_Title']; ?></h2>
                        <div class="job-thumb job-thumb-detail">
                            <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                                <p class="job-location mb-0">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    <?php echo $row['Location']; ?>
                                </p>
                                <p class="job-date mb-0">
                                    <i class="custom-icon bi-clock me-1"></i>
                                    <?php echo $row['Created_At']; ?>
                                </p>
                                <p class="job-price mb-0">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    <?php echo $row['Salary']; ?>
                                </p>
                            </div>
                            <h4 class="mt-4 mb-2">
                                Описание вакансии
                            </h4>
                            <p><?php echo $row['Description']; ?></p>
                            <h5 class="mt-4 mb-3">
                                Требования
                            </h5>
                            <ul>
                                <?php 
    // Разбиваем строку требований на массив по символу перевода строки
    $requirements_list = explode("\n", $row['Requirements']);
    
    // Выводим каждый элемент массива как отдельный пункт списка
    foreach ($requirements_list as $requirement) {
        echo "<li>$requirement</li>";
    }
    ?>
                            </ul>

                            <div class="text-center">
                                <button id="applicationButton1" class="btn btn-primary">Подать заявку</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Конец HTML разметки -->

        <?php
    } else {
        echo "Вакансия не найдена.";
    }
} else {
    echo "ID вакансии не указано в URL.";
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>



    </main>


    <div class="site-footer-bottom text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-lg-4 col-12">
                    <p class="copyright-text">ХПИТТУ © 2024</p>
                </div>
            </div>
        </div>
        <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center"
            href="#top"></a>
    </div>

    <script>
    document.getElementById("applicationButton1").addEventListener("click", function() {
        window.open(
            "https://docs.google.com/forms/d/e/1FAIpQLSdLiomYy5fefJzV0OykrYPcDfgptvgkoplGoo2M3MoBLMrLbA/viewform?usp=sf_link",
            "_blank");
    });

    document.getElementById("applicationButton2").addEventListener("click", function() {
        window.open(
            "https://docs.google.com/forms/d/e/1FAIpQLSdLiomYy5fefJzV0OykrYPcDfgptvgkoplGoo2M3MoBLMrLbA/viewform?usp=sf_link",
            "_blank");
    });
    </script>

    <!-- JAVASCRIPT FILES -->
    <script src="../styles/js/jquery.min.js"></script>
    <script src="../styles/js/bootstrap.min.js"></script>
    <script src="../styles/js/owl.carousel.min.js"></script>
    <script src="../styles/js/counter.js"></script>
    <script src="../styles/js/custom.js"></script>

</body>

</html>