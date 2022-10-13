<?php
require_once('../../../Models/category.class.php');
$cats = new Category();

$id = $_POST['id'];
$cat = $cats->getCatId($id);
?>
<div>
    <form method="post" id='formeditcat' enctype="multipart/form-data">
        <input type="hidden" value="<?= $cat->ID ?>" name="id" id="id" />
        <div class="form-group">
            <label>Category</label>
            <input class="form-control" type="hidden" value="<?= $cat->CREATEDAT ?>" name="dateins" id="dateins" />
            <input class="form-control" type="hidden" value="<?= $cat->IDU ?>" name="user" id="user" />
            <input class="form-control" type="hidden" value="<?= $cat->STATUT ?>" name="statut" id="statut" />
            <input class="form-control" type="text" value="<?= $cat->CATEGORIE ?>" name="cat" id="cat" autocomplete="off" required />
        </div>
        <button class="btn btn-success btn-block submitb" type="submit">
        <i class="fas fa-save"></i>  Save
        </button>
    </form>
</div>