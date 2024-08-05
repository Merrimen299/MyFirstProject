<div class="container">
    <h2 class="d-flex justify-content-center m-4">Улюблені товари</h2>
    <hr>
    <div class="row">
        <?php
        if ($data['products'] != null):
        foreach ($data['products'] as $Item): ?>
            <div class="col-3">
                <div class="card border-white" style="width: 18rem;">
                    <a class="link-underline link-underline-opacity-0" href="https://fitwear/product/index/<?=$Item['product_link']?>">
                        <div class="w-100" style="position: absolute">
                            <div style="display: inline-block;position: absolute; left: 10px; top: 10px">
                                <?php if ($Item['product_new'] != 0):?>
                                    <div class="badge bg-light text-dark p-1">NEW</div><br>
                                <?php endif;?>
                                <?php if ($Item['product_discount'] != 0):?>
                                    <div class="badge bg-danger text-light p-1">-<?=$Item['product_discount']?>%</div>
                                <?php endif;?>
                            </div>
                            <div class="text-dark" style="display: inline-block;position: absolute; right: 10px; top: 10px">
                                <?php session_start();
                                $is_liked = false;
                                if (isset($_SESSION['user'])){
                                    foreach (explode(',', substr($_SESSION['user']['user_liked_products'],0, -1)) as $item){
                                        if ($item == $Item['product_id'])
                                            $is_liked = true;
                                    }
                                }
                                ?>
                                <a style="z-index: 10" href="https://fitwear/product/like/<?= $Item['product_id']?>" onclick="function (){return false;}"
                                   class="link-dark link-offset-2 link-underline link-underline-opacity-0">
                                    <?php if (!$is_liked):?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                        </svg>
                                    <?php else:?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                        </svg>
                                    <?php endif; ?>
                                </a>
                                <?=$Item['product_likes']?>
                            </div>
                        </div>
                        <img class="card-img-top" src="/images/clothes/<?=$Item['product_category_name']?>/<?=$Item['product_category_gender']?>/<?=$Item['product_category_type']?>/<?=$Item['product_main_image']?>">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a class="link-underline link-underline-opacity-0 text-dark fw-normal" href="product/index/<?=$Item['product_link']?>">
                                <?= $Item['product_category_type_ua'] . ' ' . $Item['product_brand'] . ' ' . $Item['product_name'] ?>
                            </a>
                        </h6>
                        <?php
                        $sizes = explode(', ', $Item['product_sizes']);
                        foreach ($sizes as $size):
                            ?>
                            <span class="card-text border border-secondary" style="padding: 1px 3px; margin-bottom: 5px"><?= explode('-', $size)[0] ?></span>
                        <?php endforeach;?>
                        <p class="card-text d-flex">
                            <?php if ($Item['product_discount'] != 0):?>
                                <span class="fw-bolder"><?= round($Item['product_price'] * (100 - $Item['product_discount'])/100) . ' грн' ?></span>&emsp;
                                <span class="text-muted text-decoration-line-through"><?= $Item['product_price'] . ' грн' ?></span>
                            <?php else :?>
                                <span class="fw-bolder"><?= $Item['product_price'] . ' грн' ?></span>
                            <?php endif;?>
                        </p>

                    </div>
                </div>
            </div>
        <?php endforeach;
        else:?>
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
              <span class="fs-5">
               Список збережених товарів порожній<br>
                  Натисніть
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>️
                  на товарі, який вам сподобався <br> і ми збережемо його тут
              </span>
            </div>
        </div>
            <a class="btn btn-primary d-flex justify-content-center mt-4" href="https://fitwear">Перейти до каталогу</a>
        <?php
        endif;
        ?>
    </div>
</div>