<?php
require_once "header.php";
require_once "../conn.php";

?>

<style>
/* Стили для элементов input */
input[type="number"] {
    width: 100px;
    /* Измените ширину по вашему усмотрению */
    padding: 15px;
    border: 1px solid #ced4da;
    /* Цвет рамки */
    border-radius: .25rem;
    /* Скругление углов */
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    /* Плавное изменение стилей */
}

/* Опциональные стили при фокусе */
input[type="number"]:focus {
    border-color: #80bdff;
    /* Цвет рамки при фокусе */
    outline: 0;
    /* Убираем стандартный контур при фокусе */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    /* Тень при фокусе */
}

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
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Планы сотрудников</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Таблица выполненных заданий -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Выполненные задания</h3>
                        <form id="ratingForm" action="save_ratings.php" method="post">
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
                                                <select id="omusgor" name="omusgor" class="form-select">
                                                    <option value="0" selected>0</option>
                                                    <option value="0.5">0.5</option>
                                                    <option value="1">1</option>
                                                    <option value="1.5">1.5</option>
                                                    <option value="2">2</option>
                                                    <option value="2.5">2.5</option>
                                                    <option value="3">3</option>
                                                    <option value="3.5">3.5</option>
                                                    <option value="4">4</option>
                                                    <option value="4.5">4.5</option>
                                                    <option value="5">5</option>
                                                    <option value="5.5">5.5</option>
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
                                                <select id="omusgor" name="omusgor" class="form-select">
                                                    <option value="0" selected>0</option>
                                                    <option value="0.5">0.5</option>
                                                    <option value="1">1</option>
                                                    <option value="1.5">1.5</option>
                                                    <option value="2">2</option>
                                                    <option value="2.5">2.5</option>
                                                    <option value="3">3</option>
                                                    <option value="3.5">3.5</option>
                                                    <option value="4">4</option>
                                                    <option value="4.5">4.5</option>
                                                    <option value="5">5</option>
                                                    <option value="5.5">5.5</option>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>


                                    <tbody>
                                        <tr>
                                            <td rowspan="5">1.6</td>
                                            <td rowspan="5">Омодагии методӣ ва ташкилӣ ба дарс (ташрифоварӣ)</td>
                                            <td>Тахтаи электронӣ</td>
                                            <td style="color: red;">1</td>
                                            <td rowspan="5">
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">1.8</td>
                                            <td rowspan="5">Натиҷаи супоридани имтиҳон аз фанни худ</td>
                                            <td>≥75%</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.4</td>
                                            <td>Аъзогии гурӯҳи ташвиқотӣ-тарғиботӣ</td>
                                            <td>-</td>
                                            <td style="color: red;">1,5</td>
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">3.5</td>
                                            <td rowspan="5">Ҷалби довталабон, миқдор</td>
                                            <td>≥20</td>
                                            <td style="color: red;">2</td>
                                            <td rowspan="5">
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>


                                    <tbody>
                                        <tr>
                                            <td>3.8</td>
                                            <td>Иштирок дар чорабиниҳо мутобиқи талаботи муайяншуда (варзишӣ, фарҳангӣ,
                                                сиёсӣ, ҷамъиятӣ) </td>
                                            <td>≥90%-и нақша</td>
                                            <td style="color: red;">1</td>
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.10</td>
                                            <td>Сатҳи давомоти гуруҳ</td>
                                            <td>≥90%</td>
                                            <td style="color: red;">1</td>
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>3.11</td>
                                            <td>Волонтёрӣ дар корҳои тарбиявӣ-иҷтимоӣ</td>
                                            <td>-</td>
                                            <td style="color: red;">1</td>
                                            <td>
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>

                                        <tr>
                                            <td rowspan="5">5.3</td>
                                            <td rowspan="5">Ҷалби маблағ ба технопарк</td>
                                            <td>-</td>
                                            <td style="color: red;">1,5</td>
                                            <td rowspan="5">
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
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
                                                <input type="number" name="omuzgor"><br>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Ratings</button>

</div>
</form>
                    </div>
                   
                </div>

            </div>
            <!-- Конец таблицы выполненных заданий -->
        </div>
    </div>
    <?php require_once "footer.php"; ?>