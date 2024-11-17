
<form action="{{ route('cp.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="cp_image">Image</label>
              <input type="file" name="cp_image">
              <input type="hidden" name="old_img" value="{{$data->cp_image}}">
              <img src="{{asset($data->cp_image)}}" style="height: 50px; width: 50px;">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="cp_title">Title</label>
            <input type="text" class="form-control" id="cp_title" name="cp_title" value="{{$data->cp_title}}">
          </div>
          <div class="form-group">
            <label for="cp_message">Message</label>
            	<textarea class="form-control" name="cp_message" id="summernote">{{$data->cp_message}}</textarea>
          </div>
          <div class="form-group">
            <label for="cp_regards">Regards</label>
            <input type="text" class="form-control" name="cp_regards" value="{{$data->cp_regards}}">
          </div>
          <div class="form-group">
            <label for="cp_name">Name</label>
            <input type="text" class="form-control" name="cp_name" value="{{$data->cp_name}}">
          </div>
          <div class="form-group">
            <label for="cp_designation">Designation</label>
            <input type="text" class="form-control" name="cp_designation" value="{{$data->cp_designation}}">
          </div>
          <div class="form-group">
            <label for="cp_organization">Organization</label>
            <input type="text" class="form-control" name="cp_organization" value="{{$data->cp_organization}}">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Submit</button>
      </div>
    </form>