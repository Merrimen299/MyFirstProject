<div class="container mt-2">
    <ul class="nav mb-2">
        <li class="nav-item">
            <a class="nav-link text-dark fw-light" href="#"><?='< ' . $data['product']['product_gender']. ' ' . $data['product']['product_category_type_ua'] . ' ' . $data['product']['product_brand']?></a>
        </li>
    </ul>
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
            <?php endforeach; endif;?>
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
            <form method="post" action="https://fitwear/basket/add/<?=$data['product']['product_id']?>">
                <?php
                $sizes = explode(', ', $data['product']['product_sizes']);
                foreach ($sizes as $size):
                    if (explode('-', $size)[1] != 0):
                    ?>
                    <input type="radio" class="btn-check" name="size" id="size<?=explode('-', $size)[0]?>" autocomplete="off" value="<?=explode('-', $size)[0]?>">
                    <label class="btn btn-outline-dark" for="size<?=explode('-', $size)[0]?>" style="margin-right: 15px"><?=explode('-', $size)[0]?><br>EUR 30</label>
                <?php endif;endforeach;?>
                <br>
                <button type="submit" class="btn btn-lg btn-warning mt-2"><img src="/images/navbar/icons8-корзина-24.png"> Додати в кошик</button>
            </form>

            <hr>
            <div>
                <p><svg viewBox="0 0 36 36" width="36px" height="36px" class="ZQ0ciz FaQMg4 "><path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 25.5V24a.75.75 0 011.5 0v1.5h3V27h-3a1.5 1.5 0 01-1.5-1.5zM5.25 10.5A1.5 1.5 0 016.75 9h15a1.5 1.5 0 011.5 1.5h3.334a1.5 1.5 0 011.272.705l3.485 5.575 2.72 2.72a1.5 1.5 0 01.439 1.06v4.94A1.5 1.5 0 0133 27h-3.75v-1.5H33v-4.94L30.44 18h-7.19a1.5 1.5 0 01-1.5-1.5v-6h-15v5.25a.75.75 0 01-1.5 0V10.5zm24.147 6L26.584 12H23.25v4.5h6.147zM23.25 27h-7.5v-1.5h7.5V27z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M19.28 13.244a.75.75 0 01.07 1.058l-4.65 5.315a.9.9 0 01-1.313.044l-2.357-2.356a.75.75 0 011.06-1.061l1.904 1.903 4.228-4.832a.75.75 0 011.058-.071zM7.5 18.75a.75.75 0 01-.75.75h-4.5a.75.75 0 010-1.5h4.5a.75.75 0 01.75.75zM9 21.75a.75.75 0 01-.75.75h-4.5a.75.75 0 010-1.5h4.5a.75.75 0 01.75.75zM26.25 27.75a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5zm0 1.5a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM12.75 27.75a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5zm0 1.5a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"></path></svg><span class="f8_SVc"><b> Безкоштовна доставка від 2000 грн</b></span><br></p>
                <p><svg viewBox="0 0 36 37" width="36px" height="36px" class="ZQ0ciz FaQMg4 "><path fill-rule="evenodd" clip-rule="evenodd" d="M9 10.6818H25.5C27.1569 10.6818 28.5 12.3172 28.5 14.3347V25.2935C28.5 27.311 27.1569 28.9465 25.5 28.9465H9C7.34315 28.9465 6 27.311 6 25.2935V14.3347C6 12.3172 7.34315 10.6818 9 10.6818ZM9 12.5082C8.17157 12.5082 7.5 13.326 7.5 14.3347V25.2935C7.5 26.3023 8.17157 27.12 9 27.12H25.5C26.3284 27.12 27 26.3023 27 25.2935V14.3347C27 13.326 26.3284 12.5082 25.5 12.5082H9Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21 7.63767C22.2426 7.63767 23.25 6.6155 23.25 5.35459C23.25 4.09367 22.2426 3.0715 21 3.0715C19.7574 3.0715 18.75 4.09367 18.75 5.35459C18.75 6.6155 19.7574 7.63767 21 7.63767ZM21 9.15973C23.0711 9.15973 24.75 7.45611 24.75 5.35459C24.75 3.25306 23.0711 1.54944 21 1.54944C18.9289 1.54944 17.25 3.25306 17.25 5.35459C17.25 7.45611 18.9289 9.15973 21 9.15973Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M20.1868 16.7612C20.9667 16.1915 21.88 16.009 22.5 16.009H28.5V17.531H22.5C22.12 17.531 21.5333 17.653 21.0632 17.9964C20.6314 18.312 20.25 18.8445 20.25 19.8141C20.25 20.7837 20.6314 21.3163 21.0632 21.6318C21.5333 21.9753 22.12 22.0972 22.5 22.0972H28.5V23.6193H22.5C21.88 23.6193 20.9667 23.4368 20.1868 22.867C19.3686 22.2693 18.75 21.2798 18.75 19.8141C18.75 18.3484 19.3686 17.3589 20.1868 16.7612Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M25.5 19.8141C25.5 20.2344 25.1642 20.5752 24.75 20.5752H23.25C22.8358 20.5752 22.5 20.2344 22.5 19.8141C22.5 19.3938 22.8358 19.0531 23.25 19.0531H24.75C25.1642 19.0531 25.5 19.3938 25.5 19.8141Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 8.39871C12.2574 8.39871 11.25 9.42088 11.25 10.6818H9.75C9.75 8.58027 11.4289 6.87665 13.5 6.87665C15.5711 6.87665 17.25 8.58027 17.25 10.6818H15.75C15.75 9.42088 14.7426 8.39871 13.5 8.39871Z"></path></svg><span class="f8_SVc"><b>Зручна оплата</b></span><br></p>
                <p><svg viewBox="0 0 36 37" width="36px" height="36px" class="ZQ0ciz FaQMg4 "><path fill-rule="evenodd" clip-rule="evenodd" d="M12.867 8.079c-6.005 2.819-8.587 9.97-5.768 15.975 2.818 6.004 9.97 8.586 15.974 5.768 6.005-2.82 8.587-9.971 5.768-15.975A12.013 12.013 0 0027 11.027L27 9.98l1.127.057c.818.933 1.52 1.995 2.072 3.172 3.17 6.754.266 14.8-6.488 17.97-6.754 3.171-14.8.266-17.97-6.488-3.17-6.754-.266-14.8 6.488-17.97a13.451 13.451 0 018.086-1.076c.859.152 1.7.386 2.511.699a.719.719 0 01.385.972.788.788 0 01-1 .398 12.08 12.08 0 00-2.157-.592 11.951 11.951 0 00-7.187.957z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M25.688 8.828c0-.008.006-.013.013-.012l5.183.864a.75.75 0 11-.247 1.48l-3.45-.576v3.427a.75.75 0 11-1.5 0V8.828zM14.743 14.011h-1.111a1.5 1.5 0 00-1.496 1.386l-.728 9.468a1.5 1.5 0 001.496 1.615h10.192a1.5 1.5 0 001.496-1.615l-.728-9.468a1.5 1.5 0 00-1.496-1.386h-1.111c-.07-1.03-.293-1.955-.707-2.68-.537-.938-1.4-1.538-2.55-1.538s-2.014.6-2.55 1.538c-.414.725-.636 1.65-.707 2.68zm1.504 0h3.506c-.067-.834-.248-1.484-.506-1.936-.307-.538-.71-.782-1.247-.782-.538 0-.94.244-1.247.782-.258.452-.439 1.102-.506 1.937zm-2.615 1.5l-.728 9.47h10.192l-.728-9.47h-8.736zm5.306 3.563a.75.75 0 010 1.5h-1.875a.75.75 0 010-1.5h1.875z"></path></svg><span class="f8_SVc"><b>Гарантія повернення</b></span><br></p>
                <p><svg viewBox="0 0 36 37" width="36px" height="36px" class="ZQ0ciz FaQMg4 "><path fill-rule="evenodd" clip-rule="evenodd" d="M17.25 24.027c5.385 0 9.75-4.365 9.75-9.75 0-5.384-4.365-9.75-9.75-9.75S7.5 8.893 7.5 14.277c0 5.385 4.365 9.75 9.75 9.75zm0 1.5c6.213 0 11.25-5.036 11.25-11.25 0-6.213-5.037-11.25-11.25-11.25S6 8.064 6 14.277c0 6.214 5.037 11.25 11.25 11.25z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M16.445 8.96a.9.9 0 011.61 0l1.201 2.404 3.062.612a.9.9 0 01.363 1.603l-2.353 1.765.59 2.95a.9.9 0 01-1.35.946l-2.318-1.412-2.318 1.412a.9.9 0 01-1.35-.945l.59-2.951-2.354-1.765a.9.9 0 01.364-1.603l3.061-.612 1.202-2.404zm.805 1.744l-.797 1.593a.9.9 0 01-.628.48l-2.033.407 1.582 1.187a.9.9 0 01.343.896l-.396 1.98 1.46-.89a.9.9 0 01.937 0l1.46.89-.395-1.98a.9.9 0 01.342-.896l1.583-1.187-2.033-.407a.9.9 0 01-.629-.48l-.796-1.593zM6.902 30.435l2.971-8.164 1.41.513-2.545 6.991 2.958-.999a.9.9 0 011.057.385l1.623 2.666 2.545-6.99 1.41.512-2.972 8.164a.9.9 0 01-1.614.16l-2.024-3.322-3.685 1.245a.9.9 0 01-1.134-1.161zM24.253 22.27l2.971 8.164a.9.9 0 01-1.134 1.16l-3.685-1.244-2.014 3.307a.9.9 0 01-1.627-.198l-1.255-3.992a.75.75 0 011.432-.45l.857 2.73 1.575-2.587a.9.9 0 011.057-.385l2.958 1-2.545-6.992 1.41-.513z"></path></svg><span class="f8_SVc"><b>Оригінальні товари</b></span><br></p>
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
        </div>
    </div>
    <div class="row">
        <hr class="mb-4 mt-2">
        <h5>Вам може сподобатись</h5>
        <?php foreach ($data['rec_products'] as $Item): ?>
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
                            <a class="link-underline link-underline-opacity-0 text-dark fw-normal" href="product/index/<?=$Item['product_id']?>">
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
        <?php endforeach;?>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
                <form method="post" class="bg-light border p-3" action="https://fitwear/product/add_comment/<?= $data['product']['product_id'] ?>">
                    <h5>Залиште відгук</h5>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Електронна пошта*" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['user_email'] : ''?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Ім'я*" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['user_middlename'] : ''?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h6>Ваша оцінка</h6>

                        <div class="col-sm-10 d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input star-ratio" name="rate" id="rate1" value="1">
                                <label class="form-check-label" for="rate1">
                                    1
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input star-ratio" name="rate" id="rate2" value="2">
                                <label class="form-check-label" for="rate2">
                                    2
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input star-ratio" name="rate" id="rate3" value="3">
                                <label class="form-check-label" for="rate3">
                                    3
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input star-ratio" name="rate" id="rate4" value="4">
                                <label class="form-check-label" for="rate4">
                                    4
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input star-ratio" name="rate" id="rate5" value="5">
                                <label class="form-check-label" for="rate5">
                                    5
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Ваші враження від товару" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Надіслати відгук</button>
                    <br>
                    <span style="font-size: 10px" class="text-muted">Відгук залишиться на сайті після модерації. Дякую за співпрацю</span>
                </form>
            </div>
        </div>
    </div>

</div>
