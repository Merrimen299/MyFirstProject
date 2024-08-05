<h1 class="d-flex justify-content-center">Кошик</h1>
<div class="container">
    <?php

    use application\core\Controller;
    if(isset($_SESSION['message'])){
        Controller::throwMessage($_SESSION['message']['type'], $_SESSION['message']['text']);
    }
    unset($_SESSION["message"]);
    if(isset($_SESSION['basket'])):
        $sum = 0;
        foreach ($_SESSION['basket'] as $item):
        if ($item['product_discount'] != 0){
            $sum += round($item['product_price'] * (100 - $item['product_discount'])/100) * $item['basket_product_count'];
        }
        else{
            $sum += $item['product_price'] * $item['basket_product_count'];
        }
    ?>
    <div class="row">

        <div class="col-2">
            <img src="/images/clothes/<?=$item['product_category_name']?>/<?=$item['product_category_gender']?>/<?=$item['product_category_type']?>/<?=$item['product_main_image']?>" style="width: 125px; height: 125px">
        </div>
        <div class="col-2">
            <div class="input-group">
                <a class="btn btn-outline-secondary d-inline" id="decBasketItem<?= $item['product_id'] . $item['product_size']?>" type="button" style="width: 40px; height: 40px">-</a>
                <input class="input-group-text bg-light" id="basketItem<?= $item['product_id'] . $item['product_size']?>" value="<?= $item['basket_product_count'] ?>" style="width: 45px">
                <a class="btn btn-outline-secondary d-inline" id="incBasketItem<?= $item['product_id'] . $item['product_size']?>" type="button" style="width: 40px; height: 40px">+</a>
            </div>
        </div>
        <div class="col-1">
            <a class="btn btn-danger" id="deleteBasketItem<?= $item['product_id'] . $item['product_size']?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </a>
        </div>
        <div class="col-1">
            <span class="fs-5">
              <?= $item['product_size']?>
            </span>
        </div>

        <div class="col-3">
            <a class="link-underline link-underline-opacity-0" href="https://fitwear/product/index/<?=$item['product_link']?>">
                <?= $item['product_category_type_ua']. ' '. $item['product_brand']. ' '. $item['product_name']?>
            </a>
        </div>
        <div class="col-3">
            <?php if ($item['product_discount'] != 0):?>
                <span class="fs-6 fw-bolder text-danger"><?=round($item['product_price'] * (100 - $item['product_discount'])/100) * $item['basket_product_count']. ' грн' ?></span>&emsp;
                <span class="fs-6 text-muted text-decoration-line-through fw-light"><?= $item['product_price'] * $item['basket_product_count'] . ' грн' ?></span>
            <?php else:?>
                <span class="fs-6 fw-bolder"><?=$item['product_price'] * $item['basket_product_count'] . " грн"?></span>
            <?php endif;?>
        </div>

    </div>
            <hr>
    <?php
    endforeach;
    ?>
        <span class="me-2">Всього : <?=$sum . ' грн.'?></span><a href="http://fitwear/basket/clear" class="btn btn-lg btn-primary" style="background: #fd7e14; border: #fd7e14">Очистити кошик</a> <a href="../order" class="btn btn-lg btn-primary">Замовити</a>
        <script>
            let counts = [
                <?php foreach ($_SESSION['basket'] as $item): ?>
                {'<?=  $item['product_id'] . $item['product_size']?>':  '<?= $item['basket_product_count'] ?>'},
                <?php endforeach;?>
            ]

            <?php
            $count = 0;
            foreach ($_SESSION['basket'] as $item):
            ?>
            if (counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>'] == 1){
                document.getElementById('decBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.add('disabled')
            }
            <?php $sizes = explode(', ', $item['product_sizes']);
            $size_count = 0;
            foreach ($sizes as $size){
                if (explode('-', $size)[0] == $item['product_size'])
                    $size_count = explode('-', $size)[1];
            }?>
            if (counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>'] == <?=$size_count?>) {
                document.getElementById('incBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.add('disabled')
            }
            document.getElementById('decBasketItem<?= $item['product_id'] . $item['product_size']?>').onclick = () =>{
            if (counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>'] == 1){
                document.getElementById('decBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.add('disabled')
            }
            else{
                counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']--
                document.getElementById('decBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.remove('disabled')
                document.getElementById('basketItem<?= $item['product_id'] . $item['product_size']?>').value = counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']
            }
            window.location ='https://fitwear/basket/update/' + '<?=  $item['product_id'] . $item['product_size']?>/' + counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']
            return false;
            }
            document.getElementById('incBasketItem<?= $item['product_id'] . $item['product_size']?>').onclick = () =>{

                if (counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>'] < <?=$size_count?>) {
                    counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']++
                    document.getElementById('decBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.remove('disabled')
                    document.getElementById('basketItem<?= $item['product_id'] . $item['product_size']?>').value = counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']
                }
                else {
                    document.getElementById('incBasketItem<?= $item['product_id'] . $item['product_size']?>').classList.add('disabled')
                }
                window.location = 'https://fitwear/basket/update/' + '<?=  $item['product_id'] . $item['product_size']?>/' + counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>']
                return false;
            }
            document.getElementById('deleteBasketItem<?= $item['product_id'] . $item['product_size']?>').onclick = () =>{
                window.location = 'https://fitwear/basket/delete/' + '<?=  $item['product_id'] . $item['product_size']?>'
                return false;
            }
            console.log(counts[<?=$count?>]['<?=  $item['product_id'] . $item['product_size']?>'], <?=$size_count?>)

            <?php $count += 1?>
            <?php endforeach;?>

        </script>
    <?php
    else:
    ?>
        <h4 class="d-flex justify-content-center">Кошик пустий!</h4>
    <br>
    <a class="btn btn-primary d-flex justify-content-center" href="https://fitwear">Перейти до покупок</a>
    <?php
    endif;
    ?>
</div>