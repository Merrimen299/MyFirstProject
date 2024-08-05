<?php
    session_start();
?>

<div class="row">
    <div class="col-2">
        <?php include 'application/instruments/menu.php'?>
    </div>
    <div class="col" style="margin-left: 35px">
        <h1 class="d-flex justify-content-center">Налаштування</h1>
        <h4>Мої дані</h4>
        <form action="" method="post" class="mb-2">
            <div class="row g-3 mb-4">
                <div class="col-3">
                    <label>Ім'я*</label>
                    <input required type="text" class="form-control" placeholder="Ім'я" name="last" value="<?=$_SESSION['user']['last_name']?>">
                </div>
                <div class="col-3">
                    <label>Прізвище*</label>
                    <input required type="text" class="form-control" placeholder="Прізвище" name="first" value="<?=$_SESSION['user']['first_name']?>">
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-3">
                    <label>E-mail*</label>
                    <input required type="text" class="form-control" placeholder="Email" name="log" value="<?=$_SESSION['user']['login']?>">
                </div>
                <div class="col-3">
                    <label>Дата народження*</label>
                    <input required type="text" class="form-control" placeholder="YYYY-MM-DD" name="birth" value="<?=$_SESSION['user']['birthday']?>">
                </div>
            </div>

            <hr>
            <h4>Адреса</h4>
            <div class="row g-3 mb-4">
                <div class="col-3">
                    <label>Країна*</label>
                    <select class="form-select" id="inputGroupSelect01" name="country">
                        <option value="Україна" <?php if($_SESSION['user']['country'] == "Україна") echo 'selected="selected"';?>>Україна</option>
                        <option value="Росія" <?php if($_SESSION['user']['country'] == "Росія") echo 'selected="selected"';?>>Росія</option>
                        <option value="Польща" <?php if($_SESSION['user']['country'] == "Польща") echo 'selected="selected"';?>>Польща</option>
                        <option value="Білорусь" <?php if($_SESSION['user']['country'] == "Білорусь") echo 'selected="selected"';?>>Білорусь</option>
                    </select>
                </div>
                <div class="col-3">
                    <label>Місто*</label>
                    <input required type="text" class="form-control" placeholder="Місто" name="city" value="<?=$_SESSION['user']['city']?>">
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-3">
                    <label>Вулиця*</label>
                    <input required type="text" class="form-control" placeholder="Вулиця" name="street" value="<?=$_SESSION['user']['street']?>">
                </div>
                <div class="col-3">
                    <label>Дім/Квартира*</label>
                    <input required type="text" class="form-control" placeholder="Дім/Квартира" name="house" value="<?=$_SESSION['user']['house']?>">
                </div>
            </div>
            <div class="col-3 mb-4">
                <label>Поштовий індекс*</label>
                <input required type="text" class="form-control" placeholder="Поштовий індекс" name="index" value="<?=$_SESSION['user']['post_index']?>">
            </div>

            <hr>
            <h4>Зміна паролю</h4>
            <div class="col-3 mb-4">
                <label>Поточний пароль*</label>
                <input required type="password" class="form-control" name="realpass">
            </div>
            <div class="col-3 mb-4">
                <label>Новий пароль*</label>
                <input required type="password" class="form-control" name="newpass">
            </div>
            <div class="col-3 mb-4">
                <label>Підтвердіть пароль*</label>
                <input required type="password" class="form-control" name="confirmpass">
            </div>
            <hr>
            <button class="btn btn-lg btn-primary d-flex justify-content-center" style="background: #fd7e14; border: #fd7e14" type="submit" >Зберегти зміни</button>
        </form>
        <?php
        if($_SESSION['message']){
            Controller::throwMessage($_SESSION['message']['type'], $_SESSION['message']['text']);
        }
        unset($_POST);
        unset($_SESSION["message"]);
        ?>

    </div>
</div>
