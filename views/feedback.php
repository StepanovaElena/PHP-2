<!-- Форма добавления отзыва о товаре -->
<div class="feedback-form">
    <h4>Here you can leave your feedback!</h4>
    <form class = "feedback-form-fields" action="?c=feedback&a=insert" method="post">
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
        <?foreach ($feedback as $fb):?>
            <div class = "feedback-text">
                <span class="feedback-user-name"><?= $fb["user_name"]?></span>
                <span class="feedback-date"><?= $fb["date"]?></span>
                <p><?=$fb["text"]?></p>
            </div>
        <?endforeach?>
</div>
