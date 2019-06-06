<div class="container header-flex">
    <div class="header-left">
        <a class="logo" href="/home/"><img src="/img/logo/logo.png" alt="Logo">BRAN<span class="pink">D</span></a>
    </div>
    <div class="header-right">
        <? if($ngoods > 0):?>
        <a class="cart-img" href="/cart/"><img src="/img/icons/cart.png" alt="Cart">(<span class = "cart-img-span"><?=$ngoods?></span>)</a>
        <?else:?>
            <a class="cart-img" href="/cart/"><img src="/img/icons/cart.png" alt="Cart">(<span class = "cart-img-span">0</span>)</a>
        <?endif;?>
        <a class="my-account" href="#">My&nbspAccount&nbsp</a>
    </div>
</div>
