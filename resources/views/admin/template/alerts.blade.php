@if( session('success') )
	<div class="callout callout-success">
		<p> {{ session('success') }} </p>
	</div>	
@endif
@if(isset($errors))
	@foreach($errors->all() as $error)
		<div class="callout callout-danger">
			<p> {{ $error }} </p>
		</div>
	@endforeach			
@endif