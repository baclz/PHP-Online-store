<?php require_once VIEWS . '/inc/header.php' ?>
<h1>Admin panel</h1>

<div class="admin-button-create effect-block"><a href="admin/create">Add product</a></div>
<div class="admin-container">
    <?php foreach ($phones as $key => $value) : ?>
        <div class="admin-card effect-block">
            <img src="<?= '/assets/img/productimg/' . $value['tmpimage'] ?>" alt="Product-image">
            <div class="admin-card-title"><?= $value['title'] ?></div>
            <div class="admin-card-desc">Phone</div>
            <a class="admin-card-delete" href="admin/delete?type=phones&id=<?= $value['id'] ?>">Delete</a>
            <div class="admin-hr"></div>
        </div>
    <?php endforeach ?>
    <?php foreach ($laptops as $key => $value) : ?>
        <div class="admin-card effect-block">
            <img src="<?= '/assets/img/productimg/' . $value['tmpimage'] ?>" alt="Product-image">
            <div class="admin-card-title"><?= $value['title'] ?></div>
            <div class="admin-card-desc">Laptop</div>
            <a class="admin-card-delete" href="admin/delete?type=laptops&id=<?= $value['id'] ?>">Delete</a>
            <div class="admin-hr"></div>
        </div>
    <?php endforeach ?>
    <?php foreach ($tablets as $key => $value) : ?>
        <div class="admin-card effect-block">
            <img src="<?= '/assets/img/productimg/' . $value['tmpimage'] ?>" alt="Product-image">
            <div class="admin-card-title"><?= $value['title'] ?></div>
            <div class="admin-card-desc">Table</div>
            <a class="admin-card-delete" href="admin/delete?type=tablets&id=<?= $value['id'] ?>">Delete</a>
            <div class="admin-hr"></div>
        </div>
    <?php endforeach ?>
</div>



<?php require_once VIEWS . '/inc/footer.php' ?>