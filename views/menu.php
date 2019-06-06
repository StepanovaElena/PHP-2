<ul>
    <li><a href="/">HOME</a></li>
    <li><a href="/product/pag">CATALOG</a></li>
    <li><a href="/cart">CART</a></li>
    <?if($admin):?>
        <li><a href="/user/admin">ADMIN</a></li>
    <?endif;?>
    <?if (($enter) && !($admin)):?>
        <li><a href="/user/account">Personal account</a></li>
    <?endif;?>
</ul>
