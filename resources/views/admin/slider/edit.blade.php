<form action="{{ route('slider.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="slider-image">Slider Image</label>
              <input type="file" class="dropify" data-height="140" name="slider_img">
              <img src="{{asset($data->slider_img)}}" style="height: 50px; width: 50px;">
              <input type="hidden" name="old_img" value="{{$data->slider_img}}">
            <small id="emailHelp" class="form-text text-muted">This is your Slider Image</small>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1" @if($data->status==1) selected="" @endif>Yes</option>
                <option value="0" @if($data->status==0) selected="" @endif>No</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Update</button>
      </div>
    </form>