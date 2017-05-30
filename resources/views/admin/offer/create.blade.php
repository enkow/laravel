@extends('admin.template.page')

@section('title')
  Nowa oferta
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.offer.store'] ] ) }}

		@include( "admin.offer.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

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
