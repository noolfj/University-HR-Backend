<?php
require_once "header.php";
require_once "../conn.php";

// Получаем Employee_Id из параметра URL
$employeeId = $_GET['employeeId'] ?? null;

if ($employeeId === null) {
    die("Ошибка: не указан идентификатор сотрудника.");
}

// Подключаемся к базе данных
$conn = new mysqli($servername, $username, $password, $database);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Запрос к базе данных для получения значения из таблицы emp_rating_vazorat
$sql = "SELECT 
            omusgor1_1, 
            omusgor1_2, 
            omusgor1_3, 
            omusgor1_4, 
            omusgor1_5, 
            omusgor1_6, 
            omusgor1_7, 
            omusgor1_8, 
            omusgor2_1, 
            omusgor2_2, 
            omusgor2_3, 
            omusgor2_4, 
            omusgor2_5, 
            omusgor2_6,
            omusgor3_1, 
            omusgor3_2, 
            omusgor3_3, 
            omusgor3_4, 
            omusgor3_5, 
            omusgor3_6, 
            omusgor3_7, 
            omusgor3_8, 
            omusgor3_9, 
            omusgor3_10, 
            omusgor3_11, 
            omusgor4_1, 
            omusgor4_2, 
            omusgor4_3, 
            omusgor4_4, 
            omusgor4_5, 
            omusgor4_6, 
            omusgor4_7, 
            omusgor5_1, 
            omusgor5_2, 
            omusgor5_3, 
            omusgor5_4, 
            omusgor5_5, 
            omusgor5_6, 
            omusgor5_7, 
            omusgor5_8, 
            omusgor5_9, 
            omusgor5_10, 
            omusgor5_11 
        FROM emp_rating_vazorat 
        WHERE Employee_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId); // This line binds one variable
$stmt->execute();
$stmt->store_result();

// Инициализируем переменную для значения по умолчанию
$omusgor1_1_default = 0;
$omusgor1_2_default = 0;
$omusgor1_3_default = 0;
$omusgor1_4_default = 0;
$omusgor1_5_default = 0;
$omusgor1_6_default = 0;
$omusgor1_7_default = 0;
$omusgor1_8_default = 0;
$omusgor2_1_default = 0;
$omusgor2_2_default = 0;
$omusgor2_3_default = 0;
$omusgor2_4_default = 0;
$omusgor2_5_default = 0;
$omusgor2_6_default = 0;
$omusgor2_6_default = 0;
$omusgor3_1_default = 0;
$omusgor3_2_default = 0;
$omusgor3_3_default = 0;
$omusgor3_4_default = 0;
$omusgor3_5_default = 0;
$omusgor3_6_default = 0;
$omusgor3_7_default = 0;
$omusgor3_8_default = 0;
$omusgor3_9_default = 0;
$omusgor3_10_default = 0;
$omusgor3_11_default = 0;
$omusgor4_1_default = 0;
$omusgor4_2_default = 0;
$omusgor4_3_default = 0;
$omusgor4_4_default = 0;
$omusgor4_5_default = 0;
$omusgor4_6_default = 0;
$omusgor4_7_default = 0;
$omusgor5_1_default = 0;
$omusgor5_2_default = 0;
$omusgor5_3_default = 0;
$omusgor5_4_default = 0;
$omusgor5_5_default = 0;
$omusgor5_6_default = 0;
$omusgor5_7_default = 0;
$omusgor5_8_default = 0;
$omusgor5_9_default = 0;
$omusgor5_10_default = 0;
$omusgor5_11_default = 0;

