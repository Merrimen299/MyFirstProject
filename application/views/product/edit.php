<div class="container mt-2">
    <ul class="nav mb-2">
        <li class="nav-item">
            <a class="nav-link text-dark fw-light" href="#"><?='< ' . $data['product']['product_gender']. ' ' . $data['product']['product_category_type_ua'] . ' ' . $data['product']['product_brand']?></a>
        </li>
    </ul>

    <form action="https://fitwear/product/update/<?=$data['product']['product_link']?>" method="post">
        <div class="row">
            <div class="col-1">
                <div class="img-small">
                    <img src="/images/clothes/<?=$data['product']['product_category_name']?>/<?=$data['product']['product_category_gender']?>/<?=$data['product']['product_category_type']?>/<?=$data['product']['product_main_image']?>" class="mb-2" style="width: 96px; height: 96px">
                </div>
                <?php if ($data['product']['product_images'] != null && $data['product']['product_images'] != ''):?>
                    <?php
                    $images = explode('; ', $data['product']['product_images']);
                    foreach ($images as $item): ?>
                        <div class="img-small">
                            <img src="/images/clothes/<?=$data['product']['product_category_name']?>/<?=$data['product']['product_category_gender']?>/<?=$data['product']['product_category_type']?>/<?=$item?>" class="mb-2" style="width: 96px; height: 96px">
                        </div>
                    <?php
                    endforeach;
                endif;?>
            </div>
            <div class="col-6">
                <div id="carouselExampleAutoplaying" class="carousel slide mb-2" data-bs-ride="carousel" style="position: relative">
                    <img src="/images/brands/<?=strtolower($data['product']['product_brand'])?>.png" class="mb-2" style="position: absolute; width:64px; height: 64px; top: 5px; left: 10px; z-index: 3">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/clothes/<?=$data['product']['product_category_name']?>/<?=$data['product']['product_category_gender']?>/<?=$data['product']['product_category_type']?>/<?=$data['product']['product_main_image']?>" class="d-block w-100" style="width: 640px; height: 640px">
                        </div>
                        <?php if ($data['product']['product_images'] != null && $data['product']['product_images'] != ''):?>
                            <?php
                            $images = explode('; ', $data['product']['product_images']);
                            foreach ($images as $item): ?>
                                <div class="carousel-item">
                                    <img src="/images/clothes/<?=$data['product']['product_category_name']?>/<?=$data['product']['product_category_gender']?>/<?=$data['product']['product_category_type']?>/<?=$item?>" class="d-block w-100" style="width: 640px; height: 640px">
                                </div>
                            <?php endforeach; endif;?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="text-dark" style="display: inline-block;position: absolute; right: 70px; top: 10px">

                        <?php session_start();
                        $is_liked = false;
                        if (isset($_SESSION['user'])){
                            foreach (explode(',', substr($_SESSION['user']['user_liked_products'],0, -1)) as $item){
                                if ($item == $data['product']['product_id'])
                                    $is_liked = true;
                            }
                        }
                        ?>
                        <a style="z-index: 10" href="https://fitwear/product/like/<?= $data['product']['product_id']?>" onclick="function (){return false;}"
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
                        <?=$data['product']['product_likes']?>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <h5 class="mb-4"><?= $data['product']['product_category_type_ua']. ' '. $data['product']['product_brand']. ' '. $data['product']['product_name']?></h5>

                <?php if ($data['product']['product_discount'] != 0):?>
                    <span class="fs-5 fw-bolder text-danger"><?=round($data['product']['product_price'] * (100 - $data['product']['product_discount'])/100) . ' грн' ?></span>&emsp;
                    <span class="fs-5 text-muted text-decoration-line-through fw-light"><?= $data['product']['product_price'] . ' грн' ?></span>
                <?php else:?>
                    <span class="fs-5 fw-bolder"><?=$data['product']['product_price'] . " грн"?></span>
                <?php endif;?>
                <br>

                <?php if ($data['product']['product_discount'] != 0):?>
                    <span class="badge bg-danger mb-4">-<?=$data['product']['product_discount']?>%</span>
                <?php endif;?>
                <?php if ($data['product']['product_new'] != 0):?>
                    <span class="badge text-bg-light mb-4">NEW</span>
                <?php endif;?>
                <span class="badge text-bg-light mb-4"> <?=$data['product']['product_discount'] != 0 ? 'Краща ціна' : '1000 бонусів за 1000 гривень'?></span>
                <span class="badge text-bg-light mb-4">-<?=round($data['product']['product_price'] / 10) . " грн за клубною картою"?></span>
                <br>
                <div>
                    <?php
                    $sizes = explode(', ', $data['product']['product_sizes']);
                    foreach ($sizes as $size):
                            ?>
                        <div class="row">
                            <div class="col-1">
                                <label for="size<?=explode('-', $size)[0]?>" class="col-form-label"><?=explode('-', $size)[0]?></label>
                            </div>
                            <div class="col-2">
                                <input type="number" min="0" name="size<?=explode('-', $size)[0]?>" class="form-control" id="size<?=explode('-', $size)[0]?>" value="<?=explode('-', $size)[1]?>">
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>
                <hr>
                <div>
                   <!-- Button trigger modal -->
                    <p data-bs-toggle="modal" data-bs-target="#exampleModal"><svg viewBox="0 0 24 24" width="36px" height="36px" class="w02XiG RxRUPG"><path d="M12 23.6c-.3 0-.6-.3-.6-.6v-1c0-.3.3-.6.6-.6s.6.3.6.6v1c0 .3-.3.6-.6.6zm8-3c-.2 0-.3-.1-.4-.2l-1-1c-.2-.2-.2-.6 0-.8.2-.2.6-.2.8 0l1 1c.2.2.2.6 0 .8-.1.1-.2.2-.4.2zm-16 0c-.2 0-.3-.1-.4-.2-.2-.2-.2-.6 0-.8l1-1c.2-.2.6-.2.8 0 .2.2.2.6 0 .8l-1 1c-.1.1-.2.2-.4.2zm4.6-2c-.2 0-.5-.1-.6-.2-.4-.3-.6-.7-.5-1.2l.5-3.3-2.3-2.4c-.3-.3-.4-.8-.3-1.2.2-.4.6-.7 1-.7l3.2-.5 1.4-3c.1-.2.2-.4.4-.5.4-.2.9-.2 1.2 0 .2.1.3.3.4.5l1.4 3 3.2.5c.4.1.8.4.9.8.1.4 0 .9-.3 1.2L16 13.9l.5 3.3c.1.5-.1.9-.5 1.2-.4.3-.8.3-1.2.1L12 16.9l-2.8 1.6c-.2.1-.4.1-.6.1zM12 6.7l-1.5 3.2c-.1.2-.3.3-.5.3l-3.5.5 2.6 2.5c.1.1.2.3.2.5l-.6 3.6 3-1.7c.2-.1.4-.1.6 0l3.1 1.7-.7-3.6c0-.2 0-.4.2-.5l2.5-2.6-3.4-.4c-.2 0-.4-.2-.5-.3L12 6.7zm-2 2.9zm1.9-3zm11.1 6h-1c-.3 0-.6-.3-.6-.6s.3-.6.6-.6h1c.3 0 .6.3.6.6s-.3.6-.6.6zm-21 0H1c-.3 0-.6-.3-.6-.6s.3-.6.6-.6h1c.3 0 .6.3.6.6s-.3.6-.6.6zm17-7c-.2 0-.3-.1-.4-.2-.2-.2-.2-.6 0-.8l1-1c.2-.2.6-.2.8 0s.2.6 0 .8l-1 1c-.1.1-.2.2-.4.2zm-14 0c-.2 0-.3-.1-.4-.2l-1-1c-.2-.2-.2-.6 0-.8s.6-.2.8 0l1 1c.2.2.2.6 0 .8-.1.1-.2.2-.4.2zm7-3c-.3 0-.6-.3-.6-.6V1c0-.3.3-.6.6-.6s.6.3.6.6v1c0 .3-.3.6-.6.6z"></path></svg>
                        <b>Опис та характеристики</b>
                    </p>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6" id="exampleModalLabel"><?= $data['product']['product_category_type_ua']. ' '. $data['product']['product_brand']. ' '. $data['product']['product_name']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="fs-5">Характеристики товару</span><br>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Стать : <?=$data['product']['product_gender']?></li>
                                                <li class="list-group-item">Артикул : <?=$data['product']['product_articul']?></li>
                                                <li class="list-group-item">Знижки : <?=$data['product']['product_discount'] != 0 ? 'Краща ціна, ' : '1000 бонусів за 1000 гривень, '?>Знижка за Клубною карткою, Безкоштовна доставка</li>
                                                <li class="list-group-item">Сезон : <?=$data['product']['product_season']?></li>
                                                <li class="list-group-item">Матеріал : <?=$data['product']['product_content']?></li>
                                                <li class="list-group-item">Виробник : <?=$data['product']['product_maker']?></li>
                                                <li class="list-group-item"><?=$data['product']['product_avaliability'] != 0 ? 'Товар в наявності' : 'Немає в наявності'?></li>
                                                <li class="list-group-item">Категорія : <?=$data['product']['product_category_type_ua']?></li>
                                                <li class="list-group-item">Бренд : <?=$data['product']['product_brand']?></li>
                                                <?php if (!empty($data['collection'])):?>
                                                    <li class="list-group-item">Колекція : <?=$data['collection']['collection_name']?></li>
                                                <?php endif; ?>
                                                <li class="list-group-item">Колір : <?=$data['product']['product_color']?></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <?php if ($data['product']['product_description'] != null):?>
                                                <span class="fs-5">Опис товару</span><br>
                                                <span class="fw-light text-break"><?= $data['product']['product_description'] ?> </span><br>
                                            <?php endif;?>
                                            <?php if (!empty($data['collection'])):?>
                                                <span class="fs-5">Технології</span><br>
                                                <span class="fw-light text-break"><?= $data['collection']['collection_description'] ?> </span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Склад : <?=$data['product']['product_content']?></li>
                    <li class="list-group-item">Сезон : <?=$data['product']['product_season']?></li>
                    <li class="list-group-item">Артикул : <?=$data['product']['product_articul']?></li>
                </ul>
                <hr>
                <div class="mb-3 row">
                    <label for="price" class="col-3">Нова ціна</label>
                    <div class="col">
                        <input type="text" class="form-control" id="price" name="price" value="<?=$data['product']['product_price']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="discount" class="col-3">Знижка</label>
                    <div class="col">
                        <input type="text"  class="form-control" id="discount" name="discount" value="<?=$data['product']['product_discount']?>"">
                    </div>
                </div>
                Новий товар
                <div class="form-check">
                    <input class="form-check-input" type="radio" <?=$data['product']['product_new'] == 1 ? 'checked' : ''?> name="new" id="new" value="1">
                    <label class="form-check-label" for="new">
                        Так
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="new"  id="not_new" value="0" <?=$data['product']['product_new'] == 0 ? 'checked' : ''?>>
                    <label class="form-check-label" for="not_new">
                        Ні
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Зберегти зміни</button>
                <button type="button" class="btn btn-danger">Видалити товар</button>
            </div>
        </div>
    </form>
</div>
