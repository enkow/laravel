@extends('admin.template.login')

@section('title', 'Logowanie:')

@section('form')

	<form action="" method="post">
    {{ csrf_field() }}
		<div class="form-group has-feedback">
			<input type="text" name="email" class="form-control" placeholder="Adres e-mail"/>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="password" class="form-control" placeholder="Hasło"/>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<input name="remember" value="1" type="checkbox"> Zapamiętaj mnie
					</label>
				</div>
			</div><!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Zaloguj</button>
			</div><!-- /.col -->
		</div>
	</form>

@stop

@section('subtitle')
<a href="{{ route('admin.reset') }}">Zapomniałeś/aś hasła?</a>
@stop

@push( 'scripts' )
	<script>
		$(function () {
			$('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%' });
		});
	</script>
@endpush
