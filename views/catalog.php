Каталог: <br>

<? foreach ($products as $product):?>
    <h2><a href="?c=product&a=card&id=<?=$product['id']?>"> <?=$product['name']?></a></h2>
    <p><?=$product['description']?></p>
    <p>Цена: <?=$product['price']?></p>
<?endforeach;?>

<a href="?c=product&a=catalog&page=<?=$page?>">Еще</a>