<select name="{{$field??'tag_data_id'}}" id="{{$field??'tag_id'}}">
	
	@foreach($tags as $tag)
		<option value="{{$tag->id}}">{{$tag->name}}</option>
	@endforeach
</select>