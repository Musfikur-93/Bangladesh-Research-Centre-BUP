<form action="{{route('event.update')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="modal-body">
          <div class="form-group">
            <label for="e_thumbnail">Event Thumbnail</label>
              <img src="{{asset($data->e_thumbnail)}}" style="height: 50px; width: 50px;">
              <input type="file" name="e_thumbnail">
              <input type="hidden" name="old_thumb" value="{{$data->e_thumbnail}}">
            <small id="emailHelp" class="form-text text-muted">This is your Event Thumbnail</small>
          </div>
          <div class="form-group">
            <label for="keynote_img">Keynote Speaker Image</label>
              <input type="file" name="keynote_img">
              <img src="{{asset($data->keynote_img)}}" style="height: 50px; width: 50px;">
              <input type="hidden" name="old_img" value="{{$data->keynote_img}}">
            <small id="emailHelp" class="form-text text-muted">This is your Keynote Speaker Image</small>
          </div>
          <div class="form-group">
            <label for="chief_img">Chief Guest Image</label>
              <img src="{{asset($data->chief_img)}}" style="height: 50px; width: 50px;">
              <input type="file" name="chief_img">
              <input type="hidden" name="old_img_one" value="{{$data->chief_img}}">
            <small id="emailHelp" class="form-text text-muted">This is your Chief Guest Image</small>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="e_title">Title</label>
                <input type="text" class="form-control" name="e_title" value="{{$data->e_title}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="e_venue">Venue</label>
                <input type="text" class="form-control" name="e_venue" value="{{$data->e_venue}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="e_time">Time</label>
                <input type="text" class="form-control" name="e_time" value="{{$data->e_time}}">
              </div>
          </div>
          
          <div class="form-group">
            <label for="e_des">Description</label>
              <textarea class="form-control" name="e_des" id="summernote">{{$data->e_des}}</textarea>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="keynote_name">Keynote Name</label>
                <input type="text" class="form-control" name="keynote_name" value="{{$data->keynote_name}}">
              </div>
              <div class="form-group col-lg-4">
                  <label for="keynote_desig">Designation</label>
                  <input type="text" class="form-control" name="keynote_desig" value="{{$data->keynote_desig}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="keynote_organization">Organization</label>
                <input type="text" class="form-control" name="keynote_organization" value="{{$data->keynote_organization}}">
              </div>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="chief_name">Chief Name</label>
                <input type="text" class="form-control" name="chief_name" value="{{$data->chief_name}}">
              </div>
              <div class="form-group col-lg-4">
                  <label for="chief_desig">Designation</label>
                  <input type="text" class="form-control" name="chief_desig" value="{{$data->chief_desig}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="chief_organization">Organization</label>
                <input type="text" class="form-control" name="chief_organization" value="{{$data->chief_organization}}">
              </div>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="keynote_type">Keynote Type</label>
                <input type="text" class="form-control" name="keynote_type" value="{{$data->keynote_type}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="chief_type">Chief Type</label>
                <input type="text" class="form-control" name="chief_type" value="{{$data->chief_type}}">
              </div>
              <div class="form-group col-lg-4">
                <label for="date">Date</label>
                <input type="text" class="form-control" name="date" value="{{$data->date}}">
              </div>
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