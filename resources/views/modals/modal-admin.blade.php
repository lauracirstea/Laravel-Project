<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit category</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">User name:</label>
                        <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email address:</label>
                        <input type="text" value="{{ $admin->email }}" name="email" class="form-control" id="recipient-email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select name="role" value="{{ $admin->role }}" class="form-control" id="recipient-role" style="height: calc(3.25rem + 2px);">
                            <option>User</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save" data-id="{{$admin->id}}">Save Changes</button>
            </div>
        </div>
    </div>
</div>

