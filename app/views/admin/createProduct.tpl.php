<?php require_once VIEWS . '/inc/header.php' ?>
<h1>Product creation</h1>

<div class="form-container-add">
    <ul class="error-form-title">
        <li><?= $errImg ?? '' ?></li>
        <li><?= $errDb ?? '' ?></li>
    </ul>

    <form action="/admin/product" method="post" enctype="multipart/form-data">
        <select id="select-product" name="form-categories">
            <option value="phones">Phones</option>
            <option value="tablets">Tablets</option>
            <option value="laptops">Laptops</option>
        </select>

        <?= isset($validation) ? $validation->listErrors('title') : ''  ?>
        <label for="product-title">Product name</label>
        <input type="text" value="<?= old('title') ?>" name="title" placeholder="Product name" id="product-title">

        <?= isset($validation) ? $validation->listErrors('brand') : ''  ?>
        <label for="product-brand">Brand</label>
        <input type="text" value="<?= old('brand') ?>" name="brand" placeholder="Brand" id="product-brand">

        <?= isset($validation) ? $validation->listErrors('excerpt') : ''  ?>
        <label for="product-desc">Description</label>
        <input type="text" value="<?= old('excerpt') ?>" name="excerpt" placeholder="Product description" id="product-desc">

        <?= isset($validation) ? $validation->listErrors('memory') : ''  ?>
        <label for="product-memory">Internal memory</label>
        <input type="number" value="<?= old('memory') ?>" name="memory" placeholder="Internal memory" id="product-memory">

        <?= isset($validation) ? $validation->listErrors('camera') : ''  ?>
        <label id="productcameralabel" for="product-camera">Megapixels</label>
        <input type="text" value="<?= old('camera') ?>" name="camera" placeholder="Megapixels" id="productcamerainput">

        <?= isset($validation) ? $validation->listErrors('os') : ''  ?>
        <label for="product-OS">OS</label>
        <input type="text" value="<?= old('os') ?>" name="os" placeholder="Operating system" id="product-OS">

        <?= isset($validation) ? $validation->listErrors('diagonal') : ''  ?>
        <label for="product-diagonal">Screen diagonal</label>
        <input type="text" value="<?= old('diagonal') ?>" placeholder="Screen diagonal" name="diagonal" id="product-diagonal">

        <?= isset($validation) ? $validation->listErrors('color') : ''  ?>
        <label for="product-color">Color</label>
        <input type="text" value="<?= old('color') ?>" name="color" placeholder="Product color" id="product-color">

        <?= isset($validation) ? $validation->listErrors('price') : ''  ?>
        <label for="product-price">Price</label>
        <input type="number" value="<?= old('price') ?>" name="price" placeholder="The price of the product" id="product-price">

        <label for="product-img">Product image</label>
        <input type="file" name="img" id="product-img">

        <input type="submit" style="border: solid 2px rgb(95, 0, 0);" value="Create">
    </form>
</div>
<?php require_once VIEWS . '/inc/footer.php' ?>