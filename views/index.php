<h1>HOME</h1>
<?if(!$enter):?>
<div class="shipping-adress">
    <div class="guest">
        <h4 class="guest-h4">Register and save time!</h4>
        <p class="guest-p">Register with us for future convenience</p>
        <p class="guest-p guest-p-margin">Fast and easy checkout</p>
        <p class="guest-p">Easy access to your order history and status</p>
    </div>
    <form action="/user/signUp" method="post">
        <div class="auth-form">
            <label for="inputEmail"></label>
            <input class="auth-form-input" name="login" type="text" id="inputLogin" placeholder="Enter login">
        </div>
        <div class="auth-form">
            <label for="inputPassword"></label>
            <input class="auth-form-input" name="password" type="password" id="inputPassword" placeholder="Password">
        </div>
        <div class="auth-form">
            <label for="inputEmail"></label>
            <input class="auth-form-input" name="e-mail" type="e-mail" id="inputEmail" placeholder="Enter e-mail">
        </div>
        <div class="auth-form">
            <label for="inputEmail"></label>
            <input class="auth-form-input" name="nick_name" type="text" id="inputName" placeholder="Enter your name">
        </div>

        <div class="auth-form remember">
            <input name="remember" type="checkbox" id="reg">
            <label for="reg">Remember me</label>
        </div>
        <div class="auth-form">
            <button class="guest-button" type="submit" name="reg_user">Confirm</button>
        </div>
    </form>
</div>
<?endif;?>