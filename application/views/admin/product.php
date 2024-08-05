
<div class="container mt-2">
    <div class="row">
        <div class="col mt-3">
            <div class="d-flex justify-content-center">
                <h4>Новий товар</h4>
            </div>
            <hr>
            <div class="">
                <form enctype="multipart/form-data" method="post" action="https://fitwear/product/add">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <label for="brand" class="form-label">Бренд</label>
                            <select class="form-select" name="brand" aria-label="Default select example">
                                <?php foreach ($data['brands'] as $brand):?>
                                    <option value="<?=$brand['brand_id']?>"><?=$brand['brand_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label for="name" class="form-label">Назва товару</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="category" class="form-label">Артикул</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 g-3">
                        <div class="col-sm-4">
                            <label for="collection" class="form-label">Колекція</label>
                            <select class="form-select" name="collection" aria-label="Default select example">
                                <option value="" selected></option>
                                <?php foreach ($data['collections'] as $collection):?>
                                    <option value="<?=$collection['collection_id']?>"><?=$collection['collection_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            Тип товару
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="shoes" value="shoes">
                                <label class="form-check-label" for="shoes">
                                    Взуття
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="cloth" value="clothes">
                                <label class="form-check-label" for="cloth">
                                    Одяг
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="accessory" value="accessories">
                                <label class="form-check-label" for="accessory">
                                    Аксессуар
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="category" class="form-label">Категорія</label>
                            <input class="form-control" list="categoryList" id="category" name="category" placeholder="Оберіть категорію...">
                            <datalist id="categoryList">
                                <?php foreach ($data['categories'] as $category):?>
                                    <?php foreach ($category as $categoryItem):?>
                                    <option value="<?=$categoryItem['category_type_ua']?>">
                                <?php endforeach; endforeach;?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row mt-3 g-3">
                        <div class="col-sm-4">
                            Стать
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Чоловіча">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Чоловіча
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Жіноча">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Жіноча
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_all" value="Унісекс">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Унісекс
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender_child" value="Дитяча">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Дитяча
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="price" class="form-label">Ціна</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="price" class="form-label">Знижка</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <label for="season" class="form-label">Сезон</label>
                            <input type="text" class="form-control" id="season" name="season" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="maker" class="form-label">Виробник</label>
                            <input type="text" class="form-control" id="maker" name="maker" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="content" class="form-label">Матеріал</label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <label for="desc" class="form-label">Опис</label>
                            <textarea class="form-control" id="desc" name="desc" placeholder="Додайте опис товару..." rows="5" required=""></textarea>
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="sizes" class="form-label">Розміри та кількості</label>
                            <input type="text" class="form-control" id="sizes" name="sizes" placeholder="РОЗМІР-КІЛЬКІСТЬ" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="color" class="form-label">Колір</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Обов'язкове поле*
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            Новий товар
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="new" id="new" value="1">
                                <label class="form-check-label" for="new">
                                    Так
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="new" id="not_new" value="0">
                                <label class="form-check-label" for="not_new">
                                    Ні
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Головне зображення товару</label>
                                <input class="form-control" type="file" id="formFile" name="main_image" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Додаткові зображення товару</label>
                                <input class="form-control" type="file" id="formFile" name="add_images" multiple>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning" type="submit">Додати товар</button>
                </form>
            </div>
        </div>

    </div>
</div>
