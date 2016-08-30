<?php if (isset($_GET['email_ok'])) : ?>
<div class="send-status send-status-ok" style="background-color: green">
    <div class="container">
        <p style="text-align: center; color: #fff; font-size: 16px; margin: 5px 0;">Ваша заявка успешно отправлена!</p>
    </div>
</div>
<?php endif; ?>
<?php if (isset($_GET['email_fail'])) : ?>
<div class="send-status send-status-ok" style="background-color: red">
    <div class="container">
        <p style="text-align: center; color: #fff; font-size: 16px; margin: 5px 0;">Заполните форму правильно!</p>
    </div>
</div>
<?php endif; ?>