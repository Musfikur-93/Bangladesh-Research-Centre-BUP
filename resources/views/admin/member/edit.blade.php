 <form action="{{ route('member.update') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="m_thumbnial">Thumbnail</label>
              <input type="file" name="m_thumbnial">
              <img src="{{asset($data->m_thumbnial)}}" style="height: 50px; width: 50px;">
              <input type="hidden" name="old_thumbnial" value="{{$data->m_thumbnial}}">
          </div>
		  <input type="hidden" name="id" value="{{$data->id}}">           
          <div class="form-group">
            <label for="m_name">Member Name</label>
            <input type="text" class="form-control" id="m_name" name="m_name" value="{{$data->m_name}}" required>
          </div>
          <div class="form-group">
            <label for="m_title">Title</label>
            <input type="text" class="form-control" id="m_title" name="m_title" value="{{$data->m_title}}">
          </div>
          <div class="form-group">
            <label for="m_designation">Member Designation</label>
            <input type="text" class="form-control" id="m_designation" name="m_designation" value="{{$data->m_designation}}">
          </div>
          <div class="form-group">
            <label for="steering_committee">Steering Committee</label>
            <select class="form-control" name="steering_committee">
                <option value="1" @if($data->steering_committee==1) selected @endif>Yes</option>
                <option value="0" @if($data->steering_committee==0) selected @endif>No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="finance_committee">Finance Committee</label>
            <select class="form-control" name="finance_committee">
                <option value="1" @if($data->finance_committee==1) selected @endif>Yes</option>
                <option value="0" @if($data->finance_committee==0) selected @endif>No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="syndicate_committee">Syndicate Committee</label>
            <select class="form-control" name="syndicate_committee">
                <option value="1" @if($data->syndicate_committee==1) selected @endif>Yes</option>
                <option value="0" @if($data->syndicate_committee==0) selected @endif>No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="seneate_committee">Seneate Committee</label>
            <select class="form-control" name="seneate_committee">
                <option value="1" @if($data->seneate_committee==1) selected @endif>Yes</option>
                <option value="0" @if($data->seneate_committee==0) selected @endif>No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="academic_councile">Academin Councile</label>
            <select class="form-control" name="academic_councile">
                <option value="1" @if($data->academic_councile==1) selected @endif>Yes</option>
                <option value="0" @if($data->academic_councile==0) selected @endif>No</option>
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
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Submit</button>
      </div>
    </form>