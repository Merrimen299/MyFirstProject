<div class="accordion accordion-flush" id="accordionFlushExample">
    <form method="get" id="catalogFilterForm">

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseOne">
                Сортування
            </button>
        </h2>
        <div id="flush-collapse1" class="accordion-collapse collapse">
            <ul class="list-group">
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="filter" value="recs" id="firstRadio" checked>
                    <label class="form-check-label" for="firstRadio">Рекомендації</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="filter" value="new" id="secondRadio">
                    <label class="form-check-label" for="secondRadio">Найновіше</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="filter" value="to_high" id="thirdRadio">
                    <label class="form-check-label" for="thirdRadio">Ціна від меншої до більшої</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="filter" value="to_low" id="thirdRadio">
                    <label class="form-check-label" for="thirdRadio">Ціна від більшої до меншої</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="filter" value="disc" id="thirdRadio">
                    <label class="form-check-label" for="thirdRadio">За знижками</label>
                </li>
            </ul>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapseTwo">
                Категорія
            </button>
        </h2>
        <div id="flush-collapse2" class="accordion-collapse collapse">
            <ul class="list-group">
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="category" value="sections-all" id="radioAllCategory" checked>
                    <label class="form-check-label" for="radioAllCategory">Всі</label>
                </li>
                <li class="list-group-item" style="position: relative">
                    <input class="form-check-input me-1" type="radio" id="radioShoes" name="category" value="shoes">
                    <label class="form-check-label" for="radioShoes">Взуття</label>
                    <div class="d-inline" id="accordionButtonShoes" style="position: absolute; right: 10px; transform: rotate(0deg)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4"/>
                        </svg>
                    </div>
                    <div class="ms-4" id="selectShoes" style="display: none">
                        <?php foreach ($data['categories'][0] as $item):?>
                            <input class="form-check-input" type="checkbox" name="categoryShoes" value="<?= $item['category_type_en']?>" id="checkCategory<?= $item['category_type_en']?>">
                            <label class="form-check-label" for="checkCategory<?= $item['category_type_en']?>">
                                <?= $item['category_type_ua']?>
                            </label>
                            <br>
                        <?php endforeach;?>
                    </div>
                </li>
                <li class="list-group-item" style="position: relative">
                    <input class="form-check-input me-1" type="radio" name="category" value="clothes" id="radioCloth">
                    <label class="form-check-label" for="radioCloth">Одяг</label>
                    <div class="d-inline" id="accordionButtonCloth" style="position: absolute; right: 10px; transform: rotate(0deg)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4"/>
                        </svg>
                    </div>
                    <div class="ms-4" id="selectCloth" style="display: none">
                        <?php foreach ($data['categories'][1] as $item):?>
                            <input class="form-check-input" type="checkbox" name="categoryCloth" value="<?= $item['category_type_en']?>" id="checkCategory<?= $item['category_type_en']?>">
                            <label class="form-check-label" for="checkCategory<?= $item['category_type_en']?>">
                                <?= $item['category_type_ua']?>
                            </label>
                            <br>
                        <?php endforeach;?>
                    </div>
                </li>
                <li class="list-group-item" style="position: relative">
                    <input class="form-check-input me-1" type="radio" name="category" value="accessories" id="thirdRadio">
                    <label class="form-check-label" for="thirdRadio">Аксесуари</label>
                    <div class="d-inline" id="accordionButtonAcc" style="position: absolute; right: 10px; transform: rotate(0deg)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4"/>
                        </svg>
                    </div>
                    <div class="ms-4" id="selectAcc" style="display: none">
                        <?php foreach ($data['categories'][2] as $item):?>
                            <input class="form-check-input" type="checkbox" name="categoryAcc" value="<?= $item['category_type_en']?>" id="checkCategory<?= $item['category_type_en']?>">
                            <label class="form-check-label" for="checkCategory<?= $item['category_type_en']?>">
                                <?= $item['category_type_ua']?>
                            </label>
                            <br>
                        <?php endforeach;?>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapseThree">
                Стать
            </button>
        </h2>
        <div id="flush-collapse3" class="accordion-collapse collapse">
            <ul class="list-group">
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="gender" value="gender-all" id="radioGenderAll">
                    <label class="form-check-label" for="radioGenderAll">Всім</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="gender" value="male" id="radioGenderMale">
                    <label class="form-check-label" for="radioGenderMale">Чоловікам</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="gender" value="female" id="radioGenderFemale">
                    <label class="form-check-label" for="radioGenderFemale">Жінкам</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="gender" value="child" id="radioGenderChild">
                    <label class="form-check-label" for="radioGenderChild">Дітям</label>
                </li>
            </ul>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapseThree">
                Розмір взуття
            </button>
        </h2>
        <div id="flush-collapse4" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="ms-4" id="selectShoesSize">

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapseThree">
                Розмір одягу
            </button>
        </h2>
        <div id="flush-collapse5" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="ms-4" id="selectClothSize">

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapseThree">
                Розмір аксесуарів
            </button>
        </h2>
        <div id="flush-collapse6" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="ms-4" id="selectAccSize">

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapseThree">
                Бренд
            </button>
        </h2>
        <div id="flush-collapse7" class="accordion-collapse collapse">
            <div class="accordion-body">
                <?php foreach ($data['brands'] as $item):?>
                    <input class="form-check-input" type="checkbox" name="brand" value="<?= $item['brand_name']?>" id="checkBrand<?= $item['brand_name']?>">
                    <label class="form-check-label" for="checkBrand<?= $item['brand_name']?>">
                        <?= $item['brand_name']?>
                    </label>
                    <br>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapseThree">
                Колір
            </button>
        </h2>
        <div id="flush-collapse8" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div id="selectColor">

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapseThree">
                Сезон
            </button>
        </h2>
        <div id="flush-collapse9" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div id="selectSeason">

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse11" aria-expanded="false" aria-controls="flush-collapseThree">
                Ціна
            </button>
        </h2>
        <div id="flush-collapse11" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="row">
                    <div class="col" style="position: relative">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price_min" id="MinPrice" placeholder="Min" value="<?=$data['prices']['min']?>">
                            <label for="floatingInput1">Від</label>
                        </div>
                        <span style="position: absolute; top: 30%; left: 97%">-</span>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price_max" id="MaxPrice" placeholder="Max" value="<?=$data['prices']['max']?>">
                            <label for="floatingInput2">До</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <button type="button" id="useFilter" class="btn btn-warning mt-2 w-100">Застосувати фільтри</button>
    </form>
