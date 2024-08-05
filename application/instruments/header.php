<?php
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 bg-dark" id="header"">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fw-bolder fs-6">
                <li><a href="#" class="nav-link px-2 text-success">Новинки</a></li>
<!-- -------------------------------------------------------------Male----------------------------------------------------- -->

                <li id="maleGenderLink">
                    <a href="https://fitwear/main/catalog/categories-all/male" class="nav-link px-2 text-white">Чоловікам</a>
                    <div id="maleGenderLinkBlock" class="bg-light w-100 mt-3" style="z-index: 10;">
                        <div class="py-4 container">
                            <ul class="list-group list-group-horizontal list-unstyled row">
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/shoes/male" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Взуття</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/aquashoes/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аквавзуття</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/boots/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Бутси</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/flip-flops/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">В'єтнамки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/trainers/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кеди</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sneakers/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кросівки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sandals/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сандалі</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/chereviki/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Черевики</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/spanking/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шльопанці</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/clothes/male" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Одяг</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/windbreaker/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Вітровки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sweatshirt/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кофти</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/jacket/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/vest/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки-жилети</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/leggins/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Лосини</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/jersey/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Майки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/downjacket/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Пуховики</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/shirt/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сорочки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/underwear/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спідня білизна</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sport-suit/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні костюми</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/pants/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні штани</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/t-shirt/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Футболки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/termo/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Термобілизна</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/shorts/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шорти</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/accessories/male" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Аксесуари</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/swiming-acc/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аксесуари для плавання</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/training-acc/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аксесуари для тренувань</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/purse_belt/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Гаманці і ремені</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/gaiters_shin-pads/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Гетри і щитки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/cap_panama/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кепки і панамки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/ball/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">М'ячі</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/gloves/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рукавички</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/towel/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рушники</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/backpack/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рюкзаки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/bag/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сумки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/hat/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шапки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/scarf/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шарфи</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/socks/male" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шкарпетки</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
<!-- -------------------------------------------------------------Female----------------------------------------------------- -->

                <li id="femaleGenderLink">
                    <a href="https://fitwear/main/catalog/categories-all/female" class="nav-link px-2 text-white">Жінкам</a>
                    <div id="femaleGenderLinkBlock" class="bg-light w-100 mt-3" style="z-index: 10;">
                        <div class="py-4 container">
                            <ul class="list-group list-group-horizontal list-unstyled row">
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/shoes/female" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Взуття</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/aquashoes/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аквавзуття</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/flip-flops/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">В'єтнамки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/trainers/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кеди</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sneakers/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кросівки</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sandals/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сандалі</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/chereviki/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Черевики</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/spanking/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шльопанці</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/clothes/female" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Одяг</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/windbreaker/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Вітровки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sweatshirt/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кофти</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/swimsuit/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Купальники</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/jacket/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/vest/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки-жилети</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/leggins/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Лосини</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/jersey/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Майки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/dress/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Плаття</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/downjacket/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Пуховики</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/shirt/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сорочки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/skirt/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спідниці</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/underwear/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спідня білизна</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sport-suit/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні костюми</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/pants/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні штани</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/t-shirt/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Футболки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/top/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Топи</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/termo/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Термобілизна</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/shorts/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шорти</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/accessories/female" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Аксесуари</a>
                                        <ul class="list-unstyled fw-light col">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/swimming-acc/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аксесуари для плавання</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/training-acc/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аксесуари для тренувань</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/purse_belt/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Гаманці і ремені</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/gaiters_shin-pads/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Гетри і щитки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/cap_panama/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кепки і панамки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/ball/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">М'ячі</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/gloves/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рукавички</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/towel/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рушники</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/backpack/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рюкзаки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/bag/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сумки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/hat/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шапки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/scarf/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шарфи</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/socks/female" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шкарпетки</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
