<form action="{{ route('subcategory.update') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="category_name">Category Name</label>
        <select class="form-control" name="category_id" required>
          @foreach($category as $row)
            <option value="{{$row->id}}" @if($row->id==$data->category_id) selected @endif>{{$row->category_name}}</option>
          @endforeach
        </select>
      </div>
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="form-group">
        <label for="category_name">Subcategory Name</label>
        <input type="text" class="form-control" name="subcategory_name" value="{{$data->subcategory_name}}" required>
        <small id="emailHelp" class="form-text text-muted">This is your sub category</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>