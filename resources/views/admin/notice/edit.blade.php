<form action="{{ route('notice.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{$data->title}}">
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="summernote" name="description">{{$data->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$data->date}}">
          </div>
          <div class="form-group">
            <label for="notice_file">Notice File</label>
              <input type="file" id="notice_file" name="notice_file">
              <input type="hidden" name="old_notice" value="{{$data->notice_file}}">
            <small id="emailHelp" class="form-text text-muted">This is your notice </small>
          </div>
          <div class="form-group">
            <label for="notice_thumbnail">Notice Thumbnail</label>
              <input type="file" id="notice_thumbnail" name="notice_thumbnail">
              <img src="{{asset($data->notice_thumbnail)}}" style="height: 50px; width: 50px;">
              <input type="hidden" name="old_thumbnail" value="{{$data->notice_thumbnail}}">
            <small id="emailHelp" class="form-text text-muted">This is your notice thubmnail </small>
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