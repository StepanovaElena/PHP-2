<div class="container header-flex">
    <div class="header-left">
        <a class="logo" href="/"><img src="/img/logo/logo.png" alt="Logo">BRAN<span class="pink">D</span></a>
    </div>
    <div class="header-right">
        <? if($ngoods > 0):?>
        <a class="cart-img" href="/cart/"><img src="/img/icons/cart.png" alt="Cart">(<span class = "cart-img-span"><?=$ngoods?></span>)</a>
        <?else:?>
            <a class="cart-img" href="/cart/"><img src="/img/icons/cart.png" alt="Cart">(<span class = "cart-img-span">0</span>)</a>
        <?endif;?>
        <? if($enter):?>
            <a class="my-account" href="/user/account">My&nbspAccount&nbsp</a>
        <?else:?>
            <a class="my-account" href="/">My&nbspAccount&nbsp</a>
        <?endif;?>
    </div>
</div>
