<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/admin_menu.php'?>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center mt-3">
                <h4>Коментарі</h4>
            </div>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary rounded-pill px-3" id="send" type="button">Нові коментарі (<?= $data['comments']['count']['send']?>)</button>
                <button class="btn btn-success rounded-pill px-3" id="published" type="button">Погоджені (<?= $data['comments']['count']['published']?>)</button>
                <button class="btn btn-danger rounded-pill px-3" id="denied" type="button">Відхилені (<?= $data['comments']['count']['denied']?>)</button>
            </div>
            <hr>
            <div id="send_comments">
                <h5>Нові коментарі</h5>
                <?php if ($data['comments']['count']['send'] == 0):?>
                    <span class="fw-semibold fs-4 mt-5">Нові коментарі не надходили!</span>
                <?php endif;?>
                <div class="list-group">
                    <?php foreach ($data['comments']['send'] as $comment):
                        ?>
                        <div class="row">
                            <div class="col">
                                <a href="https://fitwear/product/index/<?= $comment['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="mb-1">Оцінка: <?= $comment['comment_assessment']?></p>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"><?= $comment['category_type'] . ' ' . $comment['brand_name'] . ' ' . $comment['product_name']?></h5>
                                                <small><?= $comment['comment_time']?></small>
                                            </div>
                                            <p class="mb-1">Відгук: <?= $comment['comment_description']?></p>
                                            <small><?= $comment['user_email'] . ', ' . $comment['user_middlename']?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger d-inline mt-5 me-1" onclick="window.location = 'https://fitwear/admin/comments/cancel/<?=$comment['comment_id']?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                    </svg>
                                </button>
                                <button class="btn btn-success d-inline mt-5" onclick="window.location = 'https://fitwear/admin/comments/add/<?=$comment['comment_id']?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    <?php
                    endforeach;?>
                </div>
            </div>
            <div id="published_comments" style="display: none">
                <h5>Погоджені коментарі</h5>
                <?php if ($data['comments']['count']['published'] == 0):?>
                    <span class="fw-semibold fs-4 mt-5">Ця тека пуста!</span>
                <?php endif;?>
                <div class="list-group">
                    <?php foreach ($data['comments']['published'] as $comment):
                        ?>
                        <div class="row">
                            <div class="col">
                                <a href="https://fitwear/product/index/<?= $comment['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="mb-1">Оцінка: <?= $comment['comment_assessment']?></p>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"><?= $comment['category_type'] . ' ' . $comment['brand_name'] . ' ' . $comment['product_name']?></h5>
                                                <small><?= $comment['comment_time']?></small>
                                            </div>
                                            <p class="mb-1">Відгук: <?= $comment['comment_description']?></p>
                                            <small><?= $comment['user_email'] . ', ' . $comment['user_middlename']?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    endforeach;?>
                </div>
            </div>
            <div id="denied_comments" style="display: none">
                <h5>Відхилені коментарі</h5>
                <?php if ($data['comments']['count']['denied'] == 0):?>
                    <span class="fw-semibold fs-4 mt-5">Ця тека пуста!</span>
                <?php endif;?>
                <div class="list-group">
                    <?php foreach ($data['comments']['denied'] as $comment):
                        ?>
                        <div class="row">
                            <div class="col">
                                <a href="https://fitwear/product/index/<?= $comment['product_link']?>" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="mb-1">Оцінка: <?= $comment['comment_assessment']?></p>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"><?= $comment['category_type'] . ' ' . $comment['brand_name'] . ' ' . $comment['product_name']?></h5>
                                                <small><?= $comment['comment_time']?></small>
                                            </div>
                                            <p class="mb-1">Відгук: <?= $comment['comment_description']?></p>
                                            <small><?= $comment['user_email'] . ', ' . $comment['user_middlename']?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    endforeach;?>
                </div>
            </div>

            <?php
            use application\core\Controller;

            if(isset($_SESSION['message'])){
                Controller::throwMessage($_SESSION['message']['type'], $_SESSION['message']['text']);
            }
            unset($_POST);
            unset($_SESSION["message"]);
            ?>
        </div>
    </div>
</div>
<script>
    document.getElementById('send').onclick = () =>{
        document.getElementById('send_comments').style.display = 'block';
        document.getElementById('published_comments').style.display = 'none';
        document.getElementById('denied_comments').style.display = 'none';
    }
    document.getElementById('published').onclick = () =>{
        document.getElementById('send_comments').style.display = 'none';
        document.getElementById('published_comments').style.display = 'block';
        document.getElementById('denied_comments').style.display = 'none';
    }
    document.getElementById('denied').onclick = () =>{
        document.getElementById('send_comments').style.display = 'none';
        document.getElementById('published_comments').style.display = 'none';
        document.getElementById('denied_comments').style.display = 'block';
    }
</script>