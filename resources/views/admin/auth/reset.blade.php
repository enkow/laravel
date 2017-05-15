@extends('admin.template.login')

@section('title', 'Podaj nowe hasło:')

@section('form')

	<form action="" method="post">
		{{ csrf_field() }}
		<div class="form-group has-feedback">
			<input type="password" name="password" class="form-control" placeholder="Nowe hasło"/>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>

		<div class="form-group has-feedback">
			<input type="password" name="repeat_password" class="form-control" placeholder="Powtórz hasło"/>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
