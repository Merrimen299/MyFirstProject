<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/admin_menu.php'?>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <h4>Статистика</h4>
            </div>
            <div class="mt-4 row">
                <div class="col">
                    <canvas id="ordersChart" style="width:100%;max-width:700px;height: 500px"></canvas>
                </div>
                <div class="col">
                    <canvas id="ordersSumChart" style="width:100%;max-width:700px;height: 500px"></canvas>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
                </script>
                <script>

                    var xValues = ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"];
                    var y1Values = [20, 12, 14, 7, 11, (<?= count($data['orders']) ?>),0,0,0,0,0,0,0];
                    <?php foreach ($data['orders'] as $order){}?>
                    var y2Values = [15600, 18320, 9680, 12640, 9970, (<?= count($data['orders']) ?>),0,0,0,0,0,0,0];
                    var barColors = ["red", "green","blue","orange","brown", "yellow", "pink", "violet", "grey", "red", "green","blue","orange"];
                    new Chart("ordersChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: y1Values
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                                display: true,
                                text: "Замовлення, 2024 рік"
                            }
                        }
                    });
                    new Chart("ordersSumChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: y2Values
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                                display: true,
                                text: "Сума замовлень, 2024 рік"
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
