<ul>
	@foreach($tags as $task)
		<li>{{ $task->name }}</li>
	@endforeach
</ul>