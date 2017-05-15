@extends('admin.template.login')

@section('title', 'Podaj swój adres e-mail:')

@section('form')
	<form action="" method="post">
    {{ csrf_field() }}
		<div class="form-group has-feedback">
			<input type="text" name="email" class="form-control" placeholder="Adres e-mail"/>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>

		<div class="row">
			<div class="col-xs-8">

			</div><!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Wyślij</button>
			</div><!-- /.col -->
		</div>
	</form>

@stop

@push( 'scripts' )
	<script>
		$(function () {
			$('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%' });
		});
	</script>
@endpush
