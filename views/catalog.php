
<div class="general-product-block man-product-block" data-gender-type="man">
<? foreach ($products as $item):?>
    <div class="product-block">
        <a class="product-link" href="?p=card&a=card&id=<?=$item['id']?>">
            <img src="../img/product_img/<?=$item['photo']?>" alt="<?=$item['name']?>">
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

<?for ($i = 1; $i <= $pages; $i++):?>
    <a href="?p=catalog&a=pag&page=<?=$i?>"><?=$i?></a>
<?endfor;?>
    <a href="?p=catalog&a=catalog">View All -></a>

