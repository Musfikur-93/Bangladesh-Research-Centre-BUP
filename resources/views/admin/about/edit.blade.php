<form action="{{ route('about.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
      	 <div class="form-group">
            <label for="about_thumbnail">About Thumbnail</label>
              <img src="{{asset($data->about_thumbnail)}}" style="height: 50px; width: 50px;">
              <input type="file" name="about_thumbnail" class="form-control">
              <input type="hidden" name="old_thumbnail" value="{{$data->about_thumbnail}}">
            <small id="emailHelp" class="form-text text-muted">This is your about thubmnail </small>
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="summernote">{{$data->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="vision">Vision</label>
            <input type="text" class="form-control" id="vision" name="vision" value="{{$data->vision}}" required>
          </div>
          <div class="form-group">
            <label for="vision_details">Vision Details</label>
            <textarea class="form-control" name="vision_details">{{$data->vision_details}}</textarea>
          </div>
          <div class="form-group">
            <label for="mission">Mission</label>
            <input type="text" class="form-control" id="mission" name="mission" value="{{$data->mission}}" required>
          </div>
          <div class="form-group">
            <label for="mission_details">Mission Details</label>
            <textarea class="form-control" name="mission_details">{{$data->mission_details}}</textarea>
          </div>
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
   </form>



