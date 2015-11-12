<div id="alerts">
	@if (Session::has('flash_notifications'))
		@foreach(Session::get('flash_notifications') as $notification)
			<div class="alert alert-{{ $notification['level'] }}">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				@if(is_object($notification['message']))
					<ul>
						@foreach($notification['message']->all() as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@elseif(is_array($notification['message']))
					<ul>
						@foreach($notification['message'] as $message)
							<li>{{ $message }}</li>
						@endforeach
					</ul>
				@else
					{{ $notification['message'] }}
				@endif
			</div>
		@endforeach
	@endif
</div>
