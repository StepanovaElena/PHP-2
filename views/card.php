
<!-- Вывод информации о товаре -->
<a class="back-arrow" href="/product/pag">
    <img src="/img/icons/left-arrow.png" alt="Back arrow">
    <span>Back to product page</span>
</a>

<div class="product-info">
    <div class="product-photo">
        <img src="/img/product_img/<?=$product->photo?>" alt="product">
    </div>

    <div class="description-block">
        <section class="prod-description">
            <div class="gray-line"><div class="pink-line"></div></div>
            <h2><?=$product->name?></h2>
            <p class="prod-description-text"><?=$product->description?></p>
            <div class="prod-point">
                <p>MATERIAL : <span> <?=$product->material?></span></p>
                <p>DESIGNER : <span> <?=$product->designer?></span></p>
            </div>
            <?if(isset($params->discount_price)):?>
                <div class="price-block">
                    <p class="old-price single-price">$<?=$product->price?></p>
                    <p class="new-price single-price">$<?=$product->discount_price?></p>
                </div>
            <?else:?>
                <p>$<?=$product->price?></p>
            <?endif;?>
            <div class="prod-line"></div>
            <div class="select-title">
                <div>
                    <h4>CHOOSE SIZE</h4>
                </div>
            </div>
            <form action="" method="post">
                <div class="select-block">
                    <select class="size" name="size">
                        <?foreach ($product->size as $size):?>
                            <option value="<?=$size?>"><?=$size?></option>
                        <?endforeach?>
                    </select>
                </div>
                <a class="cart-button-prod" data-id="<?=$product->id?>" href="#">Add to Cart</a>
            </form>
            <p><?=$status?></p>
        </section>
    </div>

</div>

<!-- Форма добавления отзыва о товаре -->
<div class="feedback-form">
    <h4>Here you can leave your feedback!</h4>
    <form class = "feedback-form-fields" action="" method="post">
        <input name="id" value="<?=$product->id?>" type="hidden">
        <p>Your name:</p>
        <input name="name" type="text" required>
        <p>Feedback:</p>
        <textarea name="text" required></textarea>
        <input name="submit" value="Send" type="submit">
    </form>

    <!-- Вывод ошибок загрузки -->
    <?php if (!empty($error)): ?>
        <p class='upload_form_error'> <?= $error ?></p>
    <?php endif; ?>
</div>

<!-- Вывод всех отзывов о конктретном товаре -->
<div class="feedback-block">
    <h3>Feedbacks</h3>
    <?if (is_array($fb)):?>
        <?foreach ($fb as $feedback):?>
            <div class = "feedback-text">
                <span class="feedback-user-name"><?= $feedback["user_name"]?></span>
                <span class="feedback-date"><?= $feedback["date"]?></span>
                <p><?=$feedback["text"]?></p>

                <!-- Добавление и показ лайков к отзыву -->
                <div class="feedback-likes">
                    <a class="feedback-likes-btn" href="/single_page/like/<?=$feedback['id']?>/?backid=<?=$product->id?>"" data-id="<?=$feedback['id']?>" >
                    <img src="/img/icons/like.png" alt="Like">
                    <span><?=$feedback['likes']?></span>
                    </a>
                </div>
            </div>
        <?endforeach?>
    <?else:?>
        <p><?=$fb?></p>
    <?endif;?>
</div>

<script>
    (function($) {
        $(function () {
            $('.prod-description').on ('click', '.cart-button-prod', function(){
                var id = $(this).attr("data-id");

                $.ajax({
                    url: "/cart/AddToCart/",
                    type: "POST",
                    dataType : "json",
                    data:{
                        id: id
                    },
                    error: function() {alert("Something went wrong ...");},
                    success: function(answer){
                        $('.cart-img-span').text(answer.ngoods);
                    }
                })
            });
        });
    })(jQuery);
</script>
