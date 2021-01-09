<h3>Ваш заказ под нолмером <?=$order->id?></h3>
Ваш телефон: <?=$order->phone?>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th style="...">Наименование</th>
            <th style="...">Количество</th>
            <th style="...">Цена</th>
            <th style="...">Сумма</th>
        </tr>
        </thead>
        <?foreach ($session['cart'] as $id=>$item){?>
            <tr>
                <td style="..."> <?=$item['name']?></td>
                <td style="..."> <?=$item['goodQuantity']?></td>
                <td style="..."> <?=$item['price']?></td>
                <td style="..."> <?=$item['price']*$item['goodQuantity']?> тенге</td>
            </tr>
        <?}?>
        <tr>
            <td colspan="3">Итого:</td>
            <td><?=$session['cart.totalQuantity']?> шт</td>
        </tr>
        <tr>
            <td colspan="3">На сумму:</td>
            <td><b><?=$session['cart.totalSum']?></b> тг</td>
        </tr>
    </table>

.
</div>
