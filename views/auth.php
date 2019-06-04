<?if (!$enter):?>
    <div class="reg">
        <h4 class="guest-h4">Already registed?</h4>
        <p class="guest-p reg-margin">Please log in. </p>
    </div>
    <form action="/user/login" method="post">
        <div class="auth-form">
            <label for="InputEmail"></label>
            <input class="auth-form-input" name="login" type="text" id="InputEmail" placeholder="Enter login">
        </div>
        <div class="auth-form">
            <label for="InputPassword"></label>
            <input class="auth-form-input" name="password" type="password" id="InputPassword" placeholder="Password">
        </div>
        <div class="auth-form remember">
            <input name="remember" type="checkbox" id="Check">
            <label for="Check">Remember me</label>
        </div>
        <div class="auth-form">
        <button class="auth-button" type="submit" name="login_user">LOGIN</button>
        <a  class="auth-button" href="/">Registration</a>
        </div>
    </form>
<?else:?>
<div class="reg-form">
    <h4> Wellcom to our site!</h4>
    <a class="escape" href='/user/logout'>Escape</a>
</div>
<?endif;?>
