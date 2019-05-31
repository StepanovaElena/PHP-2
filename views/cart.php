<div class="table-position">
    <table class="table">

        <thead class="table-header">
        <tr>
            <th scope="col">Product Details</th>
            <th scope="col">unite Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">shipping</th>
            <th scope="col">Subtotal</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>

        <tbody id="cart">
        <?if (is_array($products)):?>
            <? foreach ($products as $item):?>

                <tr class="table-row">
                    <th scope="row">
                        <a class="row-a" href="/product/card/?id=<?=$item['id']?>">
                            <img class="table-row-img"src="/img/product_img/<?=$item['photo']?>" alt="product<?=$item['id']?>">
                            <h4><?=$item['name']?></h4>
                            <p>Color:<span><?=$item['color']?></span></p>
                            <p class="row-p" >Size:<span><?=$item['size']?></span></p>
                        </a>
                    </th>
                    <?if (isset($item['discount-price'])):?>
                        <td>$<?=$item['discount-price']?></td>
                    <?else:?>
                        <td>$<?=$item['price']?></td>
                    <?endif;?>
                    <td><input id="unt-qnt" class="unt-qnt" data-id="<?=$item['id']?>" type="number" value="<?=$item['quantity']?>" placeholder="1" min="1" step="1"></td>
                    <td>FREE</td>
                    <td id="subtotal" data-id="<?=$item['id']?>">$<?=$item['subtotal']?></td>
                    <td>
                        <a class="delete-item" href="/cart/delete/?id=<?=$item['id']?>">
                            <img src="/img/icons/cancel.png" alt="cancel">
                        </a>
                    </td>
                </tr>

            <?endforeach;?>
        <?endif;?>

        </tbody>

    </table>
    <div><?=$msg?></div>
    <footer class="cart-footer">
        <div class="cart-button">
            <a href="/cart/clear">CLEAR SHOPPING CART</a>
            <a href="/product/catalog">CONTINUE SHOPPING</a>
        </div>

        <form id="review-form" action="/cart/checkout" method="post">
            <select class="country" name="Country">
                <option value="Country">Select Country...</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="USA">USA</option>
            </select>
            <input class="country" type="text" name="telephone" placeholder="+7 (111) 111-11-11" required>

            <div class="cart-form">
                <div class="cart-total">
                    <h5>Sub Total $ <span id="cart-subtotal"><?=$total?></span></h5>
                    <h4>GRAND TOTAL $<span id="cart-grandtotal"><?=$total?></span></h4>
                    <a href="/cart/checkout"><button class="proceed-button">proceed to checkout</button></a>

                </div>
            </div>
        </form>
    </footer>

</div>

<script>
    (function($) {
        $(function () {
            // Слушаем нажатия на изменение количества товара в корзине
            $('#cart').on('input', '.unt-qnt', function () {
                //Получаем значение количества
                var qnt = $(this).val();
                //Получаем значение id товара из корзины
                var id = $(this).attr('data-id');
                //Обнуляем корзину
                if (qnt > 0) {
                    // Отправляем запрос на изменение количества
                    $.ajax({
                        url: "/changeItemQnt/",
                        type: "POST",
                        dataType : "json",
                        data:{
                            id: id,
                            quantity: +qnt
                        },
                        error: function() {alert("Something went wrong ...");},
                        success: function(answer){
                            // Перерисовываем корзины
                            $('td[data-id="' + answer.id + '"]').text('$' + answer.subtotal);
                            $('input[data-id="' + answer.id + '"]').val(answer.qnt);
                            $('.cart-img-span').text(answer.ngoods);
                            $('#cart-subtotal').text(answer.total);
                            $('#cart-grandtotal').text(answer.total);
                        }

                    })
                }
            });
        });
    })(jQuery);
</script>