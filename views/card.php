
<div class="description-block">
    <section class="prod-description">
        <div class="gray-line"><div class="pink-line"></div></div>
        <h2><?=$product->name?></h2>
        <p class="prod-description-text"><?=$product->description?></p>

            <div class="price-block">
                <p class="new-price single-price">$<?=$product->price?></p>
            </div>

        <form action="" method="post">
            <a class="cart-button-prod" data-id="<?=$product->name?>" href="#">Add to Cart</a>
        </form>
    </section>
</div>