<!-- -------------------------------------------------------------Child----------------------------------------------------- -->
                <li id="childGenderLink">
                    <a href="https://fitwear/main/catalog/categories-all/child" class="nav-link px-2 text-white">Дітям</a>
                    <div id="childGenderLinkBlock" class="bg-light w-100 mt-3" style="z-index: 10;">
                        <div class="py-4 container">
                            <ul class="list-group list-group-horizontal list-unstyled row">
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/shoes/child" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Взуття</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/aquashoes/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аквавзуття</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/boots/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кеди</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sneakers/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кросівки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sandals/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сандалі</a></li>

                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/chereviki/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Черевики</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/boots/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Чоботи</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/spanking/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шльопанці</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col" style="border-right: 1px dotted gray">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/clothes/child" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Одяг</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sweatshirts/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кофти</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/jacket/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/vest/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Куртки-жилети</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/leggins/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Лосини</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/dress/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Плаття</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/downjacket/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Пуховики</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/sport-suit/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні костюми</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/pants/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Спортивні штани</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/t-shirt/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Футболки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/termo/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Термобілизна</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/shorts/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шорти</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col">
                                    <div class="row">
                                        <a href="https://fitwear/main/catalog/accessories/child" class="h5 link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Аксесуари</a>
                                        <ul class="list-unstyled fw-light col ">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/swiming-acc/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Аксесуари для плавання</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/cap_panama/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Кепки і панамки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/backpack/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Рюкзаки</a></li>
                                        </ul>
                                        <ul  class="list-unstyled col fw-light">
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/bag/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Сумки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/hat/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шапки</a></li>
                                            <li class="mb-2"><a href="https://fitwear/main/catalog/socks/child" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Шкарпетки</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li><a href="#" class="nav-link px-2 text-danger">Розпродаж</a></li>
            </ul>

            <a href="https://fitwear" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/images/logo/logo_white.png" height="60" width="140">
            </a>

            <div class="nav col-12 col-md-auto mt-2 mb-2 justify-content-center mb-md-0">
                <form>
                    <div class="input-group">
                        <button class="btn btn-outline-light" type="submit">
                            <img src="/images/navbar/icons8-поиск-26.png">
                        </button>
                        <input class="form-control" type="search" placeholder="Пошук серед товару" aria-label="Search">
                    </div>
                </form>
                <a class="position-relative likes link-light text-decoration-none" href="https://fitwear/user/liked">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_liked_products'] != '') :?>
                    <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="top: 15%; left: 75%">
                        <?= count(explode(',', substr($_SESSION['user']['user_liked_products'], 0, -1)))?>
                    </span>
                    <?php endif;?>
                </a>
                <a class="basket link-light text-decoration-none" href="https://fitwear/basket">
                    <?php if (!empty($_SESSION['basket'])) :?>
                    <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="top: 15%; left: 70%">
                        <?= count($_SESSION['basket'])?>
                    </span>
                    <?php endif;?>
                </a>
                <a class="account link-light text-decoration-none" href="https://fitwear/<?= isset($_SESSION['user']) ? ($_SESSION['user']['user_role_ability'] == 1 ? 'user/account' : 'admin/account') : ('user/login')  ?>"></a>
            </div>
        </div>
    </div>
</header>
<div class="bg-warning d-flex align-items-center justify-content-center p-1"><span class="fw-bolder">Отримай знижку 10% на покупку від 2000 грн.</span></div>
<script>

     document.getElementById('maleGenderLinkBlock').style.top = document.getElementById('header').style.height +'px'
     document.getElementById('femaleGenderLinkBlock').style.top = document.getElementById('header').style.height +'px'
     document.getElementById('childGenderLinkBlock').style.top = document.getElementById('header').style.height +'px'

     document.getElementById('maleGenderLink').onmouseenter = function (){
        document.getElementById('maleGenderLinkBlock').style.display = 'block';
        document.getElementById('femaleGenderLinkBlock').style.display = 'none';
        document.getElementById('childGenderLinkBlock').style.display = 'none';

     }
    document.getElementById('maleGenderLinkBlock').onmouseleave = function (){
        document.getElementById('maleGenderLinkBlock').style.display = 'none';
    }


    document.getElementById('femaleGenderLink').onmouseenter = function (){
        document.getElementById('femaleGenderLinkBlock').style.display = 'block';
        document.getElementById('maleGenderLinkBlock').style.display = 'none';
        document.getElementById('childGenderLinkBlock').style.display = 'none';
    }
    document.getElementById('femaleGenderLinkBlock').onmouseleave = function (){
        document.getElementById('femaleGenderLinkBlock').style.display = 'none';
    }


    document.getElementById('childGenderLink').onmouseenter = function (){
        document.getElementById('childGenderLinkBlock').style.display = 'block';
        document.getElementById('femaleGenderLinkBlock').style.display = 'none';
        document.getElementById('maleGenderLinkBlock').style.display = 'none';
    }
    document.getElementById('childGenderLinkBlock').onmouseleave = function (){
        document.getElementById('childGenderLinkBlock').style.display = 'none';
    }
</script>