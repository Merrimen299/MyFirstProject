<div class="container">
    <div class="py-5 text-center">
        <h2>Замовлення</h2>
    </div>
    <?php
    if(isset($_SESSION['basket']) && count($_SESSION['basket'])!=0):
    ?>
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Ваш кошик</span>
                <span class="badge bg-primary rounded-pill"><?=count($_SESSION['basket']) ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php
                $sum = 0;
                foreach ($_SESSION['basket'] as $item):
                    if ($item['product_discount'] != 0){
                        $sum += round($item['product_price'] * (100 - $item['product_discount'])/100) * $item['basket_product_count'];
                    }
                    else{
                        $sum += $item['product_price'] * $item['basket_product_count'];
                    }
                ?>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <a class="link-underline link-underline-opacity-0" href="https://fitwear/product/index/<?=$item['product_link']?>">
                            <h6 class="text-dark my-0"><?=$item['product_category_type_ua'] ?></h6>
                            <small class="text-muted"><?=$item['product_brand']. ' '. $item['product_name']?></small>
                        </a>
                    </div>
                    <span class="text-muted"><?=$item['basket_product_count'] . ' x ' . ($item['product_price'] != 0 ? round($item['product_price'] * (100 - $item['product_discount'])/100) : $item['product_price']) . ' грн.' ?></span>
                </li>
                <?php
                endforeach;
                ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Всього :</span>
                    <strong> <?=$sum . ' грн.'?></strong>
                </li>
            </ul>


            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Промо-код">
                    <button type="submit" class="btn btn-secondary">Активувати</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Платіжна адреса</h4>
            <form class="needs-validation" id="orderForm" method="post" novalidate="" action="https://fitwear/order/add">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <label for="firstName" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="<?=$_SESSION['user']['user_firstname']?>" required="">
                        <div class="invalid-feedback">
                            Обов'язкове поле*
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="lastName" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="" value="<?=$_SESSION['user']['user_middlename']?>" required="">
                        <div class="invalid-feedback">
                            Обов'язкове поле*
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="lastName" class="form-label">По-батькові</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="<?=$_SESSION['user']['user_lastname']?>" required="">
                        <div class="invalid-feedback">
                            Обов'язкове поле*
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="userEmail" class="form-label">Електронна пошта</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" name="email" id="userEmail" placeholder="Електронна пошта" value="<?=$_SESSION['user']['user_email']?>" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="phoneNum" class="form-label">Номер телефону</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" name="phone_num" id="phoneNum" placeholder="Номер телефону" value="<?=$_SESSION['user']['user_phone_number']?>" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Доставка</h4>

                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery" id="methodDelivery1" value="by_own" checked>
                            <label class="form-check-label" for="methodDelivery1">
                                Самовиніс
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery" id="methodDelivery2" value="delivery">
                            <label class="form-check-label" for="methodDelivery2">
                                Доставка
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Адреса</label>
                        <input type="text" name="address" class="form-control" id="address" required="" value="<?=$_SESSION['user']['user_adress']?>" placeholder="Вулиця, будинок/кв.">
                        <div class="invalid-feedback">
                            Введіть адресу доставки*
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Місто</label>
                        <input type="text" name="city" class="form-control" id="inputCity" required="">
                        <div class="invalid-feedback">
                            Введіть назву міста доставки*
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="inputRegion" class="form-label">Область</label>
                        <input type="text" name="region" class="form-control" id="inputRegion" required="">
                        <div class="invalid-feedback">
                            Введіть область доставки*
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Поштовий індекс</label>
                        <input type="text" name="index" class="form-control" id="inputZip" required="">
                        <div class="invalid-feedback">
                            Введіть поштовий індекс*
                        </div>
                    </div>

                <hr class="my-4">

                <h4 class="mb-3">Платіж</h4>

                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="methodPayment1" value="after" checked>
                            <label class="form-check-label" for="methodPayment1">
                                Оплата при отриманні
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="methodPayment2" value="now">
                            <label class="form-check-label" for="methodPayment2">
                                Оплата відразу
                            </label>
                        </div>
                    </div>

                <div class="row gy-3">

                    <div class="col-md-6">
                        <label for="cc-number" class="form-label">Номер картки</label>
                        <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" required="">
                        <div class="invalid-feedback">
                            Введіть номер картки*
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-expiration" class="form-label">Термін пр.</label>
                        <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="MM/YY" required="">
                        <div class="invalid-feedback">
                            Введіть термін придатності картки*
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="ХХХ" required="">
                        <div class="invalid-feedback">
                            Введіть код захисту картки*
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Замовити</button>
            </form>
        </div>
    </div>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
        let paymethod = document.getElementById('orderForm').payment
        function payCheck(){
            if (paymethod.value == 'after'){
                document.getElementById('cc-number').disabled = true
                document.getElementById('cc-expiration').disabled = true
                document.getElementById('cc-cvv').disabled = true
            }
            else{
                document.getElementById('cc-number').disabled = false
                document.getElementById('cc-expiration').disabled = false
                document.getElementById('cc-cvv').disabled = false
            }
        }
        let devmethod = document.getElementById('orderForm').delivery
        function devCheck(){
            if (devmethod.value == 'by_own'){
                document.getElementById('address').disabled = true
                document.getElementById('inputCity').disabled = true
                document.getElementById('inputRegion').disabled = true
                document.getElementById('inputZip').disabled = true
            }
            else{
                document.getElementById('address').disabled = false
                document.getElementById('inputCity').disabled = false
                document.getElementById('inputRegion').disabled = false
                document.getElementById('inputZip').disabled = false
            }
        }
        devCheck()
        payCheck()
        for (let pm of paymethod){
            pm.oninput = () => {
                payCheck()
            }
        }
        for (let dm of devmethod){
            dm.oninput = () => {
                devCheck()
            }
        }
    </script>
    <?php

    endif;?>
</div>
