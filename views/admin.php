<h2>ADMIN PAGE</h2>
<h3 class="feedback-admin-title">ALL orders with "NEW" status</h3>

<table class="table table-admin">

    <thead class="table-header">
    <tr>
        <th scope="col">Order number</th>
        <th scope="col">Date</th>
        <th scope="col">User</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
    </tr>
    </thead>

    <tbody id="cart">
        <? foreach ($orders as $item):?>
            <tr class="table-row-admin">
                <th scope="row">
                    <a class="table-row-a" href="/order/info/?order_number=<?=$item['order_number']?>">
                        <h4><?=$item['order_number']?></h4>
                        <img src="/img/icons/inf_black.png" alt="order <?=$item['order_number']?>">
                    </a>
                </th>
                <td><?=$item['date']?></td>
                <td><?=$item['user_login']?></td>
                <td>$<?=$item['total']?></td>
                <td>
                    <a class="confirm-item" href="/order/confirm/?order_number=<?=$item['order_number']?>">
                        <img src="/img/icons/checked_black.png" alt="checked">
                    </a>
                    <a class="decline-item" href="/order/decline/?order_number=<?=$item['order_number']?>">
                        <img src="/img/icons/error.png" alt="canceled">
                    </a>
                </td>
            </tr>

        <?endforeach;?>
    </tbody>

</table>