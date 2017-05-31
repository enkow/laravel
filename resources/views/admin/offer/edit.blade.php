@extends('admin.template.page')

@section('title')
	Edycja oferty
@stop

@section('body')

	{{ Form::model( $offer, [ 'route' => [ 'admin.offer.update', $offer->id ] ] ) }}

		@include( "admin.offer.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}

@stop

@section('scripts')
  <script type="text/javascript">
    /*function formatState (state) {
      if (!state.id) { return state.text; }
      var $state = $(
        '<span><img src="/img/ikony/' + state.element.value.toLowerCase() + '" class="img-flag" /> ' + state.text + '</span>'
      );
      return $state;
    };*/

    /*$(".dropdown").select2({
      templateResult: formatState
    });*/
  </script>
@stop
