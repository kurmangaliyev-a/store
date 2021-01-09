<h2 style="...">Корзина</h2>
<? if($session['cart']){ ?>


<table calss="table table-striped">
    <thead>
    <tr>
        <th scrope="col">Фото</th>
        <th scrope="col">Наименование</th>
        <th scrope="col">Количество</th>
        <th scrope="col">Цена</th>
        <th scrope="col"></th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($session['cart'] as $id => $good) { ?>
    <tr>
        <td style="..." width="150"><img src="/img/<?=$good['img']?>" alt="<?=$good['name']?>"></td>
        <td style="..."><?=$good['name']?></td>
        <td style="..."><?=$good['goodQuantity']?></td>
        <td style="..."><?=$good['price']*$good['goodQuantity']?> рублей</td>
        <td class="delete" style="text-align: center; cursor:pointer; vertical-align: middle; color:red" data-id="<?=$id?>"><span>x</span></td>
    </tr>
    <? }?>
    <tr style="border-top: 4px solid black">
        <td colspan="4">Всего товаров</td>
        <td class="total-quantity"><?=$session['cart.totalQuantity']?></td>
    </tr>
    <tr>
        <td colspan="4">На самму</td>
        <td style="font-wight: 700"> <?=$session['cart.totalSum']?> тенге </td>
    </tr>
    </tbody>
</table>
<div class="modal-buttons" style="...">
    <button type="button" class="btn btn-danger" onclick="clearCart(event)">Очистить корзину</button>
    <button type="button" class="btn btn-secondary btn-close">Продолжить покупки</button>
    <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
</div>
<? } else {?>
    <h3> В вашей корзине ничего нет: </h3>
    <button type="button" class="btn btn-secondary btn-close" style="width: 200px">Начать покупки</button>
<? }?>