<?php
session_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="h3 d-flex justify-content-center">Реєстрація</h1>
            <form method="post" action="">
                <div class="form-floating">
                    <input type="email" class="form-control" name="login" placeholder="E-mail" id="exampleInputEmail1" required value="<?= $_POST['login']?>">
                    <label for="exampleInputEmail1">E-mail</label>
                </div>
                <div class="row g-3">
                    <div class="col form-floating">
                        <input type="text" class="form-control" name="firstname" placeholder="Фамилия" value="<?= $_POST['firstname'] ?>" >
                        <label for="exampleInputPassword1" class="form-label">Прізвище</label>
                    </div>
                    <div class="col form-floating">
                        <input type="text" class="form-control" name="lastname" placeholder="Ім'я" value="<?= $_POST['lastname']?>">
                        <label for="exampleInputPassword1" class="form-label">Ім'я</label>
                    </div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Пароль" required>
                    <label for="exampleInputPassword1">Пароль</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="repass" id="exampleInputPassword1" placeholder="Повторіть пароль" required>
                    <label for="exampleInputPassword1">Повторіть пароль</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" style="background: #fd7e14; border: #fd7e14" type="submit">Зареєструватися</button>
                <a class="nav-link" href="login">У вас є аккаунт?</a>
                <?php
                if($_SESSION['message']){
                    Controller::throwMessage($_SESSION['message']['type'], $_SESSION['message']['text']);
                }
                unset($_POST);
                unset($_SESSION["message"]);
                ?>
            </form>
        </div>
    </div>
</div>

