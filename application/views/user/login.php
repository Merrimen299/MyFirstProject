<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
                <div class="h4 border-bottom border-dark d-inline f-switch" style="padding: 10px 67px">
                    Вхід
                </div>
                <div class="h4 border-bottom border-muted d-inline text-muted f-switch" style="padding: 10px 31px">
                    Реєстрація
                </div>
                <script>
                    let forms = document.getElementsByClassName("f-switch");
                    forms[0].onclick = function (){
                        forms[0].classList.remove('text-muted');
                        forms[0].classList.add('border-dark')
                        forms[1].classList.add('text-muted');
                        forms[1].classList.remove('border-dark');
                        forms[1].classList.add('border-muted');
                        document.getElementById('formLogin').style.display = 'block';
                        document.getElementById('formRegister').style.display = 'none'

                    }
                    forms[1].onclick = function (){
                        forms[1].classList.remove('text-muted');
                        forms[1].classList.add('border-dark')
                        forms[0].classList.add('text-muted');
                        forms[0].classList.remove('border-dark');
                        forms[0].classList.add('border-muted');
                        document.getElementById('formLogin').style.display = 'none';
                        document.getElementById('formRegister').style.display = 'block'
                    }
                </script>
            </div>

            <form action="https://fitwear/user/signin" method="post" id="formLogin">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="login" required placeholder="name@example.com">
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="pass" required placeholder="Пароль">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" style="background: #fd7e14; border: #fd7e14" type="submit">Увійти</button>
            </form>


            <form method="post" action="https://fitwear/user/signup" id="formRegister" style="display: none">
                <div class="form-floating">
                    <input type="email" class="form-control" name="login" placeholder="E-mail" id="email" required value="">
                    <label for="email">E-mail</label>
                </div>
                <div class="row g-3">
                    <div class="col form-floating">
                        <input type="text" class="form-control" name="firstname" placeholder="Прізвище" id="first-name" value="" >
                        <label for="first-name" class="form-label">Прізвище</label>
                    </div>
                    <div class="col form-floating">
                        <input type="text" class="form-control" name="middlename" placeholder="Ім'я" id="middle-name" value="">
                        <label for="middle-name" class="form-label">Ім'я</label>
                    </div>
                    <div class="col form-floating">
                        <input type="text" class="form-control" name="lastname" placeholder="По-батькові" id="last-name" value="">
                        <label for="last-name" class="form-label">По-батькові</label>
                    </div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Пароль" required>
                    <label for="exampleInputPassword1">Пароль</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="repass" id="exampleInputPassword2" placeholder="Повторіть пароль" required>
                    <label for="exampleInputPassword2">Повторіть пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" style="background: #fd7e14; border: #fd7e14" type="submit">Зареєструватися</button>
            </form>
            <div class="col-md-6 offset-md-3">
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

