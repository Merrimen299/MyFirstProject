<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/admin_menu.php'?>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <h4>Користувачі</h4>
            </div>
                <div class="list-group">
                    <?php foreach ($data['users'] as $user): ?>
                        <a href="" class="list-group-item list-group-item-action" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $user['user_firstname'] . ' ' . $user['user_middlename'] . ' ' . $user['user_lastname'] . ', ' . $user['user_email']?></h5>
                                <small><?= $user['user_phone_number']?></small>
                            </div>
                            <p class="mb-1">Адреса: <?= $user['user_adress']?></p>
                            <p class="mb-1">Дата народження: <?= $user['user_birthday']?></p>
                            <small>Зареєстровано: <?= $user['user_register_date']?></small>
                        </a>
                    <?php
                    endforeach;?>
                </div>
        </div>
    </div>
</div>