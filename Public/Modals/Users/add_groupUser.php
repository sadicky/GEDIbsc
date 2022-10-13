<div id="groupUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new Group user</h4>
      </div>
      <div class="modal-body">
        <form method="post" id='formgroup' enctype="multipart/form-data">
          <div class="form-group">
            <label>Group</label>
            <input class="form-control" type="text" name="groupName" id="groupName" placeholder='Nom du nouveau group' required />
          </div>
          <button type="submit" class="btn btn-primary btn-md save_grp"><i class="fas fa-save"></i> <strong> Save group</strong> </button>
        </form>
      </div>
    </div>
  </div>
</div