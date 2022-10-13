<?php
require_once('../../../Models/file.class.php');
$files = new File();

$id = $_POST['id'];
$file = $files->getTheFile($id);
?>
<div>
    <form method="post" id='formeditfile' enctype="multipart/form-data">
        <input type="hidden" value="<?= $file->ID ?>" name="id" id="id" />
        <div class="form-group">
            <label>File</label>
            <input class="form-control" type="text" value="<?= $file->NAMEF ?>" name="file" id="file" autocomplete="off" required />
        </div>
        <button class="btn btn-success btn-block submitr" type="submit">
            <i class="fas fa-save"></i> Save
        </button>
    </form>
</div>