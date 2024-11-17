<form action="{{ route('ad.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="photo">Photo</label>
              <input type="file" name="photo">
              <img src="{{asset($data->photo)}}" style="height: 50px; width: 50px;">
              <input type="hidden" name="old_photo" value="{{$data->photo}}">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
          </div>
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation" value="{{$data->designation}}">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{$data->email}}">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone" value="{{$data->phone}}">
          </div>
          <div class="form-group">
            <label for="office">Office</label>
            <input type="text" class="form-control" name="office" value="{{$data->office}}">
          </div>
          <div class="form-group">
            <label for="degree">Degree</label>
            <input type="text" class="form-control" name="degree" value="{{$data->degree}}">
          </div>
          <div class="form-group">
            <label for="experience">Experience</label>
            <input type="text" class="form-control" name="experience" value="{{$data->experience}}">
          </div>
          <div class="form-group">
            <label for="contact">Contact Information</label>
            <input type="text" class="form-control" name="contact" value="{{$data->contact}}">
          </div>
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">
          </div>
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
          </div>
          <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}">
          </div>
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" class="form-control" name="youtube" value="{{$data->youtube}}">
          </div>
          
          <div class="form-group">
            <label for="joining_date">Joining Date</label>
            <input type="text" class="form-control" name="joining_date" value="{{$data->joining_date}}">
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