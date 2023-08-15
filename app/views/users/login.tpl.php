<?php require_once VIEWS . '/inc/header.php' ?>
<h1>Sign in</h1>

<div class="form-container-add">
    <ul class="error-form-title">
        <li><?= $errLog ?? '' ?></li>
        <li><?= $errDb ?? '' ?></li>
    </ul>

    <form action="/login/form" method="post">

        <?= isset($validation) ? $validation->listErrors('email') : ''  ?>
        <label for="email">Email</label>
        <input type="email" value="<?= old('email') ?>" name="email" placeholder="Email" id="email">

        <?= isset($validation) ? $validation->listErrors('password') : ''  ?>
        <label for="password">Password</label>
        <input type="password" value="<?= old('password') ?>" name="password" placeholder="Password" id="password">

        <input type="submit" style="border: solid 2px rgb(95, 0, 0);" value="Sign in">
    </form>
    <div class="form-link-other">
        <a class="gray-hover" href="/register">Don't have an account? Sign up</a>
    </div>
</div>
<script src="/assets/js/main.js"></script>
<?php require_once VIEWS . '/inc/footer.php' ?>