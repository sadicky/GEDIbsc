<div id="add_chatroom" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new chat room</h4>
      </div>
      <div class="modal-body">
        <form method="post" id='formchart' enctype="multipart/form-data">
          <div class="form-group">
            <label>Name chat</label>
            <input class="form-control" type="text" name="chatname" id="chatname" placeholder='Chat name' autocomplete="off" required />
          </div>
          <div class="form-group">
            <label>password chat</label>
            <input class="form-control" type="text" name="chatpass" id="chatpass" placeholder='chat pass' autocomplete="off" required />
          </div>
          <button type="submit" class="btn btn-primary btn-md chatlist"><i class="fas fa-save"></i> <strong> Add </strong> </button>
        </form>
      </div>
    </div>
  </div>
</div>