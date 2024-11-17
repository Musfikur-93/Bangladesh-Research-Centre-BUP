<form action="{{route('advisor.update')}}" method="post" id="add-form">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$data->title}}">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="eadvisor_name">Name</label>
            <input type="text" class="form-control" name="eadvisor_name" value="{{$data->eadvisor_name}}">
          </div>
          <div class="form-group">
            <label for="eadvisor_desig">Designation</label>
            <input type="text" class="form-control" name="eadvisor_desig" value="{{$data->eadvisor_desig}}">
          </div>
          <div class="form-group">
            <label for="eadvisor_dept">Department</label>
            <input type="text" class="form-control" name="eadvisor_dept" value="{{$data->eadvisor_dept}}">
          </div>
          <div class="form-group">
            <label for="eadvisor_inst">Institute</label>
            <input type="text" class="form-control" name="eadvisor_inst" value="{{$data->eadvisor_inst}}">
          </div>
          <div class="form-group">
            <label for="publication_id">Publication</label>
            <select class="form-control" name="publication_id">
              <option>Select Publication Name</option>
              @foreach($pub as $row)
                <option value="{{$row->id}}" @if($data->publication_id==$row->id) selected @endif>{{$row->publication_name}}</option>
              @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Update</button>
      </div>
    </form>