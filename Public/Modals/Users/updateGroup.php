<div id="editgroup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign user </h4>
      </div>
      <div class="modal-body">
        <form method="post" id='form_Editgroup' enctype="multipart/form-data">
          <div class="form-group">
            <label>Edit Group</label>
            <input class="form-control" type="text" name="groupName" id="groupName" placeholder='Nom du nouveau group' required />
          </div>
          <button type="submit" id="editgroup" name="editgroup" value="<?=$data->ID_group?>" class="btn btn-primary btn-md save_grp"><i class="fas fa-save"></i> <strong> Update group</strong> </button>
        </form>
      </div>
    </div>
  </div>
</div