
<form action="{{ route('category.update') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="category_name">Category Name</label>
        <input type="text" class="form-control" name="category_name" value="{{ $data->category_name }}">
        <small id="emailHelp" class="form-text text-muted">This is your main category</small>
      </div>
      <input type="hidden" name="id" value="{{ $data->id }}">
      <div class="form-group">
        <label for="frontend">Show on Frontend</label>
        <select class="form-control" name="frontend">
            <option value="1" @if($data->frontend==1) selected @endif>Yes</option>
            <option value="0" @if($data->frontend==0) selected @endif>No</option>
        </select>
        <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>