<?php
session_start();
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/menu.php'?>
        </div>
        <div class="col">
            <h1 class="d-flex justify-content-center m-4">Клубна картка</h1>
            <div class="row g-3 mb-4">
                <div class="col">
                     <div class="rounded-5 bg-warning position-relative" style="width: 360px; height: 220px">
                        <span class="position-absolute fs-5 fw-semibold" style="top: 20px; left: 85px"> Картка <?=$data['club_card']['club_card_name']?></span>
                         <div class="position-absolute" style="top: 60px; left: 85px">
                             <img src="../../../images/logo/logo_black.png" width="180" height="80">
                         </div>
                         <span class="position-absolute fs-5 fw-semibold" style="top: 150px; left: 110px"><?=$data['club_card']['club_card_number']?></span>
                         <span class="position-absolute fs-6" style="bottom: 15px; left: 25px"><?=$data['club_card']['user_firstname'] . ' ' . $data['club_card']['user_middlename'] . ' ' . $data['club_card']['user_lastname']?></span>
                     </div>
                    <div>
                        <h6 class="mt-4">Які переваги надає клубна картка?</h6>
                        <span class="mt-3">Клубна програма діє на сайті та у всій мережі магазинів Megasport.<br> Купуйте товари ваших улюблених брендів на сайті або в офлайн магазинах і отримуйте:</span>
                        <ul class="mt-3">
                            <li>Знижка 10% на асортимент нової колекції;</li>
                            <li>Знижка 5% на товари з попередніх колекцій;</li>
                            <li>Участь у Бонусній програмі;</li>
                            <li>Можливість першими дізнаватися про спеціальні пропозиції та розпродаж (за допомогою смс або електронної пошти).</li>
                        </ul>
                    </div>
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
            <hr>
        </div>
    </div>
</div>



