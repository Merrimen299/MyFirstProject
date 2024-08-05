<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/admin_menu.php'?>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <h4>Історія замовлень</h4>
            </div>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary rounded-pill px-3" id="new_order" type="button">Нові замовлені (<?= count($data['orders']['new']) ?>)</button>
                <button class="btn btn-success rounded-pill px-3" id="received_order" type="button">Отримані (<?= count($data['orders']['received']) ?>)</button>
                <button class="btn btn-danger rounded-pill px-3" id="denied_order" type="button">Відхилені (<?= count($data['orders']['denied']) ?>)</button>
                <button class="btn btn-warning rounded-pill px-3" id="accepted_order" type="button">В обробці (<?= count($data['orders']['accepted']) ?>)</button>
                <button class="btn btn-secondary rounded-pill px-3" id="delivered_order" type="button">Відправлені (<?= count($data['orders']['delivered']) ?>)</button>
                <button class="btn btn-info rounded-pill px-3" id="ready_order" type="button">В очікуванні (<?= count($data['orders']['ready']) ?>)</button>
            </div>
            <div id="new_order_block">
                <hr>
                <h5>Нові замовлення</h5>
                <?php foreach ($data['orders']['new'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>
                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                            <div class="col">
                                <button class="btn btn-success d-inline mt-3" onclick="window.location = 'https://fitwear/admin/orders/add/<?=$order['order_id']?>'">
                                    Прийняти замовлення
                                </button>
                                <button class="btn btn-danger d-inline mt-3" onclick="window.location = 'https://fitwear/order/cancel/<?=$order['order_id']?>'">
                                    Відмінити замовлення
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div id="received_order_block" style="display: none">
                <hr>
                <h5>Отримані замовлення</h5>
                <?php foreach ($data['orders']['received'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>

                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div id="denied_order_block" style="display: none">
                <hr>
                <h5>Скасовані замовлення</h5>
                <?php foreach ($data['orders']['denied'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>

                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div id="accepted_order_block" style="display: none">
                <hr>
                <h5>Прийняті замовлення</h5>
                <?php foreach ($data['orders']['accepted'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>

                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                            <div class="col">
                                <button class="btn btn-info d-inline mt-3" onclick="window.location = 'https://fitwear/admin/orders/ready/<?=$order['order_id']?>'">
                                    Передати в очікування
                                </button>
                                <button class="btn btn-secondary d-inline mt-3" onclick="window.location = 'https://fitwear/admin/orders/delivered/<?=$order['order_id']?>'">
                                    Відправлено
                                </button>
                                <button class="btn btn-danger d-inline mt-3" onclick="window.location = 'https://fitwear/order/cancel/<?=$order['order_id']?>'">
                                    Відмінити замовлення
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div id="delivered_order_block" style="display: none">
                <hr>
                <h5>Відправлені замовлення</h5>
                <?php foreach ($data['orders']['delivered'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>

                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                            <div class="col">
                                <button class="btn btn-success d-inline mt-3" onclick="window.location = 'https://fitwear/admin/orders/received/<?=$order['order_id']?>'">
                                    Доставлено і отримано
                                </button>
                                <button class="btn btn-danger d-inline mt-3" onclick="window.location = 'https://fitwear/order/cancel/<?=$order['order_id']?>'">
                                    Відмінити замовлення
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div id="ready_order_block" style="display: none">
                <hr>
                <h5>Замовлення в очікуванні</h5>
                <?php foreach ($data['orders']['ready'] as $order):
                    ?>
                    <hr>
                    <h6>Замовлення №<?=$order['order_number'] ?>, Статус - <?=$order['order_status'] ?>, <?=$order['order_time'] ?></h6>
                    <div class="list-group">
                        <?php foreach ($data['orders_products'][$order['order_id']] as $product): ?>

                            <a href="https://fitwear/product/index/<?= $product['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                <div class="row">
                                    <div class="col-1">
                                        <img height="75" width="75" src="../../../images/clothes/<?=$product['product_category_name']?>/<?=$product['product_category_gender']?>/<?=$product['product_category_type']?>/<?=$product['product_main_image']?>">
                                    </div>
                                    <div class="col">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $product['product_category_type_ua'] . ' ' . $product['product_brand'] . ' ' . $product['product_name']?></h5>
                                            <small><?= ($product['product_discount'] == 0 ? ($product['product_price']) : (round($product['product_price'] * (100 - $product['product_discount'])/100))) . ' грн. - ' . $product['product_count'] . ' шт.'?></small>
                                        </div>
                                        <p class="mb-1">Колір: <?= $product['product_color']?>, Артикул: <?= $product['product_articul']?></p>
                                        <small>Розмір <?= $product['product_size']?></small>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endforeach;?>
                        <div class="row">
                            <div class="col">
                                <span><b>Замовник:</b> <?=$order['order_user_name'] . ', ' . $order['order_user_phone_num']?> </span><br>
                                <span><b>Тип доставки:</b> <?=$order['order_type'] . ', ' . $order['order_adress']?> </span><br>
                                <span><b>Загальна сума:</b> <?=$order['order_sum'] . ' грн.'?> </span>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger d-inline mt-3" onclick="window.location = 'https://fitwear/order/cancel/<?=$order['order_id']?>'">
                                    Відмінити замовлення
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('new_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'block';
        document.getElementById('received_order_block').style.display = 'none';
        document.getElementById('denied_order_block').style.display = 'none';
        document.getElementById('delivered_order_block').style.display = 'none';
        document.getElementById('accepted_order_block').style.display = 'none';
        document.getElementById('ready_order_block').style.display = 'none';
    }
    document.getElementById('received_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'none';
        document.getElementById('received_order_block').style.display = 'block';
        document.getElementById('denied_order_block').style.display = 'none';
        document.getElementById('delivered_order_block').style.display = 'none';
        document.getElementById('accepted_order_block').style.display = 'none';
        document.getElementById('ready_order_block').style.display = 'none';
    }
    document.getElementById('denied_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'none';
        document.getElementById('received_order_block').style.display = 'none';
        document.getElementById('denied_order_block').style.display = 'block';
        document.getElementById('delivered_order_block').style.display = 'none';
        document.getElementById('accepted_order_block').style.display = 'none';
        document.getElementById('ready_order_block').style.display = 'none';
    }
    document.getElementById('delivered_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'none';
        document.getElementById('received_order_block').style.display = 'none';
        document.getElementById('denied_order_block').style.display = 'none';
        document.getElementById('delivered_order_block').style.display = 'block';
        document.getElementById('accepted_order_block').style.display = 'none';
        document.getElementById('ready_order_block').style.display = 'none';
    }
    document.getElementById('accepted_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'none';
        document.getElementById('received_order_block').style.display = 'none';
        document.getElementById('denied_order_block').style.display = 'none';
        document.getElementById('delivered_order_block').style.display = 'none';
        document.getElementById('accepted_order_block').style.display = 'block';
        document.getElementById('ready_order_block').style.display = 'none';
    }
    document.getElementById('ready_order').onclick = () =>{
        document.getElementById('new_order_block').style.display = 'none';
        document.getElementById('received_order_block').style.display = 'none';
        document.getElementById('denied_order_block').style.display = 'none';
        document.getElementById('delivered_order_block').style.display = 'none';
        document.getElementById('accepted_order_block').style.display = 'none';
        document.getElementById('ready_order_block').style.display = 'block';
    }
</script>