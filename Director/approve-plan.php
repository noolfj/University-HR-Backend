<?php 
require_once "header.php";
?> 

<div class="main-content">

<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">ПЛАН</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>Список планов</h3>
                <div class="table-responsive">
                    <table class="table mb-0 table-bordered"> <!-- Добавлен класс table-bordered -->
                        <thead class="table-light">
                            <tr>
                                <th>№</th>
                                <th class="text-center">Норма</th>
                                <th>Кредит</th>
                                <th>Примечание</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Аъзои гурӯхи кории Шӯрои олимони донишгоҳ</td>
                                <td>0.833</td>
                                <td>20 соат барои 1 комиссия (фармоиши ректор)</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Аъзои Шӯрои методии донишгоҳ</td>
                                <td>1.250</td>
                                <td>30 соат (фармоиши ректор)</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Аъзои Шӯрои методии факултет ва гурӯхҳои кории факултет</td>
                                <td>0.833</td>
                                <td>20 соат (фармоиши ректор)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3"> <!-- Добавлен класс text-center -->
                    <button id="submitData" class="btn btn-success waves-effect waves-light">Утвердить план</button> <!-- Кнопка для отправки данных -->
                </div>
            </div>
        </div>
    </div>
</div>


     
        

            <?php 
require_once "footer.php";
?>