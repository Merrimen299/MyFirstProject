<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/menu.php'?>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <h4>Історія замовлень</h4>
            </div>
                <?php foreach ($data['orders'] as $order):
                ?>
                <hr>
                <p class="h6">Замовлення №<?=$order['order_number'] ?>, Статус - <span class="<?=$order['order_status'] == 'Замовлення скасовано' ? 'text-danger' : ''?>"><?=$order['order_status'] ?></span></p>
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
                            <?php if($order['order_status'] != 'Замовлення скасовано'):?>
                            <button class="btn btn-danger mt-3" onclick="window.location = 'https://fitwear/order/cancel/<?=$order['order_id']?>'">
                                Скасувати замовлення
                            </button>
                            <?php else:?>
                                <button class="btn btn-danger mt-3" onclick="window.location = 'https://fitwear/order/clear/<?=$order['order_id']?>'">
                                    Видалити з історії замовлень
                                </button>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
             <?php endforeach;?>
        </div>
    </div>
</div>