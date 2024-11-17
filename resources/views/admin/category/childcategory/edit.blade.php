<form action="{{ route('childcategory.update') }}" method="post">
      @csrf
      	  <div class="form-group">
            <label for="category_name">Category/Subcategory</label>
            <select class="form-control" name="subcategory_id" required>
            	@foreach($category as $row)
            		@php
            			$subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
            		@endphp
            		<option disabled style="color:blue;">{{$row->category_name}}</option>
            		@foreach($subcategory as $row)
            			<option value="{{$row->id}}" @if($row->id==$data->subcategory_id) selected @endif>---{{$row->subcategory_name}}</option>
            		@endforeach
            	@endforeach
            </select>
          </div>
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="form-group">
            <label for="category_name">Childcategory Name</label>
            <input type="text" class="form-control" name="childcategory_name" required value="{{$data->childcategory_name}}">
            <small id="emailHelp" class="form-text text-muted">This is your child category</small>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>