// Если запись существует, получаем значение из результата запроса
if ($stmt->num_rows > 0) {
    $stmt->bind_result(
        $omusgor1_1_value, 
        $omusgor1_2_value, 
        $omusgor1_3_value, 
        $omusgor1_4_value, 
        $omusgor1_5_value, 
        $omusgor1_6_value, 
        $omusgor1_7_value, 
        $omusgor1_8_value, 
        $omusgor2_1_value, 
        $omusgor2_2_value, 
        $omusgor2_3_value, 
        $omusgor2_4_value, 
        $omusgor2_5_value, 
        $omusgor2_6_value, 
        $omusgor3_1_value, 
        $omusgor3_2_value, 
        $omusgor3_3_value, 
        $omusgor3_4_value, 
        $omusgor3_5_value, 
        $omusgor3_6_value, 
        $omusgor3_7_value, 
        $omusgor3_8_value, 
        $omusgor3_9_value, 
        $omusgor3_10_value, 
        $omusgor3_11_value, 
        $omusgor4_1_value, 
        $omusgor4_2_value, 
        $omusgor4_3_value, 
        $omusgor4_4_value, 
        $omusgor4_5_value, 
        $omusgor4_6_value, 
        $omusgor4_7_value, 
        $omusgor5_1_value, 
        $omusgor5_2_value, 
        $omusgor5_3_value, 
        $omusgor5_4_value, 
        $omusgor5_5_value, 
        $omusgor5_6_value, 
        $omusgor5_7_value, 
        $omusgor5_8_value, 
        $omusgor5_9_value, 
        $omusgor5_10_value, 
        $omusgor5_11_value
    );
    $stmt->fetch();
    $omusgor1_1_default = $omusgor1_1_value;
    $omusgor1_2_default = $omusgor1_2_value;
    $omusgor1_3_default = $omusgor1_3_value;
    $omusgor1_4_default = $omusgor1_4_value;
    $omusgor1_5_default = $omusgor1_5_value;
    $omusgor1_6_default = $omusgor1_6_value;
    $omusgor1_7_default = $omusgor1_7_value;
    $omusgor1_8_default = $omusgor1_8_value;
    $omusgor2_1_default = $omusgor2_1_value;
    $omusgor2_2_default = $omusgor2_2_value;
    $omusgor2_3_default = $omusgor2_3_value;
    $omusgor2_4_default = $omusgor2_4_value;
    $omusgor2_5_default = $omusgor2_5_value;
    $omusgor2_6_default = $omusgor2_6_value;
    $omusgor3_1_default = $omusgor3_1_value;    
    $omusgor3_2_default = $omusgor3_2_value;
    $omusgor3_3_default = $omusgor3_3_value;
    $omusgor3_4_default = $omusgor3_4_value;
    $omusgor3_5_default = $omusgor3_5_value;
    $omusgor3_6_default = $omusgor3_6_value;
    $omusgor3_7_default = $omusgor3_7_value;
    $omusgor3_8_default = $omusgor3_8_value;
    $omusgor3_9_default = $omusgor3_9_value;
    $omusgor3_10_default = $omusgor3_10_value;
    $omusgor3_11_default = $omusgor3_11_value;
    $omusgor4_1_default = $omusgor4_1_value;
    $omusgor4_2_default = $omusgor4_2_value;
    $omusgor4_3_default = $omusgor4_3_value;
    $omusgor4_4_default = $omusgor4_4_value;
    $omusgor4_5_default = $omusgor4_5_value;
    $omusgor4_6_default = $omusgor4_6_value;
    $omusgor4_7_default = $omusgor4_7_value;
    $omusgor5_1_default = $omusgor5_1_value;
    $omusgor5_2_default = $omusgor5_2_value;
    $omusgor5_3_default = $omusgor5_3_value;
    $omusgor5_4_default = $omusgor5_4_value;
    $omusgor5_5_default = $omusgor5_5_value;
    $omusgor5_6_default = $omusgor5_6_value;
    $omusgor5_7_default = $omusgor5_7_value;
    $omusgor5_8_default = $omusgor5_8_value;
    $omusgor5_9_default = $omusgor5_9_value;
    $omusgor5_10_default = $omusgor5_10_value;
    $omusgor5_11_default = $omusgor5_11_value;
    

}

$stmt->close();
$conn->close();
?>


<style>
/* Стили для элементов input */


/* Стили для центрирования текста в таблице */
.table {
    text-align: center;
    /* Выравнивание всего текста в таблице по центру */
}

.table th,
.table td {
    vertical-align: middle;
    /* Центрирование содержимого ячеек по вертикали */
}
</style>

