<?php require_once VIEWS . '/inc/header.php' ?>
<h1>Sign up</h1>

<div class="form-container-add">
    <ul class="error-form-title">
        <li><?= $errDb ?? '' ?></li>
    </ul>

    <form action="/register/form" method="post">

        <?= isset($validation) ? $validation->listErrors('username') : ''  ?>
        <label for="username">Username</label>
        <input type="text" value="<?= old('username') ?>" name="username" placeholder="Username" id="username">

        <?= isset($validation) ? $validation->listErrors('email') : ''  ?>
        <label for="email">Email</label>
        <input type="email" value="<?= old('email') ?>" name="email" placeholder="Email" id="email">

        <?= isset($validation) ? $validation->listErrors('password') : ''  ?>
        <label for="password">Password</label>
        <input type="password" value="<?= old('password') ?>" name="password" placeholder="Password" id="password">

        <?= isset($validation) ? $validation->listErrors('repassword') : ''  ?>
        <label for="repassword">Repeat password</label>
        <input type="password" value="<?= old('repassword') ?>" name="repassword" placeholder="Repeat password" id="repassword">

        <input type="submit" style="border: solid 2px rgb(95, 0, 0);" value="Sign up">
    </form>

    <div class="form-link-other">
        <a class="gray-hover" href="/login">Have an account? Sign in</a>
    </div>
</div>
<script src="/assets/js/main.js"></script>
<?php require_once VIEWS . '/inc/footer.php' ?>