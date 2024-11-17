<form action="{{ route('author.update') }}" method="post" id="add-form">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="author_name">Author Name</label>
            <input type="text" class="form-control" value="{{$data->author_name}}"  name="author_name">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" value="{{$data->designation}}" name="designation">
          </div>
          <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" value="{{$data->department}}" name="department">
          </div>
          <div class="form-group">
            <label for="institute">Institute</label>
            <input type="text" class="form-control" value="{{$data->institute}}" name="institute">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1" @if($data->status==1) selected @endif>Yes</option>
                <option value="0" @if($data->status==0) selected @endif>No</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Submit</button>
      </div>
    </form>