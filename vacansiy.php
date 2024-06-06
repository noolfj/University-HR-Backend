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

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="../styles/css/bootstrap.min.css" rel="stylesheet">

        <link href="../styles/css/bootstrap-icons.css" rel="stylesheet">
        <link href="../styles/css/owl.carousel.min.css" rel="stylesheet">
        <link href="../styles/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../styles/css/tooplate-gotto-job.css" rel="stylesheet">
        

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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="hero-section-text mt-5">
                                <h1 class="hero-title text-white mt-4 mb-4">Онлайн платформа. <br> Лучший портал вакансий</h1>

                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <form class="custom-form hero-form" action="#" method="get" role="form">
                                <h3 class="text-white mb-3">Поиск</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                            <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Название вакансии" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">
                                         Найти работу
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <section class="job-section job-featured-section section-padding" id="job-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                            <h2>Вакансии</h2>
                        </div>

                        <div class="col-lg-12 col-12">
                          

                        <?php
require_once "conn.php"; // Подключение к базе данных

// Выполнение запроса к таблице vacancies
$sql = "SELECT * FROM vacancies";
$result = mysqli_query($conn, $sql);

// Проверка наличия данных
if (mysqli_num_rows($result) > 0) {
    // Вывод данных о вакансиях
    while ($row = mysqli_fetch_assoc($result)) {
        // Здесь вы можете использовать данные для заполнения соответствующих элементов на странице
        echo '<div class="job-thumb d-flex">';
        echo '<div class="job-image-wrap bg-white shadow-lg">';
        echo '<img src="assets/images/LogoEX.png" class="job-image img-fluid" alt="">';
        echo '</div>';
        echo '<div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">';
        echo '<div class="mb-3">';
        echo '<h4 class="job-title mb-lg-0">';
        echo '<a href="job-details.php?vacancy_id=' . $row["Vacancy_Id"] . '" class="job-title-link">' . $row["Vacancy_Title"] . '</a>';
        echo '</h4>';
        echo '<div class="d-flex flex-wrap align-items-center">';
        echo '<p class="job-location mb-0">';
        echo '<i class="custom-icon bi-geo-alt me-1"></i>';
        echo $row["Location"];
        echo '</p>';
        echo '<p class="job-date mb-0">';
        echo '<i class="custom-icon bi-clock me-1"></i>';
        echo $row["Created_At"];
        echo '</p>';
        echo '<p class="job-price mb-0">';
        echo '<i class="custom-icon bi-cash me-1"></i>';
        echo $row["Salary"];
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="job-section-btn-wrap">';
        echo '<button id="applicationButton1" class="btn btn-primary">Подать заявку</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Нет доступных вакансий.";
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>


                        </div>

                    </div>
                </div>
            </section>


            

            <div class="site-footer-bottom text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-lg-4 col-12">
                <p class="copyright-text">ХПИТТУ © 2024</p>
            </div>
        </div>
    </div>
    <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>
</div>

<script>

document.getElementById("applicationButton1").addEventListener("click", function() {
    window.open("https://docs.google.com/forms/d/e/1FAIpQLSdLiomYy5fefJzV0OykrYPcDfgptvgkoplGoo2M3MoBLMrLbA/viewform?usp=sf_link", "_blank");
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


       