<!-- Update data Into The Table -->
<form acion="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category Title</label>

        <?php update_category() ?>

    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Update Category" name="update">
    </div>
</form>