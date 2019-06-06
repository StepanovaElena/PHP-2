<a class="back-arrow" href="/user/admin">
    <img src="/img/icons/left-arrow.png" alt="Back arrow">
    <span>Back to Admin page</span>
</a>

<h4>Order number # <span><?=$order->order_number?></span></h4>
<p><span><?=$order->date?></span></p>


<table class="table">

    <thead class="table-header">
    <tr>
        <th scope="col">Product name</th>
        <th scope="col">Unite Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Quantity</th>
        <th scope="col">Subtotal</th>
    </tr>
    </thead>

    <tbody id="cart">
        <? foreach ($positions as $item):?>

            <tr class="table-row-admin">
                <th scope="row">
                    <h4><?=$item['name']?></h4>
                </th>
                <td>$<?=$item['price']?></td>
                <td>-<?=$item['discount']?>%</td>
                <td><?=$item['quantity']?></td>
                <td>$<?=$item['subtotal']?></td>
            </tr>

        <?endforeach;?>
    </tbody>

</table>

<div class="order-total-info">
    <p>Delivery: <?=$order->delivery?></p>
    <p>Subtotal price: <span>$<?=$total?></span></p>
    <h3>Total price: <span>$<?=$total?></span></h3>
</div>

<div class="user-info">
    <h4>User information</h4>
    <h5>User: <span><?=$order->user_login?></span></h5>
    <h5>Telephone: <?=$order->telephone?></h5>
</div>

