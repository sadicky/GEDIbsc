<div id="Files" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new Document</h4>
      </div>
      <div class="modal-body">
        <div class="error"></div>
        <!-- <form method="post" id='formfile' enctype="multipart/form-data"> -->
        <form method="post" action='Public/Script/File/addfile.php' enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" name="action" value="fileUpload" />
            <div class="col-4">
              <div class="form-group">
                <label>Folder</label>
                <select name="idp" class="form-control" id="idp">
                  <option value="0">No Parent</option>
                  <?php foreach ($getF as $folder) : ?>
                    <option value="<?= $folder->ID ?>"><?= $folder->FOLDER ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Category</label>
                <select name="idc" class="form-control" id="idc">
                  <option value="0">Not</option>
                  <?php foreach ($getC as $category) : ?>
                    <option value="<?= $category->ID ?>"><?= $category->CATEGORIE ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder='Name'/>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>File</label>
                <input type="file"  name="fichier[]" id="fichier"  class="filestyle" id="filestyleicon" required multiple>
                <!-- <input class="form-control" type="file" name="file[]" id="file" required multiple /> -->
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="desc" id="desc" placeholder='Description'></textarea>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label> Save</label><br>
                <button type="submit" name="valider" class="btn btn-primary btn-block btn-md validate"><i class="fas fa-save"></i> <strong> Save Document</strong> </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>