<?php
session_start();
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-3 mt-5">
            <?php include 'application/instruments/menu.php'?>
        </div>
        <div class="col">
            <h1 class="d-flex justify-content-center m-4">Обліковий запис</h1>
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <form action="update_user_data" method="post">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Оновлення даних</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Прізвище: </th>
                                <td>
                                    <input required class="form-control" id="InputFirstName" name="first_name" value="<?=$_SESSION['user']['user_firstname']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Ім'я: </th>
                                <td>
                                    <input required class="form-control" id="InputMiddleName" name="middle_name" value="<?=$_SESSION['user']['user_middlename']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">По Батькові: </th>
                                <td>
                                    <input required class="form-control" id="InputLastName" name="last_name" value="<?=$_SESSION['user']['user_lastname']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Електронна пошта: </th>
                                <td>
                                    <input type="email" readonly required class="form-control" id="InputEmail" name="login" value="<?=$_SESSION['user']['user_email']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Дата народження: </th>
                                <td>
                                    <input class="form-control" id="InputBirthDate" name="birthday" placeholder="YYYY-MM-DD" value="<?=$_SESSION['user']['user_birthday'] == null ? '' : $_SESSION['user']['user_birthday']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Адреса: </th>
                                <td>
                                    <input class="form-control" id="InputAddress" name="address" value="<?=$_SESSION['user']['user_adress']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Номер телефону: </th>
                                <td>
                                    <input class="form-control" id="InputPhoneNumber" name="phone" value="<?=$_SESSION['user']['user_phone_number']?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-warning">Оновити дані</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="col-6">
                    <form action="update_user_password" method="post">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2">Зміна паролю</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Новий пароль: </th>
                                <td>
                                    <input type="password" required class="form-control" id="InputMiddleName" name="new">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Повторіть новий пароль: </th>
                                <td>
                                    <input type="password" required class="form-control" id="InputLastName" name="confirm">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-warning">Змінити пароль</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
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



