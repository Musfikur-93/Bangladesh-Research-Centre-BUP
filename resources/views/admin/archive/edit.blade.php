<form action="{{ route('archive.update') }}" method="post" id="add-form">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="modal-body"> 
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
          </div>
          <div class="form-group">
            <label for="publication_id">Publication <span class="text-danger">*</span> </label>
            <select class="form-control" name="publication_id">
              <option>Select publication</option>
              @foreach($pub as $row)
                <option value="{{$row->id}}" @if($data->publication_id==$row->id) selected  @endif>{{$row->publication_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$data->date}}">
          </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Submit</button>
      </div>
  </form>