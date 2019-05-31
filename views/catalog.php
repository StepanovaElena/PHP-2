
<div class="general-product-block man-product-block" data-gender-type="man">
    <? foreach ($products as $item):?>
        <div class="product-block">
            <?if($item['discount'] != 0):?>
                <div class="discount"><span>-<?=$item['discount']?>%</span></div>
            <?endif;?>
            <a class="product-link" href="/product/card/?id=<?=$item['id']?>">
                <img src="/img/product_img/<?=$item['photo']?>" alt="<?=$item['name']?>">
                <div class="product-text">
                    <h4><?=$item['name']?></h4>
                    <?if(isset($item['discount-price'])):?>
                        <div class="price-block">
                            <p class="old-price">$<?=$item['price']?></p>
                            <p class="new-price">$<?=$item['discount-price']?></p>
                        </div>
                    <?else:?>
                        <p>$<?=$item['price']?></p>
                    <?endif;?>
                </div>
            </a>
        </div>
    <?endforeach?>
</div>
<nav class="nav-numbers">
    <ul class="numbers">
        <?for ($i = 1; $i <= $pages; $i++):?>
            <li><a href="/product/pag/?page=<?=$i?>"><?=$i?></a></li>
        <?endfor;?>
    </ul>
</nav>
    <a class="nav-button" href="/product/catalog">View All -></a>