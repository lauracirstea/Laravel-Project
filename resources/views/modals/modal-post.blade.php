<div class="modal fade" id="modal-post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit post</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="recipient-title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Body:</label>
                        <textarea type="text" name="body" class="form-control" id="recipient-body">{{ $post->body }}</textarea>
                        {{--<input type="text" value="{{ $post->body }}" name="body" class="form-control" id="recipient-body">--}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save" data-id="{{$post->id}}">Save Changes</button>
            </div>
        </div>
    </div>
</div>

