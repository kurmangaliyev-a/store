

<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2><div class="product-title"><?=$good['name']?></div></h2>
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?=$good['img']?>" alt="Филадельфия">
                </div>
                <div class="product-name"><?=$good['name']?></div>
                <div class="product-descr">Описание: <?=$good['composition']?></div>
                <div class="product-descr">Описание: <?=$good['descr']?></div>
                <div class="product-price">Цена: <?=$good['price']?> тенге индекс</div>
                <div class="product-buttons">
                    <button type="button" class="product-button__add btn btn-success">Заказать</button>
                </div>
            </div>
        </div>
    </div>
</div>
