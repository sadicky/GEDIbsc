<div id="Categories" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new category</h4>
      </div>
      <div class="modal-body">
        <form method="post" id='formcat' enctype="multipart/form-data">
          <div class="form-group">
            <label>Category</label>
            <input class="form-control" type="text" name="cat" id="cat" placeholder='Libellé de la catégorie' autocomplete="off" required />
          </div>
          <button type="submit" class="btn btn-primary btn-md validate"><i class="fas fa-save"></i> <strong> Save</strong> </button>
        </form>
      </div>
    </div>
  </div>
</div>