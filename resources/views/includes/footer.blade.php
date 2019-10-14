@if(session('success'))
	@component('components.message')
		@slot('title')
			{!! session('success') !!}
		@endslot

		{!! session('message') !!}

	@endcomponent
@endif