 <form action="{{route('video.update')}}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
         <div class="form-group">
            <label for="video_thumbnail">Video Thumbnail</label>
            <input type="file" class="form-control" name="video_thumbnail">
            <input type="hidden" name="old_thumbnail" value="{{$data->video_thumbnail}}">
          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}" required>
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="summernote">{{$data->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="embed_code">Embed Code</label>
            <input type="text" class="form-control" id="embed_code" name="embed_code" value="{{$data->embed_code}}" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" value="{{$data->date}}">
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
        <button type="submit" class="btn btn-primary"><span class="loading d-none">loading...</span>Update</button>
      </div>
    </form>