<div class="main-content">
    <div class="page-content">
        <!-- Ваш код для отображения страницы -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Рейтинг сотрудника</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Рейтинг</h3>
                        <form id="ratingForm" action="save_plans.php" method="post">
                            <!-- Передаем Employee_Id в скрытом поле формы -->
                            <input type="hidden" name="Employee_Id" value="<?php echo $employeeId; ?>">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered border-2">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%; background-color: #1240AB; color: white;">№</th>
                                            <th style="width: 40%; background-color: #1240AB; color: white;">Ҷабҳаҳои
                                                фаъолият</th>
                                            <th style="width: 25%; background-color: #1240AB; color: white;">Шарҳ</th>
                                            <th style="width: 10%; background-color: #1240AB; color: white;">Баллҳо</th>
                                            <th style="width: 5%; background-color: #1240AB; color: white;">Омӯзгор</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <th style="width: 30%; background-color: #4671D5; color: white;" colspan="2">
                                            1.Фаъолияти таълимӣ</th>
                                        <th style="width: 15%; background-color: #4671D5; color: white;" colspan="3">то
                                            20
                                            балл</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="5">1.1</td>
                                            <td rowspan="5">Китоби дарсӣ бо мӯҳри ВМИ ҶТ, миқдор</td>
                                            <td>&ge; 5</td>
                                            <td style="color: red;">5,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_1" name="omusgor1_1" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_1_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor1_1_default == 1) echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($omusgor1_1_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor1_1_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($omusgor1_1_default == 4) echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($omusgor1_1_default == 5) echo "selected"; ?>>5</option>
                                                    <option value="5.5" <?php if ($omusgor1_1_default == 5.5) echo "selected"; ?>>5,5</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>аз 3 то 4</td>
                                            <td style="color: red;">4</td>
                                        </tr>
                                        <tr>
                                            <td>аз 1 то 2</td>
                                            <td style="color: red;">2</td>
                                        </tr>
                                    </tbody>
                               
                                    <tbody>
                                        <tr>
                                            <td rowspan="5">1.2</td>
                                            <td rowspan="5">Ғолибият дар озмун ва мусобиқаҳои тахассусӣ (сертификат,
                                                маводи
                                                тасдиқкунанда)</td>
                                            <td>Сатҳи душвор</td>
                                            <td style="color: red;">3,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_2" name="omusgor1_2" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_2_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="3" <?php if ($omusgor1_2_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="3.5" <?php if ($omusgor1_2_default == 3.5) echo "selected"; ?>>3,5</option>
                                                </select><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>бокимонда</td>
                                            <td style="color: red;">3</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">1.3</td>
                                            <td rowspan="5">Китоби дарсӣ ва дастури таълимӣ , ҷ.ч.</td>
                                            <td>>8, нашршуда</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_3" name="omusgor1_3" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_3_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="2" <?php if ($omusgor1_3_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor1_3_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($omusgor1_3_default == 4) echo "selected"; ?>>4</option>
                                                </select>
                                        </tr>

                                        <tr>
                                            <td>≤8, нашршуда</td>
                                            <td style="color: red;">3</td>
                                        </tr>
                                        <tr>
                                            <td>Аз ШТМ гузашта</td>
                                            <td style="color: red;">2</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">1.4</td>
                                            <td rowspan="5">Маводи таълимӣ-методӣ (маводҳои дарсҳои озмоиши ва
                                                мустақилона),
                                                ҷ.ч.</td>
                                            <td>>6, нашршуда</td>
                                            <td style="color: red;">2,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_4" name="omusgor1_4" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_4_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor1_4_default == 1.5) echo "selected"; ?>>1,5</option>
                                                    <option value="2" <?php if ($omusgor1_4_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="2.5" <?php if ($omusgor1_4_default == 2.5) echo "selected"; ?>>2,5</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>≤6, нашршуда </td>
                                            <td style="color: red;">2</td>
                                        </tr>
                                        <tr>
                                            <td>Аз ШТМ гузашта</td>
                                            <td style="color: red;">1,5</td>
                                        </tr>
                                    </tbody>


                                    <tbody>
                                        <tr>
                                            <td>1.5</td>
                                            <td>Истифодаи усулҳои интерактивии дарсдиҳӣ (бозиҳои корӣ, кор дар гурӯҳҳои
                                                хурд, мусобиқаҳои даставӣ ва ғайра)</td>
                                            <td>Ташрифоварӣ, силлабус</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_5" name="omusgor1_5" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_5_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor1_5_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>


                                    <tbody>
                                        <tr>
                                            <td rowspan="5">1.6</td>
                                            <td rowspan="5">Омодагии методӣ ва ташкилӣ ба дарс (ташрифоварӣ)</td>
                                            <td>Тахтаи электронӣ</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_6" name="omusgor1_6" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_6_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor1_6_default == 0.5) echo "selected"; ?>>0,5</option>
                                                    <option value="1" <?php if ($omusgor1_6_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                        <tr>
                                            <td>Малакаи кор бо компютер презентатсияи машғулият</td>
                                            <td style="color: red;">0,5</td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>1.7</td>
                                            <td>Ҳамгироии фаъолияти омӯзгор ва стейкхолдерон дар раванди таълим</td>
                                            <td>Сӯҳбат, шартнома,силлабус</td>
                                            <td style="color: red;">0,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_7" name="omusgor1_7" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_7_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor1_7_default == 0.5) echo "selected"; ?>>0,5</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">1.8</td>
                                            <td rowspan="5">Натиҷаи супоридани имтиҳон аз фанни худ</td>
                                            <td>≥75%</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                            <select id="omusgor1_8" name="omusgor1_8" class="form-select">
                                                    <option value="0" <?php if ($omusgor1_8_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="2" <?php if ($omusgor1_8_default == 2) echo "selected"; ?>>2</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Боқимонда</td>
                                            <td style="color: red;">0</td>
                                        </tr>

                                    </tbody>
                                    <thead>
                                        <th style="width: 30%; background-color: #4671D5; color: white;" colspan="2">
                                            2. Фаъолияти илмӣ</th>
                                        <th style="width: 15%; background-color: #4671D5; color: white;" colspan="3">то
                                            23
                                            балл</th>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">2.1</td>
                                            <td rowspan="5">Иқтибосоварӣ аз рӯи Хирш </td>
                                            <td>≥3</td>
                                            <td style="color: red;">5</td>
                                            <td rowspan="5">
                                            <select id="omusgor2_1" name="omusgor2_1" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_1_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="3" <?php if ($omusgor2_1_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($omusgor2_1_default == 4) echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($omusgor2_1_default == 5) echo "selected"; ?>>5</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>2 </td>
                                            <td style="color: red;">4</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td style="color: red;">3</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">2.2</td>
                                            <td rowspan="5">Мақолаҳо дар маҷаллаҳои байналмилалии низоми Scopus, WoS ё 5
                                                РИНЦ (мақола, мавод) =1балл </td>
                                            <td>Scopus, WoS</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor2_2" name="omusgor2_2" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_2_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor2_2_default == 1) echo "selected"; ?>>1</option>
                                                    <option value="4" <?php if ($omusgor2_2_default == 4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>≤5</td>
                                            <td style="color: red;">1</td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">2.3</td>
                                            <td rowspan="5">Монография, монографияи коллективӣ </td>
                                            <td>≥2</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor2_3" name="omusgor2_3" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_3_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="3" <?php if ($omusgor2_3_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($omusgor2_3_default == 4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td style="color: red;">3</td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">2.4</td>
                                            <td rowspan="5">Мақолаҳо дар маҷаллаҳои КОА/ Паёми донишкада (нашршуда)
                                            </td>
                                            <td>≥4 КОА</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor2_4" name="omusgor2_4" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_4_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="2" <?php if ($omusgor2_4_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor2_4_default == 3) echo "selected"; ?>>3</option>
                                                    <option value="3.5" <?php if ($omusgor2_4_default == 3.5) echo "selected"; ?>>3,5</option>
                                                    <option value="4" <?php if ($omusgor2_4_default == 4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>2-3 КОА </td>
                                            <td style="color: red;">3,5</td>
                                        </tr>
                                        <tr>
                                            <td>≥ 3 ДПДТТ</td>
                                            <td style="color: red;">3</td>
                                        </tr>
                                        <tr>
                                            <td>1 КОА ё 1-2 ДПДТТ </td>
                                            <td style="color: red;">2</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td style="color: red;">3</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">2.5</td>
                                            <td rowspan="5">Мавзӯи илмии кафедраро фарогирии мақолаҳо</td>
                                            <td>Сатҳи байналмиллалӣ, КОА</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor2_5" name="omusgor2_5" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_5_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor2_5_default == 1) echo "selected"; ?>>1</option>
                                                    <option value="1.5" <?php if ($omusgor2_5_default == 1.5) echo "selected"; ?>>1.5</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Сатҳи ҷумҳуриявӣ</td>
                                            <td style="color: red;">1</td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                     
                                            <td rowspan="5">2.6</td>
                                            <td rowspan="5">Мушовирӣ ба рисолаи докторон, роҳбарӣ ба докторони PhD ва
                                                номзадҳои илм</td>
                                            <td>Мушовирӣ</td>
                                            <td style="color: red;">4,5</td>
                                            <td rowspan="5">
                                          
                                            <select id="omusgor2_6" name="omusgor2_6" class="form-select">
                                                    <option value="0" <?php if ($omusgor2_6_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="4" <?php if ($omusgor2_6_default == 4) echo "selected"; ?>>4</option>
                                                    <option value="4.5" <?php if ($omusgor2_6_default == 4.5) echo "selected"; ?>>4.5</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Роҳбарӣ</td>
                                            <td style="color: red;">4</td>
                                        </tr>

                                    </tbody>

                                    <thead>
                                        <th style="width: 30%; background-color: #4671D5; color: white;" colspan="2">
                                            3. Фаъолияти сиёсӣ-тарбиявӣ</th>
                                        <th style="width: 15%; background-color: #4671D5; color: white;" colspan="3">то
                                            17
                                            балл</th>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">3.1</td>
                                            <td rowspan="5">Балли миёнаи фаъолияти куратории омӯзгор</td>
                                            <td>≥3</td>
                                            <td style="color: red;">3</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_1" name="omusgor3_1" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_1_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor3_1_default == 0.5) echo "selected"; ?>>0,5</option>
                                                    <option value="2" <?php if ($omusgor3_1_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor3_1_default == 3) echo "selected"; ?>>3</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>аз 2 то 3</td>
                                            <td style="color: red;">2</td>
                                        </tr>
                                        <tr>
                                            <td>≤2</td>
                                            <td style="color: red;">0,5</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">3.2</td>
                                            <td rowspan="5">Фаъолнокии назаррас дар корҳои тарбиявӣ-сиёсӣ (миқдори
                                                мақола ва
                                                вокунишҳо)</td>
                                            <td>≥10</td>
                                            <td style="color: red;">2,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_2" name="omusgor3_2" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_2_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="2" <?php if ($omusgor3_2_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="2.5" <?php if ($omusgor3_2_default == 2.5) echo "selected"; ?>>2,5</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>&lt;10 </td>
                                            <td style="color: red;">2</td>
                                        </tr>

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>3.3</td>
                                            <td>Иҷроиши супоришҳо нисбати фаъолияти тарбиявӣ-сиёсӣ (чорабиниҳо)</td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_3" name="omusgor3_3" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_3_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_3_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.4</td>
                                            <td>Аъзогии гурӯҳи ташвиқотӣ-тарғиботӣ</td>
                                            <td>-</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_4" name="omusgor3_4" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_4_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor3_4_default == 1.5) echo "selected"; ?>>1,5</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">3.5</td>
                                            <td rowspan="5">Ҷалби довталабон, миқдор</td>
                                            <td>≥20</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_5" name="omusgor3_5" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_5_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_5_default == 1) echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($omusgor3_5_default == 2) echo "selected"; ?>>2</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>&lt;20 </td>
                                            <td style="color: red;">1</td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.6</td>
                                            <td>Иҷроиши навбатдорӣ (даромадгоҳи асосӣ, факултет, хобгоҳ, навбатдории
                                                шабонарӯзӣ) </td>
                                            <td>≥90%-и нақша</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_6" name="omusgor3_6" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_6_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor3_6_default == 1.5) echo "selected"; ?>>1,5</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.7</td>
                                            <td>Ташкил ва гузаронидани маҳфилҳо, чорабиниҳо, озмун ва мусобиқаҳои
                                                ташаббусӣ
                                                барои донишҷӯён </td>
                                            <td>-</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_7" name="omusgor3_7" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_7_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor3_7_default == 1.5) echo "selected"; ?>>1,5</option>
                                                </select><br>
                                        </tr>

                                    </tbody>


                                    <tbody>
                                        <tr>
                                            <td>3.8</td>
                                            <td>Иштирок дар чорабиниҳо мутобиқи талаботи муайяншуда (варзишӣ, фарҳангӣ,
                                                сиёсӣ, ҷамъиятӣ) </td>
                                            <td>≥90%-и нақша</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_8" name="omusgor3_8" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_8_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_8_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.9</td>
                                            <td>Дараҷаи омодагии донишҷӯ ба дарс мувофиқи қоидаҳои тартиботи дохилӣ
                                                (тафтиши
                                                шӯъбаи тарбия ва садорати факултет) </td>
                                            <td>≥90%</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_9" name="omusgor3_9" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_9_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_9_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.10</td>
                                            <td>Сатҳи давомоти гуруҳ</td>
                                            <td>≥90%</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_10" name="omusgor3_10" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_10_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_10_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.11</td>
                                            <td>Волонтёрӣ дар корҳои тарбиявӣ-иҷтимоӣ</td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor3_11" name="omusgor3_11" class="form-select">
                                                    <option value="0" <?php if ($omusgor3_11_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor3_11_default == 1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                    </tbody>

                                    <thead>
                                        <th style="width: 30%; background-color: #4671D5; color: white;" colspan="2">
                                            4. Натиҷаҳои таҳсилот</th>
                                        <th style="width: 15%; background-color: #4671D5; color: white;" colspan="3">то
                                            20
                                            балл</th>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.1</td>
                                            <td rowspan="5">Дараҷаи азхудшавии фан дар гурӯҳ (дониши боқимонда), %</td>
                                            <td>≥75</td>
                                            <td style="color: red;">6</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_1" name="omusgor4_1" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_1_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="5" <?php if ($omusgor4_1_default == 5) echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if ($omusgor4_1_default == 6) echo "selected"; ?>>6</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>50 то 75</td>
                                            <td style="color: red;">5</td>
                                        </tr>

                                        <tr>
                                            <td>&lt;50</td>
                                            <td style="color: red;">0</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.2</td>
                                            <td rowspan="5">Балли миёнаи омӯзгор аз рӯи пурсишномаи донишҷӯ</td>
                                            <td>≥3,5</td>
                                            <td style="color: red;">3</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_2" name="omusgor4_2" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_2_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor4_2_default == 0.5) echo "selected"; ?>>0,5</option>
                                                    <option value="2" <?php if ($omusgor4_2_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor4_2_default ==3) echo "selected"; ?>>3</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>аз 2 то 3,5</td>
                                            <td style="color: red;">2</td>
                                        </tr>

                                        <tr>
                                            <td>1 то 2</td>
                                            <td style="color: red;">0,5</td>
                                        </tr>
                                        <tr>
                                            <td>&lt;1</td>
                                            <td style="color: red;">0</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.3</td>
                                            <td rowspan="5">Балли миёнаи ташрифоварии омӯзгорон ва экспертон</td>
                                            <td>≥3,5</td>
                                            <td style="color: red;">3</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_3" name="omusgor4_3" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_3_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor4_3_default == 0.5) echo "selected"; ?>>0,5</option>
                                                    <option value="2" <?php if ($omusgor4_3_default == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor4_3_default ==3) echo "selected"; ?>>3</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>аз 2 то 3,5</td>
                                            <td style="color: red;">2</td>
                                        </tr>

                                        <tr>
                                            <td>1 то 2</td>
                                            <td style="color: red;">0,5</td>
                                        </tr>
                                        <tr>
                                            <td>&lt;1</td>
                                            <td style="color: red;">0</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.4</td>
                                            <td rowspan="5">Сифати рисолаҳои магистрӣ ва бакалаврӣ</td>
                                            <td>Натиҷаҳо</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_4" name="omusgor4_4" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_4_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor4_4_default == 1) echo "selected"; ?>>1</option>
                                                    <option value="1.5" <?php if ($omusgor4_4_default == 1.5) echo "selected"; ?>>1,5</option>
                                                    <option value="2" <?php if ($omusgor4_4_default ==2) echo "selected"; ?>>2</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Таркиби кор</td>
                                            <td style="color: red;">1,5</td>
                                        </tr>

                                        <tr>
                                            <td>Ном ва мундариҷа</td>
                                            <td style="color: red;">1</td>
                                        </tr>
                                        <tr>
                                            <td>Риояи меъёр</td>
                                            <td style="color: red;">0</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.5</td>
                                            <td rowspan="5">Сифати корҳои мустақилонаи назоратшавандаи фанҳо</td>
                                            <td>Натиҷаҳо</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_5" name="omusgor4_5" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_5_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor4_5_default == 1.5) echo "selected"; ?>>1,5</option>
                                                    <option value="2" <?php if ($omusgor4_5_default ==2) echo "selected"; ?>>2</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Таркиби кор</td>
                                            <td style="color: red;">1,5</td>
                                        </tr>

                                        <tr>
                                            <td>Ном ва мундариҷа</td>
                                            <td style="color: red;">1</td>
                                        </tr>
                                        <tr>
                                            <td>Риояи меъёр</td>
                                            <td style="color: red;">0</td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.6</td>
                                            <td rowspan="5">Пешрафти гурӯҳ аз рӯи кӯшиши 1</td>
                                            <td>≥75%</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_6" name="omusgor4_6" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_6_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor4_6_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Боқимонда</td>
                                            <td style="color: red;">0</td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">4.7</td>
                                            <td rowspan="5">Роҳбарӣ ба омодасозии ғолибияти донишҷӯ дар Озмунҳои фаннӣ
                                                ва
                                                соҳавии ҷумҳуриявӣ </td>
                                            <td>Ҷои 1</td>
                                            <td style="color: red;">3</td>
                                            <td rowspan="5">
                                            <select id="omusgor4_7" name="omusgor4_7" class="form-select">
                                                    <option value="0" <?php if ($omusgor4_7_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor4_7_default ==1) echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($omusgor4_7_default ==2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($omusgor4_7_default ==3) echo "selected"; ?>>3</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Ҷои 2</td>
                                            <td style="color: red;">2</td>
                                        </tr>

                                        <tr>
                                            <td>Ҷои 3</td>
                                            <td style="color: red;">1</td>
                                        </tr>

                                    </tbody>

                                    <thead>
                                        <th style="width: 30%; background-color: #4671D5; color: white;" colspan="2">
                                            5.Намудҳои дигари фаъолият</th>
                                        <th style="width: 15%; background-color: #4671D5; color: white;" colspan="3">то
                                            20
                                            балл</th>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.1</td>
                                            <td rowspan="5">Ҷалби маблағҳои гранти байналмиллалӣ ва ҷумҳуриявӣ барои
                                                рушди
                                                донишкада </td>
                                            <td>-</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_1" name="omusgor5_1" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_1_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="4" <?php if ($omusgor5_1_default ==4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.2</td>
                                            <td rowspan="5">Иҷрокунандаи гранти байналмиллалӣ ва ҷумҳуриявӣ барои рушди
                                                донишкада </td>
                                            <td>-</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_2" name="omusgor5_2" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_2_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="4" <?php if ($omusgor5_2_default ==4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.3</td>
                                            <td rowspan="5">Ҷалби маблағ ба технопарк</td>
                                            <td>-</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_3" name="omusgor5_3" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_3_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1.5" <?php if ($omusgor5_3_default ==1.5) echo "selected"; ?>>1,5</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.4</td>
                                            <td rowspan="5">Мусоидат ба сармоягузорӣ аз тарафи хатмкунандагон ва
                                                кордеҳон
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_4" name="omusgor5_4" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_4_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_4_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.5</td>
                                            <td rowspan="5">Ташкил ва гузаронидани курсҳои кӯтоҳмуддат, кор бо коромӯзон
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_5" name="omusgor5_5" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_5_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_5_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.6</td>
                                            <td rowspan="5">Санад оиди ҷоришавии навоварӣ дар истеҳсолот бо патент (аз
                                                он
                                                ҷумла ихтироъ, навоварӣ, шаҳодатномаи зеҳнӣ ва нахустпатент), миқдор
                                            </td>
                                            <td>Санад+патент</td>
                                            <td style="color: red;">4</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_6" name="omusgor5_6" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_6_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_6_default ==1) echo "selected"; ?>>1</option>
                                                    <option value="3" <?php if ($omusgor5_6_default ==3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($omusgor5_6_default ==4) echo "selected"; ?>>4</option>
                                                </select><br>
                                        </tr>

                                        <tr>
                                            <td>Дигарҳо ≥3 </td>
                                            <td style="color: red;">3</td>
                                        </tr>

                                        <tr>
                                            <td>Дигарҳо &lt;3 </td>
                                            <td style="color: red;">1</td>
                                        </tr>

                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.7</td>
                                            <td rowspan="5">Роҳбар, аъзои Шӯрои диссертатсионӣ ва сексияи ШД
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_7" name="omusgor5_7" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_7_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_7_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.8</td>
                                            <td rowspan="5">Дорандаи мукофоти давлатӣ ва унвон
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_8" name="omusgor5_8" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_8_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_8_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.9</td>
                                            <td rowspan="5">Таҷрибаомӯзии илмӣ/такмили ихтисос (сертификати ДМТ) ва
                                                дорандаи
                                                гранти инфиродӣ
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_9" name="omusgor5_9" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_9_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_9_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.10</td>
                                            <td rowspan="5">Муқарризии расмии рисолаи илмӣ, маърузачигии пленарӣ дар
                                                конфронси илмӣ, раисии КАХ
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_10" name="omusgor5_10" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_10_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="1" <?php if ($omusgor5_10_default ==1) echo "selected"; ?>>1</option>
                                                </select><br>
                                        </tr>
                                    </tbody>
                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.11</td>
                                            <td rowspan="5">Аъзогии ҳайати таҳририяи маҷаллаҳо ва конфронсҳои илмии
                                                ҷумҳуриявӣ
                                            </td>
                                            <td>-</td>
                                            <td style="color: red;">0,5</td>
                                            <td rowspan="5">
                                            <select id="omusgor5_11" name="omusgor5_11" class="form-select">
                                                    <option value="0" <?php if ($omusgor5_11_default == 0) echo "selected"; ?>>0</option>
                                                    <option value="0.5" <?php if ($omusgor5_11_default ==0.5) echo "selected"; ?>>0,5</option>
                                                </select><br>
                                        </tr>
                                    </tbody>


                                </table>
                            </div>
                            <div class="text-center mt-3"> <!-- Add mt-3 (margin-top: 3) class -->
    <button type="submit" class="btn btn-success">Сохранить</button>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->


      
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fas fa-check-circle text-success me-2" id="successModalLabel"></h5>Успешно!
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <i ></i>Ваши данные успешно сохранены.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="redirectToIndex()">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
function redirectToIndex() {
    window.location.href = "index.php";
}

$(document).ready(function(){
    $('#ratingForm').submit(function(event){
        // Prevent default form submission
        event.preventDefault();
        
        // Serialize form data
        var formData = $(this).serialize();
        
        // Send AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: formData,
            success: function(response){
                // Show success modal
                $('#successModal').modal('show');
            }
        });
    });
});
</script>


<?php require_once "footer.php"; ?>