</div>
<script>
    let category = '',
        gender = '',
        sort = '',
        sizeShoes = '',
        sizeCloth = '',
        sizeAcc = '',
        brand = '',
        color = '',
        season = '',
        priceMin = '',
        priceMax = '';

    //----------------------------------------------------Category---------------------------------------------------
    let catFiltForm = document.getElementById('catalogFilterForm')
    let radsCatMain = catFiltForm.category
    let checksCatShoes = catFiltForm.categoryShoes
    let checksCatCloth = catFiltForm.categoryCloth
    let checksCatAcc = catFiltForm.categoryAcc
    for (let  i = 0; i < radsCatMain.length; i++){
        radsCatMain[i].oninput = () => {
            for (let  j = 0; j < checksCatShoes.length; j++){
                if (checksCatShoes[j].checked){
                    checksCatShoes[j].checked = false
                }
            }
            for (let  j = 0; j < checksCatCloth.length; j++){
                if (checksCatCloth[j].checked){
                    checksCatCloth[j].checked = false
                }
            }
            for (let  j = 0; j < checksCatAcc.length; j++){
                if (checksCatAcc[j].checked){
                    checksCatAcc[j].checked = false
                }
            }
            category = radsCatMain.value;
        }
    }
    for (let  i = 0; i < checksCatShoes.length; i++){
        checksCatShoes[i].oninput = () => {
            for (let  j = 0; j < radsCatMain.length; j++){
                if (radsCatMain[j].checked){
                    radsCatMain[j].checked = false
                }
            }
            let value = ''
            for (let  j = 0; j < checksCatShoes.length; j++){
                if (checksCatShoes[j].checked){
                    value += checksCatShoes[j].value.toString()
                    value += ','
                }
            }
            category = value.slice(0,-1)
        }
    }
    for (let  i = 0; i < checksCatCloth.length; i++){
        checksCatCloth[i].oninput = () => {
            for (let  j = 0; j < radsCatMain.length; j++){
                if (radsCatMain[j].checked){
                    radsCatMain[j].checked = false
                }
            }
            let value = ''
            for (let  j = 0; j < checksCatCloth.length; j++){
                if (checksCatCloth[j].checked){
                    value += checksCatCloth[j].value.toString()
                    value += ','
                }
            }
            category = value.slice(0,-1)
        }
    }
    for (let  i = 0; i < checksCatAcc.length; i++){
        checksCatAcc[i].oninput = () => {
            for (let  j = 0; j < radsCatMain.length; j++){
                if (radsCatMain[j].checked){
                    radsCatMain[j].checked = false
                }
            }
            let value = ''
            for (let  j = 0; j < checksCatAcc.length; j++){
                if (checksCatAcc[j].checked){
                    value += checksCatAcc[j].value.toString()
                    value += ','
                }
            }
            category = value.slice(0,-1)
        }
    }
    let AccButts = ['Shoes', 'Cloth', 'Acc']
    for (let  i = 0; i < AccButts.length; i++){
        document.getElementById('accordionButton' + AccButts[i]).onclick = () =>{
            document.getElementById('select' + AccButts[i]).classList.toggle('d-block');
            document.getElementById('accordionButton' + AccButts[i]).style.transform = document.getElementById('accordionButton' + AccButts[i]).style.transform == 'rotate(0deg)' ? 'rotate(180deg)' : 'rotate(0deg)'
            document.getElementById('accordionButton' + AccButts[i]).style.transition = '0.3s'
        }
    }
    //----------------------------------------------------Gender---------------------------------------------------

    for (let  i = 0; i < catFiltForm.gender.length; i++){
        catFiltForm.gender[i].oninput = () => {
            gender = catFiltForm.gender.value;
        }
    }
    //----------------------------------------------------Sort---------------------------------------------------

    for (let  i = 0; i < catFiltForm.filter.length; i++){
        catFiltForm.filter[i].oninput = () => {
            sort = catFiltForm.filter.value;
        }
    }

    //----------------------------------------------------Shoes---------------------------------------------------

    for (let i = 38; i <= 46; i += 0.5){
        document.getElementById('selectShoesSize').innerHTML += '<input class="form-check-input me-1" name="shoesSize" type="checkbox" value="' + i.toString() + '" id="checkShoesSize' + i.toString() + '">' +
            '<label class="form-check-label" for="checkShoesSize' + i.toString() + '">' +
            i.toString() +
            '</label><br>'
    }
    for (let  i = 0; i < catFiltForm.shoesSize.length; i++){
        catFiltForm.shoesSize[i].oninput = () => {
            let value = ''
            for (let  j = 0; j < catFiltForm.shoesSize.length; j++){
                if (catFiltForm.shoesSize[j].checked){
                    value += catFiltForm.shoesSize[j].value.toString()
                    value += ','
                }
            }
            sizeShoes = value.slice(0,-1)
        }
    }
    //----------------------------------------------------Clothes---------------------------------------------------

    let clothSizes = ['XS','S','M','L','XL','2XL', '3XL']
    for (let i = 0; i < clothSizes.length; i++){
        document.getElementById('selectClothSize').innerHTML += '<input class="form-check-input me-1" name="clothSize" type="checkbox" value="' + clothSizes[i] + '" id="checkClothSize' + clothSizes[i] + '">' +
            '<label class="form-check-label" for="checkClothSize' + clothSizes[i] + '">' +
            clothSizes[i] +
            '</label><br>'
    }
    for (let  i = 0; i < catFiltForm.clothSize.length; i++){
        catFiltForm.clothSize[i].oninput = () => {
            let value = ''
            for (let  j = 0; j < catFiltForm.clothSize.length; j++){
                if (catFiltForm.clothSize[j].checked){
                    value += catFiltForm.clothSize[j].value.toString()
                    value += ','
                }
            }
            sizeCloth = value.slice(0,-1)
        }
    }
    //----------------------------------------------------Accessories---------------------------------------------------
    let accSizes = ['OS', 'UNI', 'ADULT', 'S/M', 'M/L', 'L/XL', '35-38', '39-42', '43-46']
    for (let i = 0; i < accSizes.length; i++){
        document.getElementById('selectAccSize').innerHTML += '<input class="form-check-input me-1" name="accSize" type="checkbox" value="' + accSizes[i] + '" id="checkAccSize' + accSizes[i] + '">' +
            '<label class="form-check-label" for="checkAccSize' + accSizes[i] + '">' +
            accSizes[i] +
            '</label><br>'
    }
    for (let  i = 0; i < catFiltForm.accSize.length; i++){
        catFiltForm.accSize[i].oninput = () => {
            let value = ''
            for (let  j = 0; j < catFiltForm.accSize.length; j++){
                if (catFiltForm.accSize[j].checked){
                    value += catFiltForm.accSize[j].value.toString()
                    value += ','
                }
            }
            sizeAcc = value.slice(0,-1)
        }
    }
    //----------------------------------------------------Color---------------------------------------------------

    let colors = [
        {color_en: 'black', color_ua: 'Чорний'},
        {color_en: 'gray', color_ua: 'Сірий'},
        {color_en: 'white', color_ua: 'Білий'},
        {color_en: 'green', color_ua: 'Зелений'},
        {color_en: 'red', color_ua: 'Червоний'},
        {color_en: 'yellow', color_ua: 'Жовтий'},
        {color_en: 'blue', color_ua: 'Синій'},
        {color_en: 'orange', color_ua: 'Помаранчевий'},
        {color_en: 'brown', color_ua: 'Коричневий'}
    ]
    for (let i = 0; i < colors.length; i++){
        document.getElementById('selectColor').innerHTML += '<input class="form-check-input me-1" name="color" type="checkbox" value="' + colors[i]["color_en"] + '" id="checkColor' + colors[i]["color_en"] + '">' +
            '<label class="form-check-label" for="checkAccSize' + colors[i]["color_en"] + '">' +
            colors[i]["color_ua"] +
            '</label><br>'
    }
    for (let  i = 0; i < catFiltForm.color.length; i++){
        catFiltForm.color[i].oninput = () => {
            let value = ''
            for (let  j = 0; j < catFiltForm.color.length; j++){
                if (catFiltForm.color[j].checked){
                    value += catFiltForm.color[j].value.toString()
                    value += ','
                }
            }
            color = value.slice(0,-1)
        }
    }
    //----------------------------------------------------Season---------------------------------------------------

    let seasons = ['Всесезон', 'Демисезон', 'Зима', 'Осінь-Зима', 'Весна-Літо', 'Літо']
    for (let i = 0; i < seasons.length; i++){
        document.getElementById('selectSeason').innerHTML += '<input class="form-check-input me-1" name="season" type="checkbox" value="' + seasons[i] + '" id="checkSeason' + seasons[i] + '">' +
            '<label class="form-check-label" for="checkSeason' + seasons[i] + '">' +
            seasons[i] +
            '</label><br>'
    }
    for (let  i = 0; i < catFiltForm.season.length; i++){
        catFiltForm.season[i].oninput = () => {
            let value = ''
            for (let  j = 0; j < catFiltForm.season.length; j++){
                if (catFiltForm.season[j].checked){
                    value += catFiltForm.season[j].value.toString()
                    value += ','
                }
            }
            seasons = value.slice(0,-1)
        }
    }
    //----------------------------------------------------Price---------------------------------------------------
    catFiltForm.price_min.onchange = () =>{
        priceMin = catFiltForm.price_min.value
    }
    catFiltForm.price_max.onchange = () =>{
        priceMax = catFiltForm.price_max.value
    }
    //----------------------------------------------------Using---------------------------------------------------
    //----------------------------------------------------Filters---------------------------------------------------
    //----------------------------------------------------!!!---------------------------------------------------

    document.getElementById('useFilter').onclick = () =>{
        let a = category + '/' + gender
        let get = ''
        if(sort != ''){
            get += '&f=' + sort
        }if(sizeShoes != ''){
            get += '&size_shoes=' + sizeShoes
        }if(sizeCloth != ''){
            get += '&size_clothes=' + sizeCloth
        }if(sizeAcc != ''){
            get += '&size_accessories=' + sizeAcc
        }if(brand != ''){
            get += '&brand=' + brand
        }if(color != ''){
            get += '&color=' + color
        }if(season != ''){
            get += '&season=' + season
        }if(priceMin != ''){
            get += '&pr_min=' + priceMin
        }if(priceMax!= ''){
            get += '&pr_max=' + priceMax
        }
        if (get != ''){
            get = get.slice(1)
            a = a + '/?' + get
        }
        window.location = 'https://fitwear/main/catalog/' + a
    }
</script>